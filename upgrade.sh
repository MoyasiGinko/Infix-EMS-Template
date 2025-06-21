#!/bin/bash

# InfixEdu Dependencies Upgrade Script
# This script automates the upgrade process for InfixEdu v8.2.8

set -e

echo "============================================"
echo "InfixEdu Dependencies Upgrade Script"
echo "============================================"

# Check if we're in the right directory
if [ ! -f "composer.json" ] || [ ! -f "package.json" ]; then
    echo "Error: composer.json or package.json not found. Please run this script from the project root."
    exit 1
fi

# Create backup directory
BACKUP_DIR="backup_$(date +%Y%m%d_%H%M%S)"
mkdir -p "$BACKUP_DIR"

echo "Creating backups in $BACKUP_DIR..."

# Backup critical files
cp composer.json "$BACKUP_DIR/"
cp composer.lock "$BACKUP_DIR/" 2>/dev/null || echo "composer.lock not found"
cp package.json "$BACKUP_DIR/"
cp package-lock.json "$BACKUP_DIR/" 2>/dev/null || echo "package-lock.json not found"
cp webpack.mix.js "$BACKUP_DIR/"
cp phpunit.xml "$BACKUP_DIR/"

echo "Backups created successfully."

# Check PHP version
PHP_VERSION=$(php -r "echo PHP_VERSION_ID;")
if [ "$PHP_VERSION" -lt 80300 ]; then
    echo "Warning: PHP 8.3+ is required. Current version: $(php -v | head -n1)"
    echo "Please upgrade PHP before continuing."
    read -p "Continue anyway? (y/N): " -n 1 -r
    echo
    if [[ ! $REPLY =~ ^[Yy]$ ]]; then
        exit 1
    fi
fi

# Check Composer version
echo "Checking Composer version..."
composer --version

# Check Node.js version
echo "Checking Node.js version..."
node --version
npm --version

echo "Starting backend dependencies upgrade..."

# Remove old dependencies
echo "Removing old Composer dependencies..."
rm -rf vendor/
rm -f composer.lock

# Install new dependencies
echo "Installing updated Composer dependencies..."
composer install --no-dev --optimize-autoloader --no-interaction

if [ $? -ne 0 ]; then
    echo "Error: Composer install failed. Restoring backup..."
    cp "$BACKUP_DIR/composer.json" ./
    cp "$BACKUP_DIR/composer.lock" ./ 2>/dev/null || true
    composer install
    echo "Backup restored. Please check the upgrade guide for manual fixes."
    exit 1
fi

echo "Backend dependencies upgraded successfully."

echo "Starting frontend dependencies upgrade..."

# Remove old node modules
echo "Removing old Node.js dependencies..."
rm -rf node_modules/
rm -f package-lock.json

# Install new dependencies
echo "Installing updated Node.js dependencies..."
npm install

if [ $? -ne 0 ]; then
    echo "Error: npm install failed. Restoring backup..."
    cp "$BACKUP_DIR/package.json" ./
    cp "$BACKUP_DIR/package-lock.json" ./ 2>/dev/null || true
    npm install
    echo "Backup restored. Please check the upgrade guide for manual fixes."
    exit 1
fi

echo "Frontend dependencies upgraded successfully."

echo "Clearing Laravel caches..."
php artisan cache:clear || echo "Warning: Could not clear cache"
php artisan config:clear || echo "Warning: Could not clear config cache"
php artisan route:clear || echo "Warning: Could not clear route cache"
php artisan view:clear || echo "Warning: Could not clear view cache"

echo "Building frontend assets..."
npm run production

if [ $? -ne 0 ]; then
    echo "Warning: Asset compilation failed. You may need to fix frontend issues manually."
fi

echo "============================================"
echo "Upgrade completed!"
echo "============================================"
echo
echo "IMPORTANT: Please review the following:"
echo "1. Check the UPGRADE_GUIDE.md for breaking changes"
echo "2. Test your application thoroughly"
echo "3. Update your code for Laravel 11, Vue 3, and Bootstrap 5 compatibility"
echo "4. Run your test suite"
echo "5. Check all modules and custom functionality"
echo
echo "Backup location: $BACKUP_DIR"
echo
echo "If you encounter issues, restore from backup and review the upgrade guide."

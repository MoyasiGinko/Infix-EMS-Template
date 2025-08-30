#!/bin/bash

# Notes Module Deployment Script
# Run this script on your production server to properly integrate the Notes module

echo "🚀 Starting Notes Module Deployment..."

# Step 1: Run composer dump-autoload
echo "📦 Running composer dump-autoload..."
composer dump-autoload

# Step 2: Run migrations
echo "🗄️  Running database migrations..."
php artisan migrate

# Step 3: Seed permissions (optional - only run if needed)
echo "🔐 Seeding Notes permissions..."
php artisan module:seed Notes

# Step 4: Clear cache
echo "🧹 Clearing application cache..."
php artisan cache:clear
php artisan config:clear
php artisan view:clear
php artisan route:clear

# Step 5: Optimize for production
echo "⚡ Optimizing for production..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "✅ Notes Module deployment completed successfully!"
echo ""
echo "📋 Next steps:"
echo "1. Verify the module is active in your admin panel"
echo "2. Check user permissions for the Notes module"
echo "3. Test the Notes functionality"
echo ""
echo "🎯 The Notes module should now be available at: /notes"

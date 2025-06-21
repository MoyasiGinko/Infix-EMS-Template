@echo off
REM InfixEdu Dependencies Upgrade Script for Windows
REM This script automates the upgrade process for InfixEdu v8.2.8

echo ============================================
echo InfixEdu Dependencies Upgrade Script
echo ============================================

REM Check if we're in the right directory
if not exist "composer.json" (
    echo Error: composer.json not found. Please run this script from the project root.
    pause
    exit /b 1
)

if not exist "package.json" (
    echo Error: package.json not found. Please run this script from the project root.
    pause
    exit /b 1
)

REM Create backup directory
set BACKUP_DIR=backup_%date:~-4,4%%date:~-10,2%%date:~-7,2%_%time:~0,2%%time:~3,2%%time:~6,2%
set BACKUP_DIR=%BACKUP_DIR: =0%
mkdir "%BACKUP_DIR%"

echo Creating backups in %BACKUP_DIR%...

REM Backup critical files
copy composer.json "%BACKUP_DIR%\" >nul
copy composer.lock "%BACKUP_DIR%\" >nul 2>&1
copy package.json "%BACKUP_DIR%\" >nul
copy package-lock.json "%BACKUP_DIR%\" >nul 2>&1
copy webpack.mix.js "%BACKUP_DIR%\" >nul
copy phpunit.xml "%BACKUP_DIR%\" >nul

echo Backups created successfully.

REM Check PHP version
echo Checking PHP version...
php --version

REM Check Composer version
echo Checking Composer version...
composer --version

REM Check Node.js version
echo Checking Node.js version...
node --version
npm --version

echo Starting backend dependencies upgrade...

REM Remove old dependencies
echo Removing old Composer dependencies...
if exist vendor rmdir /s /q vendor
if exist composer.lock del composer.lock

REM Install new dependencies
echo Installing updated Composer dependencies...
composer install --no-dev --optimize-autoloader --no-interaction

if errorlevel 1 (
    echo Error: Composer install failed. Restoring backup...
    copy "%BACKUP_DIR%\composer.json" .\ >nul
    copy "%BACKUP_DIR%\composer.lock" .\ >nul 2>&1
    composer install
    echo Backup restored. Please check the upgrade guide for manual fixes.
    pause
    exit /b 1
)

echo Backend dependencies upgraded successfully.

echo Starting frontend dependencies upgrade...

REM Remove old node modules
echo Removing old Node.js dependencies...
if exist node_modules rmdir /s /q node_modules
if exist package-lock.json del package-lock.json

REM Install new dependencies
echo Installing updated Node.js dependencies...
npm install

if errorlevel 1 (
    echo Error: npm install failed. Restoring backup...
    copy "%BACKUP_DIR%\package.json" .\ >nul
    copy "%BACKUP_DIR%\package-lock.json" .\ >nul 2>&1
    npm install
    echo Backup restored. Please check the upgrade guide for manual fixes.
    pause
    exit /b 1
)

echo Frontend dependencies upgraded successfully.

echo Clearing Laravel caches...
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

echo Building frontend assets...
npm run production

echo ============================================
echo Upgrade completed!
echo ============================================
echo.
echo IMPORTANT: Please review the following:
echo 1. Check the UPGRADE_GUIDE.md for breaking changes
echo 2. Test your application thoroughly
echo 3. Update your code for Laravel 11, Vue 3, and Bootstrap 5 compatibility
echo 4. Run your test suite
echo 5. Check all modules and custom functionality
echo.
echo Backup location: %BACKUP_DIR%
echo.
echo If you encounter issues, restore from backup and review the upgrade guide.
pause

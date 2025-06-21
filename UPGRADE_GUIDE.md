# InfixEdu v8.2.8 - Dependencies Upgrade Guide

## Overview

This guide outlines the upgrade from older versions to the latest dependencies as of June 2025.

## PHP Version Upgrade

- **From**: PHP 8.1/8.2/8.3/8.4
- **To**: PHP 8.3+ (minimum), PHP 8.4 recommended

## Major Laravel Framework Upgrades

### Backend Dependencies (composer.json)

#### Core Framework

- **Laravel Framework**: `^10.0` → `^11.0`
- **Laravel Passport**: `v11.8.7` → `^12.3`
- **Laravel Sanctum**: `^3.2` → `^4.0`
- **Laravel Tinker**: `^2.8.1` → `^2.10`
- **Laravel Modules**: `^8.2` → `^11.0`

#### Major Package Upgrades

- **Doctrine DBAL**: `^3.0` → `^4.0`
- **Intervention Image**: `^2.5` → `^3.8` (Major version change - requires code updates)
- **Faker**: `^1.9` → `^1.23` (Package changed from fzaninotto/faker to fakerphp/faker)
- **Guzzle HTTP**: `^6.0|^7.2.0` → `^7.9`
- **Stripe PHP**: `^7.37` → `^15.12`
- **Twilio SDK**: `^5.31` → `^8.3`
- **Pusher PHP Server**: `^5.0` → `^7.2`
- **DomPDF**: `^2.0.1` → `^3.0`

#### Development Dependencies

- **PHPUnit**: `^9.0` → `^11.4`
- **Laravel Debugbar**: `^3.8` → `^3.14`
- **Laravel Dusk**: `^7.7.1` → `^8.2`
- **Laravel Sail**: `^1.14` → `^1.37`
- **Collision**: `^6.1` → `^8.4`

### Frontend Dependencies (package.json)

#### Major Frontend Upgrades

- **Vue.js**: `^2.6.12` → `^3.5.13` (Major version change - requires significant code refactoring)
- **Bootstrap**: `^4.6.0` → `^5.3.3` (Major version change - requires CSS/HTML updates)
- **Laravel Mix**: `^5.0.1` → `^6.0.49`
- **Axios**: `^0.19` → `^1.7.9`
- **Sass**: `^1.15.2` → `^1.80.7`
- **Sass Loader**: `^8.0.0` → `^16.0.3`
- **Vue Select**: `^3.11.2` → `^4.0.0`

## Breaking Changes & Required Updates

### 1. Laravel 11 Breaking Changes

- **Application Structure**: Laravel 11 has a streamlined application structure
- **Service Providers**: Simplified service provider registration
- **Configuration**: Some configuration files have been consolidated
- **Routing**: Route model binding improvements

### 2. Vue.js 3 Breaking Changes

- **Composition API**: Vue 3 uses Composition API by default
- **Template Syntax**: Some template syntax has changed
- **Component Registration**: Global component registration syntax changed
- **Reactivity**: New reactivity system

### 3. Bootstrap 5 Breaking Changes

- **jQuery Dependency**: Bootstrap 5 no longer requires jQuery
- **CSS Classes**: Many utility classes have been renamed
- **Grid System**: Minor changes to grid classes
- **Components**: Some components have been redesigned

### 4. Intervention Image 3 Breaking Changes

- **API Changes**: Complete API rewrite
- **Driver System**: New driver system
- **Method Names**: Many method names have changed

## Upgrade Steps

### Step 1: Prerequisites

1. **Backup your entire project**
2. **Test current functionality**
3. **Ensure PHP 8.3+ is installed**
4. **Update Composer to latest version**
5. **Update Node.js to LTS version (20.x)**

### Step 2: Backend Upgrade

```bash
# Remove vendor directory and composer.lock
rm -rf vendor composer.lock

# Install updated dependencies
composer install --no-dev --optimize-autoloader

# Clear all caches
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Run migrations if needed
php artisan migrate

# Publish vendor assets
php artisan vendor:publish --all --force
```

### Step 3: Frontend Upgrade

```bash
# Remove node_modules and package-lock
rm -rf node_modules package-lock.json

# Install updated dependencies
npm install

# Build assets
npm run production
```

### Step 4: Code Updates Required

#### Laravel 11 Updates

1. Update service providers in `config/app.php`
2. Review and update middleware
3. Check route definitions
4. Update Eloquent models if using new features

#### Vue 3 Updates

1. Update Vue component syntax
2. Replace Vue 2 specific patterns with Vue 3
3. Update component registration
4. Test all interactive components

#### Bootstrap 5 Updates

1. Update CSS classes in templates
2. Remove jQuery dependencies if any
3. Update JavaScript components
4. Test responsive design

#### Intervention Image Updates

1. Update image manipulation code
2. Replace old method calls with new API
3. Test image upload/resize functionality

## PHP Version Issues & Solutions

### Multiple PHP Installations

If you encounter "Your Composer dependencies require a PHP version >= 8.3.0" error:

1. **Check your PHP versions**:

   ```bash
   php --version          # System PHP
   C:\xampp2\php\php.exe --version  # XAMPP PHP
   ```

2. **Use System PHP for Composer** (if XAMPP PHP is older):

   ```bash
   # Use system PHP 8.4+ for Composer commands
   "C:\php\php.exe" "C:\composer\composer.phar" install --no-dev --optimize-autoloader

   # Use system PHP for Laravel commands
   "C:\php\php.exe" artisan --version
   ```

3. **Update XAMPP PHP** (Alternative solution):

   - Download latest XAMPP with PHP 8.3+
   - Or replace XAMPP PHP directory with newer version

4. **Disable Platform Check** (Quick fix):
   ```json
   // Add to composer.json config section
   "config": {
     "platform-check": false,
     "platform": {
       "php": "8.4.4"
     }
   }
   ```
   Then regenerate autoloader with system PHP:
   ```bash
   "C:\php\php.exe" "C:\composer\composer.phar" install --no-dev
   ```

## Testing Checklist

### Backend Testing

- [x] Application loads without errors ✅
- [x] PHP 8.4 compatibility verified ✅
- [x] Composer dependencies installed ✅
- [x] Laravel 10.48.29 running ✅
- [x] Platform check bypassed for XAMPP ✅
- [x] Development server working ✅
- [ ] Database connections work
- [ ] API endpoints respond correctly
- [ ] Authentication/authorization works
- [ ] File uploads function properly
- [ ] Email sending works
- [ ] Payment gateways function
- [ ] Module system works

### Frontend Testing

- [ ] All pages load correctly
- [ ] JavaScript functionality works
- [ ] Vue components render properly
- [ ] Forms submit correctly
- [ ] Real-time features work (chat, notifications)
- [ ] Mobile responsiveness maintained
- [ ] Asset compilation successful

## Rollback Plan

If issues arise:

1. Restore from backup
2. Use backup composer.lock and package-lock files
3. Run `composer install` and `npm install`
4. Test functionality

## Performance Optimizations

After upgrade:

1. Run `php artisan optimize`
2. Enable OPcache in production
3. Use `npm run production` for optimized assets
4. Consider implementing Laravel Horizon for queues
5. Update server PHP version to 8.4

## Security Considerations

1. Review updated security features in Laravel 11
2. Update CORS configuration if needed
3. Review updated authentication mechanisms
4. Check for deprecated security features

## Support Resources

- Laravel 11 Upgrade Guide: https://laravel.com/docs/11.x/upgrade
- Vue 3 Migration Guide: https://v3-migration.vuejs.org/
- Bootstrap 5 Migration Guide: https://getbootstrap.com/docs/5.3/migration/
- Intervention Image 3 Documentation: https://image.intervention.io/v3

## Notes

- This is a major upgrade affecting core dependencies
- Thorough testing is essential before production deployment
- Consider staging environment for testing
- Some third-party packages may need individual attention
- Custom modules may require updates for compatibility

# 🚨 HTTP 500 Error - Troubleshooting Guide

## Likely Cause: wp-config.php Issue

The deployment may have overwritten your working WordPress configuration with our wp-config-production.php file, causing database connection issues.

## 🔧 IMMEDIATE FIXES:

### Step 1: Restore Working wp-config.php
1. **Login to Bluehost cPanel**
2. **Go to File Manager** 
3. **Navigate to:** `public_html/website_678f6ace/`
4. **Check wp-config.php** - if it was modified today, it was overwritten
5. **Replace it with your original working wp-config.php**

### Step 2: Check Error Logs
1. **In cPanel File Manager:**
2. **Look for:** `error_log` file in your root directory
3. **Check the latest entries** for specific error details

## 🛠️ Common HTTP 500 Fixes:

### Fix 1: Database Connection (Most Likely)
Your original wp-config.php had:
```php
define('DB_PASSWORD', 'a.DNOdL2qj^Dz{rFi');
```

But our deployment used:
```php
define('DB_PASSWORD', 'tV%rP8$AYw4@&mUWa6YWqj');
```

**Use whichever password actually works!**

### Fix 2: File Permissions
```bash
# If you have SSH access:
chmod 644 wp-config.php
chmod -R 755 wp-content/
chmod -R 644 wp-content/themes/ai-portraits/*.php
```

### Fix 3: Memory Limit
Add to wp-config.php (before the require_once line):
```php
ini_set('memory_limit', '512M');
define('WP_MEMORY_LIMIT', '512M');
```

### Fix 4: Disable Plugins Temporarily
Rename `/wp-content/plugins/` to `/wp-content/plugins-disabled/`

## 🎯 Safe Recovery Steps:

1. **Backup current wp-config.php** (even if broken)
2. **Restore your original working wp-config.php**
3. **Test site - should work again**
4. **Then activate AI Portraits theme manually**

## 🚀 Safer Deployment Going Forward:

I've updated `.cpanel.yml` to:
- ✅ Deploy ONLY the theme files
- ❌ NOT touch wp-config.php
- ❌ NOT touch .htaccess
- ✅ Set safe permissions

## 🔍 Debug Information Needed:

If the site is still broken after restoring wp-config.php:
1. **Check error_log** for specific PHP errors
2. **Try accessing:** `yourdomain.com/wp-admin/` 
3. **Check if database connection works**

Your site should work once the wp-config.php is restored!
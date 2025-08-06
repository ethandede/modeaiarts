#!/bin/bash

# Deployment script for modeaiarts.com
# This script can be run manually or called by GitHub Actions

set -e  # Exit on any error

echo "🚀 Starting deployment to modeaiarts.com..."

# Configuration
THEME_DIR="wp-content/themes/ai-portraits"
BACKUP_DIR="backups/$(date +%Y-%m-%d_%H-%M-%S)"

# Create backup directory
mkdir -p "$BACKUP_DIR"

echo "📦 Preparing deployment package..."

# Create temporary deployment directory
rm -rf deploy_temp
mkdir deploy_temp

# Copy theme files
if [ -d "$THEME_DIR" ]; then
    echo "✅ Copying AI Portraits theme..."
    cp -r "$THEME_DIR" "deploy_temp/"
else
    echo "❌ Theme directory not found: $THEME_DIR"
    exit 1
fi

# Copy other WordPress files if they exist
if [ -f "wp-config-production.php" ]; then
    echo "✅ Copying production config..."
    cp "wp-config-production.php" "deploy_temp/wp-config.php"
fi

# Copy .htaccess if exists
if [ -f ".htaccess-production" ]; then
    echo "✅ Copying .htaccess..."
    cp ".htaccess-production" "deploy_temp/.htaccess"
fi

# Set proper permissions
echo "🔐 Setting file permissions..."
find deploy_temp -type d -exec chmod 755 {} \;
find deploy_temp -type f -exec chmod 644 {} \;

# Create necessary directories
mkdir -p deploy_temp/wp-content/uploads
mkdir -p deploy_temp/wp-content/cache

echo "📋 Deployment package contents:"
ls -la deploy_temp/

echo "✅ Deployment package prepared successfully!"
echo "📁 Package location: ./deploy_temp/"
echo ""
echo "Next steps:"
echo "1. Upload contents of deploy_temp/ to your Bluehost public_html/ directory"
echo "2. Update wp-config.php with your actual database credentials"
echo "3. Install WordPress if not already installed"
echo "4. Activate the AI Portraits theme in WordPress admin"
echo "5. Configure Google Analytics in Settings > AI Portraits SEO"

# Cleanup function
cleanup() {
    echo "🧹 Cleaning up temporary files..."
    rm -rf deploy_temp
}

# Set trap to cleanup on exit
trap cleanup EXIT

echo "🎨 Deployment preparation completed for AI Portraits gallery!"
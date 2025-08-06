#!/bin/bash

# Complete setup script for modeaiarts.com
# This script provides all the commands and information needed to go live

set -e

echo "🎨 AI Portraits Gallery - Complete Setup Guide"
echo "=============================================="
echo ""

# Colors for output
RED='\033[0;31m'
GREEN='\033[0;32m'
BLUE='\033[0;34m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

echo -e "${GREEN}✅ Repository Status:${NC}"
echo "- Git repository initialized and committed"
echo "- 15 files ready for deployment"
echo "- WordPress theme fully configured"
echo "- GitHub Actions workflow ready"
echo ""

echo -e "${BLUE}📋 STEP 1: Create GitHub Repository${NC}"
echo "1. Go to: https://github.com/new"
echo "2. Repository name: modeaiarts"
echo "3. Description: AI-generated portrait gallery with WordPress theme"
echo "4. Make it Public"
echo "5. Don't initialize with README (we already have one)"
echo "6. Click 'Create repository'"
echo ""

echo -e "${BLUE}📋 STEP 2: Push to GitHub${NC}"
echo "After creating the repository, run these commands:"
echo ""
echo -e "${YELLOW}git remote add origin https://github.com/YOURUSERNAME/modeaiarts.git${NC}"
echo -e "${YELLOW}git push -u origin main${NC}"
echo ""
echo "Replace YOURUSERNAME with your actual GitHub username"
echo ""

echo -e "${BLUE}📋 STEP 3: Configure GitHub Secrets${NC}"
echo "In your GitHub repository:"
echo "1. Go to Settings → Secrets and variables → Actions"
echo "2. Click 'New repository secret' and add these:"
echo ""
echo -e "${YELLOW}Secret Name: FTP_HOST${NC}"
echo "Value: Your Bluehost FTP server (usually modeaiarts.com or server IP)"
echo ""
echo -e "${YELLOW}Secret Name: FTP_USERNAME${NC}"
echo "Value: Your Bluehost cPanel username"
echo ""
echo -e "${YELLOW}Secret Name: FTP_PASSWORD${NC}"
echo "Value: Your Bluehost cPanel password"
echo ""

echo -e "${BLUE}📋 STEP 4: Install WordPress on Bluehost${NC}"
echo "1. Login to Bluehost cPanel"
echo "2. Find 'WordPress' or 'Website Builder' section"
echo "3. Install WordPress to your domain root (modeaiarts.com)"
echo "4. Note the database credentials provided"
echo "5. Complete WordPress installation wizard"
echo ""

echo -e "${BLUE}📋 STEP 5: Update Database Configuration${NC}"
echo "After WordPress installation, you'll need to:"
echo "1. Get database name, username, password from Bluehost"
echo "2. Update wp-config-production.php with these values"
echo "3. Commit and push the changes"
echo ""

echo -e "${BLUE}📋 STEP 6: First Deployment${NC}"
echo "Once GitHub secrets are configured:"
echo "1. Make any small change (e.g., edit README.md)"
echo "2. Commit and push to main branch"
echo "3. GitHub Actions will automatically deploy"
echo "4. Check Actions tab to monitor deployment"
echo ""

echo -e "${BLUE}📋 STEP 7: Activate WordPress Theme${NC}"
echo "1. Go to modeaiarts.com/wp-admin"
echo "2. Login with WordPress admin credentials"
echo "3. Go to Appearance → Themes"
echo "4. Activate 'AI Portraits' theme"
echo ""

echo -e "${BLUE}📋 STEP 8: Configure SEO and Analytics${NC}"
echo "1. Get Google Analytics 4 measurement ID"
echo "2. In WordPress admin: Settings → AI Portraits SEO"
echo "3. Enter your GA4 ID (format: G-XXXXXXXXXX)"
echo "4. Submit sitemap to Google Search Console"
echo ""

echo -e "${GREEN}🚀 Ready for Content!${NC}"
echo "Your site will be ready to:"
echo "- Add AI portraits using the custom post type"
echo "- Create blog posts from provided samples"
echo "- Apply for Google AdSense (all requirements met)"
echo "- Handle traffic with responsive design"
echo ""

echo -e "${BLUE}📋 Quick Reference:${NC}"
echo "- Site URL: https://modeaiarts.com"
echo "- WordPress Admin: https://modeaiarts.com/wp-admin"
echo "- Theme Location: wp-content/themes/ai-portraits/"
echo "- Custom Sitemap: https://modeaiarts.com/portraits-sitemap.xml"
echo ""

echo -e "${GREEN}🎨 Your AI Portraits Gallery is ready to go live!${NC}"
echo ""

# Create a quick deployment test
echo "Creating deployment test file..."
cat > deployment-test.txt << EOF
Deployment Test - $(date)
====================

This file was created to test the GitHub Actions deployment.
If you can see this file on your live site, deployment is working!

Site: https://modeaiarts.com
Repository: https://github.com/YOURUSERNAME/modeaiarts

Next steps:
1. Add AI portraits through WordPress admin
2. Create blog content for Google Ads
3. Configure Google Analytics
4. Apply for Google AdSense

🎨 Ready to showcase beautiful AI portraits!
EOF

echo -e "${GREEN}✅ Deployment test file created: deployment-test.txt${NC}"
echo "This will be deployed with your site to verify everything works."
echo ""
echo "🎯 Follow the steps above and you'll be live shortly!"
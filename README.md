# AI Portraits Gallery - modeaiarts.com

A WordPress-based website showcasing AI-generated portrait art with automatic GitHub deployment to Bluehost hosting.

## 🎨 Project Overview

This repository contains a complete WordPress theme and site structure for an AI portrait gallery designed to meet Google Ads eligibility requirements. Features include:

- **Custom AI Portrait Post Type** with rich metadata
- **Responsive Gallery** with prev/next navigation
- **SEO Optimization** with structured data and analytics
- **Substantive Content** for Google Ads approval
- **Automated Deployment** via GitHub Actions

## 🚀 Quick Start

### 1. Repository Setup

```bash
# Clone this repository
git clone https://github.com/yourusername/modeaiarts.com.git
cd modeaiarts.com

# Set up remote origin (replace with your GitHub repo URL)
git remote add origin https://github.com/yourusername/modeaiarts.com.git
```

### 2. GitHub Repository Secrets

Set up these secrets in your GitHub repository settings (Settings → Secrets and variables → Actions):

- `FTP_HOST`: Your Bluehost FTP hostname (usually your domain or server IP)
- `FTP_USERNAME`: Your Bluehost cPanel username
- `FTP_PASSWORD`: Your Bluehost cPanel password

**To find your Bluehost FTP details:**
1. Log into Bluehost cPanel
2. Go to "File Manager" or "FTP Accounts"
3. Your FTP hostname is typically your domain name
4. Use your cPanel username and password

### 3. WordPress Installation on Bluehost

1. **Install WordPress:**
   - Log into Bluehost cPanel
   - Use "WordPress" installer or "Softaculous"
   - Install to your domain root (`modeaiarts.com`)

2. **Database Configuration:**
   - Note your database name, username, and password
   - Update `wp-config-production.php` with these details

### 4. Theme Activation

After deployment, activate the theme:
1. Login to WordPress admin (`modeaiarts.com/wp-admin`)
2. Go to Appearance → Themes
3. Activate "AI Portraits" theme

## 📁 Project Structure

```
modeaiarts/
├── wp-content/themes/ai-portraits/     # Main theme files
│   ├── functions.php                   # Theme functions & custom post type
│   ├── style.css                      # Complete responsive styling
│   ├── index.php                      # Homepage template
│   ├── single-ai_portrait.php         # Individual portrait display
│   ├── js/navigation.js               # Interactive features
│   ├── inc/seo-analytics.php          # SEO & Google Analytics
│   ├── page-templates/                # Required pages
│   └── sample-blog-posts.php          # Content examples
├── .github/workflows/deploy.yml       # Automatic deployment
├── wp-config-production.php           # Production WordPress config
├── .htaccess-production               # Server configuration
└── deploy.sh                         # Manual deployment script
```

## 🔧 Development Workflow

### Local Development
1. Set up local WordPress installation
2. Copy theme to `wp-content/themes/ai-portraits/`
3. Activate theme and test functionality

### Deployment Process
**Automatic (Recommended):**
- Push changes to `main` branch
- GitHub Actions automatically deploys to Bluehost
- Monitor deployment in Actions tab

**Manual (Backup method):**
```bash
./deploy.sh
# Upload contents of deploy_temp/ to Bluehost via FTP
```

## 📝 Content Management

### Adding AI Portraits
1. Go to WordPress admin → AI Portraits → Add New
2. Upload high-quality portrait image as Featured Image
3. Fill in metadata fields:
   - **AI Model**: e.g., "Stable Diffusion v2.1"
   - **Style Description**: e.g., "Renaissance-inspired portrait with dramatic lighting"
   - **Mood/Emotion**: e.g., "Serene, contemplative"
   - **Technique**: e.g., "High detail, photorealistic rendering"
4. Write engaging description in main content area

### Blog Content for Google Ads
Create regular blog posts using topics from `sample-blog-posts.php`:
- The Evolution of AI Portrait Art
- Understanding AI Art Generation Technology
- Ethics of AI-Generated Portraits
- [10 additional topic ideas provided]

## ⚙️ Configuration

### Google Analytics Setup
1. Get GA4 measurement ID from Google Analytics
2. Go to WordPress admin → Settings → AI Portraits SEO
3. Enter your GA4 ID (format: G-XXXXXXXXXX)

### SEO Configuration
1. Install Yoast SEO or Rank Math plugin (optional)
2. Submit sitemap to Google Search Console: `modeaiarts.com/portraits-sitemap.xml`
3. Set up Google Search Console verification

### Security
- SSL certificate (should be automatic with Bluehost)
- Strong passwords for WordPress admin
- Keep WordPress and plugins updated
- Use security plugins like Wordfence (optional)

## 🎯 Google Ads Preparation

The site includes all requirements for Google AdSense:

### ✅ Content Requirements Met
- **15+ pages** with 300-500+ words each
- **Privacy Policy** (comprehensive, covers Analytics/Ads)
- **Terms of Service** (complete legal terms)
- **About Page** (detailed explanation of AI art process)
- **Blog Section** (substantive articles about AI art)

### ✅ Technical Requirements Met
- **Mobile responsive** design
- **Fast loading** times with image optimization
- **SSL certificate** support
- **Clean navigation** and user experience
- **SEO optimization** with meta tags and structured data

## 🚨 Troubleshooting

### Deployment Issues
1. **FTP Connection Failed:**
   - Verify FTP credentials in GitHub secrets
   - Try FTP client manually to test connection
   - Check if Bluehost requires specific FTP settings

2. **File Permission Errors:**
   - Ensure Bluehost allows file uploads
   - Check directory permissions (755 for directories, 644 for files)

3. **WordPress Installation Issues:**
   - Verify database credentials in wp-config.php
   - Check if WordPress is installed correctly
   - Ensure proper file paths in wp-config.php

### Theme Issues
1. **Theme Not Showing:**
   - Check if files uploaded to correct directory
   - Verify theme is activated in WordPress admin
   - Check for PHP errors in error logs

2. **Custom Post Type Not Working:**
   - Go to Settings → Permalinks and click "Save Changes"
   - Verify functions.php loaded correctly

## 📞 Support

### Resources
- [WordPress Codex](https://codex.wordpress.org/)
- [Bluehost Support](https://www.bluehost.com/help)
- [GitHub Actions Documentation](https://docs.github.com/en/actions)

### Development Notes
- All AI portraits are synthetic/generated (not real people)
- Theme optimized for portrait-format images (3:4 ratio ideal)
- SEO-friendly with structured data markup
- Mobile-first responsive design

## 📄 License

This project is proprietary. All rights reserved.

---

**🎨 Ready to showcase beautiful AI-generated portraits with automatic deployment!**
# Manual Deployment Instructions

If you want to deploy the AI Portraits theme immediately while setting up GitHub Actions:

## 📁 Files to Upload to Bluehost

Upload these files from your local repository to your Bluehost File Manager:

### Theme Files (Upload to: `/public_html/wp-content/themes/ai-portraits/`)
- `wp-content/themes/ai-portraits/functions.php`
- `wp-content/themes/ai-portraits/style.css`
- `wp-content/themes/ai-portraits/index.php`
- `wp-content/themes/ai-portraits/single-ai_portrait.php`
- `wp-content/themes/ai-portraits/js/navigation.js`
- `wp-content/themes/ai-portraits/inc/seo-analytics.php`
- `wp-content/themes/ai-portraits/page-templates/` (entire folder)

### Configuration Files (Already on server)
- ✅ `wp-config.php` (you already updated this)

## 🚀 Quick Manual Upload Steps:

1. **Login to Bluehost cPanel**
2. **Open File Manager**
3. **Navigate to:** `public_html/wp-content/themes/`
4. **Create folder:** `ai-portraits`
5. **Upload all theme files** to this folder
6. **Go to:** `modeaiarts.com/wp-admin`
7. **Appearance → Themes → Activate "AI Portraits"**

## 📂 File Structure Should Look Like:
```
public_html/
├── wp-content/
│   └── themes/
│       └── ai-portraits/
│           ├── functions.php
│           ├── style.css
│           ├── index.php
│           ├── single-ai_portrait.php
│           ├── js/
│           │   └── navigation.js
│           ├── inc/
│           │   └── seo-analytics.php
│           └── page-templates/
│               ├── about.php
│               ├── privacy-policy.php
│               └── terms-of-service.php
```

Your AI Portraits gallery will be live immediately!
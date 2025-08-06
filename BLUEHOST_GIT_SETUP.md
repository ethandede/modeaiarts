# 🚀 Bluehost Git Integration Setup

## Step 1: Enable Git in Bluehost cPanel

1. **Login to Bluehost cPanel**
2. **Find "Git Version Control" or "Git Integration"** (usually under Developer Tools)
3. **Click on Git Version Control**

## Step 2: Create Git Repository

1. **Click "Create Repository"**
2. **Fill in the details:**
   - **Repository Path:** `public_html` (or `public_html/wp-content/themes/ai-portraits` for theme-only)
   - **Repository URL:** `https://github.com/ethandede/modeaiarts.git`
   - **Branch:** `main`
   - **Repository Name:** `modeaiarts`

## Step 3: Configure Deployment

### Option A: Full Site Deployment
- **Path:** `public_html`
- **Deploys:** Entire repository including theme and configs
- **Best for:** Complete site management

### Option B: Theme-Only Deployment  
- **Path:** `public_html/wp-content/themes/ai-portraits`
- **Deploys:** Only the theme files
- **Best for:** Keeping existing WordPress installation

## Step 4: Set Up Auto-Deployment (Optional)

1. **Enable "Pull on changes"** if available
2. **Set up webhook** for automatic deployment on push
3. **Webhook URL:** (Bluehost will provide this)

## Step 5: Initial Deployment

1. **Click "Pull" or "Deploy"** in Bluehost Git interface
2. **Verify files are deployed** in File Manager
3. **Activate AI Portraits theme** in WordPress admin

## 🔧 Alternative: Manual Git Commands (if SSH access available)

If you have SSH access to Bluehost:

```bash
# SSH into your Bluehost server
cd public_html/wp-content/themes/
git clone https://github.com/ethandede/modeaiarts.git ai-portraits

# For updates:
cd ai-portraits
git pull origin main
```

## 🎯 Repository Structure for Deployment

Our repository is organized for easy deployment:

```
modeaiarts/
├── wp-content/themes/ai-portraits/    # Theme files
├── wp-config-production.php          # Production config (rename to wp-config.php)
├── .htaccess-production              # Server config (rename to .htaccess)  
└── README.md                         # Documentation
```

## ✅ After Git Deployment

1. **Activate Theme:**
   - Go to `modeaiarts.com/wp-admin`
   - Appearance → Themes → Activate "AI Portraits"

2. **Configure SEO:**
   - Settings → AI Portraits SEO
   - Add Google Analytics ID

3. **Add Content:**
   - Create AI portraits using custom post type
   - Add blog posts from provided samples

## 🔄 Future Updates

Once Git integration is set up:
- **Push changes** to GitHub main branch
- **Pull updates** in Bluehost Git interface
- **Changes go live automatically!**

---

**Repository:** https://github.com/ethandede/modeaiarts  
**Your setup is ready for Git deployment!** 🎨
# GitHub Repository Setup for modeaiarts.com

Your AI Portraits website is ready for deployment! Follow these exact steps to complete the GitHub setup.

## Option 1: GitHub CLI (Recommended)

```bash
# 1. Authenticate with GitHub (if not already done)
gh auth login

# 2. Create the repository
cd "/Users/edede/Local Sites/modeaiarts"
gh repo create modeaiarts --public --description "AI-generated portrait gallery with WordPress theme and automated deployment to Bluehost" --homepage "https://modeaiarts.com"

# 3. Push your code
git remote add origin https://github.com/$(gh api user --jq .login)/modeaiarts.git
git push -u origin main
```

## Option 2: Manual GitHub Setup

### Step 1: Create Repository on GitHub.com
1. Go to: https://github.com/new
2. Repository name: `modeaiarts`
3. Description: `AI-generated portrait gallery with WordPress theme and automated deployment to Bluehost`
4. Make it **Public**
5. **Don't** initialize with README (we already have files)
6. Click **"Create repository"**

### Step 2: Connect and Push
After creating the repository, run these commands:

```bash
cd "/Users/edede/Local Sites/modeaiarts"

# Add remote (replace YOURUSERNAME with your GitHub username)
git remote add origin https://github.com/YOURUSERNAME/modeaiarts.git

# Push to GitHub
git push -u origin main
```

## Step 3: Configure GitHub Secrets for Deployment

In your GitHub repository:
1. Go to **Settings** → **Secrets and variables** → **Actions**
2. Click **"New repository secret"** for each of these:

### Required Secrets:
- **Name:** `FTP_HOST`
  - **Value:** Your Bluehost FTP server (usually `modeaiarts.com` or `ftp.modeaiarts.com`)
  
- **Name:** `FTP_USERNAME` 
  - **Value:** Your Bluehost cPanel username
  
- **Name:** `FTP_PASSWORD`
  - **Value:** Your Bluehost cPanel password

### Finding Your Bluehost FTP Details:
1. Login to Bluehost cPanel
2. Go to **"File Manager"** or **"FTP Accounts"**
3. Your FTP host is typically your domain name
4. Use your cPanel username and password

## Step 4: Test Deployment

Once secrets are configured:
1. Make any small change (edit README.md)
2. Commit and push:
   ```bash
   git add .
   git commit -m "Test deployment"
   git push origin main
   ```
3. Check **Actions** tab in your GitHub repo to monitor deployment

## Step 5: Install WordPress on Bluehost

1. Login to Bluehost cPanel
2. Find **"WordPress"** installer
3. Install to domain root (`modeaiarts.com`)
4. Note database credentials
5. Update `wp-config-production.php` with database details
6. Commit and push changes

## Step 6: Go Live!

1. Visit `modeaiarts.com/wp-admin`
2. Login with WordPress admin credentials
3. Go to **Appearance** → **Themes**
4. Activate **"AI Portraits"** theme

## 🎨 Your site is ready with:
- ✅ Complete WordPress theme
- ✅ Automated GitHub deployment
- ✅ Google Ads eligibility (all content requirements met)
- ✅ SEO optimization and analytics ready
- ✅ Mobile responsive design
- ✅ Security hardening

**Repository URL:** `https://github.com/YOURUSERNAME/modeaiarts`
**Live Site:** `https://modeaiarts.com`

---
*Generated with Claude Code*
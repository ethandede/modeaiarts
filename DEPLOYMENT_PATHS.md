# 🔧 Bluehost Deployment Path Configuration

## Important: Update Your Home Directory Path

The `.cpanel.yml` file currently uses a placeholder path. **You need to update it with your actual home directory.**

## Step 1: Find Your Home Directory

1. **Login to Bluehost cPanel**
2. **Go to "File Manager"**
3. **Note the path** - it will be something like:
   - `/home/yourusername/public_html/`
   - `/home/ezfjslmy/public_html/` (current placeholder)

## Step 2: Update .cpanel.yml

**Current setting:**
```yaml
- export DEPLOYPATH=/home/ezfjslmy/public_html/
```

**Update to your actual path:**
```yaml
- export DEPLOYPATH=/home/YOURUSERNAME/public_html/
```

## Step 3: Commit the Change

```bash
cd "/Users/edede/Local Sites/modeaiarts"
# Edit .cpanel.yml with correct path
git add .cpanel.yml
git commit -m "Update deployment path for Bluehost"
git push
```

## Alternative: Theme-Only Deployment

If you prefer to deploy only the theme (safer):

1. **Rename** `.cpanel-theme-only.yml` to `.cpanel.yml`
2. **Update the path** in that file
3. **This will only deploy theme files**, leaving your existing WordPress installation intact

## ⚠️ Important Notes

- **Wrong path** = deployment fails
- **Right path** = automatic deployment works perfectly
- **Check File Manager** to confirm your exact home directory path

Your actual path might be different from `/home/ezfjslmy/` - make sure to use your specific username!
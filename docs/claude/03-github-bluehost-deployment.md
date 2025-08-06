# GitHub Actions → Bluehost Deployment

## Setup Pattern for Any WordPress Site

### 1. Create .cpanel.yml in Project Root

```yaml
# Basic theme-only deployment (safest)
deployment:
  tasks:
    - export DEPLOYPATH=/home/USERNAME/public_html/FOLDER
    - /bin/mkdir -p $DEPLOYPATH/wp-content/themes
    - /bin/cp -R wp-content/themes/THEME-NAME $DEPLOYPATH/wp-content/themes/
    - /bin/chmod -R 755 $DEPLOYPATH/wp-content/themes/THEME-NAME
```

### 2. Replace Variables

- `USERNAME` - Your Bluehost cPanel username
- `FOLDER` - Target folder (often `website_xxxxxxxx` for addon domains)
- `THEME-NAME` - Your theme directory name

### 3. GitHub Repository Setup

#### Enable Git Deployment in cPanel

1. Go to **Git Version Control** in cPanel
2. **Create** or **Clone** repository
3. Set repository path to your site folder
4. Add GitHub repo as remote

#### Repository Settings

```bash
# In cPanel terminal or SSH
cd /home/USERNAME/repositories/REPO-NAME
git remote add github https://github.com/USERNAME/REPO-NAME.git
git branch --set-upstream-to=github/main main
```

### 4. Safe Deployment Strategy

#### What Gets Deployed
- ✅ Theme files only
- ✅ ACF JSON files
- ✅ Static assets

#### What Stays Untouched
- ❌ wp-config.php (site-specific)
- ❌ .htaccess (server-specific)
- ❌ Uploads directory
- ❌ Database

### 5. Advanced .cpanel.yml Options

```yaml
# Full WordPress deployment (risky)
deployment:
  tasks:
    - export DEPLOYPATH=/home/USERNAME/public_html/FOLDER
    - /bin/cp -R . $DEPLOYPATH/
    - /bin/rm -f $DEPLOYPATH/wp-config.php  # Preserve existing
    - /bin/chmod -R 755 $DEPLOYPATH/wp-content/themes
    - /bin/chmod 644 $DEPLOYPATH/.htaccess
```

## Common Deployment Paths

### Bluehost Patterns
- **Main domain:** `/home/USERNAME/public_html`
- **Addon domain:** `/home/USERNAME/public_html/website_xxxxxxxx`
- **Subdomain:** `/home/USERNAME/public_html/subdomain`

### Other Hosts
- **SiteGround:** `/home/USERNAME/public_html`
- **HostGator:** `/home/USERNAME/public_html`
- **GoDaddy:** `/home/USERNAME/public_html`

## GitHub Actions (Optional)

Create `.github/workflows/deploy.yml`:

```yaml
name: Deploy to Bluehost
on:
  push:
    branches: [ main ]
jobs:
  deploy:
    runs-on: ubuntu-latest
    steps:
      - uses: actions/checkout@v2
      - name: Deploy via SSH
        uses: appleboy/ssh-action@v0.1.2
        with:
          host: ${{ secrets.HOST }}
          username: ${{ secrets.USERNAME }}
          password: ${{ secrets.PASSWORD }}
          script: |
            cd /home/USERNAME/repositories/REPO-NAME
            git pull github main
```

## Troubleshooting

### HTTP 500 Errors
- Check file permissions (755 for folders, 644 for files)
- Verify wp-config.php wasn't overwritten
- Check error logs in cPanel

### Permission Issues
```bash
find /path/to/site -type d -exec chmod 755 {} \;
find /path/to/site -type f -exec chmod 644 {} \;
```

### Git Issues
- Ensure cPanel Git deployment is enabled
- Check repository remotes: `git remote -v`
- Verify SSH keys or use HTTPS authentication
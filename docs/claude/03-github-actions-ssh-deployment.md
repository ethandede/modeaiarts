# GitHub Actions SSH Deployment to Bluehost

## SSH Deployment Advantages

- ✅ **Clean file deployment** - No Git repository on server
- ✅ **Selective file sync** - Only deploy what's needed
- ✅ **No server-side Git issues** - Avoid cPanel Git limitations
- ✅ **Better security** - SSH keys instead of repository access
- ✅ **Faster deployments** - Direct file transfer

## Setup Process

### 1. Generate SSH Key Pair

```bash
# Generate SSH key for deployment
ssh-keygen -t rsa -b 4096 -f ~/.ssh/bluehost_deploy -N ""

# Copy public key
cat ~/.ssh/bluehost_deploy.pub
```

### 2. Add Public Key to Bluehost

**Via cPanel:**
1. **SSH Access** → **Manage SSH Keys**
2. **Import Key** → Paste public key content
3. **Authorize** the key

**Or via command line in cPanel Terminal:**
```bash
mkdir -p ~/.ssh
echo "YOUR_PUBLIC_KEY_HERE" >> ~/.ssh/authorized_keys
chmod 700 ~/.ssh
chmod 600 ~/.ssh/authorized_keys
```

### 3. Add SSH Private Key to GitHub Secrets

**In GitHub Repository:**
1. **Settings** → **Secrets and variables** → **Actions**
2. **New repository secret:**
   - **Name:** `SSH_PRIVATE_KEY`
   - **Value:** Contents of `~/.ssh/bluehost_deploy` (private key)

### 4. Add Server Details to GitHub Secrets

Add these additional secrets:
- **`SSH_HOST`:** `50.87.169.177`
- **`SSH_USERNAME`:** `ezfjslmy`
- **`DEPLOY_PATH`:** `/home4/ezfjslmy/public_html/website_ee9ed2f3`

### 5. Create GitHub Actions Workflow

**File:** `.github/workflows/deploy-to-bluehost.yml`

```yaml
name: Deploy to Bluehost via SSH

on:
  push:
    branches: [ main ]
  workflow_dispatch:

jobs:
  deploy:
    name: Deploy to Bluehost
    runs-on: ubuntu-latest
    
    steps:
    - name: Checkout repository
      uses: actions/checkout@v4

    - name: Setup SSH
      uses: webfactory/ssh-agent@v0.7.0
      with:
        ssh-private-key: ${{ secrets.SSH_PRIVATE_KEY }}

    - name: Add server to known_hosts
      run: |
        ssh-keyscan -H ${{ secrets.SSH_HOST }} >> ~/.ssh/known_hosts

    - name: Deploy theme files via rsync
      run: |
        rsync -avz --delete \
          --include='wp-content/***' \
          --include='docs/***' \
          --include='*.md' \
          --exclude='*' \
          ./ ${{ secrets.SSH_USERNAME }}@${{ secrets.SSH_HOST }}:${{ secrets.DEPLOY_PATH }}/

    - name: Set proper permissions
      run: |
        ssh ${{ secrets.SSH_USERNAME }}@${{ secrets.SSH_HOST }} "
          find ${{ secrets.DEPLOY_PATH }}/wp-content/themes -type d -exec chmod 755 {} \;
          find ${{ secrets.DEPLOY_PATH }}/wp-content/themes -type f -exec chmod 644 {} \;
        "

    - name: Deployment notification
      run: echo "🚀 Deployment to Bluehost complete!"
```

## Alternative: Simple File Copy Approach

If rsync isn't available, use SCP:

```yaml
    - name: Deploy files via SCP
      run: |
        # Create remote directory structure
        ssh ${{ secrets.SSH_USERNAME }}@${{ secrets.SSH_HOST }} "
          mkdir -p ${{ secrets.DEPLOY_PATH }}/wp-content/themes
        "
        
        # Copy theme files
        scp -r wp-content/themes/ai-portraits/ \
          ${{ secrets.SSH_USERNAME }}@${{ secrets.SSH_HOST }}:${{ secrets.DEPLOY_PATH }}/wp-content/themes/
        
        # Copy documentation
        scp -r docs/ \
          ${{ secrets.SSH_USERNAME }}@${{ secrets.SSH_HOST }}:${{ secrets.DEPLOY_PATH }}/
```

## Benefits Over cPanel Git Deployment

### GitHub Actions SSH:
- ✅ **Reliable:** No cPanel Git sync issues
- ✅ **Flexible:** Deploy only specific files/folders  
- ✅ **Fast:** Direct SSH file transfer
- ✅ **Clean:** No Git repository on server
- ✅ **Secure:** SSH key authentication

### cPanel Git Deployment:
- ❌ **Unreliable:** Often breaks or has sync issues
- ❌ **All or nothing:** Deploys entire repository
- ❌ **Complex:** Requires Git setup on server
- ❌ **Slower:** Git operations on shared hosting

## Testing the Deployment

```bash
# Test SSH connection locally
ssh -i ~/.ssh/bluehost_deploy ezfjslmy@ezf.jsl.mybluehost.me

# Test file permissions
ls -la /home4/ezfjslmy/public_html/website_ee9ed2f3/wp-content/themes/
```

## Troubleshooting

### SSH Connection Issues
```bash
# Debug SSH connection
ssh -v ezfjslmy@ezf.jsl.mybluehost.me

# Check authorized_keys
cat ~/.ssh/authorized_keys
```

### Permission Issues
```bash
# Fix permissions if needed
find /home4/ezfjslmy/public_html/website_ee9ed2f3/wp-content/themes -type d -exec chmod 755 {} \;
find /home4/ezfjslmy/public_html/website_ee9ed2f3/wp-content/themes -type f -exec chmod 644 {} \;
```

This approach gives you a clean, reliable deployment pipeline without the complexity of server-side Git repositories.
# CLAUDE.md - AI Portraits WordPress Project

This file provides both **reusable development patterns** and **site-specific project details** for working with this WordPress project.

## 📋 Documentation Structure

### 🔧 Reusable Infrastructure Patterns
*Copy these to new WordPress projects*

1. **[Local by Flywheel Setup](docs/claude/01-local-flywheel-setup.md)**
   - Auto-detection database script for any Local site
   - WP-CLI integration with Local's PHP binary
   - Standard directory structure and commands

2. **[ACF Pro JSON Sync](docs/claude/02-acf-json-sync.md)**
   - Version-controlled custom fields setup
   - Field group registration patterns
   - Helper functions for field access

3. **[GitHub → Bluehost Deployment](docs/claude/03-github-bluehost-deployment.md)**
   - Safe deployment strategies using .cpanel.yml
   - GitHub Actions integration
   - Common hosting patterns and troubleshooting

4. **[WordPress Development Patterns](docs/claude/04-wordpress-patterns.md)**
   - Custom post type templates
   - Theme setup boilerplate
   - SEO and navigation patterns

### 🎨 AI Portraits Project Details
*Specific to this project*

5. **[AI Portraits Project Specifics](docs/claude/ai-portraits-project.md)**
   - Theme structure and custom post types
   - ACF field groups and configuration
   - Content strategy and SEO implementation
   - Deployment paths and site-specific settings

## 🚀 Quick Start (This Project)

```bash
# Test database connection
./local-db.sh test

# List AI portraits
./local-db.sh wp post list --post_type=ai_portrait

# Access site
# http://modeaiarts.local
```

## 🚀 Quick Start (New Project)

```bash
# Copy infrastructure files
cp local-db.sh /path/to/new-project/
cp .cpanel.yml /path/to/new-project/
cp -r docs/claude/ /path/to/new-project/docs/

# Edit site-specific values
# - Update .cpanel.yml paths
# - Create new project-specific.md
# - Configure ACF JSON directory
```

## 📁 Project Structure

```
modeaiarts/
├── app/public/                         # Local WordPress root
│   ├── wp-content/themes/
│   │   └── ai-portraits/               # Custom theme
│   │       ├── acf-json/               # Version controlled fields
│   │       ├── inc/                    # PHP includes
│   │       │   ├── acf-config.php      # ACF configuration
│   │       │   └── seo-analytics.php   # SEO functions
│   │       ├── js/navigation.js        # Portrait navigation
│   │       ├── page-templates/         # About, Privacy, Terms
│   │       ├── functions.php           # Main theme functions
│   │       └── single-ai_portrait.php  # Portrait display template
│   └── wp-config.php                   # Configured for Local socket
├── docs/claude/                        # Documentation modules
│   ├── 01-local-flywheel-setup.md      # 🔧 Reusable
│   ├── 02-acf-json-sync.md             # 🔧 Reusable
│   ├── 03-github-bluehost-deployment.md # 🔧 Reusable
│   ├── 04-wordpress-patterns.md        # 🔧 Reusable
│   └── ai-portraits-project.md         # 🎨 Site-specific
├── .cpanel.yml                         # Deployment configuration
└── local-db.sh                         # Database helper script
```

## 🎯 Current Project Status

### ✅ Infrastructure Complete
- Local by Flywheel database access via `local-db.sh`
- ACF Pro with JSON sync in `acf-json/`
- GitHub deployment to Bluehost via `.cpanel.yml`
- Custom AI Portraits post type with rich field groups

### ✅ Site Features
- Responsive portrait gallery with masonry layout
- Keyboard and touch navigation between portraits
- SEO optimized with structured data
- Google Ads compliant content pages
- Related portraits and navigation

### 🔑 Key Commands

```bash
# Database operations
./local-db.sh wp user list
./local-db.sh wp post list --post_type=ai_portrait
./local-db.sh mysql
./local-db.sh export backup.sql

# Content management
./local-db.sh wp post create --post_type=ai_portrait --post_title="Portrait Name" --post_status=publish

# ACF field updates
./local-db.sh wp acf update_field field_ai_model "midjourney" <post_id>
```

## 📝 Development Workflow

### For This Project
1. Read **ai-portraits-project.md** for site-specific details
2. Use `local-db.sh` for database operations
3. Modify ACF fields in admin (auto-syncs to JSON)
4. Test at `http://modeaiarts.local`
5. Commit changes including `acf-json/`
6. Push to GitHub for automatic deployment

### For New Projects
1. Copy infrastructure files and docs
2. Replace site-specific values in templates
3. Create new project-specific documentation
4. Follow reusable patterns in docs/claude/01-04

## 🎨 AI Portraits Theme Details

- **Custom Post Type:** `ai_portrait`
- **Database Socket:** `/Users/edede/Library/Application Support/Local/run/18tcPIiBl/mysql/mysqld.sock`
- **Deployment Path:** `/home/ezfjslmy/public_html/website_678f6ace`
- **Local URL:** `http://modeaiarts.local`

---

*This documentation serves both as a working reference for the AI Portraits project and a template for future WordPress projects.*
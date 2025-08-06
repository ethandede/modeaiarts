# Local by Flywheel Setup Pattern

## Auto-Detection Script

Create `local-db.sh` in project root to automatically find and connect to Local's database:

```bash
#!/bin/bash
# This script auto-detects Local by Flywheel database connections

SITE_PATH="$(pwd)/app/public"
LOCAL_PHP="/Applications/Local.app/Contents/Resources/extraResources/lightning-services/php-*/bin/darwin-*/bin/php"
WP_CLI="/usr/local/bin/wp"

# Auto-find MySQL socket
find_mysql_socket() {
    for socket in ~/Library/Application\ Support/Local/run/*/mysql/mysqld.sock; do
        if [ -S "$socket" ]; then
            if mysql --socket="$socket" -u root -proot -e "USE local;" 2>/dev/null; then
                echo "$socket"
                return 0
            fi
        fi
    done
    return 1
}
```

## WordPress Configuration

Update `app/public/wp-config.php` with the socket path:

```php
define( 'DB_HOST', 'localhost:/path/to/socket' );
```

## Standard Local Credentials

- **Database:** `local`
- **Username:** `root`
- **Password:** `root`
- **Host:** `localhost` (with socket path)

## Directory Structure

```
project-name/
├── app/
│   └── public/          # WordPress root
│       ├── wp-content/
│       └── wp-config.php
├── conf/                # Local config files
├── logs/                # Local logs
└── local-db.sh          # Database helper
```

## Key Commands

```bash
# Make script executable
chmod +x local-db.sh

# Test connection
./local-db.sh test

# WP-CLI operations
./local-db.sh wp [command]

# Direct MySQL access
./local-db.sh mysql

# Export/Import
./local-db.sh export backup.sql
./local-db.sh import backup.sql
```
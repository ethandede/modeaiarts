# Database Access

## Database Configuration

- **Database Name:** `local`
- **Username:** `root`
- **Password:** `root`
- **Socket Path:** `/Users/edede/Library/Application Support/Local/run/18tcPIiBl/mysql/mysqld.sock`

## Using the Database Helper Script

The `local-db.sh` script provides easy database access:

```bash
# Test database connection
./local-db.sh test

# Run WP-CLI commands
./local-db.sh wp user list
./local-db.sh wp post list --post_type=ai_portrait
./local-db.sh wp option get siteurl
./local-db.sh wp db check
./local-db.sh wp db export
./local-db.sh wp db import backup.sql

# Direct MySQL access
./local-db.sh mysql

# Run SQL queries
./local-db.sh query "SELECT * FROM wp_posts WHERE post_type='ai_portrait';"
./local-db.sh query "SELECT COUNT(*) FROM wp_posts WHERE post_status='publish';"

# Export database
./local-db.sh export backup.sql

# Import database
./local-db.sh import backup.sql
```

## Common Database Operations

### Creating AI Portrait Posts via WP-CLI
```bash
./local-db.sh wp post create \
  --post_type=ai_portrait \
  --post_title="Portrait Name" \
  --post_status=publish
```

### Updating ACF Fields via WP-CLI
```bash
./local-db.sh wp acf update_field field_ai_model "midjourney" <post_id>
./local-db.sh wp acf update_field field_mood "contemplative" <post_id>
```

### Bulk Operations
```bash
# List all AI portraits
./local-db.sh wp post list --post_type=ai_portrait --format=table

# Delete all drafts
./local-db.sh wp post delete $(./local-db.sh wp post list --post_status=draft --format=ids)
```

## Important Notes

- The socket path is specific to this Local site instance
- wp-config.php has been configured with the socket path for WP-CLI compatibility
- Always use `local-db.sh` wrapper for consistent database access
- Database exports are stored in the project root by default
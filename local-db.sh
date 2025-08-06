#!/bin/bash
# Database helper script for Local by Flywheel site
# Automatically finds the correct MySQL socket and provides database utilities

# Configuration
SITE_PATH="/Users/edede/Local Sites/modeaiarts/app/public"
LOCAL_PHP="/Applications/Local.app/Contents/Resources/extraResources/lightning-services/php-8.2.27+1/bin/darwin-arm64/bin/php"
WP_CLI="/usr/local/bin/wp"

# Find the active MySQL socket for Local
find_mysql_socket() {
    # Try to find sockets and test them
    for socket in /Users/edede/Library/Application\ Support/Local/run/*/mysql/mysqld.sock; do
        if [ -S "$socket" ]; then
            # Test if this socket works with our database
            if mysql --socket="$socket" -u root -proot -e "USE local;" 2>/dev/null; then
                echo "$socket"
                return 0
            fi
        fi
    done
    
    # Fallback to checking if MySQL is accessible via TCP
    if mysql -h 127.0.0.1 -P 10003 -u root -proot -e "USE local;" 2>/dev/null; then
        echo "tcp:10003"
        return 0
    fi
    
    # Try other common Local ports
    for port in 10004 10005 10006 10007 10008; do
        if mysql -h 127.0.0.1 -P $port -u root -proot -e "USE local;" 2>/dev/null; then
            echo "tcp:$port"
            return 0
        fi
    done
    
    return 1
}

# Main command handler
case "$1" in
    "wp")
        # Run WP-CLI command with Local's PHP
        shift
        # First find the socket
        SOCKET=$(find_mysql_socket)
        if [ $? -eq 0 ]; then
            if [[ $SOCKET == tcp:* ]]; then
                PORT=${SOCKET#tcp:}
                # For TCP connection, we need to update wp-config temporarily or use different approach
                cd "$SITE_PATH" && DB_HOST="127.0.0.1:$PORT" "$LOCAL_PHP" "$WP_CLI" "$@"
            else
                # For socket connection, update DB_HOST
                cd "$SITE_PATH" && DB_HOST="localhost:$SOCKET" "$LOCAL_PHP" "$WP_CLI" "$@"
            fi
        else
            echo "Error: Could not find active MySQL connection"
            exit 1
        fi
        ;;
        
    "mysql")
        # Connect to MySQL CLI
        SOCKET=$(find_mysql_socket)
        if [ $? -eq 0 ]; then
            if [[ $SOCKET == tcp:* ]]; then
                PORT=${SOCKET#tcp:}
                mysql -h 127.0.0.1 -P $PORT -u root -proot local
            else
                mysql --socket="$SOCKET" -u root -proot local
            fi
        else
            echo "Error: Could not find active MySQL connection for Local site"
            echo "Please ensure Local is running and the site is started"
            exit 1
        fi
        ;;
        
    "query")
        # Run a SQL query
        shift
        SOCKET=$(find_mysql_socket)
        if [ $? -eq 0 ]; then
            if [[ $SOCKET == tcp:* ]]; then
                PORT=${SOCKET#tcp:}
                mysql -h 127.0.0.1 -P $PORT -u root -proot local -e "$@"
            else
                mysql --socket="$SOCKET" -u root -proot local -e "$@"
            fi
        else
            echo "Error: Could not find active MySQL connection"
            exit 1
        fi
        ;;
        
    "import")
        # Import SQL file
        if [ -z "$2" ]; then
            echo "Usage: $0 import <sql_file>"
            exit 1
        fi
        SOCKET=$(find_mysql_socket)
        if [ $? -eq 0 ]; then
            echo "Importing $2..."
            if [[ $SOCKET == tcp:* ]]; then
                PORT=${SOCKET#tcp:}
                mysql -h 127.0.0.1 -P $PORT -u root -proot local < "$2"
            else
                mysql --socket="$SOCKET" -u root -proot local < "$2"
            fi
            echo "Import complete"
        else
            echo "Error: Could not find active MySQL connection"
            exit 1
        fi
        ;;
        
    "export")
        # Export database
        OUTPUT="${2:-database-export-$(date +%Y%m%d-%H%M%S).sql}"
        SOCKET=$(find_mysql_socket)
        if [ $? -eq 0 ]; then
            echo "Exporting to $OUTPUT..."
            if [[ $SOCKET == tcp:* ]]; then
                PORT=${SOCKET#tcp:}
                mysqldump -h 127.0.0.1 -P $PORT -u root -proot local > "$OUTPUT"
            else
                mysqldump --socket="$SOCKET" -u root -proot local > "$OUTPUT"
            fi
            echo "Export complete: $OUTPUT"
        else
            echo "Error: Could not find active MySQL connection"
            exit 1
        fi
        ;;
        
    "test")
        # Test database connection
        echo "Testing database connection..."
        SOCKET=$(find_mysql_socket)
        if [ $? -eq 0 ]; then
            echo "✓ Connection successful!"
            if [[ $SOCKET == tcp:* ]]; then
                echo "  Using TCP connection on port ${SOCKET#tcp:}"
            else
                echo "  Using socket: $SOCKET"
            fi
            echo ""
            echo "Database tables:"
            if [[ $SOCKET == tcp:* ]]; then
                PORT=${SOCKET#tcp:}
                mysql -h 127.0.0.1 -P $PORT -u root -proot local -e "SHOW TABLES;"
            else
                mysql --socket="$SOCKET" -u root -proot local -e "SHOW TABLES;"
            fi
        else
            echo "✗ Connection failed"
            echo "Please ensure Local is running and the site is started"
            exit 1
        fi
        ;;
        
    *)
        echo "Local by Flywheel Database Helper"
        echo ""
        echo "Usage: $0 <command> [options]"
        echo ""
        echo "Commands:"
        echo "  wp [args]         Run WP-CLI command"
        echo "  mysql             Open MySQL CLI"
        echo "  query <sql>       Run SQL query"
        echo "  import <file>     Import SQL file"
        echo "  export [file]     Export database"
        echo "  test              Test database connection"
        echo ""
        echo "Examples:"
        echo "  $0 wp db check"
        echo "  $0 wp user list"
        echo "  $0 mysql"
        echo "  $0 query \"SELECT * FROM wp_users;\""
        echo "  $0 import backup.sql"
        echo "  $0 export my-backup.sql"
        ;;
esac
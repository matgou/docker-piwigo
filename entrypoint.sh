#!/bin/sh

# Default environment variables
MYSQL_DATABASE=${MYSQL_DATABASE:-piwigo}
MYSQL_USER=${MYSQL_USER:-root}
MYSQL_PASSWORD=${MYSQL_PASSWORD:-root}
MYSQL_HOST=${MYSQL_HOST:-database}
MYSQL_PORT=${MYSQL_PORT:-3306}

# Ensure local config directory exists
mkdir -p /var/www/html/piwigo/local/config

# Prepare ephemeral cache directories in /tmp (RAM)
mkdir -p /tmp/piwigo/templates_c
mkdir -p /tmp/piwigo/combined
chown -R nginx:nginx /tmp/piwigo

# Generate database configuration dynamically
# We include the standard Piwigo defines and cache overrides
cat <<EOF > /var/www/html/piwigo/local/config/database.inc.php
<?php
\$conf['dblayer'] = 'mysqli';
\$conf['db_base'] = '$MYSQL_DATABASE';
\$conf['db_user'] = '$MYSQL_USER';
\$conf['db_password'] = '$MYSQL_PASSWORD';
\$conf['db_host'] = '$MYSQL_HOST';
\$conf['db_port'] = '$MYSQL_PORT';

\$prefixeTable = 'piwigo_';

define('PHPWG_INSTALLED', true);
define('PWG_CHARSET', 'utf-8');
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');

\$conf['sync_chars_regex'] = '/^[a-zA-Z0-9-_. àáâãäåçèéêëìíîïðòóôõöùúûüýÿ&]+$/';
\$conf['show_template_in_side_menu'] = true;
\$conf['ws_enable_log'] = false;

// Cloud Run Performance Optimization: Use RAM for small cache files
\$conf['template_cache_dir'] = '/tmp/piwigo/templates_c';
\$conf['combined_dir'] = '/tmp/piwigo/combined';
?>
EOF

# Ensure proper permissions for the web server
chown -R nginx:nginx /var/www/html/piwigo/local/config

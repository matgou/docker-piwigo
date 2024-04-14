<?php
$conf['dblayer'] = 'mysqli';
$conf['db_base'] = getenv('MYSQL_DATABASE');
$conf['db_user'] = getenv('MYSQL_USER');
$conf['db_password'] = getenv('MYSQL_PASSWORD');
$conf['db_host'] = getenv('MYSQL_HOST');
$conf['db_port'] = getenv('MYSQL_PORT');

$prefixeTable = 'piwigo_';

define('PHPWG_INSTALLED', true);
define('PWG_CHARSET', 'utf-8');
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');

$conf['sync_chars_regex'] = '/^[a-zA-Z0-9-_. àáâãäåçèéêëìíîïðòóôõöùúûüýÿ&]+$/';
$conf['show_template_in_side_menu'] = true;
$conf['ws_enable_log'] = false

?>

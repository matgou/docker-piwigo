<?php

$conf['dblayer'] = 'mysqli';
$conf['db_base'] = '@@MYSQL_DATABASE@@';
$conf['db_user'] = '@@MYSQL_USER@@';
$conf['db_password'] = '@@MYSQL_PASSWORD@@';
$conf['db_host'] = '@@MYSQL_HOST@@';
$conf['db_port'] = '3306';

$prefixeTable = 'piwigo_';

define('PHPWG_INSTALLED', true);
define('PWG_CHARSET', 'utf-8');
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');

$conf['sync_chars_regex'] = '/^[a-zA-Z0-9-_. àáâãäåçèéêëìíîïðòóôõöùúûüýÿ&]+$/';

?>

<?php

$conf['dblayer'] = 'mysqli';
$conf['db_base'] = 'piwigo';
$conf['db_user'] = 'piwigo';
$conf['db_password'] = 'piwigo';
$conf['db_host'] = '192.168.100.2';
$conf['db_port'] = '3306';

$prefixeTable = 'piwigo_';

define('PHPWG_INSTALLED', true);
define('PWG_CHARSET', 'utf-8');
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');

$conf['sync_chars_regex'] = '/^[a-zA-Z0-9-_. àáâãäåçèéêëìíîïðòóôõöùúûüýÿ&]+$/';

?>

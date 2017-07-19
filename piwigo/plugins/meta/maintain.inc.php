<?php

if (!defined('PHPWG_ROOT_PATH'))
    die('Hacking attempt!');

function plugin_activate() {
    global $prefixeTable, $template;
    define('meta_DIR', basename(dirname(__FILE__)));
    define('meta_PATH', PHPWG_PLUGINS_PATH . meta_DIR . '/');
    define('meta_TABLE', $prefixeTable . 'meta');
    define('meta_img_TABLE', $prefixeTable . 'meta_img');
    define('meta_cat_TABLE', $prefixeTable . 'meta_cat');
    define('METAPERSO_TABLE', $prefixeTable . 'metaperso');

    $query = "CREATE TABLE IF NOT EXISTS " . METAPERSO_TABLE . " (
id SMALLINT( 5 ) UNSIGNED NOT NULL auto_increment,
metaname VARCHAR( 255 ) NOT NULL ,
metaval lONGTEXT NOT NULL ,
metatype VARCHAR( 255 ) NOT NULL ,
PRIMARY KEY (id))DEFAULT CHARSET=utf8;";
    $result = pwg_query($query);

    if (!isset($conf['contactmeta'])) {
        conf_update_param('contactmeta', ',');
    }

    if (!defined('META_AP_TABLE'))
        define('META_AP_TABLE', $prefixeTable . 'meta_ap');
    $query = "CREATE TABLE IF NOT EXISTS " . META_AP_TABLE . " (
id SMALLINT( 5 ) UNSIGNED NOT NULL ,
metaKeyap VARCHAR( 255 ) NOT NULL ,
metadesap VARCHAR( 255 ) NOT NULL ,
PRIMARY KEY (id))DEFAULT CHARSET=utf8;";
    $result = pwg_query($query);

//Gestion MAJ2
    $majm2 = 'meta 2.1.0';
    $query = '
select param,value
	FROM ' . CONFIG_TABLE . '
  WHERE param = \'' . $majm2 . '\'
	;';
    $result = pwg_query($query);

    $row = pwg_db_fetch_assoc($result);
    $majparam2 = $row['param'];
    $majvalue2 = $row['value'];

    if (!$majvalue2 == 1) {

//Gestion MAJ1
        $majm1 = 'meta 2.0.5';
        $query = '
select param,value
	FROM ' . CONFIG_TABLE . '
  WHERE param = \'' . $majm1 . '\'
	;';
        $result = pwg_query($query);

        $row = pwg_db_fetch_assoc($result);
        $majparam1 = $row['param'];
        $majvalue1 = $row['value'];

        if (!$majvalue1 == 1) {
            if (!defined('meta_img_TABLE'))
                define('meta_img_TABLE', $prefixeTable . 'meta_img');
            $query = "CREATE TABLE IF NOT EXISTS " . meta_img_TABLE . " (
id SMALLINT( 5 ) UNSIGNED NOT NULL ,
metaKeyimg VARCHAR( 255 ) NOT NULL ,
PRIMARY KEY (id))DEFAULT CHARSET=utf8;";
            $result = pwg_query($query);

            if (!defined('meta_cat_TABLE'))
                define('meta_cat_TABLE', $prefixeTable . 'meta_cat');
            $query = "CREATE TABLE IF NOT EXISTS " . meta_cat_TABLE . " (
id SMALLINT( 5 ) UNSIGNED NOT NULL ,
metaKeycat VARCHAR( 255 ) NOT NULL ,
PRIMARY KEY (id))DEFAULT CHARSET=utf8;";
            $result = pwg_query($query);

            $query = '
select id
  FROM ' . CATEGORIES_TABLE . '
  ORDER BY id DESC;';
            $result = pwg_query($query);
            $row = pwg_db_fetch_assoc($result);

            $comp = $row['id'] + 1;
            $i = 1;

            while ($i < $comp) {
                $query = '
select id,metaKeywords
  FROM ' . CATEGORIES_TABLE . '
  WHERE id = \'' . $i . '\'';
                $result = pwg_query($query);
                $row = pwg_db_fetch_assoc($result);

                if (!$row['id'] == 0 and ! $row['metaKeywords'] == 0) {
                    $query = '
INSERT INTO ' . $prefixeTable . 'meta_cat(id,metaKeycat)VALUES (' . $row['id'] . ',"' . $row['metaKeywords'] . '");';
                    $result = pwg_query($query);
                }
                ++$i;
            }

            $query = ' ALTER TABLE ' . CATEGORIES_TABLE . ' DROP COLUMN `metaKeywords`';
            pwg_query($query);

            $query = 'INSERT INTO ' . CONFIG_TABLE . ' (param,value,comment) VALUES ("' . $majm1 . '",1,"MAJ meta");';
            pwg_query($query);
            $majvalue1 == 1;
            $maj = 0;
        }

        $q = '
ALTER TABLE ' . meta_cat_TABLE . ' ADD COLUMN metadescat VARCHAR( 255 ) NOT NULL ';
        pwg_query($q);

        $q = '
ALTER TABLE ' . meta_img_TABLE . ' ADD COLUMN metadesimg VARCHAR( 255 ) NOT NULL ';
        pwg_query($q);

        $query = 'INSERT INTO ' . CONFIG_TABLE . ' (param,value,comment) VALUES ("' . $majm2 . '",1,"MAJ meta");';
        pwg_query($query);

        $template->delete_compiled_templates(array('plugin_admin_content' => dirname(__FILE__) . '/admin.tpl'));

        $majvalue2 == 1;
        $maj = 0;
    }
}

function plugin_install() {
    global $conf, $prefixeTable;
    $q = 'CREATE TABLE ' . $prefixeTable . 'meta(
id SMALLINT( 5 ) UNSIGNED NOT NULL ,
metaname VARCHAR( 255 ) NOT NULL ,
metaval lONGTEXT NOT NULL ,
metatype VARCHAR( 255 ) NOT NULL ,
PRIMARY KEY (id))DEFAULT CHARSET=utf8;';
    pwg_query($q);

    $q = '
INSERT INTO ' . $prefixeTable . 'meta(id,metaname,metaval,metatype)VALUES (1,"author","","name");';
    pwg_query($q);

    $q = '
INSERT INTO ' . $prefixeTable . 'meta(id,metaname,metaval,metatype)VALUES (2,"keywords","","name");';
    pwg_query($q);

    $q = '
INSERT INTO ' . $prefixeTable . 'meta(id,metaname,metaval,metatype)VALUES (3,"Description","","name");';
    pwg_query($q);

    $q = '
INSERT INTO ' . $prefixeTable . 'meta(id,metaname,metaval,metatype)VALUES (4,"robots","follow","name");';
    pwg_query($q);

    if (!defined('meta_img_TABLE'))
        define('meta_img_TABLE', $prefixeTable . 'meta_img');
    $query = "CREATE TABLE IF NOT EXISTS " . meta_img_TABLE . " (
id SMALLINT( 5 ) UNSIGNED NOT NULL ,
metaKeyimg VARCHAR( 255 ) NOT NULL ,
metadesimg VARCHAR( 255 ) NOT NULL ,
PRIMARY KEY (id))DEFAULT CHARSET=utf8;";
    $result = pwg_query($query);

    if (!defined('meta_cat_TABLE'))
        define('meta_cat_TABLE', $prefixeTable . 'meta_cat');
    $query = "CREATE TABLE IF NOT EXISTS " . meta_cat_TABLE . " (
id SMALLINT( 5 ) UNSIGNED NOT NULL ,
metaKeycat VARCHAR( 255 ) NOT NULL ,
metadescat VARCHAR( 255 ) NOT NULL ,
PRIMARY KEY (id))DEFAULT CHARSET=utf8;";
    $result = pwg_query($query);

    if (!defined('METAPERSO_TABLE'))
        define('METAPERSO_TABLE', $prefixeTable . 'metaperso');
    $query = "CREATE TABLE IF NOT EXISTS " . METAPERSO_TABLE . " (
id SMALLINT( 5 ) UNSIGNED NOT NULL auto_increment,
metaname VARCHAR( 255 ) NOT NULL ,
metaval lONGTEXT NOT NULL ,
metatype VARCHAR( 255 ) NOT NULL ,
PRIMARY KEY (id))DEFAULT CHARSET=utf8;";
    $result = pwg_query($query);

    $majm1 = 'meta 2.0.5';
    $query = 'INSERT INTO ' . CONFIG_TABLE . ' (param,value,comment) VALUES ("' . $majm1 . '",1,"MAJ meta");';
    pwg_query($query);

    $majm2 = 'meta 2.1.0';
    $query = 'INSERT INTO ' . CONFIG_TABLE . ' (param,value,comment) VALUES ("' . $majm2 . '",1,"MAJ meta");';
    pwg_query($query);

    if (empty($conf['contactmeta'])) {
        conf_update_param('contactmeta', '');
    }

    if (!defined('META_AP_TABLE'))
        define('META_AP_TABLE', $prefixeTable . 'meta_ap');
    $query = "CREATE TABLE IF NOT EXISTS " . META_AP_TABLE . " (
id SMALLINT( 5 ) UNSIGNED NOT NULL ,
metaKeyap VARCHAR( 255 ) NOT NULL ,
metadesap VARCHAR( 255 ) NOT NULL ,
PRIMARY KEY (id))DEFAULT CHARSET=utf8;";
    $result = pwg_query($query);
}

function plugin_uninstall() {

    $majm1 = 'meta 2.0.5';
    $majm2 = 'meta 2.1.0';

    global $prefixeTable;

    $q = 'DROP TABLE ' . $prefixeTable . 'meta;';
    pwg_query($q);

    $q = 'DELETE FROM ' . CONFIG_TABLE . ' WHERE param="' . $majm1 . '" LIMIT 1;';
    pwg_query($q);

    $q = 'DELETE FROM ' . CONFIG_TABLE . ' WHERE param="' . $majm2 . '" LIMIT 1;';
    pwg_query($q);

    $q = 'DROP TABLE ' . $prefixeTable . 'meta_img;';
    pwg_query($q);

    $q = 'DROP TABLE ' . $prefixeTable . 'meta_cat;';
    pwg_query($q);

    conf_delete_param('contactmeta');
}

?>
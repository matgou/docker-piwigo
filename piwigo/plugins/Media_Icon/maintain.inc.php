<?php
if (!defined('PHPWG_ROOT_PATH')) die('Hacking attempt!');

function plugin_install() {
	include_once(dirname(__FILE__).'/install/functions.inc.php');
	include_once(dirname(__FILE__).'/install/config_default.inc.php');

	media_icon_install_general($config_default_general);
	media_icon_install_advanced($config_default_advanced);
}

function plugin_activate() {
	include_once(dirname(__FILE__).'/install/functions.inc.php');
	
	media_icon_update_db();
}

function plugin_uninstall() {
	include_once(dirname(__FILE__).'/install/functions.inc.php');

	media_icon_delete_conf("media_icon_general");
	media_icon_delete_conf("media_icon_advanced");
}

?>
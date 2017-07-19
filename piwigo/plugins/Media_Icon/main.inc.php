<?php
/*
Plugin Name: Media Icon
Version: 2.7.a
Description: add an icon to non-picture files
Plugin URI: http://piwigo.org/ext/extension_view.php?eid=654
Author: Julien1311
*/

//Check whether we are indeed included by Piwigo.
if (!defined('PHPWG_ROOT_PATH')) die('Hacking attempt!');

define('MEDIA_ICON_DIR' , basename(dirname(__FILE__)));
define('MEDIA_ICON_PATH' , PHPWG_PLUGINS_PATH.MEDIA_ICON_DIR.'/');
define('MEDIA_ICON_ABSOLUTE_PATH' , dirname(__FILE__).'/');
define('MEDIA_ICON_ADMIN',   get_root_url() . 'admin.php?page=plugin-'.MEDIA_ICON_DIR);

/* +-----------------------------------------------------------------------+
 * | Plugin admin                                                          |
 * +-----------------------------------------------------------------------+ */

// Add an entry to the plugins menu
add_event_handler('get_admin_plugin_menu_links', 'media_icon_admin_menu');

function media_icon_admin_menu($menu) {
	array_push(
		$menu, array(
			'NAME'  => 'Media Icon',
			'URL'   => MEDIA_ICON_ADMIN,
		)
	);      
	return $menu;
}

/* +-----------------------------------------------------------------------+
 * | Plugin code                                                           |
 * +-----------------------------------------------------------------------+ */
	
include_once(MEDIA_ICON_PATH.'include/thumbnails.inc.php');

/* +-----------------------------------------------------------------------+
 * | CSS Style                                                             |
 * +-----------------------------------------------------------------------+ */

add_event_handler('loc_end_page_header', 'media_icon_css');

function media_icon_css() {
	global $template, $conf;
	
	$conf_media_icon_general = unserialize($conf['media_icon_general']);

	//add a stylesheet
	$template->append('head_elements', '<link rel="stylesheet" type="text/css" href="'.MEDIA_ICON_PATH.'template/media_icon.css">');
	if (defined('IN_ADMIN') and IN_ADMIN)
		$template->append('head_elements', '<link rel="stylesheet" type="text/css" href="'.MEDIA_ICON_PATH.'admin/admin.css">');
}
?>
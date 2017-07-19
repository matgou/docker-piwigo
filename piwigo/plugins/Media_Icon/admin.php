<?php
//Chech whether we are indeed included by Piwigo.
if (!defined('MEDIA_ICON_PATH')) die('Hacking attempt!');

//Load globals
global $conf, $page;

//Library for tabs
include_once(PHPWG_ROOT_PATH .'admin/include/tabsheet.class.php');

//Load translation files
load_language('plugin.lang', MEDIA_ICON_PATH);

//Check access and exit when user status is not ok
check_status(ACCESS_ADMINISTRATOR);

//Tab management
if (empty($conf['Media_Icon_tabs'])) {
  $conf['Media_Icon_tabs'] = array('general', 'advanced', 'help');
}

$page['tab'] = isset($_GET['tab']) ? $_GET['tab'] : $conf['Media_Icon_tabs'][0];

if (!in_array($page['tab'], $conf['Media_Icon_tabs'])) die('Hacking attempt!');	

$tabsheet = new tabsheet();
foreach ($conf['Media_Icon_tabs'] as $tab) {
  $tabsheet->add($tab, l10n(ucfirst($tab)), MEDIA_ICON_ADMIN.'-'.$tab);
}
$tabsheet->select($page['tab']);
$tabsheet->assign();

include_once(MEDIA_ICON_PATH.'/admin/admin_'.$page['tab'].'.php');
?>
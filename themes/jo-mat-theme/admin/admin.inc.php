<?php
if (!defined('PHPWG_ROOT_PATH')) die('Hacking attempt!');

global $template;

$functions_file = dirname(dirname(__FILE__)).'/functions.inc.php';
if (file_exists($functions_file))
{
  include_once($functions_file);
}
if (!function_exists('modus_get_default_config') && file_exists(PHPWG_ROOT_PATH.'themes/modus/functions.inc.php'))
{
  include_once(PHPWG_ROOT_PATH.'themes/modus/functions.inc.php');
}
include_once(PHPWG_ROOT_PATH.'admin/include/tabsheet.class.php');

$default_conf = function_exists('jomat_get_default_config') ? jomat_get_default_config() : modus_get_default_config();

load_language('theme.lang', dirname(__FILE__).'/../');

$my_conf = @$conf['modus_theme'];
if (!isset($my_conf))
  $my_conf = $default_conf;
elseif (!is_array($my_conf))
{
  $my_conf = unserialize($my_conf);
	$my_conf = array_merge($default_conf, $my_conf);
}

$text_values = array('skin', 'album_thumb_size', 'index_photo_deriv','index_photo_deriv_hdpi');
$bool_values = array('display_page_banner', 'display_search', 'display_calendar', 'display_breadcrumb', 'display_slideshow');

// *************** POST management ********************
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	foreach ($text_values as $k )
	{
		if (isset($_POST[$k]))
			$my_conf[$k] = stripslashes($_POST[$k]);
	}
	foreach ($bool_values as $k )
		$my_conf[$k] = isset($_POST[$k]) ? true:false;
  
  if (!isset($_POST['use_album_square_thumbs']))
  {
    $my_conf['album_thumb_size'] = 0;
  }
  
	// int/double
	$my_conf['album_thumb_size'] = max(0, $my_conf['album_thumb_size']);
  $my_conf = array_intersect_key($my_conf, $default_conf);
  conf_update_param('modus_theme', addslashes(serialize($my_conf)) );

  $template->assign(
    array(
      'save_success' =>l10n('Information data registered in database'),
    )
  );
}

// *************** tabs ********************

$tabs = array(
  array(
    'code' => 'config',
    'label' => l10n('Configuration'),
    ),
  );

$tab_codes = array_map(
  function ($a) { return $a["code"]; },
  $tabs
  );

if (isset($_GET['tab']) and in_array($_GET['tab'], $tab_codes))
{
  $page['tab'] = $_GET['tab'];
}
else
{
  $page['tab'] = $tabs[0]['code'];
}

$theme_id = isset($_GET['theme']) ? $_GET['theme'] : 'jo-mat-theme';
$tabsheet = new tabsheet();
foreach ($tabs as $tab)
{
  $tabsheet->add(
    $tab['code'],
    $tab['label'],
    'admin.php?page=theme&amp;theme=' . $theme_id
    );
}
$tabsheet->select($page['tab']);
$tabsheet->assign();

// *************** template init ********************

foreach ($text_values as $k )
  $template->assign( strtoupper($k), isset($my_conf[$k]) ? $my_conf[$k] : '' );
foreach ($bool_values as $k )
  $template->assign( strtoupper($k), !empty($my_conf[$k]) );

// we don't use square thumbs if the thumb size is 0
$template->assign('use_album_square_thumbs', 0 != $my_conf['album_thumb_size']);

if (0 == $my_conf['album_thumb_size'])
{
  $template->assign('ALBUM_THUMB_SIZE', 250);
}

$available_derivatives = array();
foreach(array_keys(ImageStdParams::get_defined_type_map()) as $type)
	$available_derivatives[$type] = l10n($type);

$available_skins=array();
$skin_dir = dirname(dirname(__FILE__)).'/skins/';
$skin_suffix = '.inc.php';
if (!is_dir($skin_dir) || count(glob($skin_dir.'*'.$skin_suffix)) == 0)
{
	$skin_dir = PHPWG_ROOT_PATH.'themes/modus/skins/';
}
foreach( glob($skin_dir.'*'.$skin_suffix) as $file)
{
	$skin = substr($file, strlen($skin_dir), -strlen($skin_suffix));
	$available_skins[$skin] = ucwords( str_replace('_', ' ',$skin));
}

$template->assign( array(
	'available_derivatives' => $available_derivatives,
	'available_skins' => $available_skins,
	) );

$template->set_filename( 'modus_content', dirname(__FILE__).'/modus_admin.tpl' );
$template->assign_var_from_handle( 'ADMIN_CONTENT', 'modus_content');
?>
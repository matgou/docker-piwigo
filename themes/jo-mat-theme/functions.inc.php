<?php
if (!defined('PHPWG_ROOT_PATH')) die('Hacking attempt!');

// Include parent theme (Modus) functions if available
$modus_functions = PHPWG_ROOT_PATH . 'themes/modus/functions.inc.php';
if (file_exists($modus_functions))
{
  include_once($modus_functions);
}

function jomat_get_default_config()
{
  $def = function_exists('modus_get_default_config') ? modus_get_default_config() : array(
    'skin' => 'newspaper',
    'album_thumb_size' => 250,
    'index_photo_deriv' => '2small',
    'index_photo_deriv_hdpi' => 'xsmall',
    'display_page_banner' => true,
  );
  $def['display_search'] = true;
  $def['display_calendar'] = true;
  $def['display_breadcrumb'] = true;
  $def['display_slideshow'] = true;
  return $def;
}

// Hook onto page header to inject dynamic visibility styles based on theme configuration
add_event_handler('loc_begin_page_header', 'jomat_apply_element_visibility');
function jomat_apply_element_visibility()
{
  global $conf, $template;
  
  $default_conf = jomat_get_default_config();
  
  $my_conf = $default_conf;
  if (isset($conf['modus_theme']))
  {
    $saved = $conf['modus_theme'];
    if (!is_array($saved))
    {
      $saved = @unserialize($saved);
    }
    if (is_array($saved))
    {
      $my_conf = array_merge($default_conf, $saved);
    }
  }

  $css = array();
  if (empty($my_conf['display_search']))
  {
    $css[] = '#quicksearch, #qsearchInput, form[action*="search"], #cmdSearchInSet, .search-lot-btn, .gallery-icon-search-folder, a[href*="search.php"], a[href*="search"] { display: none !important; }';
  }
  if (empty($my_conf['display_calendar']))
  {
    $css[] = 'li:has(a[href*="created-monthly-list"]), li:has(a[href*="calendar"]), a[href*="created-monthly-list"], a[href*="calendar"] { display: none !important; }';
  }
  if (empty($my_conf['display_breadcrumb']))
  {
    $css[] = '#breadcrumb, .browsePath, #crumbs, .browsePathSeparator { display: none !important; }';
  }
  if (empty($my_conf['display_slideshow']))
  {
    $css[] = '#cmdSlideshow, li:has(a[href*="slideshow"]), a[href*="slideshow"] { display: none !important; }';
  }

  if (empty($my_conf['display_search']) && empty($my_conf['display_calendar']) && empty($my_conf['display_slideshow']))
  {
    $css[] = 'ul.categoryActions, #albumActionsSwitcher { display: none !important; }';
  }

  if (!empty($css))
  {
    $template->append('head_elements', '<style id="jomat-visibility-rules">' . implode(' ', $css) . '</style>');
  }
}

// Assign user session variables to Smarty template for top green header
add_event_handler('loc_begin_page_header', 'jomat_assign_user_vars');
function jomat_assign_user_vars()
{
  global $user, $template;
  
  $is_guest = function_exists('is_a_guest') ? is_a_guest() : (!isset($user['username']) || $user['username'] == 'guest');
  $is_logged_in = !$is_guest;
  $username = isset($user['username']) ? $user['username'] : '';
  $is_admin = isset($user['status']) && ($user['status'] == 'admin' || $user['status'] == 'webmaster');
  
  $root_url = function_exists('get_root_url') ? get_root_url() : PHPWG_ROOT_PATH;
  
  $template->assign(array(
    'JOMAT_IS_LOGGED_IN' => $is_logged_in,
    'JOMAT_USERNAME' => $username,
    'JOMAT_IS_ADMIN' => $is_admin,
    'JOMAT_U_LOGOUT' => $root_url . 'index.php?act=logout',
    'JOMAT_U_PROFILE' => $root_url . 'profile.php',
    'JOMAT_U_ADMIN' => $root_url . 'admin.php',
    'JOMAT_U_LOGIN' => $root_url . 'identification.php',
  ));
}
?>

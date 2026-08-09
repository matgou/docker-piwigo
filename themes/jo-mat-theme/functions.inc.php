<?php
if (!defined('PHPWG_ROOT_PATH')) die('Hacking attempt!');

// Include parent theme (Modus) functions if available
$modus_functions = PHPWG_ROOT_PATH . 'themes/modus/functions.inc.php';
if (file_exists($modus_functions))
{
  include_once($modus_functions);
}
?>

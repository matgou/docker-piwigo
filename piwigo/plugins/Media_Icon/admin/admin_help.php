<?php
//Add our template to the global template
$template->set_filenames(
	array(
		'plugin_admin_content_help' => dirname(__FILE__).'/admin_help.tpl'
	)
);
 
//Assign the template contents to ADMIN_CONTENT
$template->assign_var_from_handle('ADMIN_CONTENT', 'plugin_admin_content_help');
?>
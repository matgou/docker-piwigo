<?php
//Initialization
$conf_media_icon_general = unserialize($conf['media_icon_general']);

//Save config
if (isset($_POST['submit'])) { 
	//New parameters
	$conf_media_icon_general['style'] = $_POST['media_icon_style'];
	
	foreach ($conf_media_icon_general['active'] as $media_icon_active => $value) {
		if(isset($_POST['media_icon_checkbox']['media_icon_checkbox_'.$media_icon_active]) && ($_POST['media_icon_checkbox']['media_icon_checkbox_'.$media_icon_active] == 1))
			$conf_media_icon_general['active'][$media_icon_active] = 1;
		else
			$conf_media_icon_general['active'][$media_icon_active] = 0;
	}
	
	//Save
	conf_update_param('media_icon_general', serialize($conf_media_icon_general));
	array_push($page['infos'], l10n('Information data registered in database'));
}

//Parameters of the template
$template->assign('media_icon_style',$conf_media_icon_general['style']);
$template->assign('media_icon_styles', $conf_media_icon_general['styles']);
$template->assign('media_icon_active',$conf_media_icon_general['active']);
$template->assign('media_icon_support',$conf_media_icon_general['support']);

//Add our template to the global template
$template->set_filenames(
	array(
		'plugin_admin_content_general' => dirname(__FILE__).'/admin_general.tpl'
	)
);
 
//Assign the template contents to ADMIN_CONTENT
$template->assign_var_from_handle('ADMIN_CONTENT', 'plugin_admin_content_general');
?>
<?php
//Initialization
$conf_media_icon_advanced = unserialize($conf['media_icon_advanced']);
$conf_media_icon_general = unserialize($conf['media_icon_general']);

//Save config
if (isset($_POST['submit'])) {
	$conf_media_icon_advanced = $_POST['media_icon'];
	
	$media_icon_errors = array();
	
	// step 1 - sanitize HTML input
	switch ($conf_media_icon_advanced['position']) {
		case 'topleft':
			$conf_media_icon_advanced['xposition'] = 'left: 5px';
			$conf_media_icon_advanced['yposition'] = 'top: 5px';
			break;
		case 'topright':
			$conf_media_icon_advanced['xposition'] = 'right: 5px';
			$conf_media_icon_advanced['yposition'] = 'top: 5px';
			break;
		case 'bottomleft':
			$conf_media_icon_advanced['xposition'] = 'left: 5px';
			$conf_media_icon_advanced['yposition'] = 'bottom: 5px';
			break;
		case 'bottomright':
			$conf_media_icon_advanced['xposition'] = 'right: 5px';
			$conf_media_icon_advanced['yposition'] = 'bottom: 5px';
			break;
	}
	
	// step 2 - check validity
	$media_icon_test = intval($conf_media_icon_advanced['opacity']);
	if (is_nan($media_icon_test) or $media_icon_test <= 0 or $media_icon_test > 100) {
		$media_icon_errors['opacity'] = l10n('The opacity have to be a number between 0 and 100');
	}
	
	// step 3 - save data
	if (count($media_icon_errors) == 0) {
		conf_update_param('media_icon_advanced', serialize($conf_media_icon_advanced));
		array_push($page['infos'], l10n('Information data registered in database'));
	} else {
		$page['errors'] = array_merge($page['errors'], $media_icon_errors);
		$template->assign('media_icon_advanced', $conf_media_icon_advanced);
		$template->assign('media_icon_errors', $media_icon_errors);
	}
}

//Parameters of the template
$template->assign('media_icon_style', $conf_media_icon_general['style']);
$template->assign(
	'media_icon_advanced',
	array(
		'position' => $conf_media_icon_advanced['position'],
		'xposition' => $conf_media_icon_advanced['xposition'],
		'yposition' => $conf_media_icon_advanced['yposition'],
		'opacity' => $conf_media_icon_advanced['opacity'],
	)
);
$template->assign('media_icon_admin_path', PHPWG_ROOT_PATH.MEDIA_ICON_PATH);

//Add our template to the global template
$template->set_filenames(
	array(
		'plugin_master_content' => MEDIA_ICON_ABSOLUTE_PATH.'template/media_icon.tpl'
	)    
);
$template->set_filenames(
	array(
		'plugin_admin_content_advanced' => dirname(__FILE__).'/admin_advanced.tpl',
	)
);

//Assign the template contents to ADMIN_CONTENT
$template->assign_var_from_handle('ADMIN_CONTENT', 'plugin_master_content');
$template->assign_var_from_handle('ADMIN_CONTENT', 'plugin_admin_content_advanced');
?>
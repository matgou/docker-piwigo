<?php
add_event_handler('loc_end_index_thumbnails', 'media_icon_thumbnails');

function media_icon_thumbnails($tpl_thumbnails_var) {
	global $template, $conf;

	$conf_media_icon_general = unserialize($conf['media_icon_general']);
	$conf_media_icon_advanced = unserialize($conf['media_icon_advanced']);
	
	$template->set_prefilter('index_thumbnails', 'media_icon_prefilter_thumbnails');
	
	$template->set_filename('media_icon_template', MEDIA_ICON_ABSOLUTE_PATH.'template/media_icon.tpl');
	
	$template->assign('media_icon_style',$conf_media_icon_general['style']);

	$template->assign('media_icon_active',	$conf_media_icon_general['active']);
	$template->assign(
		'media_icon_advanced',
		array(
			'xposition' => $conf_media_icon_advanced['xposition'],
			'yposition' => $conf_media_icon_advanced['yposition'],
			'opacity' => $conf_media_icon_advanced['opacity'],
		)
	);
	
	$template->concat('PLUGIN_INDEX_CONTENT_END', $template->parse('media_icon_template', true));
	
	return $tpl_thumbnails_var;
}

function media_icon_prefilter_thumbnails($content, &$smarty) {
	global $template;
	
	$search = 'class="thumbnail"';
	
	$replacement = 'class="thumbnail" media_icon="{$thumbnail.file}"';
	$content= str_replace($search, $replacement, $content);

	return $content;
}
?>
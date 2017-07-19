<?php

if (!defined('PHPWG_ROOT_PATH'))
    die('Hacking attempt!');


//Add link menu
add_event_handler('get_admin_plugin_menu_links', 'meta_admin_menu');

function meta_admin_menu($menu) {
    load_language('plugin.lang', meta_PATH);
    array_push($menu, array(
        'NAME' => l10n('Manage tag Metadata'),
        'URL' => get_admin_plugin_menu_link(meta_PATH . 'admin/admin.php')));
    return $menu;
}

//add prefiltre photo
add_event_handler('loc_begin_admin', 'metaPadminf', 55);
add_event_handler('loc_begin_admin_page', 'metaPadminA', 55);

function metaPadminf() {
    global $template;
    $template->set_prefilter('picture_modify', 'metaPadminfT');
}

function metaPadminfT($content, &$smarty) {
    $search = '#</form>#';

    $replacement = '
	<div>
		<fieldset>
		  <br>
			<legend>{\'Metadata - Plugin meta\'|@translate}</legend>
				{\'meta_compimg\'|@translate}&nbsp;:&nbsp;<input type="text" name="insermetaKP" value="{$metaCONTENT}" size="110" maxlenght="110">
			<br>	
			<br>
				{\'meta_compimgdes\'|@translate}&nbsp;:&nbsp;<input type="text" name="insermetaDP" value="{$metaCONTENT2}" size="110" maxlenght="110">
				({\'meta_compcatdeshelp\'|@translate})
			<br>	
			<br>
				<div style="text-align:center;">
				<input class="submit" name="submetaphoto" type="submit" value="{\'meta_inscat\'|@translate}" {$TAG_INPUT_ENABLED} />
				</div>
		</fieldset>
	</div>  
</form>';

    return preg_replace($search, $replacement, $content);
}

function metaPadminA() {
    load_language('plugin.lang', meta_PATH);
    if (isset($_GET['image_id'])) {
        global $template, $prefixeTable;
        $query = '
select id,metaKeyimg,metadesimg
  FROM ' . meta_img_TABLE . '
  WHERE id = ' . $_GET['image_id'] . '
  ;';
        $result = pwg_query($query);
        $row = pwg_db_fetch_assoc($result);
        $chvalimg = $row['metaKeyimg'];
        $chvalimgdes = $row['metadesimg'];

        $template->assign(
                array(
                    'metaCONTENT' => $chvalimg,
                    'metaCONTENT2' => $chvalimgdes,
        ));
    }

    if (isset($_POST['submetaphoto'])) {
        $query = '
DELETE 
  FROM ' . meta_img_TABLE . '
  WHERE id = ' . $_GET['image_id'] . '
  ;';
        $result = pwg_query($query);
        $q = '
INSERT INTO ' . $prefixeTable . 'meta_img(id,metaKeyimg,metadesimg)VALUES (' . $_GET['image_id'] . ',"' . $_POST['insermetaKP'] . '","' . $_POST['insermetaDP'] . '");';
        pwg_query($q);

        $template->assign(
                array(
                    'metaCONTENT' => $_POST['insermetaKP'],
                    'metaCONTENT2' => $_POST['insermetaDP'],
        ));
    }
}

//add prefiltre album
add_event_handler('loc_end_cat_modify', 'metaAadminf');
add_event_handler('loc_end_cat_modify', 'metaAadminA');

function metaAadminf() {
    global $template;
    $template->set_prefilter('album_properties', 'metaAadminfT');
}

function metaAadminfT($content, &$smarty) {
    $search = '#</form>#';

    $replacement = '
  	<div>
		
			<fieldset>
				<legend>{\'Metadata - Plugin meta\'|@translate}</legend>
					{\'meta_compcat\'|@translate}&nbsp;:&nbsp;<input type="text" name="insermetaKA" value="{$metaCONTENT}" size="110" maxlenght="110">
				<br>	
				<br>	
					{\'meta_compcatdes\'|@translate}&nbsp;:&nbsp;<input type="text" name="insermetaDA" value="{$metaCONTENT2}" size="110" maxlenght="110">&nbsp;:&nbsp;({\'meta_compcatdeshelp\'|@translate})
				<br>	
				<br>
					<div style="text-align:center;">
					<input class="submit" name="submetaalbum" type="submit" value="{\'meta_inscat\'|@translate}" {$TAG_INPUT_ENABLED} />
					</div>
			</fieldset>
		
	</div>
</form>
	
  ';

    return preg_replace($search, $replacement, $content);
}

function metaAadminA() {
    load_language('plugin.lang', meta_PATH);
    if (isset($_GET['cat_id'])) {
        global $template, $prefixeTable;
        $query = '
select id,metaKeycat,metadescat
  FROM ' . meta_cat_TABLE . '
  WHERE id = ' . $_GET['cat_id'] . '
  ;';
        $result = pwg_query($query);
        $row = pwg_db_fetch_assoc($result);
        $chvalcat = $row['metaKeycat'];
        $chvalcatdes = $row['metadescat'];

        $template->assign(
                array(
                    'metaCONTENT' => $chvalcat,
                    'metaCONTENT2' => $chvalcatdes,
        ));
    }

    if (isset($_POST['submetaalbum'])) {
        $query = '
DELETE 
  FROM ' . meta_cat_TABLE . '
  WHERE id = ' . $_GET['cat_id'] . '
  ;';
        $result = pwg_query($query);
        $q = '
INSERT INTO ' . $prefixeTable . 'meta_cat(id,metaKeycat,metadescat)VALUES (' . $_GET['cat_id'] . ',"' . $_POST['insermetaKA'] . '","' . $_POST['insermetaDA'] . '");';
        pwg_query($q);

        $template->assign(
                array(
                    'metaCONTENT' => $_POST['insermetaKA'],
                    'metaCONTENT2' => $_POST['insermetaDA'],
        ));
    }
}

?>
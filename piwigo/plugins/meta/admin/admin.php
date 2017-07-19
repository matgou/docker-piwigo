<?php

if (!defined('PHPWG_ROOT_PATH'))
    die('Hacking attempt!');
global $template, $conf, $user;
include_once(PHPWG_ROOT_PATH . 'admin/include/tabsheet.class.php');
load_language('plugin.lang', meta_PATH);
$my_base_url = get_admin_plugin_menu_link(__FILE__);

// +-----------------------------------------------------------------------+
// | Check Access and exit when user status is not ok                      |
// +-----------------------------------------------------------------------+
check_status(ACCESS_ADMINISTRATOR);

//-------------------------------------------------------- sections definitions
// TAB gest
if (!isset($_GET['tab']))
    $page['tab'] = 'gestion';
else
    $page['tab'] = $_GET['tab'];
$tabsheet = new tabsheet();
$tabsheet->add('gestion', l10n('meta_onglet_gestion'), $my_base_url . '&amp;tab=gestion');
$tabsheet->add('persometa', l10n('Personal Metadata'), $my_base_url . '&amp;tab=persometa');

$MPC = pwg_db_fetch_assoc(pwg_query("SELECT state FROM " . PLUGINS_TABLE . " WHERE id = 'ContactForm';"));
if ($MPC['state'] == 'active') {
    $tabsheet->add('contactmeta', l10n('Contact page Metadata'), $my_base_url . '&amp;tab=contactmeta');
}
$MAP = pwg_db_fetch_assoc(pwg_query("SELECT state FROM " . PLUGINS_TABLE . " WHERE id = 'AdditionalPages';"));
if ($MAP['state'] == 'active') {
    $tabsheet->add('AdditionalPagesmeta', l10n('Additional Pages Metadata'), $my_base_url . '&amp;tab=AdditionalPagesmeta');
}

$tabsheet->add('description', l10n('meta_onglet_description'), $my_base_url . '&amp;tab=description');
$tabsheet->select($page['tab']);
$tabsheet->assign();

// Tab gest
switch ($page['tab']) {
    case 'gestion':

//read metadata list
        $groups = array();
        $query = '
select id,metaname
  FROM ' . meta_TABLE . '
  ORDER BY metaname ASC;';
        $result = pwg_query($query);
        while ($row = pwg_db_fetch_assoc($result)) {
            $groups[$row['id']] = $row['metaname'];
        }
        $selected = 0;
        $options[] = l10n('meta_select2');
        $options['a'] = '----------------------';

        foreach ($groups as $metalist => $metalist2) {
            $options[$metalist] = $metalist2;
        }
        $template->assign(
                'gestionA', array(
            'OPTIONS' => $options,
            'SELECTED' => $selected
        ));

//edit meta
        if (isset($_POST['submitchoixmeta']) and is_numeric($_POST['metalist']) and ( !$_POST['metalist']) == 0) {
            $lire = $_POST['metalist'];
            $query = '
select id,metaname,metaval
  FROM ' . meta_TABLE . '
  WHERE id = \'' . $lire . '\'
  ;';
            $result = pwg_query($query);

            $row = pwg_db_fetch_assoc($result);
            $chname = $row['metaname'];
            $chval = $row['metaval'];

            $selected2 = "";

            $template->assign(
                    'meta_edit', array(
                'VALUE' => $chname,
                'CONTENT' => $chval,
                'SELECTED' => $selected2
            ));
        }

//inser metadata in table
        if (isset($_POST['submitinsmeta'])) {
            $query = '
UPDATE ' . meta_TABLE . '
  SET metaval= \'' . $_POST['inser'] . '\'
  WHERE metaname = \'' . $_POST['invisible'] . '\'
    ;';
            $result = pwg_query($query);
            array_push($page['infos'], l10n('Metadata updated'));
        }
        break;

//description TAB
    case 'description':
        $blockdesc = 'description';
        $template->assign(
                $blockdesc, array(
            'meta' => l10n('meta_name'),
        ));
        break;

// TAB personnal metadata
    case 'persometa':
        $template->assign(
                'metapersoT', array(
            'meta' => l10n('meta_name'),
        ));
        $admin_base_url = $my_base_url . '&amp;tab=persometa';
        $metapersos = pwg_query("SELECT * FROM `" . METAPERSO_TABLE . ";");

        if (pwg_db_num_rows($metapersos)) {
            while ($metaperso = pwg_db_fetch_assoc($metapersos)) {
                $items = array(
                    'METANAME' => $metaperso['metaname'],
                    'METAVAL' => $metaperso['metaval'],
                    'METATYPE' => $metaperso['metatype'],
                    'U_DELETE' => $admin_base_url . '&amp;delete=' . $metaperso['id'],
                    'U_EDIT' => $admin_base_url . '&amp;edit=' . $metaperso['id'],
                );

                $template->append('metapersos', $items);
            }
        }
        if (isset($_POST['submitaddpersonalmeta'])) {
            $template->assign(
                    'meta_edit2', array(
                'meta' => l10n('meta_name'),
                'METAID' => 0,
            ));
        }

        if (isset($_POST['submitaddmetaperso'])) {
            $query = '
DELETE 
  FROM ' . METAPERSO_TABLE . '
  WHERE id = ' . $_POST['invisibleID'] . '
  ;';
            $result = pwg_query($query);
            $q = '
INSERT INTO ' . $prefixeTable . 'metaperso(metaname,metaval,metatype)VALUES ("' . $_POST['insername'] . '","' . $_POST['inserval'] . '","' . $_POST['insertype'] . '");';
            pwg_query($q);
            $_SESSION['page_infos'] = array(l10n('Personal metadata update'));
            redirect($admin_base_url);
        }

        if (isset($_GET['edit'])) {
            check_input_parameter('edit', $_GET, false, PATTERN_ID);

            $query = '
select id,metaname,metaval,metatype
  FROM ' . METAPERSO_TABLE . '
  WHERE id = \'' . $_GET['edit'] . '\'
  ;';
            $result = pwg_query($query);
            $row = pwg_db_fetch_assoc($result);
            $template->assign(
                    'meta_edit2', array(
                'METAID' => $row['id'],
                'METANAME' => $row['metaname'],
                'METAVAL' => $row['metaval'],
                'METATYPE' => $row['metatype'],
            ));
        }

        if (isset($_GET['delete'])) {
            check_input_parameter('delete', $_GET, false, PATTERN_ID);
            $query = '
DELETE
  FROM ' . METAPERSO_TABLE . '
  WHERE id = ' . $_GET['delete'] . '
;';
            pwg_query($query);

            $_SESSION['page_infos'] = array(l10n('Personal metadata update'));
            redirect($admin_base_url);
        }
        break;

    case 'contactmeta':
        if (empty($conf['contactmeta'])) {
            $conf['contactmeta'] = ',';
        }
        $metacontact = explode(',', $conf['contactmeta']);
        $template->assign('contactmetaT', array('CMKEY' => $metacontact[0], 'CMDESC' => $metacontact[1],));

        if (isset($_POST['submitcm'])) {
            $INSCM = $_POST['inser'] . "," . $_POST['inser2'];
            conf_update_param('contactmeta', $INSCM);
            array_push($page['infos'], l10n('Metadata updated'));
            $template->assign(
                    'contactmetaT', array('CMKEY' => stripslashes($_POST['inser']), 'CMDESC' => stripslashes($_POST['inser2'])));
        }
        break;

    case 'AdditionalPagesmeta':
        if (!defined('TITLE_AP_TABLE'))
            define('TITLE_AP_TABLE', $prefixeTable . 'title_ap');
        $groups = array();
        $query = '
select id,title
  FROM ' . ADD_PAGES_TABLE . '
  ORDER BY id ASC;';
        $result = pwg_query($query);
        while ($row = pwg_db_fetch_assoc($result)) {
            $groups[$row['id']] = $row['id'] . ' : ' . $row['title'];
        }

        $selected = 0;
        $options[] = l10n('Choose it page');
        $options['a'] = '----------------------';

        foreach ($groups as $listid => $listid2) {
            $options[$listid] = $listid2;
        }
        $template->assign(
                'gestionC', array(
            'OPTIONS' => $options,
            'SELECTED' => $selected
        ));

        if (isset($_POST['submitchoixAP'])and is_numeric($_POST['APchoix']) and ( !$_POST['APchoix']) == 0) {
            $lire = $_POST['APchoix'];
            $query = '
select id,metaKeyap,metadesap
  FROM ' . META_AP_TABLE . '
  WHERE id = \'' . $lire . '\'
  ;';
            $result = pwg_query($query);
            $row = pwg_db_fetch_assoc($result);
            $metaKeyapap = $row['metaKeyap'];
            $metadesap = $row['metadesap'];

            $query = '
select id,title
  FROM ' . ADD_PAGES_TABLE . '
  WHERE id = \'' . $lire . '\'
    ;';
            $result = pwg_query($query);
            $row = pwg_db_fetch_assoc($result);
            $idap = $row['id'];
            $nameap = $row['title'];

            $selected3 = 0;

            $template->assign(
                    'ap_edit', array(
                'VALUE' => $idap,
                'VALUEN' => $nameap,
                'CONTENTMKAP' => $metaKeyapap,
                'CONTENTMDAP' => $metadesap,
                'SELECTED' => $selected3
            ));
        }

        if (isset($_POST['submitinsapm'])) {
            $query = '
DELETE 
  FROM ' . META_AP_TABLE . '
  WHERE id = \'' . $_POST['invisible'] . '\'
  ;';
            $result = pwg_query($query);
            $q = '
INSERT INTO ' . $prefixeTable . 'meta_ap(id,metaKeyap,metadesap)VALUES (' . $_POST['invisible'] . ',"' . $_POST['inser'] . '","' . $_POST['inser2'] . '");';
            pwg_query($q);
            array_push($page['infos'], l10n('Metadata updated'));
        }
        break;
}

$template->set_filenames(array('plugin_admin_content' => dirname(__FILE__) . '/admin.tpl'));
$template->assign_var_from_handle('ADMIN_CONTENT', 'plugin_admin_content');
?>
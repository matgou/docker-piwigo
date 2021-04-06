<?php
if (!defined('PHPWG_ROOT_PATH')) die('Hacking attempt!');

global $template;
$template->set_filenames( array('plugin_admin_content' => dirname(__FILE__).'/newusers.tpl') );
$template->assign(
  array(
    'PLUGIN_NEWUSERS' => get_root_url().'admin.php?page=plugin-Ldap_Login-newusers',
    ));

$me = new Ldap();
$me->load_config();
//$me = get_plugin_data($plugin_id);

// Save LDAP configuration when submitted
if (isset($_POST['save'])){

	if (isset($_POST['LD_ALLOW_NEWUSERS'])){
		$me->config['ld_allow_newusers'] = 1;
	} else {
		$me->config['ld_allow_newusers'] = 0;
	}
	if (isset($_POST['LD_USE_MAIL'])){
		$me->config['ld_use_mail'] = 1;
	} else {
		$me->config['ld_use_mail'] = 0;
	}
	if (isset($_POST['LD_ALLOW_PROFILE'])){
		$me->config['ld_allow_profile'] = 1;
	} else {
		$me->config['ld_allow_profile'] = 0;
	}	
	if (isset($_POST['LD_ADVERTISE_ADMINS'])){
		$me->config['ld_advertise_admin_new_ldapuser'] = 1;
	} else {
		$me->config['ld_advertise_admin_new_ldapuser'] = 0;
	}
	
	if (isset($_POST['LD_SEND_CASUAL_MAIL'])){
		$me->config['ld_send_password_by_mail_ldap'] = 1;
	} else {
		$me->config['ld_send_password_by_mail_ldap'] = 0;
	}
	$me->save_config();
}
if (isset($_POST['clear_mail'])){
	ld_sql('update','clear_mail_address');
}


// do we allow to create new piwigo users in case of auth along the ldap ?
// does he have to belong an ldap group ?
// does ldap groups give some power ?
// what do we do when there's no mail in the ldap ?
// do we send mail to admins ?

// And build up the form with the new values
$template->assign('LD_ALLOW_NEWUSERS',	$me->config['ld_allow_newusers']);
$template->assign('LD_USE_MAIL',	$me->config['ld_use_mail']);
$template->assign('LD_ALLOW_PROFILE',	$me->config['ld_allow_profile']);
$template->assign('LD_ADVERTISE_ADMINS',	$me->config['ld_advertise_admin_new_ldapuser']);
$template->assign('LD_SEND_CASUAL_MAIL',	$me->config['ld_send_password_by_mail_ldap']);

$template->assign_var_from_handle( 'ADMIN_CONTENT', 'plugin_admin_content');
?>

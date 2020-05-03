<?php
//a:17:{"forgot_url";s:0:"";s:9:"ld_server";s:2:"ad";s:8:"ld_group";s:0:"";s:14:"ld_group_class";s:5:"group";s:22:"ld_group_member_attrib";s:6:"member";s:10:"ldap_debug";b:0;s:11:"ld_anonbind";b:0;}
$config = array();
$config['host'] = $_ENV['LDAP_HOST'];
$config['basedn'] = $_ENV['LDAP_BASE_DN'];
$config['port'] = $_ENV['LDAP_PORT'];
$config['ld_attr'] = 'uid';
$config['ld_use_ssl'] = False;
$config['ld_bindpw'] = $_ENV['LDAP_BIND_PW'];
$config['ld_binddn'] = $_ENV['LDAP_BIND_DN'];

$config['allow_newusers'] = True;
$config['advertise_admin_new_ldapuser'] = True;
$config['send_password_by_mail_ldap'] = False;
$config['forgot_url'] = "";
$config['ld_server'] = "openldap";
$config['ld_group'] = "cn=clouduser";
$config['ld_group_class'] = "posixGroup";
$config['ld_group_member_attrib'] = "memberUid";
$config['ldap_debug'] = False;
$config['ld_anonbind'] = False;

echo serialize($config);
exit();
?>


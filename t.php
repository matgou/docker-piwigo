<?php
$config = array();
$config['host'] = $_ENV['LDAP_HOST'];
$config['basedn'] = $_ENV['LDAP_BASE_DN'];
$config['port'] = $_ENV['LDAP_PORT'];
$config['ld_attr'] = 'uid';
$config['ld_use_ssl'] = False;
$config['ld_bindpw'] = $_ENV['LDAP_BIND_DN'];
$config['ld_binddn'] = $_ENV['LDAP_BIND_PW'];

$config['allow_newusers'] = True;
$config['advertise_admin_new_ldapuser'] = True;
$config['send_password_by_mail_ldap'] = False;

echo serialize($config);
exit();
?>


<?php
// +-----------------------------------------------------------------------+
// | Piwigo - a PHP based photo gallery                                    |
// +-----------------------------------------------------------------------+
// | Copyright(C) 2008-2014 Piwigo Team                  http://piwigo.org |
// | Copyright(C) 2003-2008 PhpWebGallery Team    http://phpwebgallery.net |
// | Copyright(C) 2002-2003 Pierrick LE GALL   http://le-gall.net/pierrick |
// +-----------------------------------------------------------------------+
// | This program is free software; you can redistribute it and/or modify  |
// | it under the terms of the GNU General Public License as published by  |
// | the Free Software Foundation                                          |
// |                                                                       |
// | This program is distributed in the hope that it will be useful, but   |
// | WITHOUT ANY WARRANTY; without even the implied warranty of            |
// | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU      |
// | General Public License for more details.                              |
// |                                                                       |
// | You should have received a copy of the GNU General Public License     |
// | along with this program; if not, write to the Free Software           |
// | Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA 02111-1307, |
// | USA.                                                                  |
// +-----------------------------------------------------------------------+
$lang['Warning: LDAP Extension missing.'] = 'Attenzione: LDAP Extension mancante.';
$lang['Ldap connection credentials'] = 'Credenziali di connessione LDAP';
$lang['Username'] = 'Vostro nome utente LDAP';
$lang['Ldap server host'] = 'Server host LDAP';
$lang['Attribute corresponding to the user name'] = 'Attributo corrispondente al nome utente (esempio: uid):';
$lang['Test Settings'] = 'Test impostazione';
$lang['Ldap port'] = 'Porta LDAP';
$lang['Ldap_Login configuration'] = 'Configurazione Ldap_Login';
$lang['Ldap_Login Test'] = 'Test del plugin Ldap_Login';
$lang['Ldap_Login Plugin'] = 'Ldap_Login Plugin';
$lang['Your password'] = 'La tua password LDAP.';
$lang['Secure connexion'] = 'Connessione sicura (ldaps)';
$lang['Save'] = 'Salva';
$lang['Do you allow new piwigo users to be created when users authenticate succesfully on the ldap ?'] = 'Devono essere creati nuovi utenti Piwigo quando gli utenti si autenticano con successo tramite LDAP?';
$lang['Do you want admins to be advertised by mail in case of new users creation upon ldap login ?'] = 'Vuoi che gli amministratori siano avvisati tramite email in caso di nuova creazione utenti su ldap di accesso?';
$lang['Let the fields blank if the ldap accept anonymous connections.'] = 'Lascia i campi vuoti se LDAP accetta connessioni anonime.';
$lang['You must save the settings with the Save button just up there before testing here.'] = 'E\' necessario salvare le impostazioni utilizzando il pulsante Salva qua sopra, prima della loro prova.';
$lang['If empty, localhost and standard protocol ports will be used in configuration.'] = 'Se vuoto, porte di protocollo localhost standard saranno utilizzate nella configurazione.';
$lang['Bind DN, field in full ldap style'] = 'Associa DN in stile LDAP (esempio: cn=admin,dc=example,dc=com).';
$lang['Base DN'] = 'Base DN dove si dovrebbero trovare gli utenti LDAP (esempio: ou=users,dc=example,dc=com):';
$lang['If empty, standard protocol ports will be used by the software.'] = 'Se vuoto, porte di protocollo standard, saranno utilizzate dal software.';
$lang['New users when ldap auth is successfull'] = 'Nuovi utenti quando l\'autenticazione LDAP riesce';
$lang['Do you want to send mail to the new users, like casual piwigo users receive ?'] = 'I nuovi utenti devono ricevere le email similmente agli utenti occasionali Piwigo?';
$lang['Ldap server host connection'] = 'Connessione al server LDAP';
$lang['All LDAP users can use their ldap password everywhere on piwigo if needed.'] = 'Tutti gli utenti LDAP possono utilizzare la password LDAP ovunque in Piwigo se necessario.';
$lang['Bind password'] = 'Associa password';
$lang['Groups branch'] = 'Branch dove si dovrebbero trovare gruppi LDAP (esempio: ou=groups):';
$lang['Users branch'] = 'Ramo dove si trovano gli utenti LDAP (esempio: ou=users):';
$lang['Ldap users'] = 'Utenti LDAP';
$lang['Ldap groups'] = 'Gruppi LDAP';
$lang['To get them out of these roles, they must be sorted of the ldap group and then role updated in the <a href="admin.php?page=user_list">piwigo admin</a>. If a group is mandatory as described in the <a href="admin.php?page=plugin-Ldap_Login-newusers">new piwigo users tab</a>, then they must also belong to the users group.'] = 'Per rimuovere questi diritti amministrativi, devi rimuovere questi utenti nel gruppo ldap quindi aggiornare il loro ruolo nella <a href="admin.php?page=user_list">piwigo admin</a>. Se l\'appartenenza ad un gruppo è obbligatorio come indicato nella <a href="admin.php?page=plugin-Ldap_Login-newusers">nuova scheda utenti piwigo</a>, allora devono inoltre appartenere al gruppo utenti.';
$lang['Search Ldap users ?'] = 'Vuoi fare una ricerca sul nome degli utenti? Questo non è necessario  se la directory è abbastanza semplice (per esempio: uid=user, ou=people, dc=example, dc=com). Se non si utilizza questa opzione, devi salvare una query Ldap.';
$lang['Search Ldap groups ?'] = 'Vuoi fare una ricerca sul nome dei gruppi? Questo non è necessario  se la directory è abbastanza semplice (per esempio: cn=groupname, ou=groups, dc=example, dc=com). Se non si utilizza questa opzione, devi salvare una query Ldap.';
$lang['If you create a <a href="admin.php?page=group_list">piwigo group</a> with the same name as an ldap one, all members of the ldap group will automatically join the piwigo group at their next authentication. This allows you to create <a href="admin.php?page=help&section=groups">specific right access management</a> (restrict access to a particaular album...).'] = 'Se si crea un <a href="admin.php?page=group_list">gruppo piwigo</a> con lo stesso nome di un gruppo LDAP, tutti i membri di questo gruppo saranno membri del gruppo LDAP Piwigo al loro prossimo login. Questo consente di implementare <a href="admin.php?page=help&section=groups">controlli di accesso</ a>. Per rimuovere gli utenti da questi gruppi, devono prima essere rimossi dai gruppi LDAP, quindi solo dai gruppi Piwigo.';
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
$lang['You must save the settings with the Save button just up there before testing here.'] = 'Jums ir nepieciešams saglabāt iestatījumus ar Save pogu pirms veikt to pārbaudi.';
$lang['New users when ldap auth is successfull'] = 'Jauni lietotāji, kad LDAP autentifikācija ir veiksmīga';
$lang['Let the fields blank if the ldap accept anonymous connections.'] = 'Ja LDAP atļauj anonīmus savienojumus, atstājiet laukus tukšus.';
$lang['If empty, standard protocol ports will be used by the software.'] = 'Ja tukšs, programmatūra izmantos standarta protokola portus.';
$lang['If empty, localhost and standard protocol ports will be used in configuration.'] = 'Ja tukšs, konfigurēšanai tiks izmantoti localhost un standarta protokola porti.';
$lang['Do you want to send mail to the new users, like casual piwigo users receive ?'] = 'Vai jūs vēlaties nosūtīt pastu jaunajiem lietotājiem, piemēram, kādu to saņem parastie Piwigo lietotāji?';
$lang['Do you want admins to be advertised by mail in case of new users creation upon ldap login ?'] = 'Vai jūs vēlaties, lai  admins tiek brīdināts pa pastu par jaunu lietotāju izveidošanu pēc pieteikšanās ar LDAP loginu?';
$lang['Base DN'] = '
Bāzes DN, kur būtu atrodami LDAP lietotājiem (ex : ou=users,dc=piemērs,dc=com) :';
$lang['Do you allow new piwigo users to be created when users authenticate succesfully on the ldap ?'] = 'Vai jūs ļautu izveidot jaunus Piwigo lietotājus, ja lietotāji veiksmīgi autentificētos LDAP?';
$lang['Bind DN, field in full ldap style'] = 'Piesaistīt DN ldap stilam (for ex : cn=admin,dc=piemērs,dc=com). ';
$lang['Attribute corresponding to the user name'] = 'Lietotāja vārdam atbilstošs Atribūts';
$lang['All LDAP users can use their ldap password everywhere on piwigo if needed.'] = 'Ja nepieciešams, visi LDAP lietotāji var izmantot savu LDAP paroli jebkur Piwigo.';
$lang['Bind password'] = 'Piesaistīt paroli';
$lang['Your password'] = 'Jūsu LDAP parole';
$lang['Warning: LDAP Extension missing.'] = 'Brīdinājums: Trūkst LDAP Paplašinājums.';
$lang['Username'] = 'Votre ldap lietotājvārds';
$lang['Test Settings'] = 'Pārbaudīt iestadījumus';
$lang['Secure connexion'] = 'Drošs savienojums (ldaps)';
$lang['Save'] = 'Saglabāt';
$lang['Ldap connection credentials'] = 'LDAP savienojuma pilnvaras';
$lang['Ldap server host'] = 'Ldap servera hosts';
$lang['Ldap_Login configuration'] = 'Ldap_Login konfigurācija';
$lang['Ldap_Login Test'] = 'Ldap_Login Tests';
$lang['Ldap_Login Plugin'] = 'Ldap_Login Spraudnis';
$lang['Ldap server host connection'] = 'Ldap servera savienojums';
$lang['Ldap port'] = 'Ldap ports';
$lang['Users branch'] = 'Vieta, kur būtu atrodami LDAP lietotāji (e.g.: ou=users):';
$lang['Ldap users'] = 'LDAP lietotāji';
$lang['Ldap groups'] = 'LDAP gtupas';
$lang['To get them out of these roles, they must be sorted of the ldap group and then role updated in the <a href="admin.php?page=user_list">piwigo admin</a>. If a group is mandatory as described in the <a href="admin.php?page=plugin-Ldap_Login-newusers">new piwigo users tab</a>, then they must also belong to the users group.'] = 'Lai tos atbrīvotu no šīm nozīmēm, tie ir jāsakārto pēc LDAP grupām un pēc tam nozīme atjaunina <a href="admin.php?page=user_list"> piwigo admin </ a>. Ja grupa ir obligāta, kā aprakstīts <a href="admin.php?page=plugin-Ldap_Login-newusers"> jauna Piwigo lietotāja cilnē </ a>, tad tiem ir arī jāpieder lietotāju grupai.';
$lang['Search Ldap users ?'] = 'Meklē Ldap lietotājus? Ja jūsu grupas ir izmētātas pa dažadām vietām vai OU, jums būs nepieciešams šis. Ja šo neizvēlēsities, ietaupīsit vienu ldap pieprasījumu. Jums tas nav nepieciešams, ja jūsu ldap koks ir vienkāršs (piemēram, cn = GROUPNAME, ou = groups, dc = example, dc = corn).';
$lang['Groups branch'] = 'Vieta, kur ir atrodamas LDAP grupas (e.g.: ou=groups):  ';
$lang['Search Ldap groups ?'] = 'Meklē Ldap lietotājus? Ja jūsu grupas ir izmētātas pa dažadām vietām vai OU, jums būs nepieciešams šis. Ja šo neizvēlēsities, ietaupīsit vienu ldap pieprasījumu. Jums tas nav nepieciešams, ja jūsu ldap koks ir vienkāršs (piemēram, cn = GROUPNAME, ou = groups, dc = example, dc = corn).';
$lang['If you create a <a href="admin.php?page=group_list">piwigo group</a> with the same name as an ldap one, all members of the ldap group will automatically join the piwigo group at their next authentication. This allows you to create <a href="admin.php?page=help&section=groups">specific right access management</a> (restrict access to a particaular album...).'] = 'Ja izveidojat <a href="admin.php?page=group_list"> Piwigo grupu </ a> ar tādu pašu nosaukumu kā ldap, visi LDAP grupas locekļi automātiski pievienosies Piwigo grupai savā nākamajā autentifikācijā. Tas ļauj jums izveidot <a href="admin.php?page=help&section=groups"> īpašu piekļuves tiesību pārraudzību </ a> (ierobežot piekļuvi noteiktam albūmam ...). Tomēr, lai šos lietotājus dabūtu ārā, Jums tie vispirms jādabū ārā no LDAP grupas, tad Piwigo grupas iespējams atjaunināt.';
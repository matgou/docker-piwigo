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
$lang['Save'] = 'Salvar';
$lang['Secure connexion'] = 'Ligação segura (Idaps)';
$lang['Test Settings'] = 'Definições Teste';
$lang['Username'] = 'Nome de utilizador LDAP';
$lang['Warning: LDAP Extension missing.'] = 'Atenção: Esquecida a Extensão LDAP';
$lang['You must save the settings with the Save button just up there before testing here.'] = 'Antes de efetuar o teste, é preciso salvar as definições clicando no botão SALVAR acima.';
$lang['Your password'] = 'Senha LDAP';
$lang['All LDAP users can use their ldap password everywhere on piwigo if needed.'] = 'Todos os utilizadores LDAP podem usar a sua senha LDAP em qualquer parte do Piwigo se necessário';
$lang['Attribute corresponding to the user name'] = 'Atributo correspondente ao nome de utilizador';
$lang['Base DN'] = 'Base DN onde podem ser encontrados os utilizadores LDAP (por exemplo: ou=utilizadores,dc=exemplo,dc=com):';
$lang['Bind DN, field in full ldap style'] = 'Vincular DN no estilo LDAP (por exemplo:cu=utilizadores,dc=exemplo, dc=com):';
$lang['Bind password'] = 'Vincular senha';
$lang['Do you allow new piwigo users to be created when users authenticate succesfully on the ldap ?'] = 'poderão ser criados novos utilizadores Piwigo quando os utilizadores se autenticarem com sucesso via LDAP?';
$lang['Do you want admins to be advertised by mail in case of new users creation upon ldap login ?'] = 'Deseja que os administradores sejam notificados por email, em caso de utilizadores criados após entrada LDAP?';
$lang['Do you want to send mail to the new users, like casual piwigo users receive ?'] = 'Os novos utilizadores deverão receber mail similar aos urtilizadores casuais piwigo?';
$lang['If empty, localhost and standard protocol ports will be used in configuration.'] = 'Se vazio, localhost e portas standard serão usadas na configuração';
$lang['If empty, standard protocol ports will be used by the software.'] = 'Se vazio, localhost e portas standard serão usadas pelo software';
$lang['Ldap connection credentials'] = 'Credenciais de ligação LDAP';
$lang['Ldap port'] = 'Porta LDAP';
$lang['Ldap server host'] = 'Servidor de alojamento LDAP';
$lang['Ldap server host connection'] = 'Servidor ligação LDAP';
$lang['Ldap_Login Plugin'] = 'Extensão de Entrada_Ldap ';
$lang['Ldap_Login Test'] = 'Teste de Entrada_Ldap';
$lang['Ldap_Login configuration'] = 'Configuração de Entrada_Ldap';
$lang['Let the fields blank if the ldap accept anonymous connections.'] = 'Deixar os campos vazios se LDAP aceitar ligações anónimas';
$lang['New users when ldap auth is successfull'] = 'Novos utilizadores quando LDPA é bem sucedido';
$lang['If you create a <a href="admin.php?page=group_list">piwigo group</a> with the same name as an ldap one, all members of the ldap group will automatically join the piwigo group at their next authentication. This allows you to create <a href="admin.php?page=help&section=groups">specific right access management</a> (restrict access to a particaular album...).'] = 'Se criar um <a href="admin.php?page=group_list"> Grupo Piwigo</ a> com o mesmo nome como um ldap um, todos os membros do grupo ldap se juntarão automaticamente ao grupo Piwigo na sua próxima autenticação. Isto permite-lhe criar <a href="admin.php?page=help&section=groups"> Direito específico de gerenciamento </ a> (restringir o acesso a um album específico...). No entanto, para excluir estes utilizadores, deverá primeiramente tirá-los dos grupos LDAP, em seguida, os grupos Piwigo podem ser atualizados.';
$lang['Search Ldap groups ?'] = 'Utilizadores da pesquisa LDAP? Se tem seus grupos widespreaded em várias filiais ou OU, vai precisar disto. Se evitar isto, economiza um pedido ldap. Pode não precisar se sua árvore ldap for simples (por exemplo: cn=nome do grupo, ou=grupos, dc=exemplo, dc=com).';
$lang['Search Ldap users ?'] = 'Pesquisar utilizadores LDAP? Se tiver Utilizadores widespreaded em várias filiais ou OU, vai precisar disto. Se evitar isto, economiza um pedido ldap. Pode não precisar disto se a árvore ldap for simples (por exemplo: uid=utilizador, ou=pessoas, dc= exemplo, dc=com).';
$lang['Groups branch'] = 'Filial onde os grupos LDAP podem ser encontrados ( por exemplo: ou=grupos)';
$lang['Ldap users'] = 'Utilizadores LDAP';
$lang['Ldap groups'] = 'Grupos LDAP';
$lang['Users branch'] = 'Sucursal onde os utilizadores LDAP devem encontrar-se (por exemplo ou=Utilizadores)';
$lang['To get them out of these roles, they must be sorted of the ldap group and then role updated in the <a href="admin.php?page=user_list">piwigo admin</a>. If a group is mandatory as described in the <a href="admin.php?page=plugin-Ldap_Login-newusers">new piwigo users tab</a>, then they must also belong to the users group.'] = 'Para retirá-los destas listas, eles devem ser ordenados no grupo ldap e então a lista atualizada em  <a href="admin.php?page=user_list"> Admin Piwigo</a>. Se um grupo é obrigatório, conforme descrito em <a href="admin.php?page=plugin-Ldap_Login-newusers"> Aba de novos Utilizadores Piwigo </a>, então eles devem pertencer ao grupo de utilizadores.';
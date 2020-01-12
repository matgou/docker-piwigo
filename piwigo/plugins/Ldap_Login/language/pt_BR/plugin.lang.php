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
$lang['New users when ldap auth is successfull'] = 'Novos usuários quando autenticação LDAP é bem sucedida';
$lang['Save'] = 'Salvar';
$lang['Secure connexion'] = 'Conexão segura (ldaps)';
$lang['Test Settings'] = 'Configurações de teste';
$lang['Username'] = 'Seu nome de usuário LDAP';
$lang['Warning: LDAP Extension missing.'] = 'Aviso: Faltando extensão LDAP';
$lang['You must save the settings with the Save button just up there before testing here.'] = 'Você precisa salvar as configurações usando o botão Salvar acima, antes de testá-las.';
$lang['Your password'] = 'Sua senha LDAP';
$lang['All LDAP users can use their ldap password everywhere on piwigo if needed.'] = 'Todos os usuários do LDAP podem usar sua senha LDAP em todo Piwigo se necessário.';
$lang['Attribute corresponding to the user name'] = '
Atributo correspondente ao nome de usuário';
$lang['Base DN'] = 'Base DN, onde os usuários de LDAP devem ser encontrados (por exemplo: ou = usuários, dc = exemplo, dc = com):';
$lang['Bind DN, field in full ldap style'] = 'Bind DN no estilo LDAP (por exemplo: cn = admin, dc = exemplo, dc = com).';
$lang['Bind password'] = 'Senha Bind';
$lang['Do you allow new piwigo users to be created when users authenticate succesfully on the ldap ?'] = 'Novos usuários Piwigo podem ser criados quando os usuários se autenticarem com sucesso via LDAP?';
$lang['Do you want admins to be advertised by mail in case of new users creation upon ldap login ?'] = 'Você quer que os administradores sejam advertidos por email, em caso de criação de novos usuários usando-se o login do ldap?';
$lang['Do you want to send mail to the new users, like casual piwigo users receive ?'] = 'Deverão novos usuários receber mensagens semelhantes aos usuários Piwigo casuais?';
$lang['If empty, localhost and standard protocol ports will be used in configuration.'] = 'Se vazio, portas de protocolo localhost e padrão serão utilizados na configuração.';
$lang['If empty, standard protocol ports will be used by the software.'] = 'Se vazio, portas de protocolo padrão serão usados pelo software.';
$lang['Ldap connection credentials'] = 'Credenciais de conexão LDAP';
$lang['Ldap port'] = 'Porta LDAP';
$lang['Ldap server host'] = 'Servidor host LDAP';
$lang['Ldap server host connection'] = 'Conexão com servidor LDAP';
$lang['Ldap_Login Plugin'] = 'Plugin Ldap_Login ';
$lang['Ldap_Login Test'] = 'Teste Ldap_Login';
$lang['Ldap_Login configuration'] = 'Configuração Ldap_Login';
$lang['Let the fields blank if the ldap accept anonymous connections.'] = 'Deixe os campos em branco se o LDAP aceitar conexões anônimas.';
$lang['Groups branch'] = 'Local onde grupos LDAP devem ser encontrados (por exemplo: ou = grupos):';
$lang['If you create a <a href="admin.php?page=group_list">piwigo group</a> with the same name as an ldap one, all members of the ldap group will automatically join the piwigo group at their next authentication. This allows you to create <a href="admin.php?page=help&section=groups">specific right access management</a> (restrict access to a particaular album...).'] = 'Se você criar um grupo <a href="admin.php?page=group_list">Piwigo</a> com o mesmo nome de um ldap um, todos os membros do grupo ldap irão juntar-se automaticamente ao grupo Piwigo em sua próxima autenticação. Isso permite que você crie <a href="admin.php?page=help&section=groups">gerenciamento de acesso direito específico</a> (restringindo o acesso a um álbum de particaular ...). No entanto, para retirar os usuários, você deve primeiro tirá-los dos grupos LDAP, em seguida, os grupos Piwigo podem ser atualizados.';
$lang['Ldap groups'] = 'Grupos LDAP';
$lang['Ldap users'] = 'Usuários LDAP';
$lang['Search Ldap groups ?'] = 'Pesquisar usuários LDAP? Se você tem seus grupos espalhados em várias filiais ou OU, você vai precisar disso. Se você evitar isso, você economiza um pedido ldap. Você pode não precisar se sua árvore ldap for simples (por exemplo: cn = nome do grupo, ou = grupos, dc = exemplo, dc = com).';
$lang['Search Ldap users ?'] = 'Pesquisar usuários LDAP? Se você tem seus usuários espalhados em várias filiais ou OU, você vai precisar disso. Se você evitar isso, você economiza um pedido ldap. Você pode não precisar se sua árvore ldap for simples (por exemplo: cn = nome do grupo, ou = grupos, dc = exemplo, dc = com).';
$lang['To get them out of these roles, they must be sorted of the ldap group and then role updated in the <a href="admin.php?page=user_list">piwigo admin</a>. If a group is mandatory as described in the <a href="admin.php?page=plugin-Ldap_Login-newusers">new piwigo users tab</a>, then they must also belong to the users group.'] = 'Para tirá-los dessas funções, eles devem ser ordenados no grupo ldap e a função atualizada em <a href="admin.php?page=user_list"> Piwigo administrador </a>. Se um grupo é obrigatório, conforme descrito em <a href="admin.php?page=plugin-Ldap_Login-newusers"> nova aba de usuários Piwigo </a>, então eles também devem pertencer ao grupo de usuários.';
$lang['Users branch'] = 'Local onde os usuários LDAP devem ser encontrados (por exemplo: ou = usuários):';
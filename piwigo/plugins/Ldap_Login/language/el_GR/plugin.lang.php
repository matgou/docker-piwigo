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
$lang['Base DN'] = 'Base DN, που θα πρέπει να βρίσκονται οι χρήστες ldap (ex : ou=users,dc=example,dc=com) :';
$lang['Attribute corresponding to the user name'] = 'Χαρακτηριστικό που αντιστοιχεί στο όνομα χρήστη';
$lang['All LDAP users can use their ldap password everywhere on piwigo if needed.'] = 'Όλοι οι χρήστες LDAP μπορούν να χρησιμοποιήσουν τον κωδικό ldap τους παντού στο piwigo αν χρειαστεί.';
$lang['You must save the settings with the Save button just up there before testing here.'] = 'Πρέπει να αποθηκεύσετε τις ρυθμίσεις χρησιμοποιώντας το κουμπί Αποθήκευση παραπάνω, πριν τις δοκιμάσετε.';
$lang['Your password'] = 'Ο κωδικός σας για το LDAP';
$lang['Warning: LDAP Extension missing.'] = 'Προειδοποίηση:Απουσία Πρόσθετου του LDAP';
$lang['Username'] = 'Το όνομά σας χρήστη LDAP';
$lang['Test Settings'] = 'Δοκιμή ρυθμίσεων';
$lang['If empty, standard protocol ports will be used by the software.'] = 'Εάν μείνει κενό, το λογισμικό θα χρησιμοποιεί τις συνήθεις θύρες πρωτοκόλλου.';
$lang['Ldap server host connection'] = 'Σύνδεση με εξυπηρετητή LDAP';
$lang['Ldap server host'] = 'LDAP server host';
$lang['If empty, localhost and standard protocol ports will be used in configuration.'] = 'Εάν μείνει κενό, θα χρησιμοποιηθούν στη ρύθμιση ο localhost και οι συνήθεις θύρες πρωτοκόλλου.';
$lang['Do you want to send mail to the new users, like casual piwigo users receive ?'] = 'Πρέπει να λαμβάνουν οι νέοι χρήστες μήνυματα όπως και οι κλασικοί χρήστες Piwigo;';
$lang['Do you want admins to be advertised by mail in case of new users creation upon ldap login ?'] = 'Θέλετε να ενημερώνονται οι διαχειριστές με ηλεκτρονικό μήνυμα σε περίπτωση δημιουργίας νέων χρηστών με σύνδεση ldap;';
$lang['Bind DN, field in full ldap style'] = 'Συνδεθείτε με DN σε μορφή LDAP (π.χ.:admin, dc=example,dc=com). ';
$lang['Bind password'] = 'Κωδικός σύνδεσης';
$lang['Do you allow new piwigo users to be created when users authenticate succesfully on the ldap ?'] = 'Μπορούν να δημιουργούνται νέοι χρήστες Piwigo όταν πιστοποιούνται επιτυχώς μέσω LDAP;';
$lang['Ldap connection credentials'] = 'Διαπιστευτήρια σύνδεσης LDAP';
$lang['Ldap_Login Plugin'] = 'Ldap_Πρόσθετο σύνδεσης';
$lang['Ldap_Login configuration'] = 'Ldap_Ρύθμιση σύνδεσης';
$lang['Secure connexion'] = 'Ασφαλής σύνδεση(ldaps)';
$lang['Save'] = 'Αποθήκευση';
$lang['New users when ldap auth is successfull'] = 'Νέοι χρήστες όταν η πιστοποίηση LDAP είναι επιτυχής';
$lang['Let the fields blank if the ldap accept anonymous connections.'] = 'Αφήστε τα πεδία κενά εάν το LDAP αποδέχεται ανώνυμες συνδέσεις';
$lang['Ldap_Login Test'] = 'Ldap_Δοκιμή σύνδεσης';
$lang['Ldap port'] = 'θύρα LDAP';
$lang['Ldap users'] = 'Οι χρήστες LDAP';
$lang['Ldap groups'] = 'Ομάδες LDAP';
$lang['If you create a <a href="admin.php?page=group_list">piwigo group</a> with the same name as an ldap one, all members of the ldap group will automatically join the piwigo group at their next authentication. This allows you to create <a href="admin.php?page=help&section=groups">specific right access management</a> (restrict access to a particaular album...).'] = 'Εάν δημιουργήσετε μια <a href="admin.php?page=group_list">piwigo group</a> με το ίδιο όνομα όπως μια ομάδα ldap, όλα τα μέλη της ομάδας ldap θα ενταχθούν αυτόματα στην ομάδα piwigo στην επόμενη είσοδό τους στο σύστημα. Αυτό σας επιτρέπει να δημιουργήσετε <a href="admin.php?page=help&section=groups">ειδική διαχείριση δικαιωμάτων πρόσβασης</a> (περιορίζουν την πρόσβαση σε ορισμένα λευκώματα..). Ωστόσο, προκειμένου να αφήσετε έξω κάποιους χρήστες, θα πρέπει πρώτα να τους βγάλουμε έξω από τις ομάδες LDAP, στη συνέχεια, μπορούν να ενημερωθούν οι ομάδες piwigo.';
$lang['Groups branch'] = 'Διακλάδωση όπου θα πρέπει να βρίσκονται ομάδες LDAP (π.χ.:ou=groups):';
$lang['Users branch'] = 'Διακλάδωση, όπου θα πρέπει να βρίσκονται οι χρήστες LDAP (π.χ.: ou=users):';
$lang['To get them out of these roles, they must be sorted of the ldap group and then role updated in the <a href="admin.php?page=user_list">piwigo admin</a>. If a group is mandatory as described in the <a href="admin.php?page=plugin-Ldap_Login-newusers">new piwigo users tab</a>, then they must also belong to the users group.'] = 'Για να τους βγάλουμε από αυτούς τους ρόλους, θα πρέπει να είναι ταξινομημένοι από την ομάδα ldap και τότε ενημερώνουμε το ρόλο στο  <a href="admin.php?page=user_list">διαχειριστή piwigo </a>. Εάν μια ομάδα είναι υποχρεωτική όπως περιγράφεται στο  <a href="admin.php?page=plugin-Ldap_Login-newusers">νέοι χρήστες piwigo</a>, τότε θα πρέπει επίσης να ανήκουν στην ομάδα των χρηστών.';
$lang['Search Ldap users ?'] = 'Αναζήτηση χρηστών Ldap? Εάν έχετε τις ομάδες σας διάσπαρτες σε αρκετά παρακλάδια ή OU, θα το χρειαστείτε αυτό. Αν το αποφύγετε, μπορείτε να αποθηκεύσετε ένα αίτημα ldap. Μπορεί να μην το χρειάζεστε, αν το δέντρο ldap σας είναι απλή (π.χ.: cn=groupname,ou=groups,dc=example,dc=com).';
$lang['Search Ldap groups ?'] = 'Αναζήτηση χρηστών Ldap? Εάν έχετε τις ομάδες σας διάσπαρτες σε αρκετά παρακλάδια ή OU, θα το χρειαστείτε αυτό. Αν το αποφύγετε, μπορείτε να αποθηκεύσετε ένα αίτημα ldap. Μπορεί να μην το χρειάζεστε, αν το δέντρο ldap σας είναι απλή (π.χ.: cn=groupname,ou=groups,dc=example,dc=com).';
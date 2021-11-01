#!/bin/sh

if [ -z $MYSQL_DATABASE ]; then
	MYSQL_DATABASE="piwigo"
fi

if [ -z $MYSQL_USER ]; then
	MYSQL_USER="root"
fi

if [ -z $MYSQL_PASSWORD ]; then
	MYSQL_PASSWORD="root"
fi

if [ -z $MYSQL_HOST ]; then
	MYSQL_HOST="database:3306"
fi

export fic="/var/www/html/local/config/database.inc.php"
sed -i "s/@@MYSQL_DATABASE@@/$MYSQL_DATABASE/g" $fic
sed -i "s/@@MYSQL_USER@@/$MYSQL_USER/g" $fic
sed -i "s/@@MYSQL_HOST@@/$MYSQL_HOST/g" $fic
sed -i "s/@@MYSQL_PASSWORD@@/$MYSQL_PASSWORD/g" $fic

RUN chown -R www-data:www-data /var/www/html

php /t.php > /var/www/html/plugins/Ldap_Login/data.dat

php-fpm

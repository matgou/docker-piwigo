echo "Delete des containers"
#docker rm -f piwigo-mariadb
docker rm -f piwigo-fpm
docker rm -f piwigo-nginx


echo "Run des container"
mkdir -p /tmp/data
sudo chmod 777 /tmp/data

mariadb=$(docker run --name piwigo-mariadb -d -e MYSQL_ALLOW_EMPTY_PASSWORD=yes -e MARIADB_USER=piwigo -e MARIADB_PASSWORD=piwigo -e MYSQL_DATABASE=piwigo mariadb)
echo "mariadb: $mariadb"

fpm=$( docker run -d -v /tmp/data:/var/www/html/_data --name piwigo-fpm --link piwigo-mariadb:piwigo-mariadb -e MYSQL_DATABASE=photos_piwigo -e MYSQL_USER=piwigou -e MYSQL_PASSWORD=piwigo -e MYSQL_HOST=piwigo-mariadb -e LDAP_HOST=ldap.kapable.info -e LDAP_BASE_DN=dc=kapable,dc=info -e LDAP_PORT=10389 -e LDAP_BIND_PW=553324896296c532d444 -e LDAP_BIND_DN=cn=admin,dc=kapable,dc=info registry.kapable.info/piwigo-fpm )
echo "fpm: $fpm"

nginx=$( docker run -d -v /tmp/data:/var/www/html/_data/ --name piwigo-nginx --link piwigo-fpm:piwigo-fpm -e FPM_HOST=piwigo-fpm:9000 registry.kapable.info/piwigo-nginx )
echo "nginx: $nginx"
echo "=> http://"$( docker inspect $nginx | jq ".[0].NetworkSettings.Networks.bridge.IPAddress" | sed 's/"//g' )

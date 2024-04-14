docker rm -f piwigo
docker pull europe-west1-docker.pkg.dev/infra-rhino-386109/docker-piwigo/piwigo:latest
docker run -p 8080:80 \
	-e MYSQL_DATABASE=photos_piwigo \
	-e MYSQL_USER=root \
	-e MYSQL_PASSWORD=root \
	-e  MYSQL_PORT=3306 \
	-e MYSQL_HOST=172.17.0.2 \
	-v $(pwd)/photos/galleries:/var/www/html/galleries \
	-v $(pwd)/photos/_data:/var/www/html/_data \
	-v $(pwd)/photos/uploads:/var/www/html/upload \
	--name piwigo \
	europe-west1-docker.pkg.dev/infra-rhino-386109/docker-piwigo/piwigo:latest

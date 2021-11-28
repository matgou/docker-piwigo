version = 1.0.0
containers = piwigo-nginx piwigo-fpm

all: $(containers)

login:
#	aws ecr get-login-password --region eu-west-2 | docker login --username AWS --password-stdin 539826291712.dkr.ecr.eu-west-2.amazonaws.com 

#latest-fr_FR.tar.gz:
#	curl https://fr.wordpress.org/latest-fr_FR.tar.gz > ./latest-fr_FR.tar.gz

$(containers):
	for c in $(containers); do docker build . -f Dockerfile-$$c -t registry.kapable.info/$$c; done
 


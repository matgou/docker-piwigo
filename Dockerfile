FROM php:8.0-apache
LABEL kapable.info/author Mathieu GOULIN <mathieu.goulin@gadz.org>
ARG PIWIGO_VERSION=14.3.0

ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/
RUN chmod 755 /usr/local/bin/install-php-extensions

RUN apt-get update && \
    apt-get install -y zip imagemagick && \
    rm -rf /var/lib/apt/lists/* && \
    install-php-extensions gd && \
    install-php-extensions iconv && \
    install-php-extensions mysqli && \
    install-php-extensions exif && \
    install-php-extensions ldap

# Add php customization
ADD ./php-piwigo.ini /usr/local/etc/php/conf.d/piwigo.ini

# Add src
ADD https://github.com/Piwigo/Piwigo/archive/refs/tags/${PIWIGO_VERSION}.zip /var/www/
RUN cd /var/www/ && unzip /var/www/${PIWIGO_VERSION}.zip && rm -rf html && mv Piwigo-* html 

ADD  https://github.com/Kipjr/Ldap_Login/archive/refs/heads/master.zip /var/www/Ldap_Login.zip
RUN cd /var/www/html/plugins && unzip -o /var/www/Ldap_Login.zip && mv Ldap_Login* Ldap_Login

ADD  https://github.com/Piwigo/AdminTools/archive/refs/heads/master.zip /var/www/AdminTools.zip
RUN cd /var/www/html/plugins && unzip -o /var/www/AdminTools.zip && mv AdminTools* AdminTools

ADD  https://github.com/Piwigo/piwigo-tscroller/archive/refs/heads/master.zip /var/www/rv_tscroller.zip
RUN cd /var/www/html/plugins && unzip -o /var/www/rv_tscroller.zip && mv piwigo-tscroller-* rv_tscroller

ADD  https://github.com/plegall/Piwigo-GThumb/archive/refs/heads/master.zip /var/www/gthumb.zip
RUN cd /var/www/html/plugins && unzip -o /var/www/gthumb.zip && mv Piwigo-GThumb-*/  GThumb

ADD  https://github.com/Piwigo/piwigo-bootstrap-darkroom/archive/refs/heads/master.zip /var/www/bootstrap_darkroom.zip
RUN cd /var/www/html/themes && unzip -o /var/www/bootstrap_darkroom.zip && mv piwigo-bootstrap-darkroom-* bootstrap_darkroom

ADD database.inc.php /var/www/html/local/config/database.inc.php
ADD jo-mat /var/www/html/template-extension/jo-mat
ADD picture_nav.tpl /var/www/html/themes/bootstrap_darkroom/template/picture_nav.tpl
ADD _photoswipe_js.tpl /var/www/html/themes/bootstrap_darkroom/template/_photoswipe_js.tpl
ADD custom.css /var/www/html/local/bootstrap_darkroom/custom.css

RUN mkdir -p /var/www/html/_data /var/www/html/galleries /var/www/html/upload && \
    chmod 777 /var/www/html/_data /var/www/html/galleries /var/www/html/upload

ENV  MYSQL_DATABASE=photos_piwigo
ENV  MYSQL_USER=root
ENV  MYSQL_PASSWORD=root
ENV  MYSQL_PORT=3306
ENV  MYSQL_HOST=127.0.0.1

VOLUME [ "/var/www/html/galleries" ]
VOLUME [ "/var/www/html/upload" ]
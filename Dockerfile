FROM piwigo/piwigo:latest
LABEL kapable.info/author="Mathieu GOULIN <mathieu.goulin@gadz.org>"

# Add php customization
COPY php-piwigo.ini /etc/php84/conf.d/piwigo.ini

# Install custom plugins directly into the source directory
RUN mkdir -p /var/www/source/piwigo/plugins && \
    curl -L https://github.com/Piwigo/AdminTools/archive/refs/heads/master.zip -o /tmp/AdminTools.zip && \
    unzip -o /tmp/AdminTools.zip -d /var/www/source/piwigo/plugins && \
    mv /var/www/source/piwigo/plugins/AdminTools-master /var/www/source/piwigo/plugins/AdminTools && \
    curl -L https://github.com/Piwigo/piwigo-tscroller/archive/refs/heads/master.zip -o /tmp/tscroller.zip && \
    unzip -o /tmp/tscroller.zip -d /var/www/source/piwigo/plugins && \
    mv /var/www/source/piwigo/plugins/piwigo-tscroller-master /var/www/source/piwigo/plugins/rv_tscroller && \
    curl -L https://github.com/plegall/Piwigo-GThumb/archive/refs/heads/master.zip -o /tmp/gthumb.zip && \
    unzip -o /tmp/gthumb.zip -d /var/www/source/piwigo/plugins && \
    mv /var/www/source/piwigo/plugins/Piwigo-GThumb-master /var/www/source/piwigo/plugins/GThumb && \
    curl -L https://github.com/jasperweyne/PiwigoOpenIdConnect/releases/download/v1.0.4/OpenIdConnect.zip -o /tmp/OIDC.zip && \
    unzip -o /tmp/OIDC.zip -d /var/www/source/piwigo/plugins && \
    rm /tmp/*.zip

# Copy our custom lightweight child theme (based on Modus)
RUN mkdir -p /var/www/source/piwigo/themes/jo-mat-theme
COPY themes/jo-mat-theme /var/www/source/piwigo/themes/jo-mat-theme

# Fix Modus child-theme incompatibility by providing the JS files it expects in the active theme folder
RUN mkdir -p /var/www/source/piwigo/themes/jo-mat-theme/js && \
    cp /var/www/source/piwigo/themes/modus/js/modus.async.js /var/www/source/piwigo/themes/jo-mat-theme/js/ && \
    cp /var/www/source/piwigo/themes/modus/js/menuh.js /var/www/source/piwigo/themes/jo-mat-theme/js/ && \
    cp /var/www/source/piwigo/themes/modus/js/thumb.arrange.min.js /var/www/source/piwigo/themes/jo-mat-theme/js/

# Add the runtime initialization script
RUN mkdir -p /usr/local/bin/scripts/
COPY entrypoint.sh /usr/local/bin/scripts/user.sh
RUN chmod +x /usr/local/bin/scripts/user.sh

# Bypass the heavy permission check at startup (unsuitable for Cloud Run with GCS fuse)
RUN sed -i 's/setfacl /true /g' /init-script.sh && \
    sed -i 's/find /true /g' /init-script.sh

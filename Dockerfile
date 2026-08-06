FROM piwigo/piwigo:latest
LABEL kapable.info/author="Mathieu GOULIN <mathieu.goulin@gadz.org>"

# Add php customization
COPY php-piwigo.ini /etc/php84/conf.d/piwigo.ini

# Install custom plugins
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
    rm /tmp/*.zip

# Copy our locally hosted and patched OpenIdConnect plugin
COPY plugins/OpenIdConnect /var/www/source/piwigo/plugins/OpenIdConnect

# Copy our custom lightweight child theme (based on Modus)
RUN mkdir -p /var/www/source/piwigo/themes/jo-mat-theme
COPY themes/jo-mat-theme /var/www/source/piwigo/themes/jo-mat-theme

# Fix Modus child-theme incompatibility by copying all JS files from modus
RUN mkdir -p /var/www/source/piwigo/themes/jo-mat-theme/js && \
    cp -r /var/www/source/piwigo/themes/modus/js/* /var/www/source/piwigo/themes/jo-mat-theme/js/

# Add the runtime initialization script
RUN mkdir -p /usr/local/bin/scripts/
COPY entrypoint.sh /usr/local/bin/scripts/user.sh
RUN chmod +x /usr/local/bin/scripts/user.sh

# Bypass the heavy permission check at startup (unsuitable for Cloud Run with GCS fuse)
RUN sed -i 's/setfacl /true /g' /init-script.sh && \
    sed -i 's/find /true /g' /init-script.sh

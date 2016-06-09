FROM aliem/base

ENV ADMINER_VERSION 4.2.5

RUN apk-install \
      php-cgi \
      php-cli \
      php-pdo \
      php-pdo_odbc \
      php-pdo_pgsql \
      php-pdo_mysql \
      php-pdo_sqlite \
      php-pdo_dblib

ADD index.php /app/adminer/
ADD adminer.css /app/adminer/

RUN \
    mkdir -p /app/adminer/plugins &&\
    adduser -D -h /app app app &&\
    curl https://www.adminer.org/static/download/${ADMINER_VERSION}/adminer-${ADMINER_VERSION}.php > /app/adminer/adminer.php &&\
    curl https://raw.githubusercontent.com/vrana/adminer/master/plugins/plugin.php > /app/adminer/plugins/plugin.php &&\
    curl https://raw.githubusercontent.com/vrana/adminer/master/plugins/foreign-system.php > /app/adminer/plugins/foreign-system.php &&\
    curl https://raw.githubusercontent.com/vrana/adminer/master/plugins/edit-foreign.php > /app/adminer/plugins/edit-foreign.php &&\
    curl https://gist.githubusercontent.com/raw/821510/convention-foreign-keys.php > /app/adminer/plugins/convention-foreign-keys.php &&\
    chown -R app:app /app

WORKDIR /app

EXPOSE 8080

ENTRYPOINT ["/sbin/tini"]
CMD ["dosu", "app", "php", "-S", "0.0.0.0:8080", "-t", "/app"]


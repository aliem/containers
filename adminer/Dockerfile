FROM aliem/base

ENV ADMINER_VERSION 4.2.4

RUN apk-install \
      php-cgi \
      php-cli \
      php-pdo \
      php-pdo_odbc \
      php-pdo_pgsql \
      php-pdo_mysql \
      php-pdo_sqlite \
      php-pdo_dblib

ADD index.html /app/index.html

RUN \
    mkdir -p /app &&\
    adduser -D -h /app app app &&\
    curl https://www.adminer.org/static/download/${ADMINER_VERSION}/adminer-${ADMINER_VERSION}.php > /app/adminer.php &&\
    curl https://www.adminer.org/static/download/${ADMINER_VERSION}/editor-${ADMINER_VERSION}.php > /app/editor.php &&\
    chown -R app:app /app

WORKDIR /app

EXPOSE 8080

CMD ["dosu", "app", "php", "-S", "0.0.0.0:8080", "-t", "/app"]


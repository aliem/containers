# Minimalistic image based on Alpine
FROM alpine:edge

RUN apk add --update wget bash tar git libgcc libstdc++; \
    mkdir -p /app;

ENV NODE_PREFIX=/usr/local \
    NODE_VERSION=5.4.1 \
    NODE_ENV=production

RUN NODE_SOURCE="/usr/src/node"; \
    DOWNLOAD_PATH=https://nodejs.org/dist/v${NODE_VERSION}/node-v${NODE_VERSION}.tar.gz; \
    apk add --update --virtual build-deps make gcc g++ python linux-headers paxctl binutils-gold &&\
    mkdir -p $NODE_SOURCE && \
    wget -O - $DOWNLOAD_PATH -nv | tar -xz --strip-components=1 -C $NODE_SOURCE && \
    cd $NODE_SOURCE && \
    ./configure --prefix=$NODE_PREFIX && \
    make -j$(grep -c ^processor /proc/cpuinfo 2>/dev/null || 1) && \
    make install && \
    paxctl -cm ${NODE_PREFIX}/bin/node && \
    cd / && \
    npm config set cache /tmp/npm --global \
    apk del build-deps &&\
    rm -rf \
        ${NODE_SOURCE} \
        /etc/ssl \
        ${NODE_PREFIX}/include \
        ${NODE_PREFIX}/share/man \
        /tmp/* \
        /var/cache/apk/* \
        /root/.npm \
        /root/.node-gyp \
        ${NODE_PREFIX}/lib/node_modules/npm/man \
        ${NODE_PREFIX}/lib/node_modules/npm/doc \
        ${NODE_PREFIX}/lib/node_modules/npm/html \
        ;

WORKDIR /app

ONBUILD ADD package.json /app

ONBUILD RUN apk add build-deps &&\
    cd /app && \
    ${NODE_PREFIX}/bin/npm install --production &&\
    apk del build-deps &&\
    rm -rf /tmp/* \
        /root/.npm \
        /root/.node-gyp

ONBUILD ADD . /app

CMD ["node", "index"]

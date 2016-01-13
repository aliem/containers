FROM alpine:3.2

ENV NODE_VERSION=v5.4.0 NPM_VERSION=3

RUN apk add --update git curl make gcc g++ python linux-headers libgcc libstdc++ binutils-gold && \
    curl -sSL https://nodejs.org/dist/${NODE_VERSION}/node-${NODE_VERSION}.tar.gz | tar -xz && \
    cd /node-${NODE_VERSION} && \
    ./configure --prefix=/usr --without-snapshot --fully-static && \
    make -j$(grep -c ^processor /proc/cpuinfo 2>/dev/null || 1) && \
    make install && \
    cd / && \
    npm install -g npm@${NPM_VERSION} && \
    rm -rf /node-${NODE_VERSION} \
    /usr/share/man /tmp/* /var/cache/apk/* /root/.npm /root/.node-gyp \
    /usr/lib/node_modules/npm/man /usr/lib/node_modules/npm/doc /usr/lib/node_modules/npm/html


RUN mkdir -p /app
WORKDIR /app

ONBUILD ADD ./package.json /app

ONBUILD RUN npm install --production && npm cache clear

ONBUILD ADD . /app

ONBUILD EXPOSE 3000

# setup different containers
CMD ["node", "/app/"]

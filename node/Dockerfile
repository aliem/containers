# Minimalistic image based on Alpine
FROM alpine:3.4

RUN apk add --update --no-cache \
        ca-certificates \
        nodejs \
        &&\
    mkdir -p /app;

WORKDIR /app

ONBUILD ADD package.json /app

ONBUILD RUN cd /app && \
    ${NODE_PREFIX}/bin/npm install --production &&\
    rm -rf /tmp/* \
        /root/.npm \
        /root/.node-gyp

ONBUILD ADD . /app

CMD ["node", "index"]

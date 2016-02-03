FROM alpine:3.3

# install needed packages
RUN apk add --update redis \
    && rm -rf /var/cache/apk/*

ENTRYPOINT "/usr/bin/redis-server"

EXPOSE 6379

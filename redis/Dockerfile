FROM aliem/base

# install needed packages
RUN apk-add redis
ENTRYPOINT ["/sbin/tini", "--", "/usr/bin/redis-server"]
EXPOSE 6379

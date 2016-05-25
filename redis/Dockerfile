FROM aliem/base

# install needed packages
RUN apk-add redis
ENTRYPOINT ["/usr/bin/tini", "--", "/usr/bin/redis-server"]
EXPOSE 6379

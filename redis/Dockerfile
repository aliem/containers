FROM aliem/base

# install needed packages
RUN apk-install redis &&\
    mkdir /data && chown -R redis /data

WORKDIR "/data"

ENTRYPOINT ["/sbin/tini", "--"]
CMD ["dosu", "redis", "/usr/bin/redis-server"]
EXPOSE 6379

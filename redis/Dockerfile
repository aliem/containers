FROM aliem/base

WORKDIR "/data"
EXPOSE 6379

ADD run.sh /run.sh

# install needed packages
RUN apk-install redis &&\
    mkdir -p /data && chown -R redis /data &&\
    chmod +x /run

ENTRYPOINT ["/sbin/tini", "--"]
CMD ["/run.sh"]

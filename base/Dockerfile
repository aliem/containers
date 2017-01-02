FROM alpine:3.4

ADD dosu /usr/bin/dosu
ADD apk-install /usr/bin/apk-install

RUN apk-install tini

RUN chmod +x /usr/bin/dosu /usr/bin/apk-install && \
    apk-install ca-certificates curl

ENTRYPOINT ["/sbin/tini", "--"]
CMD ['/bin/sh']

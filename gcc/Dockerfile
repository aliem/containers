FROM alpine:3.3

RUN \
	apk update &&\
	apk add --update --virtual build-deps make gcc g++ python linux-headers paxctl binutils-gold

CMD ["/bin/ash"]

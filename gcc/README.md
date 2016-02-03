I love it to compile stuff without juggling with SConstruct or Makefiles.

	docker run --rm -it -v $PWD:/src -w="/src" aliem/gcc /bin/ash -c "./configure && make"

And ...

	FROM alpine:3.3
	ADD ./src/command /
	CMD ["/command"]


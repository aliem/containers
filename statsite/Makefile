STATSITE_REPO=https://github.com/armon/statsite.git
DIR := $(shell dirname $(realpath $(lastword $(MAKEFILE_LIST))))
UID := $(shell id -u $(USER))

src:
	git clone $(STATSITE_REPO) --depth=1 src

src/statsite: src
	echo $(UID)
	docker run -v $(DIR)/src:/src -e "UID=$(UID)" -w "/src" -it aliem/gcc /bin/ash -c 'apk add --update scons && cd /src && make && chown ${UID} statsite *.a'

docker: src/statsite
	../build $(shell cat VERSION)

all: docker

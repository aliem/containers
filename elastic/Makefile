VERSION=2.1.1

all: build
	echo "Done"

run:
	docker run -it -p 9200:9200 aliem/elastic:$(VERSION)

gosu:
	curl -o gosu -fsSL https://github.com/tianon/gosu/releases/download/1.7/gosu-amd64

elasticsearch-$(VERSION).tar.gz:
	curl https://download.elasticsearch.org/elasticsearch/release/org/elasticsearch/distribution/tar/elasticsearch/$(VERSION)/elasticsearch-$(VERSION).tar.gz > $@

elasticsearch: elasticsearch-$(VERSION).tar.gz
	tar zxf $<
	mv elasticsearch-$(VERSION) elasticsearch

build: gosu elasticsearch
	bash ../build $(VERSION)

.PHONY: run build

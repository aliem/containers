FROM aliem/java

ENV ES_VERSION 2.2.0
ENV ES_HOME=/opt/elasticsearch-2.2.0
ENV ES_LIB=/var/lib/elasticsearch
ENV ES_USER=elasticsearch

ADD ./start.sh /start.sh

RUN \
	mkdir -p $ES_LIB /opt &&\
	curl -o /usr/bin/gosu -fsSL https://github.com/tianon/gosu/releases/download/1.7/gosu-amd64 &&\
	chmod +x /usr/bin/gosu &&\
	curl -fsSL \
	https://download.elasticsearch.org/elasticsearch/release/org/elasticsearch/distribution/tar/elasticsearch/${ES_VERSION}/elasticsearch-${ES_VERSION}.tar.gz |\
	tar -C /opt/ -xzf - &&\
	adduser -h $ES_HOME -D $ES_USER &&\
	mkdir -p $ES_LIB &&\
	chown -R $ES_USER $ES_HOME &&\
	chown -R $ES_USER $ES_LIB

VOLUME ["/var/lib/elasticsearch"]

EXPOSE 9200
EXPOSE 9300

ENTRYPOINT "/start.sh"

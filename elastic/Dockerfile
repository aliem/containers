FROM aliem/java

ENV ES_VERSION 2.1.1
ENV ES_HOME=/opt/elasticsearch
ENV ES_LIB=/var/lib/elasticsearch
ENV ES_USER=elasticsearch

ADD ./start.sh /start.sh

RUN \
	curl -o /usr/bin/gosu -fsSL https://github.com/tianon/gosu/releases/download/1.7/gosu-amd64 &&\
	curl https://download.elasticsearch.org/elasticsearch/release/org/elasticsearch/distribution/tar/elasticsearch/${ES_VERSION}/elasticsearch-${VERSION}.tar.gz | tar zxf -C /tmp/ &&\
	mv /tmp/elasticsearch-${ES_VERSION} $ES_HOME &&\
	chmod +x /usr/bin/gosu &&\
	adduser -h $ES_HOME -D $ES_USER &&\
	mkdir -p $ES_LIB &&\
	chown -R $ES_USER $ES_HOME &&\
	chown -R $ES_USER $ES_LIB

VOLUME ["/var/lib/elasticsearch"]

EXPOSE 9200
EXPOSE 9300

CMD ["/start.sh"]

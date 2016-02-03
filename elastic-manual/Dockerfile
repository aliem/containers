FROM aliem/java

ENV ELASTICSEARCH_VERSION 2.1.1
ENV ES_HOME=/opt/elasticsearch
ENV ES_USER=elasticsearch


ADD ./gosu /usr/bin/gosu
ADD ./elasticsearch $ES_HOME
ADD ./elasticsearch.yml /opt/elasticsearch/config/elasticsearch.yml
ADD ./start.sh /start.sh

RUN \
	adduser -h $ES_HOME -D $ES_USER &&\
	mkdir -p /var/lib/elasticsearch &&\
	chown -R $ES_USER /opt/elasticsearch &&\
	chown -R $ES_USER /var/lib/elasticsearch

VOLUME ["/var/lib/elasticsearch"]

EXPOSE 9200
EXPOSE 9300

CMD ["/start.sh"]

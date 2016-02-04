FROM kibana:4

RUN \
	gosu kibana kibana plugin --install elastic/sense &&\
	gosu kibana kibana plugin --install elastic/timelion

CMD ["kibana"]

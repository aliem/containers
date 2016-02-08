FROM aliem/base:latest
RUN \
	apk-install py-pip &&\
	mkdir -p /app

WORKDIR /app

ONBUILD ADD requirements.txt /app
ONBUILD RUN pip install -r requirements.txt
ONBUILD ADD . /app

ONBUILD CMD ["python","main"]

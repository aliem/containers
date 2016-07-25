FROM scratch
ADD https://curl.haxx.se/ca/cacert.pem /etc/ssl/certs/ca-certificates.crt
ADD https://s3.amazonaws.com/amazon-ecs-cli/ecs-cli-linux-amd64-latest /ecs-cli
ENTRYPOINT "/ecs-cli"
CMD ["--version"]

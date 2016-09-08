#!/bin/sh
set -e

CONFIG_FILE=${CONFIG_FILE:-/redis.conf}
if [[ -f $CONFIG_FILE ]]; then
    exec redis-server $CONFIG_FILE
else
    exec redis-server
fi

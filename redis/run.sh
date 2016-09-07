#!/bin/sh
set -e

CONFIG=${CONFIG:-/redis.conf}
CMD="dosu ${USERNAME} redis-server $@"

if [[ -f $CONFIG ]]; then
    exec redis-server -c $CONFIG
else
    exec redis-server
fi

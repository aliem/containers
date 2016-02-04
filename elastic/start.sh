#!/bin/sh
set -e

pids=""

mapmax=`cat /proc/sys/vm/max_map_count`
filemax=`cat /proc/sys/fs/file-max`

fds=`ulimit -n`
if [ "$fds" -lt "64000" ] ; then
    echo "ES recommends 64k open files per process. you have "`ulimit -n`
    echo "the docker deamon should be run with increased file descriptors to increase those available in the container"
    echo " try \`ulimit -n 64000\`"
fi

fixperm() {
    chown -R $ES_USER $ES_HOME
    chown -R $ES_USER $ES_LIB
}

onexit() {
    echo "SIGINT received"
    echo "sending SIGTERM to all processes"
    kill $pid
    sleep 1
}

main() {
    trap onexit INT TERM
    /usr/bin/gosu ${ES_USER} ${ES_HOME}/bin/elasticsearch -Des.path.home=${ES_LIB} -Dnetwork.host=_non_loopback_ $@ &
    pid="$(jobs -p %%)"
}

fixperm
main $@

wait $pid

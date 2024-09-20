#/bin/bash

for p in `cat primarios.txt |grep -v "#"`
do
scp Copy*.sh root@$p:/etc/.
done

for s in `cat secundarios.txt |grep -v "#"`
do
scp Drop*.sh root@$s:/etc/.
done

#/bin/bash

for p in `cat $1 |grep -v "#"`
do
clear
echo "Atualizando chaves no " $p
./updatekeys.exp $p
echo "Finalizado!"
sleep 2
clear
done

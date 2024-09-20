#!/bin/bash

HoDt=`xe host-list |grep -A1 -B2 xen2 |grep name-label |awk '{print $4}'`
SrDt=`xe sr-list host=$HoDt |grep -A1 -B2 Local |grep uuid |awk '{print $5}'`
Logs=/root/copyvms.log

echo "" > $Logs
echo "#### Processo de execucao em `date '+%a %d %b %H:%M'` `hostname` ####"  >> $Logs
echo " "
echo " "
echo " "
echo " "
echo "Inicio dos desligamentos do FS - `date '+%a %d %b %H:%M'`" >> $Logs
echo " "
echo " "
echo "Desligando File Server - `date '+%a %d %b %H:%M'`" >> $Logs
xe vm-shutdown vm=Pr-FS --force >> $Logs
sleep 30
echo "Status do File server: `xe vm-list name-label=Pr-FS |grep 'power-state' |awk '{print $4}'`" >> $Logs
echo " "
echo " "

echo "Inicio das copias do FS - `date '+%a %d %b %H:%M'`" >> $Logs
echo " "
echo " "

echo "Copiando File Server - `date '+%a %d %b %H:%M'`" >> $Logs
xe vm-copy vm=Pr-FS sr-uuid=$SrDt new-name-label=Se-FS new-name-description="File Server"  >> $Logs
echo "File Server Copiado com exito!" >> $Logs
echo " "
echo " "
echo " "
echo "`xe vm-list is-control-domain=false`"  >> $Logs
echo " "
echo " "
echo "#### Processo de copia finalizada em `date '+%a %d %b %H:%M'` ####"  >> $Logs
echo " "
echo " "
echo " "
echo " "
echo " "
echo " "


echo "Inicializando o FS no Xen Primario - `date '+%a %d %b %H:%M'`" >> $Logs
echo " "
echo " "


echo "Inicializando File Server" >> $Logs
sleep 5
xe vm-start vm=Pr-FS  >> $Logs
sleep 120
echo "Status do File Server: `xe vm-list name-label=Pr-FS |grep 'power-state' |awk '{print $4}'`" >> $Logs
echo " "
xe vm-list name-label=Pr-FS  >> $Logs
echo " "
echo " "
echo " "
echo " "

echo "#### Processo de vMotion finalizado em `date '+%a %d %b %H:%M'` ####"  >> $Logs

cat /root/copyvms.log |mail -v -r "alerta@covabra.com.br" -s "Copia do FS `hostname` em `date '+%a %d %b'`" -S smtp="smtp.houseti.com.br:587" -S smtp-auth=login -S smtp-auth-user="alerta@covabra.com.br" -S smtp-auth-password="Covabra@2018" -S ssl-verify=ignore ti@covabra.com.br

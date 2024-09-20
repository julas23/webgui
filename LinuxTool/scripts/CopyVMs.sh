#!/bin/bash

HoDt=`xe host-list |grep -A1 -B2 xen2 |grep name-label |awk '{print $4}'`
SrDt=`xe sr-list host=$HoDt |grep -A1 -B2 Local |grep uuid |awk '{print $5}'`
Logs=/root/copyvms.log

echo "" > $Logs
echo "#### Processo de execucao em `date '+%a %d %b %H:%M'` no `hostname` ####"  >> $Logs
echo " "
echo " "
echo " "
echo " "
echo " "
echo " "


echo "Inicio dos desligamentos das VMs - `date '+%a %d %b %H:%M'`" >> $Logs
echo " "
echo " "
echo "Desligando Balanca Principal - `date '+%a %d %b %H:%M'`" >> $Logs
xe vm-shutdown vm=Pr-Bal-Pri --force >> $Logs
sleep 30
echo "Status da Balanca Principal: `xe vm-list name-label=Pr-Bal-Pri |grep 'power-state' |awk '{print $4}'`" >> $Logs
echo " "
echo " "

echo "Desligando Balanca Rastreabilidade - `date '+%a %d %b %H:%M'`" >> $Logs
xe vm-shutdown vm=Pr-Bal-Ras --force >> $Logs
sleep 30
echo "Status da Balanca Rastreabilidade: `xe vm-list name-label=Pr-Bal-Ras |grep 'power-state' |awk '{print $4}'`" >> $Logs
echo " "
echo " "

echo "Desligando File Server - `date '+%a %d %b %H:%M'`" >> $Logs
xe vm-shutdown vm=Pr-FS --force >> $Logs
sleep 30
echo "Status do File server: `xe vm-list name-label=Pr-FS |grep 'power-state' |awk '{print $4}'`" >> $Logs
echo " "
echo " "

echo "Desligando RUB Server - `date '+%a %d %b %H:%M'`" >> $Logs
xe vm-shutdown vm=Pr-RUB --force >> $Logs
sleep 30
echo "Status do RUB: `xe vm-list name-label=Pr-RUB |grep 'power-state' |awk '{print $4}'`" >> $Logs
echo " "
echo " "
echo "Finalizado os desligamentos: `date '+%a %d %b %H:%M'`" >> $Logs
echo " "
echo " "
echo " "
echo " "
echo " "
echo " "

echo "Inicio das copias das VMs - `date '+%a %d %b %H:%M'`" >> $Logs
echo " "
echo " "

echo "Copiando Balanca Principal - `date '+%a %d %b %H:%M'`" >> $Logs
xe vm-copy vm=Pr-Bal-Pri sr-uuid=$SrDt new-name-label=Se-Bal-Pri new-name-description="Balanca Principal"  >> $Logs
echo "Balanca Principal Copiada com exito!" >> $Logs
echo " "
echo " "

echo "Copiando Balanca Rastreabilidade - `date '+%a %d %b %H:%M'`" >> $Logs
xe vm-copy vm=Pr-Bal-Ras sr-uuid=$SrDt new-name-label=Se-Bal-Ras new-name-description="Balanca Rastreabilidade"  >> $Logs
echo "Balanca Rastreabilidade Copiada com exito!" >> $Logs
echo " "
echo " "

echo "Copiando Balanca File Server - `date '+%a %d %b %H:%M'`" >> $Logs
xe vm-copy vm=Pr-FS sr-uuid=$SrDt new-name-label=Se-FS new-name-description="File Server"  >> $Logs
echo "File Server Copiado com exito!" >> $Logs
echo " "
echo " "

echo "Copiando RUB Server - `date '+%a %d %b %H:%M'`" >> $Logs
xe vm-copy vm=Pr-RUB sr-uuid=$SrDt new-name-label=Se-RUB new-name-description="RUB"  >> $Logs
echo "RUB Copiado com exito!" >> $Logs
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


echo "Inicializando as VMs no Xen Primario - `date '+%a %d %b %H:%M'`" >> $Logs
echo " "
echo " "


echo "Inicializando Balanca Principal" >> $Logs
sleep 5
xe vm-start vm=Pr-Bal-Pri  >> $Logs
sleep 120
echo "Status da Balanca Principal: `xe vm-list name-label=Pr-Bal-Pri |grep 'power-state' |awk '{print $4}'`" >> $Logs
echo " "
xe vm-list name-label=Pr-Bal-Pri  >> $Logs
echo " "
echo " "

echo "Inicializando Balanca Rastreabilidade" >> $Logs
sleep 5
xe vm-start vm=Pr-Bal-Ras  >> $Logs
sleep 120
echo "Status da Balanca de Rastreabilidade: `xe vm-list name-label=Pr-Bal-Ras |grep 'power-state' |awk '{print $4}'`" >> $Logs
echo " "
xe vm-list name-label=Pr-Bal-Ras  >> $Logs
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


echo "Inicializando RUB" >> $Logs
sleep 5
xe vm-start vm=Pr-RUB  >> $Logs
sleep 120
echo "Status do RUB: `xe vm-list name-label=Pr-RUB |grep 'power-state' |awk '{print $4}'`" >> $Logs
echo " "
xe vm-list name-label=Pr-RUB  >> $Logs
echo " "
echo " "
echo " "
echo " "
echo " "
echo " "

echo "#### Processo de vMotion finalizado em `date '+%a %d %b %H:%M'` ####"  >> $Logs

cat /root/copyvms.log |mail -v -r "alerta@covabra.com.br" -s "Copia das VMS `hostname` em `date '+%a %d %b'`" -S smtp="smtp.houseti.com.br:587" -S smtp-auth=login -S smtp-auth-user="alerta@covabra.com.br" -S smtp-auth-password="Covabra@2018" -S ssl-verify=ignore ti@covabra.com.br

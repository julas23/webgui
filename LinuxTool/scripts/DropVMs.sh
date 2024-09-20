#!/bin/bash
Logs=/root/dropvms.log
echo "" > $Logs

echo "#### Processo de execucao em `date '+%a %d %b %H:%M'` no `hostname` ####"  >> $Logs
echo " "
echo " "
echo "Inicio da remocao das VMs `date '+%a %d %b %H:%M'`" >> $Logs
echo " "
echo "Removendo Se-Bal-Pri" >> $Logs
xe vm-uninstall vm=Se-Bal-Pri force=true  >> $Logs
echo "Se-Bal-Pri removida com sucesso!" >> $Logs
echo " "
echo " "
echo " "
echo " "
echo "Removendo Se-Bal-Ras" >> $Logs
xe vm-uninstall vm=Se-Bal-Ras force=true >> $Logs
echo "Se-Bal-Ras removida com sucesso!" >> $Logs
echo " "
echo " "
echo " "
echo " "
echo "Removendo Se-FS" >> $Logs
xe vm-uninstall vm=Se-FS force=true >> $Logs
echo "Se-FS removida com sucesso!" >> $Logs
echo " "
echo " "
echo " "
echo " "
echo "Removendo Se-RUB" >> $Logs
xe vm-uninstall vm=Se-RUB force=true >> $Logs
echo "Se-RUB removida com sucesso!" >> $Logs
echo " "
echo " "
echo " "
echo " "

echo "Secundarias"
echo "`xe vm-list is-control-domain=false | grep -A1 -B2 Se-`" >> $Logs
echo " "
echo " "
echo " "
echo " "

cat $Logs | mail -v -r "alerta@covabra.com.br" -s "Remocao das VMS `hostname` em `date '+%a %d %b'`" -S smtp="smtp.houseti.com.br:587" -S smtp-auth=login -S smtp-auth-user="alerta@covabra.com.br" -S smtp-auth-password="Covabra@2018" -S ssl-verify=ignore ti@covabra.com.br

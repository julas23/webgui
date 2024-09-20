#!/bin/bash

echo "" > /var/www/html/log/stdout.log

umount /lastlog/*
rm -rf /var/www/html/log/*/*

mntdir=/lastlog
logdir=/var/www/html/log
swedadir=/Sweda/Servid~1/log
stdout=/var/www/html/log/stdout.log

ip="192.168."
loja2="1.45";
loja3="3.223";
loja4="4.223";
loja5="5.223";
loja6="6.223";
loja7="7.223";
loja9="9.223";
loja10="10.223";
loja11="11.223";
loja12="12.223";
loja16="16.223";
loja17="17.223";
loja19="19.223";
loja20="20.223";
loja21="21.223";

function COMANDOS()
{
    echo "Iniciando Processo da Loja" $LJ
    echo "Iniciando Processo da Loja" $LJ >> $stdout
    LJDir=$LJ
    StMNT=$mntdir/$LJ
    if grep "$StMNT" /proc/mounts; then
        echo "Volume da Loja" $LJDir "Já montado" >> $stdout
    else
        echo "Montando LOG da Loja" $LJDir >> $stdout
        mount -t cifs -o ro,username=covabra,password=covabra //$ipbal $mntdir/$LJDir >> $stdout
        if [ $? -eq 0 ]; then
            sleep 1
            echo "Coletando linha do LOG " $LJDir >> $stdout
            echo "Loja" $LJDir > $logdir/$LJDir/TEMP.log 
            LINHA=`tail -500 /lastlog/$LJDir/log.txt |grep "Importacao finalizada. Apagando arquivo..." |tail -n1 >> $logdir/$LJDir/TEMP.log`
            DIA=`cat /var/www/html/log/$LJDir/TEMP.log |tail -n1 |cut -c 15-16`
            MES=`cat /var/www/html/log/$LJDir/TEMP.log |tail -n1 |cut -c 12-13`
            HOR=`cat /var/www/html/log/$LJDir/TEMP.log |tail -n1 |cut -c 18-25`
        else
            echo "Impossivel montar Volume da Loja" $LJDir >> $stdout
        fi
        if [ ! -f $logdir/$LJDir/LAST.log ]; then
            echo $DIA/$MES $HOR > $logdir/$LJDir/LAST.log
        else
            echo "Erro na coleta" $LJDir >> $logdir/$LJ/LAST.log
            echo "Desmontando Volume da Loja" $LJDir >> $stdout
            umount $mntdir/$LJDir
            if [ $? -eq 0 ]; then
                echo "Volume desmontado."
            else
                echo "Volume não desmontado."
                umount -f $mntdir/$LJDir
            fi
        fi
        DIA=""
        MES=""
        HOR=""
        LJDir=""
    fi
    echo "Finalizando Processo da Loja" $LJ
    echo ""
    echo ""
    echo "Finalizando Processo da Loja" $LJ >> $stdout
    echo "" >> $stdout
    echo "" >> $stdout
}

for LJ in {1..21};
do
    if [ $LJ -eq 2 ]; then
        sleep 2
        ipbal=$ip$loja2/log
        COMANDOS
    elif [ $LJ -eq 3 ]; then
        sleep 2
        ipbal=$ip$loja3/log
        COMANDOS
    elif [ $LJ -eq 4 ]; then
        sleep 2
        #ipbal=$ip$loja4 # TESTAR - Possível falha na porta 445
        COMANDOS
        echo "Falha Pt 445" > /var/www/html/log/4/LAST.log
    elif [ $LJ -eq 5 ]; then
        sleep 2
        ipbal=$ip$loja5/log
        COMANDOS
    elif [ $LJ -eq 6 ]; then
        sleep 2
        ipbal=$ip$loja6/log
        COMANDOS
    elif [ $LJ -eq 7 ]; then
        sleep 2
        ipbal=$ip$loja7$swedadir
        COMANDOS
    elif [ $LJ -eq 9 ]; then
        sleep 2
        #ipbal=$ip$loja9
        COMANDOS
        echo "GERTEC" > /var/www/html/log/9/LAST.log
    elif [ $LJ -eq 10 ]; then
        sleep 2
        ipbal=$ip$loja10/log
        COMANDOS
    elif [ $LJ -eq 11 ]; then
        sleep 2
        #ipbal=$ip$loja11 #TESTAR - Possível falha na porta 445
        COMANDOS
        echo "Falha Pt 445" > /var/www/html/log/11/LAST.log
    elif [ $LJ -eq 12 ]; then
        sleep 2
        ipbal=$ip$loja12$swedadir
        COMANDOS
    elif [ $LJ -eq 16 ]; then
        sleep 2
        #ipbal=$ip$loja16
        COMANDOS
        echo "GERTEC" > /var/www/html/log/16/LAST.log
    elif [ $LJ -eq 17 ]; then
        sleep 2
        ipbal=$ip$loja17/log
        COMANDOS
    elif [ $LJ -eq 19 ]; then
        sleep 2
        ipbal=$ip$loja19/log
        COMANDOS
    elif [ $LJ -eq 20 ]; then
        sleep 2
        ipbal=$ip$loja20/log
        COMANDOS
    elif [ $LJ -eq 21 ]; then
        sleep 2
        ipbal=$ip$loja21/log
        COMANDOS
    else 
        echo ""
   fi
 done

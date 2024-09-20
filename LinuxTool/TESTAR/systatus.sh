#!/bin/bash
clear
echo "System"
echo `uname -s` `cat /etc/lsb-release |grep DESCRIPT |cut -c 22-39` `uname -r` `uname -m`
echo ""
echo `uptime -p && uptime -s`
echo ""
echo ""
echo ""
echo "Apache2 Service Status"
echo `sh /etc/init.d/apache2 status |awk 'NR==5'`
echo ""
echo ""
echo ""

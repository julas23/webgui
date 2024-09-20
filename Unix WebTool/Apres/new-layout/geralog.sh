echo 'Apache 2.2'
service apache2 status
echo ''

echo 'MySql Server'
service mysql status
echo ''

echo 'Nagios 3'
service nagios3 status
echo ''

echo 'Ntop'
sh /etc/init.d/ntop start
echo ''

echo 'Samba'
service smbd status
echo ''

echo 'Netbios'
service nmbd status
echo ''

echo 'SSH Server'
service ssh status
echo ''

echo 'Webmin'
service webmin status
echo ''

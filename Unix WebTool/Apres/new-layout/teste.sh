# top -b |grep apache2 |grep -v grep |grep -v root |awk '{print $1,$2,$4,$5,$7}'

stapa=`service apache2 status`

echo '############################'
echo ''
echo 'Apache :' $stapa
echo ''
top -b |grep apache2 |grep -v grep |grep -v root |awk '{print $1,$2,$4,$5,$7}'
echo ''

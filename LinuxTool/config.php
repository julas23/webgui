<?php
    $dbname  = 'linuxtool';
    $dbuser  = 'juliano';
    $dbpass  = 'jas2305X';
    $dbhost  = '127.0.0.1';
    $dbtabl  = 't_admin';

    define('DB_SERVER', $dbhost);
    define('DB_USERNAME', $dbuser);
    define('DB_PASSWORD', $dbpass);
    define('DB_DATABASE', $dbname);

    // Estabelece uma conexão MySQLi
    $connect = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

    if (!$connect) {
        die("Erro ao conectar ao banco de dados: " . mysqli_connect_error());
    }

    $timestamp  = date('D M j y H:i');
    if (getenv('HTTP_CLIENT_IP')) { $ipaddress = getenv('HTTP_CLIENT_IP'); }
    else if(getenv('HTTP_X_FORWARDED_FOR')) { $ipaddress = getenv('HTTP_X_FORWARDED_FOR'); }
    else if(getenv('HTTP_X_FORWARDED')) { $ipaddress = getenv('HTTP_X_FORWARDED'); }
    else if(getenv('HTTP_FORWARDED_FOR')) { $ipaddress = getenv('HTTP_FORWARDED_FOR'); }
    else if(getenv('HTTP_FORWARDED')) { $ipaddress = getenv('HTTP_FORWARDED'); }
    else if(getenv('REMOTE_ADDR')) { $ipaddress = getenv('REMOTE_ADDR'); }
    else { $ipaddress = 'Desconhecido'; }
?>
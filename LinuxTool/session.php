<?php

include('config.php');
session_start();

$user_check = $_SESSION['login_user'];

$dbconn = mysqli_select_db($dbname, $connect);
$ses_sql = sprintf("select username from $dbtabl where username='$user_check';", mysqli_real_escape_string($myusername));
$result =  mysqli_query($ses_sql);
$row = mysqli_fetch_array($result,MYSQL_ASSOC);
$login_session = $row['username'];

echo "USER: ".$user_check."<br>";
echo "Login Session: ".$login_session."<br>";

if(!isset($_SESSION['login_user'])){ header("Location:login.php"); }
else { header("Location:startpage.php?username=$login_session"); }

?>

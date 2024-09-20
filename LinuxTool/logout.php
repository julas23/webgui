<?php
   session_start();
   mysql_close($connect);
   if(session_destroy()) {
      header("Location: login.php");
   }
?>

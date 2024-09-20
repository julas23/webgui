<?php
session_start();
include 'config.php';

$DBSTATUS = "<div style='color: lightgreen; display: inline;' align='right'>Ok</div>";

if (!$connect) {
    $error = "<center>Erro ao conectar em <font color='red'>$dbname</font></center>";
    $DBSTATUS = "<div style='color: orange; display: inline;' align='right'>Er</div>";
} else {
    $myusername = $_POST['username'];
    if (empty($myusername)) {
        $Uerror = "<font color='red'><strong>!</strong></font>";
    } else {
        $mypassword = $_POST['password'];
        if (empty($mypassword)) {
            $Perror = "<font color='red'><strong>!</strong></font>";
        } else {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Use declarações preparadas para evitar injeção de SQL
                $sql = "SELECT id FROM $dbtabl WHERE username=? AND passcode=?";
                $stmt = mysqli_prepare($connect, $sql);
                mysqli_stmt_bind_param($stmt, "ss", $myusername, $mypassword);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) >= 1) {
                    $_SESSION['login_user'] = $myusername;
                    header('location: session.php');
                    exit;
                } else {
                    $error = "<center>Usuário ou Senha Inválidos.</center>";
                }

                mysqli_stmt_close($stmt);
            }
        }
    }
}
?>

<html>
<head>
    <link href="img/style.css" rel="stylesheet" />
    <link rel="icon" href="img/favicon.ico" type="image/x-icon" />
</head>
<body font="courier-new">
    <div align="center">
        <div style="width: 300px; border: solid 1px #333333; background-color: white;" align="left">
            <table bgcolor="#333333" border="0" width="300">
                <tr>
                    <td>
                        <div style="color: #FFFFFF; padding: 3px;"><b>MySQL Database Status</b></div>
                    </td>
                    <td bgcolor="#333333" align="right"><b><?php echo $DBSTATUS; ?></b></td>
                </tr>
            </table>
            <div style="margin: 30px">
                <h2>Login:</h2>
                <form action="" method="POST">
                    <label>User : </label>
                    <input type="text" name="username" class="box" />
                    <div style='display:inline;'><?php echo $Uerror; ?></div>
                    <br /><br />
                    <label>Senha: </label>
                    <input type="password" name="password" class="box" />
                    <div style='display:inline;'><?php echo $Perror; ?></div>
                    <br /><br />
                    <center><input type="submit" value="Acessar"><br /></center>
                </form>
            </div>
        </div>
    </div>
    <?php echo "<center><a href=registra.htm target=_self>Registrar</a> / <a href=recupera.htm target=_top>Esqueci a senha</a></center>" ?>
    <br /><br />
    <center>
        <div style="width: 300px; font-size: 11px; color: #cc0000; margin-top: 10px" align="left"><?php echo $error; ?></div>
    </center>
</body>
</html>

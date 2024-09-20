<?php
include 'config.php'; // Inclua o arquivo de configuração do banco de dados

// Verifique se a conexão com o banco de dados está funcionando
if ($connect) {
    echo "Conexão com o banco de dados bem-sucedida.";
    // Agora você pode redirecionar para o login.php ou session.php
    // Por exemplo, redirecione para login.php
    header('location: login.php');
    exit;
} else {
    echo "Erro ao conectar ao banco de dados: " . mysqli_connect_error();
}
?>

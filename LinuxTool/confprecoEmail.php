<?php

// Inclui o arquivo class.phpmailer.php localizado na pasta class
require_once("/var/www/html/class/class.PHPMailer.php");
include 'confprecoGR.php';

// Inicia a classe PHPMailer
$mail = new PHPMailer(true);

// Define os dados do servidor e tipo de conexão
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->IsSMTP(); // Define que a mensagem será SMTP

try {
     $mail->Host        = 'smtp.houseti.com.br'; // Endereço do servidor SMTP (Autenticação, utilize o host smtp.seudomínio.com.br)
     $mail->SMTPAuth    = true;  // Usar autenticação SMTP (obrigatório para smtp.seudomínio.com.br)
     $mail->Port        = 587; //  Usar 587 porta SMTP
     $mail->Username    = 'alerta@covabra.com.br'; // Usuário do servidor SMTP (endereço de email)
     $mail->Password    = 'Covabra@2018'; // Senha do servidor SMTP (senha do email usado)
 
     //Define o remetente
     // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=    
     $mail->SetFrom('alerta@covabra.com.br', 'LinuxTool'); //Seu e-mail
     $mail->AddReplyTo('ti@covabra.com.br', 'Suporte'); //Seu e-mail
     $mail->Subject = 'Relatório de Preços nos PDVs'; //Assunto do e-mail
 
     //Define os destinatário(s)
     //=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
     $mail->AddAddress('juliano.santos@covabra.com.br', 'juliano.santos@covabra.com.br');
 
     ////Caso queira colocar o conteudo de um arquivo utilize o método abaixo ao invés da mensagem no corpo do e-mail.
     $mail->MsgHTML(file_get_contents('confprecoGR.php'));
 
     $mail->Send();
     echo "Mensagem enviada com sucesso</p>\n";        //caso apresente algum erro é apresentado abaixo com essa exceção.
}
catch (phpmailerException $e) {echo $e->errorMessage();} //Mensagem de erro costumizada do PHPMailer

?>

<?php

$to = "lucas.esteves.rocha@gmail.com";
$subject = "Email de Confirmação"; 
$message = "Clique no link para ativar sua conta."; 
$mail_sent = @mail( $to, $subject, $message);
echo $mail_sent ? "Mail sent" : "Mail failed";
?>


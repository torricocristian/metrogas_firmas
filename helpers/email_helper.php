<?php
function enviarMail($para, $asunto, $mensaje, $BC=''){  

  global $configuraciones;
  $configuracion = $configuraciones;
  

  require_once(_LIBRARY_PATH."phpmailer.class/class.phpmailer.php");
  $mail = new PHPMailer();      
    /*
  $mail->IsSMTP();
  $mail->CharSet = 'UTF-8';
  $mail->SMTPAuth   = true;
  $mail->SMTPSecure = "tls";
  $mail->Host       = "smtp.gmail.com";
  $mail->Port       = 587;
  $mail->Username   = "idearhosting.clientes@gmail.com";
  $mail->Password   = "Qt8BDaa9m4";   */


  $mail->Host = "localhost";  

  $mail->From = "nano@lionagency.com";  
  $mail->FromName = utf8_decode("Creative Thinkers");
  $mail->SetFrom("nano@lionagency.com", "Creative Thinkers");
  $mail->addReplyTo("nano@lionagency.com");
  $mail->AddAddress($para);  
  if($BC != '') $mail->AddCC($BC);  
  $mail->IsHTML(true);  
  $mail->Subject = utf8_decode($asunto); 

  $mensaje = utf8_decode($mensaje); 
  $body  = $mensaje;  
  $mail->Body = $body;        

  if($mail->Send()) return 1; else return 0;
}
?>
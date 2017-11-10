<?php
 require_once('lib/class.phpmailer.php');
 require_once('lib/class.smtp.php');
 require_once('db/conexion.php');    

 function validarUsuario($usuario, $clave) //$correo del medico
 {

//echo($clave);
   $valido = true;
  $mail = new PHPMailer();
  $mail->PluginDir = "lib/";
  $mail->Mailer = "smtp";
  $mail->Host = "smtp.office365.com";
  //$aux=$mail->SMTPDebug = 2;
  $mail->SMTPAuth = true;
  $mail->isHTML(true);
  $mail->Username = $usuario;
  $mail->Password = $clave;
  $mail->From = "prueba@labinteractiva.com";
  $mail->FromName = utf8_decode("Reporte Cardiovascular");
  //$mail->Timeout=30;
  $mail->AddAddress("pain581@hotmail.com"); //$correo del medico
  $mail->Subject = utf8_decode("Prueba");
  $mail->Body=utf8_decode( 
    "<!DOCTYPE html>
     <html lang='es' style='width: 100%;height: 100%; margin:0 auto;'>
     
     </html>");
      $separar = explode("@", $usuario);
      $nombre = $separar[1];
      if($nombre=="mail.escuelaing.edu.co"||$nombre=="escuelaing.edu.co"){
        if(!$mail->smtpConnect()) {
              $valido = false;
            }
            else {
              $valido=true;
            }

      }
      else{
        $valido=false;
      }

      return $valido;

 }

 
?>
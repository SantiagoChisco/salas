<?php
 require_once('lib/class.phpmailer.php');
 require_once('lib/class.smtp.php');
 require_once('db/conexion.php');    

 function validarUsuario($usuario, $clave) //$correo del medico
 {

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
  $mail->From = "Laboratorio De Informatica";
  $mail->FromName = utf8_decode("Reserva Laboratorio");
  //$mail->Timeout=30;
  $mail->AddAddress("pain581@hotmail.com"); 
  $mail->Subject = utf8_decode("Reserva Laboratorio");
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
function enviarCorreo($correoM,$usuario,$laboratorio,$horario,$materia,$fecha){
  
  $mail = new PHPMailer();
  $mail->PluginDir = "lib/";
  $mail->Mailer = "smtp";
  $mail->Host = "smtp.office365.com";

  $mail->SMTPAuth = true;
  $mail->Port = 25;
  //$mail->SMTPDebug = 1;
  $mail->isHTML(true);
  $mail->Username = "david.chisco@mail.escuelaing.edu.co";
  $mail->Password = "Uchiha2421";
  $mail->From = "david.chisco@mail.escuelaing.edu.co";
  $mail->FromName = utf8_decode("Laboratorio De Informatica");
  $mail->Timeout=30;
  $mail->AddAddress($correoM);
  $mail->Subject = utf8_decode("Reserva de Laboratorio");
  $mail->Body=utf8_decode( 
    "<!DOCTYPE html>
     <html lang='es' style='width: 100%;height: 100%; margin:0 auto;'>
      <head>
       <meta http-equiv='Content-type' content='text/html; charset=utf-8'>
       <meta name='viewport' content='width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0'>
       <title>Reserva De Laboratorio</title>
      </head>
      <body style='background-attachment: fixed;background-color: white;background-position: center;background-repeat: no-repeat;background-size: 100% 100%;color: #094BA5;font-family: Myriad Pro, Verdana, Sans-serif;font-weight: bold;height: auto;margin: 0;padding: 2%;width: auto; max-width: 70%;font-size: 1em'>
       <div style='display:inline-block; width:100%; margin: 0 auto;'>
       <div style='margin-top:2%;'>     
        <p style='text-align: justify'>
         Hemos aprobado su reserva 
        </p>
       </div>
       <div style='margin-top:2%;'>
        <label style='font-weight: normal; margin-top:2%;'> </label>
        <h4 style='color: #088A08;font-weight: bolder; margin:0; padding:0; '>$usuario</h4>
       </div>
       <div style='margin-top:2%;'>
        <label style='font-weight: normal; margin-top:2%;'>Del Laboratorio: </label>
        <h4 style='color: #088A08;font-weight: bolder; margin:0; padding:0; '>$laboratorio</h4>
       </div>
       <div style='margin-top:2%;'>
        <label style='font-weight: normal; margin-top:2%;'>Para la hora: </label>
        <h4 style='color: #088A08;font-weight: bolder; margin:0; padding:0; '>$horario</h4>
       </div>
       <div style='margin-top:2%;'>
        <label style='font-weight: normal; margin-top:2%;'>Para la clase: </label>
        <h4 style='color: #088A08;font-weight: bolder; margin:0; padding:0; '>$materia</h4>
       </div>
       <div style='margin-top:2%;'>
        <label style='font-weight: normal; margin-top:2%;'>Para la fecha: </label>
        <h4 style='color: #088A08;font-weight: bolder; margin:0; padding:0; '>$fecha</h4>
       </div>
       </div>
      </body>
     </html>");
  
  $mail->AltBody="<br>$usuario<br>Del Laboratorio:<br>$laboratorio<br>Para la hora: $horario<br>Para la clase:<br>$materia<br>Para la fecha:<br>$fecha";

  $exito=$mail->Send();
  
 }

 
?>

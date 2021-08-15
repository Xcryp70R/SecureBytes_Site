<?php


require("class.phpmailer.php");
require("class.smtp.php");



// Valores enviados desde el formulario
if ( !isset($_POST["name"]) || !isset($_POST["email"]) || !isset($_POST["subject"])  || !isset($_POST["message"]) ) {
    die ("Es necesario completar todos los datos del formulario");
}



$nombre = $_POST["name"];

$email = $_POST["email"];


$asunto = $_POST["subject"];

$mensaje = $_POST["message"];


$destinatario = "comercial@securebytes.co";


// Datos de la cuenta de correo utilizada para enviar vía SMTP
$smtpHost = "smtp.gmail.com";  // Dominio alternativo brindado en el email de alta 
$smtpUsuario = "xcryptorlabs@gmail.com";  // Mi cuenta de correo
$smtpClave = "$%8387Jojoa";  // Mi contraseña




$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Port = 587;  
$mail->SMTPSecure ='tls';

$mail->IsHTML(true); 

$mail->SMTPKeepAlive = true;   
$mail->Mailer = “smtp”;


$mail->CharSet = "utf-8";

// VALORES A MODIFICAR //
$mail->Host = $smtpHost; 
$mail->Username = $smtpUsuario; 
$mail->Password = $smtpClave;


$mail->From = $smtpUsuario; // Email desde donde envío el correo.
$mail->FromName = $nombre;
$mail->AddAddress($destinatario); // Esta es la dirección a donde enviamos los datos del formulario

$mail->Subject = "Formulario desde el Sitio Web"; // Este es el titulo del email.
$mensajeHtml = nl2br($mensaje);
$mail->Body = "
<html> 

<body> 

<h1>Recibiste un nuevo mensaje desde el formulario de contacto</h1>

<p>Informacion enviada por el usuario de la web:</p>

<p>nombre: {$nombre}</p>

<p>email: {$email}</p>

<p>asunto: {$asunto}</p>

<p>mensaje: {$mensaje}</p>

</body> 

</html>

<br />"; // Texto del email en formato HTML
$mail->AltBody = "{$mensaje} \n\n "; // Texto sin formato HTML
// FIN - VALORES A MODIFICAR //

$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);


$estadoEnvio = $mail->Send(); 


if($estadoEnvio){
    print "<meta http-equiv=\"refresh\" content=\"0;URL=send.html\">";
} else {

    print "<meta http-equiv=\"refresh\" content=\"0;URL=error.html\">";
    //echo 'Mailer error: ' . $mail->ErrorInfo;//
    
}







?>


<?php

$monto = 0;
$fecha = 0;

// *Importar las clases de PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// *Requerir los archivos...
require '../../PHPMailer/src/PHPMailer.php';
require '../../PHPMailer/src/SMTP.php';
require '../../PHPMailer/src/Exception.php';
// require 'PHPMailer/src/PHPMailer.php';
// require 'PHPMailer/src/SMTP.php';
// require 'PHPMailer/src/Exception.php';

// *Crear un objeto de la clase PHPMailer
$correo = new PHPMailer(true); //el true me ayuda a manejar excepciones

try{
    $correo->SMTPDebug = SMTP::DEBUG_SERVER;
    // *Configuración de conexión a la cuenta por la que saldrán los mensajes de correo
    $correo->isSMTP();
    
    // Poner el correo desde el que se va a enviar
    // Configuración para correo de Outlook
    $correo->Host = "smtp-mail.outlook.com";
    $correo->SMTPAuth = true;
    $correo->Username = 'A305350@alumnos.uaslp.mx';
    $correo->Password = 'Daniela099@';
    $correo->Port = 587;
    $correo->SMTPSecure = 'tls';

    // Configuración para correo de Gmail
    // $correo->Host = "smtp.gmail.com";
    // $correo->SMTPAuth = true;
    // $correo->Port = 587;
    // $correo->SMTPSecure = 'tls';
    // $correo->Username = 'salonelpuno@gmail.com';
    // $correo->Password = '211926MIV';


    // *Configurar el mensaje
    $correo->setFrom('A305350@alumnos.uaslp.mx','Salon el Puño de Tierra');  //esta linea es para decir quién envía el msj, es decir el remitente
    // $correo->setFrom('salonelpuno@gmail.com','Salon el Puño de Tierra');  //esta linea es para decir quién envía el msj, es decir el remitente
    // A quién se lo vamos a enviar
    $correo->addAddress("A305350@alumnos.uaslp.mx", "Marco Antonio López Arriaga");
    // $correo->addAddress("marcoantonnlopez@gmail.comsalonelpuno@gmail.com", "Marco Antonio López Arriaga");
    $correo->isHTML(true); //esto es para que pueda darle formato al correo
    $correo->Subject = "¡Tu evento está agendado! | Salon el Puño de Tierra"; //esto es lo del asunto
    $correo->Body = "<h1>Comprobante de pago</h1><p>estimado cliente: <br><br> Te enviamos la información de tu compra</p><p>Fecha: 29/05/23<br>Monto: $300.00 MXN</p>";

    // $correo->addCC("cuentarespaldo@hotmail.com"); //o bien, adBCC es enviar una copia oculta
    // $correo->addAttachment("/var/texto.pdf"); //esto es para enviar archivos
    $correo->CharSet = "UTF-8"; //para que acepte acentos
    
    $correo->send();

    echo "El correo se ha enviado correctamente";

}catch(Exception $ex){
    echo "El correo no se ha enviado";
}

?>
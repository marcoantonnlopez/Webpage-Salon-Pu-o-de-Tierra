<?php
session_start();

// vinculamos con conexión para vincular a la BD
require_once "../sql/CAD.php"; //entre "" ponemos la dirección del archivo

// Variables Paso 1
$selectedDay = $_POST['selectedDay'];
$selectedMonth = $_POST['selectedMonth'];
$selectedYear = $_POST['selectedYear'];
// Variables Paso 2
$hrInicio = $_POST['hrInicio'];
$hrFinal = $_POST['hrFinal'];
// Variables Paso 3
$hrsExtra = $_POST['hrsExtra'];
$costoHrsExtra = $_POST['costoHrsExtra'];
$horarioFinalConHrsExtra = $_POST['horarioFinalConHrsExtra'];
$costoFinalConHrsExtra = $_POST['costoFinalConHrsExtra'];
// Variables Paso 5
$ludSelected = $_POST['ludSelected'];
$futSelected = $_POST['futSelected'];
$balconSelected = $_POST['balconSelected'];
$costoAdicionales = $_POST['costoAdicionales'];
// Total
$costoTotal = $_POST['costoTotal'];

// echo $costoTotal;
// echo $selectedDay;
// echo $selectedMonth;
// echo $selectedYear;

// puedes ir desde:
$puedesIrDesde = $_POST['puedesIrDesde'];;

// numAdicionales
$numAdicionales = $_POST['numAdicionales'];;

// Restante
$restante = $_POST['restante'];

// ------- DATOS CONTRATO
$email = $_POST['buscarEmail'];
$insertNombre = $_POST['insertNombre'];
$insertCelular = $_POST['insertCelular'];
$insertDireccion = $_POST['insertDireccion'];

$agendado = true;

//* -------------------- CAD BD --------------------

$cad = new CAD();

$usuarioID = $cad->recuperaIDusuario($email); //ve si existe el cliente
if ($usuarioID == null) { 
    // echo "El cliente aún no está en la BD <br>";
        $cad->agregaUsuarioCliente($insertNombre, $email, $insertCelular, $insertDireccion); //agrega al cliente xd
        $usuarioID = $cad->recuperaIDusuario($email);
    } else { //si existe imprime
        // echo "UsuarioID: " . "<" . $usuarioID . ">" . "<br>";
    }

    // $cad->imprimeVariablesAgregaEvento($selectedDay, $selectedMonth, $selectedYear, $hrInicio, $horarioFinalConHrsExtra, $hrsExtra, $ludSelected, $futSelected, $balconSelected, $costoTotal, $restante);
    $cad->agregaEvento($selectedDay, $selectedMonth, $selectedYear, $hrInicio, $horarioFinalConHrsExtra, $hrsExtra, $ludSelected, $futSelected, $balconSelected, $costoTotal, $restante, $usuarioID);


//* -------------------- CONSULTA A LA BD PARA CORREO --------------

$eventoID = $cad->consultaIDevento($selectedDay, $selectedMonth, $selectedYear);
if($eventoID == null)
{
    echo "El evento no existe";
}
//* ------------------- ENVIAR CORREO -------------


// *Importar las clases de PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// *Requerir los archivos...
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
require '../PHPMailer/src/Exception.php';


// *Crear un objeto de la clase PHPMailer
$correo = new PHPMailer(true); //el true me ayuda a manejar excepciones

try{
    // $correo->SMTPDebug = SMTP::DEBUG_SERVER;
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

    // *Configurar el mensaje
    $correo->setFrom('A305350@alumnos.uaslp.mx','Salon el Puño de Tierra');  //esta linea es para decir quién envía el msj, es decir el remitente
    // A quién se lo vamos a enviar
    $correo->addAddress($email, $insertNombre);
    $correo->isHTML(true); //esto es para que pueda darle formato al correo
    $correo->Subject = "¡Tu evento está agendado! | Día $selectedDay / $selectedMonth / $selectedYear | Salon el Puño de Tierra"; //esto es lo del asunto
    $correo->Body = "<style>
                        h1 {
                            color: #C38937;
                            font-size: 24px;
                        }
                        p {
                            color: #000000;
                            font-size: 16px;
                        }
                    </style>

                    <h1>¡Listo, tu evento está agendado!</h1>
                    <p>Estimado cliente: <b> $insertNombre 
                    <br><br> El código de tu evento es: $eventoID</b><br></p>
                    <p>Tu evento está agendado para el día:<b> $selectedDay/$selectedMonth/$selectedYear </b><br></p>
                    <p>Puedes ir desde las: <b>$puedesIrDesde</b></p>
                    <p>Tu evento inicia a las: <b>$hrInicio p.m.</b></p>
                    <p>Tu evento termina a las: <b>$horarioFinalConHrsExtra p.m.</b></p>
                    <p>Horas Extra: <b>$hrsExtra hrs extra</b></p>
                    <p>Ludoteca: <b>$ludSelected</b></p>
                    <p>Futbolito: <b>$futSelected</b></p>
                    <p>Balcón: <b>$balconSelected</b></p>
                    <p>Costo Extra: <b>$$costoHrsExtra (horas extra)</b> y <b>$$costoAdicionales (servicios adicionales)</b></p>
                    <br>
                    <p>Costo Final: <b>$costoTotal</b></p>
                    <p>Anticipo: <b>$1,000</b></p>
                    <p>Restante: <b>$restante</b></p>
                    <br>
                    <p>Recuerda que debes liquidar lo restante de la renta el día del evento antes de que inicie el mismo.</p> <br>
                    <p><br><b> Puedes modificar las especificaciones de tu evento buscando tu evento en nuestra página web, solo necesitas el correo que está en tu contrato y el código del evento.<br><br> ¡Tu evento será grandioso!</b></p>";

    $correo->addBCC("A305350@alumnos.uaslp.mx"); //o bien, adBCC es enviar una copia oculta
    // $correo->addCC("cuentarespaldo@hotmail.com"); //o bien, adBCC es enviar una copia oculta
    // $correo->addAttachment("/var/texto.pdf"); //esto es para enviar archivos
    $correo->CharSet = "UTF-8"; //para que acepte acentos
    
    $correo->send();

    // echo "El correo se ha enviado correctamente";

}catch(Exception $ex){
    echo "El correo no se ha enviado";
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- *BOOTSTRAP CSS INTERNO -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/style_agendado.css">
    <link rel="stylesheet" href="../css/style_modals.css">
    <link rel="stylesheet" href="../css/style_calendario.css">
    <link rel="salon icon" href="../imgs/icons/logo.png">
    <title>Agendado | Puño de tierra</title>
</head>

<body onload="inicioAgendado()">
    
    <?php
        include "../pages/commonPages/header.php";
    ?>

    <main>
        <section id="grandioso">
            <!-- <a href="./agendarPresencial.html" id="linea">Quiero agendar presencialmente ></a> -->
            <h1><span>Grandioso</span><br> Tu evento ya está agendado</h1>
            <h4>Enviamos a tu correo un resumen de tu pago y el contrato generado</h4>
            <br>

            <!-- <a class="large_btn" href="ruta/al/archivo.pdf" download>Descargar contrato en PDF</a> -->
            <form action="./commonPages/contratoPDF/contratoPDF.php" method="POST" enctype="" target="">
            <div id="hiddenInputs">
                    <!-- PASO 1 -->
                    <input type="hidden" id="selectedDay" name="selectedDay" value="<?php echo $selectedDay; ?>">
                    <input type="hidden" id="selectedMonth" name="selectedMonth" value="<?php echo $selectedMonth; ?>">
                    <input type="hidden" id="selectedYear" name="selectedYear" value="<?php echo $selectedYear; ?>">
                    <!-- PASO 2 -->
                    <input type="hidden" id="puedesIrDesde" name="puedesIrDesde" value="<?php echo $puedesIrDesde; ?>">
                    <input type="hidden" id="hrInicio" name="hrInicio" value="<?php echo $hrInicio; ?>">
                    <input type="hidden" id="hrFinal" name="hrFinal" value="<?php echo $hrFinal; ?>">
                    <!-- PASO 3 -->
                    <input type="hidden" id="hrsExtra" name="hrsExtra" value="<?php echo $hrsExtra; ?>">
                    <input type="hidden" id="costoHrsExtra" name="costoHrsExtra" value="<?php echo $costoHrsExtra; ?>">
                    <input type="hidden" id="horarioFinalConHrsExtra" name="horarioFinalConHrsExtra" value="<?php echo $horarioFinalConHrsExtra; ?>">
                    <input type="hidden" id="costoFinalConHrsExtra" name="costoFinalConHrsExtra" value="<?php echo $costoFinalConHrsExtra; ?>">
                    <!-- PASO 4 -->
                    <input type="hidden" id="numAdicionales" name="numAdicionales" value="<?php echo $numAdicionales; ?>">
                    <input type="hidden" id="ludSelected" name="ludSelected" value="<?php echo $ludSelected; ?>">
                    <input type="hidden" id="futSelected" name="futSelected" value="<?php echo $futSelected; ?>">
                    <input type="hidden" id="balconSelected" name="balconSelected" value="<?php echo $balconSelected; ?>">
                    <input type="hidden" id="costoAdicionales" name="costoAdicionales" value="<?php echo $costoAdicionales; ?>">
                    <!-- TOTAL -->
                    <input type="hidden" id="costoTotal" name="costoTotal" value="<?php echo $costoTotal; ?>">
                    <input type="hidden" id="restante" name="restante" value="<?php echo $restante; ?>">
                    <!-- CONTRATO -->
                    <input type="hidden" id="buscarEmail" name="buscarEmail" value="<?php echo $email; ?>">
                    <input type="hidden" id="insertNombre" name="insertNombre" value="<?php echo $insertNombre; ?>">
                    <input type="hidden" id="insertCelular" name="insertCelular" value="<?php echo $insertCelular; ?>">
                    <input type="hidden" id="insertDireccion" name="insertDireccion" value="<?php echo $insertDireccion; ?>">

                </div>
                <!-- <button type="submit" class="btn">Ver Contrato en PDF</button> -->
            </form>
            <p class="btn btnGris" id="openModalBtn">Ver contrato</p>
            
            <br>

        </section>

        <section>
            <!-- RESUMEN Y CONSULTAS BD -->
            <?php
                include "../pages/commonPages/resumen/consultaVariables.php";
                include "../pages/commonPages/resumen/resumen.php";
            ?>
        </section>

        <p>Si tienes cualquier duda puedes contactarnos al whatsapp 4441315125</p>

        <section id="preguntas" class="pregFrec">
            <h1>Preguntas Frecuentes</h1>
            <details>
                <summary> 1. ¿Qué incluye el salón?</summary>
                <p>6 mesas con mantelería, 50 sillas, un baño con jabón y papel, toldo, cocina completamente equipada con asador, estufa, hielera, microondas, refrigerador, 2 bocinas, una pantalla conectada a internet, 2 microfonos. Se renta por 5 hrs a
                    $2,190.00 mx.</p>
            </details>
            <details>
                <summary> 2. ¿Cómo funcionan los servicios adicionales?</summary>
                <p>Contamos con 3 servicios adicionales, cada uno con un costo de $300 mx adicionales al costo del salón. Ludoteca: 3 hrs de ludoteca a cargo de una lic. en psicopedagogía. Incluyen juegos de mesa, juguetes, caballetes para pintar, un baño
                    adicional. Futbolito: Renta de futbolito durante todo el evento. Balcón: Acceso al balcón de la parte de arriba, con una de las 6 mesas de abajo, quedarían 5 mesas abajo y una mesa arriba en el balcón.</p>
            </details>
            <details>
                <summary> 3. ¿Cuál es el límite de horario? ¿hay horas extra?</summary>
                <p>El límite de horario por las 5 hrs. del salón es a las 10 p.m. sin embargo puede extenderse hasta las 11 p.m. pagando horas extra, cada hora extra tiene un costo de $300 mx.</p>
            </details>
            <details>
                <summary> 4. ¿Puedo ir a decorar o llevar cosas al salón antes de que inicie mi evento?</summary>
                <p>Sí, te damos hasta 2 hrs de anticipación para que puedas ir a decorar o dejar cosas si así lo deseas. Estaremos limpiando y esperándote.</p>
            </details>
            <details>
                <summary> 5. ¿Cómo puedo apartar? ¿Cuándo puedo ir a ver el salón?</summary>
                <p>Hay 2 formas de agendar tu evento, la primera es en línea dando clic AQUÍ y la segunda es presencial mandándonos mensaje al WhatsApp 4441315125.</p>
            </details>
            <details>
                <summary> 6. ¿Con cuánto dinero se aparta el salón?</summary>
                <p>Agenda tu evento pagando $1,000 mx y paga el resto el día de tu evento antes de que inicie.</p>
            </details>
            <details>
                <summary> 7. ¿Puedo hacer modificaaciones a mi evento después de haber agendado?</summary>
                <p>Sí, envíanos un mensaje de WhatsApp al número 4441315125 con el cambio que quieres, ya sea modificar horario, agregar o quitar servicios adicionales u horas extra. Para cancelar o cambiar fecha del evento lee las cláusulas del contrato
                    que se genera al agendar evento.</p>
            </details>
            <details>
                <summary> 8. ¿Manejan contrato?</summary>
                <p>Sí, al momento de ajendar se te dará a conocer el contrato con las especificaciones del evento y algunas reglas del salón.</p>
            </details>
            <details>
                <summary> 9. ¿Qué está prohibido?</summary>
                <p>Tenemos prohibido llevar DJ a los eventos, hacer imperfecciones en el salón, y tener mala conducta dentro o en la parte de afuera del salón. </p>
            </details>
        </section>

        <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <!-- CONTRATO PDF -->
            
            <?php
                include "../pages/commonPages/contrato.php";
            ?>
        </div>
    </div>
    </main>

    <?php
        include "../pages/commonPages/footer.php";
    ?>

    <script type="text/javascript " src="../js/function_modals.js"></script>

    <!-- *BOOTSTRAP JS INTERNO -->
    <script src="../js/bootstrap.min.js "></script>


</body>

</html>
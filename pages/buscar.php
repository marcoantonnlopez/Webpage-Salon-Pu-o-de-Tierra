<?php
// Verificar si ya se ha iniciado sesión
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    // Redirigir al usuario a la página de inicio o a otra página protegida
    // header('Location: evento.php');
    header('Location: evento.php?IDevento=' . urlencode($IDevento));

    exit;
}

// vinculamos con conexión para vincular a la BD
require_once "../sql/CAD.php"; 
$cad = new CAD();


// Verificar si se ha enviado el formulario de inicio de sesión
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos enviados por el formulario
    $userMail = $_POST['userMail'];
    $IDevento = $_POST['IDevento'];

    // echo "hola1";
    $userMailBD = $cad->validarCorreoUsuario($userMail); //busco el mail en la bd
    // echo ", userMailDB = " . $userMailBD;
    // echo ", userMail = " . $userMail;
    $IDeventoBD = $cad->validarIDevento($userMail, $IDevento);
    // var_dump($IDeventoBD);
    // echo "; IDeventoDB = " . $IDeventoBD;
    // echo ", IDevento = " . $IDevento;
    
    // Realizar la verificación del usuario y contraseña (debes implementar tu propia lógica aquí)
    if ($userMail == $userMailBD && $IDevento == $IDeventoBD) {
        // Iniciar sesión y redirigir al usuario a la página de inicio o a otra página protegida
        // echo "se supone que inicia sesion";
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['userMail'] = $userMail;
        header('Location: evento.php?IDevento=' . urlencode($IDevento));

        // header('Location: evento.php' . urlencode($IDevento));
        exit;
    } else {
        // Mostrar mensaje de error si las credenciales son incorrectas
        $error = 'El correo o código no son correctos';
    }
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
    <link rel="stylesheet" href="../css/style_buscar.css">
    <!-- <link rel=" stylesheet " href="../css/style_calendario.css "> -->
    <link rel="salon icon " href="../imgs/icons/logo.png ">
    <title>Buscar | Puño de tierra</title>
</head>

<body>
    
    <?php
        include "../pages/commonPages/header.php";
    ?>

    <main>
        <section id="general">
            <div id="titulo">
                <!-- <a href="./agendarPresencial.html " id="linea ">Quiero agendar presencialmente ></a> -->
                <h1><span>Busca tu evento</span> y haz modificaciones</h1>
                <h4>Escribe tu correo y el código que se te envío al correo cuando apartaste tu evento</h4>
                <br>
            </div>
            <div id="datos">
                <h1>Datos de tu evento</h1>
                <br>
                


                <?php if (isset($error)) { ?>
                    <p><?php echo $error; ?></p>
                <?php } ?>
                

                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="" target="">
                <!-- <form action="./evento.php" method="POST" enctype="" target=""> -->
                
                    <input name="userMail" type="mail" id="buscarMail" placeholder="email" required autocomplete="email">
                    <input name="IDevento" type="number" id="IDevento" placeholder="Código del evento" required>

                    <button type="submit" class="btn btnBuscar"> Buscar evento</button>

                </form>
                

                <!-- <form action="./evento.php" method="POST" enctype=" " target=" ">
                    <input name="buscarMail" type="mail" id="buscarMail" placeholder="email" required autocomplete="email">
                    <input name="codigoEvento" type="number" id="codigoEvento" placeholder="Código del evento" required>
                    
                    <button type="submit" class="btn btnBuscar" onclick="validarFormulario(event)"> Buscar evento</button>

                </form> -->
            </div>

        </section>
    </main>

    <?php
        include "../pages/commonPages/footer.php";
    ?>
    
    <!-- *BOOTSTRAP JS INTERNO -->
    <script src="../js/function_buscar.js"></script>
    <script src="../js/bootstrap.min.js "></script>
</body>

</html>
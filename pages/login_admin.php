<?php
// Verificar si ya se ha iniciado sesión
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    // Redirigir al usuario a la página de inicio o a otra página protegida
    header('Location: adminStart.php');
    exit;
}
// vinculamos con conexión para vincular a la BD
require_once "../sql/CAD.php"; 
$cad = new CAD();

// Verificar si se ha enviado el formulario de inicio de sesión
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos enviados por el formulario
    $usermail = $_POST['usermail'];
    $password = $_POST['password'];

    $login = $cad->iniciaSesionAdmin($usermail, $password);
    
    // Realizar la verificación del usuario y contraseña (debes implementar tu propia lógica aquí)
    if ($login === true) {
        // Iniciar sesión y redirigir al usuario a la página de inicio o a otra página protegida
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['usermail'] = $usermail;
        header('Location: adminStart.php');
        exit;
    } else {
        // Mostrar mensaje de error si las credenciales son incorrectas
        $error = 'Usuario o contraseña incorrectos.';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <!-- *BOOTSTRAP CSS INTERNO -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/style_login_admin.css">
    <link rel="salon icon" href="../imgs/icons/logo.png">
    <title>LogIn Admin | Puño de tierra</title>
</head>
<body>


<?php
        include "../pages/commonPages/header.php";
    ?>
    <main>
        <?php if (isset($error)) { ?>
            <p><?php echo $error; ?></p>
            <?php } ?>
            <section id="all">
                <div id="formDiv">
                <h2>Iniciar sesión Adim</h2>
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <!-- <label for="usermail">Usuario:</label> -->
                    <input type="text" name="usermail" placeholder="Correo" required>
                    <br>
                    <!-- <label for="password">Contraseña:</label> -->
                    <input type="password" name="password" placeholder="Contraseña" required>
                    <br>
                    <button type="submit" class="btn"><b>Iniciar sesión</b></button>
                </form>
            </div>
        </section>
    </main>

    <?php
        include "../pages/commonPages/footer.php";
    ?>
    
    <!-- *BOOTSTRAP JS INTERNO -->
    <script src="../js/bootstrap.min.js "></script>
</body>
</html>

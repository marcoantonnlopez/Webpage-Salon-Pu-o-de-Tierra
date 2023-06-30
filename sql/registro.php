<?php

// vinculamos con conexión para vincular a la BD
require_once "CAD.php"; //entre "" ponemos la dirección del archivo

// hago variables lo que ponga en los input
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];

if(isset($nombre) && isset($correo) && isset($contrasena)) //si está colocada la variable nombre, correo y contrasena que viene del método post
{
    // echo $_POST['nombre']."-".$_POST['correo']."-".$_POST['contrasena']; //imprime

    $cad = new CAD();
    $cad->agregaUsuarioAdmin($nombre, $contrasena, $correo);
}

// liberar las variables
unset($_POST['nombre']);
unset($_POST['correo']);
unset($_POST['contrasena']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="registro.php" method="POST">
        <span>Escribe tu nombre:</span>
        <input type="text" name="nombre">
        <br>
        <span>Escribe tu correo electrónico: </span>
        <input type="text" name="correo">
        <br>
        <span>Escribe tu contraseña</span>
        <input type="text" name="contrasena">
        <br>
        <input type="submit" value="Regístrate">
    </form>
</body>
</html>
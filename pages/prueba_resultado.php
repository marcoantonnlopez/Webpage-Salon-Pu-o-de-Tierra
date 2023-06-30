<?php
session_start();

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

echo $hrInicio;

// if(isset($_POST['hrInicio'])) {
//     echo $_POST['hrInicio'];
// }
?>
<?php
session_start();

// * ----------- RECIBO VARIABLES -------------
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
echo "hola-2";

// * ----------- HAGO PDF ------------
include 'pdf/mpdf.php';
echo "hola-1";
	
	$titulo='Contrato Salon el Puño de Tierra';
	$subtitulo='Evento día: ' . $selectedDay . "/" . $selectedMonth . "/" . $selectedYear;
	// $mysqli = new mysqli("localhost", "root", "", "cine2"); //"127.0.0.1"
    $acentos = $mysqli->query("SET NAMES 'utf8'"); 
    echo "hola0";

    $contenido = include "../contrato.php";
    // $contenido = include "../../../css/style_modals";
    echo "hola1";
    $mpdf=new mpdf('UTF-8-s','Letter');//$mpdf->showImageErrors = true;
	$mpdf->SetTitle('Contrato salon Puño de Tierra');
	$mpdf->SetDisplayMode('fullpage');
	$mpdf->showWatermarkImage=true;
    echo "hola2";

    $mpdf->SetProtection(array('print'));//,'password'); //Configura protección del documento. Solo permite impresion
	$stylesheet = file_get_contents('../../../css/style_modals');
	$mpdf->WriteHTML($stylesheet,1);
	$mpdf->WriteHTML($contenido);
	$mpdf->Output($titulo.'.pdf','I');
	return $mpdf;
?>
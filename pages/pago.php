<?php
session_start();

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
$puedesIrDesde;

// numAdicionales
$numAdicionales = $costoAdicionales/300;

// Restante
$restante = $costoTotal - 1000;

if ($hrInicio == 1) {
    $puedesIrDesde = "11 am";
}else
{
    if ($hrInicio == 2) {
        $puedesIrDesde = "12 pm";
    } else
    {
        if ($hrInicio == 3) {
            $puedesIrDesde = "1 pm";
        } else
        {
            if ($hrInicio == 4) {
                $puedesIrDesde = "2 pm";
            }   else
            {
                if ($hrInicio == 5) {
                    $puedesIrDesde = "3 pm";
                }   
            }
        }
    }  
}

    // para saber si está agendado
    $agendado = false;

// ------- DATOS CONTRATO
$email = $_POST['buscarEmail'];
$insertNombre = $_POST['insertNombre'];
$insertCelular = $_POST['insertCelular'];
$insertDireccion = $_POST['insertDireccion'];


// ---------------- MES EN LETRA --------
$mesLetra = "";
if($selectedMonth == "1"){
    $mesLetra = "Enero";
}else
{
    if($selectedMonth == "2"){
        $mesLetra = "Febrero";
    }else
    {
        if($selectedMonth == "3"){
            $mesLetra = "Marzo";
        }else
        {
            if($selectedMonth == "4"){
                $mesLetra = "Abril";
            }else
            {
                if($selectedMonth == "5"){
                    $mesLetra = "Mayo";
                }else
                {
                    if($selectedMonth == "6"){
                        $mesLetra = "Junio";
                    }else
                    {
                        if($selectedMonth == "7"){
                            $mesLetra = "Julio";
                        }else
                        {
                            if($selectedMonth == "8"){
                                $mesLetra = "Agosto";
                            }else
                            {
                                if($selectedMonth == "9"){
                                    $mesLetra = "Septiembre";
                                }else
                                {
                                    if($selectedMonth == "10"){
                                        $mesLetra = "Octubre";
                                    }else
                                    {
                                        if($selectedMonth == "11"){
                                            $mesLetra = "Noviembre";
                                        }else
                                        {
                                            if($selectedMonth == "12"){
                                                $mesLetra = "Diciembre";
                                            }
                                        }
                                    }
                                }
                            }   
                        }
                    }
                }
            }
        }
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
    <link rel="stylesheet" href="../css/style_modals.css">
    <link rel="stylesheet" href="../css/style_calendario.css">
    <link rel="stylesheet" href="../css/style_pago.css">
    <link rel="salon icon" href="../imgs/icons/logo.png">
    <title>Pago | Puño de tierra</title>
</head>

<body onload="inicioPago()">
<?php
        include "../pages/commonPages/header.php";
    ?>

    <main>
        <section id="paso7">
            <a href="./agendarPresencial.html" id="linea">Quiero agendar presencialmente ></a>
            <h1><span>PASO 7.</span> Aparta con solo $1000 mx</h1>
            <h4>¡Agenda con solo $1000 mx y paga el resto el día de tu evento!</h4>
            <hr>
        </section>

        <section id="infoPago">
            <h1>Información de pago</h1>

            <form action="./agendado.php" method="POST" enctype="" target="">
                <input name="nombreTarjeta" type="name" class="anchoInputTarjeta" id="nombreTarjeta" placeholder="Titular de la tarjeta" required autocomplete="name">
                <input name="numeroTarjeta" type="" class="anchoInputTarjeta" id="numeroTarjeta" placeholder="Número de tarjeta" required>
                <div id="tarjDatos">
                    <input name="fechaExpiracion" type="date" id="fechaExpiracion" placeholder="Fecha de expiración" required>
                    <input name="cvv" type="number" id="cvv" placeholder="CVV" required>
                </div>
                <div class="aceptarContrato">
                    <input name="terminos" id="terminos" value="acepto" type="checkbox" required>
                    <p for="terminos">He leído y acepto las condiciones del contrato</p><br>
                </div>

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

                <div id="btns">
                        <p class="btn btnGris" id="openModalBtn">Ver contrato</p>
                        <button type="submit"class="btn">Pagar</button>
                </div>
            </form>

        </section>

        <section>
            <?php
                include "../pages/commonPages/resumen/resumen.php";
            ?>
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
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
    <link rel="stylesheet" href="../css/style_generaContrato.css">
    <link rel="stylesheet" href="../css/style_calendario.css">
    <link rel="stylesheet" href="../css/style_modals.css">
    <link rel="salon icon" href="../imgs/icons/logo.png">
    <title>Genera tu contrato | Puño de tierra</title>
</head>

<body onload="inicioContrato()">
    <?php
        include "../pages/commonPages/header.php";
    ?>


    <main>
        <section id="paso6">
            <!-- <a href="./agendarEnLinea.php">Regresar ></a> -->
            <!-- <br><br><br><br><br><br> -->
            <h1><span>PASO 6.</span> Genera tu contrato</h1>
            <h4>Esta información es necesaria para la creación del contrato. <br> ¡Tu información está segura!</h4>

            <section id="datosGenerales">
            <h1>Datos Generales</h1>
            <form id="datosGeneralesForms" action="./pago.php" method="POST" enctype="" target="">
                <input name="buscarEmail" type="mail" class="anchoInput" id="buscarEmail" placeholder="email" required autocomplete="email">
                <input name="insertNombre" type="name" class="anchoInput" id="insertNombre" placeholder="Nombre" required autocomplete="name">
                <input name="insertCelular" type="tel" class="anchoInput" id="insertCelular" placeholder="Celular" required autocomplete="tel">
                <input name="insertDireccion" type="address" class="anchoInput" id="insertDireccion" placeholder="Direccion" required autocomplete="address-level2">
                <div class="aceptarTerm">
                    <input name="terminos" id="terminos" value="acepto" type="checkbox" required>
                    <p for="terminos">Acepto <span id="openModalBtn">Terminos y condiciones</span></p><br>
                </div>
                <div id="hiddenInputs">
                    <!-- PASO 1 -->
                    <input type="hidden" id="selectedDay" name="selectedDay" value="<?php echo $selectedDay; ?>">
                    <input type="hidden" id="selectedMonth" name="selectedMonth" value="<?php echo $selectedMonth; ?>">
                    <input type="hidden" id="selectedYear" name="selectedYear" value="<?php echo $selectedYear; ?>">
                    <!-- PASO 2 -->
                    <input type="hidden" id="hrInicio" name="hrInicio" value="<?php echo $hrInicio; ?>">
                    <input type="hidden" id="hrFinal" name="hrFinal" value="<?php echo $hrFinal; ?>">
                    <!-- PASO 3 -->
                    <input type="hidden" id="hrsExtra" name="hrsExtra" value="<?php echo $hrsExtra; ?>">
                    <input type="hidden" id="costoHrsExtra" name="costoHrsExtra" value="<?php echo $costoHrsExtra; ?>">
                    <input type="hidden" id="horarioFinalConHrsExtra" name="horarioFinalConHrsExtra" value="<?php echo $horarioFinalConHrsExtra; ?>">
                    <input type="hidden" id="costoFinalConHrsExtra" name="costoFinalConHrsExtra" value="<?php echo $costoFinalConHrsExtra; ?>">
                    <!-- PASO 4 -->
                    <input type="hidden" id="ludSelected" name="ludSelected" value="<?php echo $ludSelected; ?>">
                    <input type="hidden" id="futSelected" name="futSelected" value="<?php echo $futSelected; ?>">
                    <input type="hidden" id="balconSelected" name="balconSelected" value="<?php echo $balconSelected; ?>">
                    <input type="hidden" id="costoAdicionales" name="costoAdicionales" value="<?php echo $costoAdicionales; ?>">
                    <!-- TOTAL -->
                    <input type="hidden" id="costoTotal" name="costoTotal" value="<?php echo $costoTotal; ?>">

                </div>

                <button type="submit"class="btn">Generar contrato</button>
            </form>
        </section>

            <!-- <div class="buscMail">
                <form action="https://misitio.com" method="get" enctype="" target="">
                    <input name="buscarMail" type="mail" id="buscarMail" placeholder="email" required autocomplete="email">
                    <button type="submit"> <a href="#datosGenerales"  class="btn btnSearch">Listo</a></button>
                </form>
            </div> -->
        </section>

        <div id="myModal" class="modal">
        <div class="modal-content">
        <span class="close">&times;</span>
        <h2 id="esteTuContrato">Términos y condiciones</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis necessitatibus facilis placeat animi dolores tenetur optio natus atque inventore ratione! Fuga dolore, architecto consequuntur, quod dicta quae, voluptatem sit ducimus impedit quidem nostrum id est. Sunt, aliquid. Quae harum, ab tenetur suscipit, earum ex, sit quasi maxime consequatur commodi veniam.</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis necessitatibus facilis placeat animi dolores tenetur optio natus atque inventore ratione! Fuga dolore, architecto consequuntur, quod dicta quae, voluptatem sit ducimus impedit quidem nostrum id est. Sunt, aliquid. Quae harum, ab tenetur suscipit, earum ex, sit quasi maxime consequatur commodi veniam.</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis necessitatibus facilis placeat animi dolores tenetur optio natus atque inventore ratione! Fuga dolore, architecto consequuntur, quod dicta quae, voluptatem sit ducimus impedit quidem nostrum id est. Sunt, aliquid. Quae harum, ab tenetur suscipit, earum ex, sit quasi maxime consequatur commodi veniam.</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis necessitatibus facilis placeat animi dolores tenetur optio natus atque inventore ratione! Fuga dolore, architecto consequuntur, quod dicta quae, voluptatem sit ducimus impedit quidem nostrum id est. Sunt, aliquid. Quae harum, ab tenetur suscipit, earum ex, sit quasi maxime consequatur commodi veniam.</p>
        </div>

    </main>

    <?php
        include "../pages/commonPages/footer.php";
    ?>

    <!-- *BOOTSTRAP JS INTERNO -->
    <script src="../js/function_modals.js"></script>
    <script src="../js/bootstrap.min.js "></script>
</body>

</html>
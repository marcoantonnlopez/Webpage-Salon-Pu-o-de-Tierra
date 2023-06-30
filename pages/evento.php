<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Si el usuario no ha iniciado sesión, redirigir al formulario de inicio de sesión
    header('Location: buscar.php');
    exit;
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
    <link rel="stylesheet" href="../css/style_evento.css">
    <link rel="stylesheet" href="../css/style_modals.css">
    <link rel="stylesheet" href="../css/style_calendario.css">
    <link rel="salon icon" href="../imgs/icons/logo.png">
    <title>Evento | Puño de tierra</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light ">
            <div class="container-fluid">
                <a class="navbar-brand" ><img class="logo" src="../imgs/index/logo.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav  menu_header">
                        <a class="list_item_header" href="./logout_buscar.php">Salir</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <section id="title">
            <h1>Tu evento</h1>
        </section>

        <section>
            <!-- RESUMEN Y CONSULTAS BD -->
            <?php
                // vinculamos con conexión para vincular a la BD
                require_once "../sql/CAD.php"; //entre "" ponemos la dirección del archivo

                $cad = new CAD();

                if (isset($_POST['IDevento'])) {
                    // echo "es un POST";
                    $eventoID = $_POST['IDevento'];

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

                    // *-----------------------
                    // Si es un POST actualiza en la BD
                    $cad->actualizaFechaEvento($selectedDay, $selectedMonth, $selectedYear, $eventoID);
                    $cad->actualizaHorarioEvento($hrInicio, $horarioFinalConHrsExtra, $hrsExtra, $eventoID);
                    $cad->actualizaAdicionalesEvento($ludSelected, $futSelected, $balconSelected, $eventoID);
                    
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

                    
                    $costoHrsExtra = $hrsExtra * 300;
                
                    $numAdicionales = 0;
                    if($ludSelected == "true")
                    {
                        $numAdicionales++;
                    }
                    if($futSelected == "true")
                    {
                        $numAdicionales++;
                    }
                    if($balconSelected == "true")
                    {
                        $numAdicionales++;
                    }

                    // $numAdicionalesInt = intval($hrsExtra);
                    // $costoAdicionales = $numAdicionalesInt * 300;
                    $costoAdicionales = $numAdicionales * 300;
                    
                    $cad->actualizaCostoFinalEvento($costoTotal, $eventoID);
                    
                    $restante = $costoTotal - 1000;
                    $cad->actualizaCostoRestanteEvento($restante, $eventoID);


                } else {
                    
                    if (isset($_GET['IDevento'])) {
                        // echo "es un GET";
                        $eventoID = $_GET['IDevento'];
                    }else{
                        // Aplica el cancelar modificación
                        // $eventoID = $_POST['IDevento']; //recibe el id para poder hacer las consultas abajo
                    }
                    
                }
                // Estas 2 líneas tienen que ir fuera del else por que sino no funciona el cancelar
                $puedesIrDesde = "";
                include "../pages/commonPages/resumen/consultaVariables.php";

                include "../pages/commonPages/resumen/resumen.php";
            ?>
        </section>

        <section>
            <br><br><br>
            <form action="./modificarEvento.php" method="POST" enctype="" target="">
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

                    <input type="hidden" id="IDevento" name="IDevento" value="<?php echo $eventoID; ?>">
                    
                </div>
                <?php
                    $agendado = true;
                    $email = $cad->consultaMailUsuario($eventoID);
                    $idUsuario = $cad->recuperaIDusuario($email);
                    $insertNombre = $cad->consultaNombreUsuario($email);
                    $insertDireccion = $cad->consultaDireccionUsuario($email);
                    $insertCelular = $cad->consultaCelularUsuario($email);
                    // var_dump($insertNombre);
                ?>
                    <p class="btn" id="openModalBtn"><b>Ver contrato</b></p><br>
                    <button type="submit"class="btn"><b>Modificar evento</b></button>
            </form>
        </section>


        <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <!-- CONTRATO PDF -->
            
            <?php
                include "../pages/commonPages/contrato.php";
            ?>
        </div>
    </main>

    <footer>
        <a class="navbar-brand"><img src="../imgs/index/logo.png" alt=""></a>
        <div id="whats">
            <a href="https://wa.me/4441315125" target="_blank"><img src="../imgs/icons/whatsapp.svg" alt=""></a>
            <p> 4441315125</p>
        </div>
        <div>
            <a href="https://www.facebook.com/profile.php?id=100083134181756&mibextid=LQQJ4d">

                <img src="../imgs/icons/facebook.svg" alt="">
            </a>
            <a href="https://www.instagram.com/el_puno_de_tierra/">

                <img src="../imgs/icons/instagram-alt.svg" alt="">
            </a>
        </div>
    </footer>

    <script type="text/javascript " src="../js/function_modals.js"></script>
    <!-- *BOOTSTRAP JS INTERNO -->
    <script src="../js/bootstrap.min.js "></script>
</body>


</html>
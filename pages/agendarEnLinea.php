<?php
session_start();

// vinculamos con conexión para vincular a la BD
require_once "../sql/CAD.php"; //entre "" ponemos la dirección del archivo
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
    <link rel="stylesheet" href="../css/style_agendarEnLinea.css">
    <link rel="stylesheet" href="../css/style_calendario.css">
    <link rel="salon icon" href="../imgs/icons/logo.png">
    <title>Agendar en línea | Puño de tierra</title>
</head>

<body onload="inicio()">
    
    <?php
        include "../pages/commonPages/header.php";
    ?>

    <main>
        <section id="enLinea">
            <h1>Agenda en Línea</h1>
            <h4>Costo $2,190 mx, 5 hrs.</h4>
            <a href="./agendarPresencial.php" id="linea">Quiero agendar presencialmente ></a>
            <hr>
        </section>
        <section id="paso1" class="pasos">
            <h1><span>PASO 1.</span> Selecciona la fecha</h1>
            <h6>Da clic en la fecha deseada</h6>

            <section class="calendario">
                <!-- <div class="simbCalendar">
                    <div class="simbItem">
                        <p class="dia_forma" id="disp">0</p>
                        <p>Disponible</p>
                    </div>
                    <div class="simbItem">
                        <p class="dia_forma" id="noDisp">0</p>
                        <p>No disponible</p>
                    </div>
                    <div class="simbItem">
                        <p class="dia_forma" id="selec">0</p>
                        <p>Selección</p>
                    </div>
                </div> -->
                <div class="calendarioAgendar">
                    <div class="calendar">
                        <div class="calendar-header">
                            <button class="prev-btn">&lt;</button>
                            <div class="month-year"></div>
                            <button class="next-btn">&gt;</button>
                        </div>
                        <div class="calendar-body">
                        </div>
                    </div>

                </div>
                <br>
                <a href="#paso2" class="btn">Siguiente</a>
                <br>

                <?php
                $cad = new CAD();

                // Llamar a la función JavaScript desde PHP
                echo '<script src="../js/funcionesCalendario.js"></script>';
                
                $fechasReservadas = $cad->consultaFechasReservadas();
                
                    // Utilizar los datos obtenidos
                    // foreach ($fechasReservadas as $fecha) {
                    //     $dia = $fecha['Dia'];
                    //     $mes = $fecha['Mes'];
                    //     $anio = $fecha['Anio'];
                    //     var_dump($dia);
                    //     var_dump($mes);
                    //     var_dump($anio);
                    //     echo "<br>";
                    
                    //     // Realizar acciones con los datos de la fecha
                    //     echo '<script>disableDay(' . $dia . ', ' . $mes . ', ' . $anio . ');</script>';
                        
                    // }

                //* -----plan B--
                // $fechasReservadasJSON = json_encode($fechasReservadas);
                // echo '<script>getReservedDays(' . $fechasReservadasJSON . ');</script>';

                        // echo '<script>disableDaysofaMonth();</script>';
                 
                //* ----- plan C ----
                // Generar un bloque de script y asignar el valor de $fechasReservadas a una variable JavaScript
                echo '<script>';
                echo 'var fechasReservadas = ' . json_encode($fechasReservadas) . ';';
                echo '</script>';
                echo '<script>getReservedDays();</script>';
                // con lo de arriba automáticamente tengo acceso a la lista en js

                ?>
            </section>
        </section>


        <section id="paso2" class="pasos">
            <h1><span>PASO 2.</span> Horario</h1>
            <h6>Elige el horario perfecto para tu evento <br> (5hrs de duración, hora límite 10 p.m.)</h6>

            <div id="horario">
                <div id="horaInicio">
                    <p>Hora de Inicio</p>
                    <select title="seleccionarHora" name="horaSelec" id="horaSelect" onchange="SeleccionarHorario();">
                        <option selected id="5" value="5">5 p. m.</option>
                        <option id="4" value="4">4 p. m.</option>
                        <option id="3" value="3">3 p. m.</option>
                        <option id="2" value="2">2 p. m.</option>
                        <option id="1" value="1">1 p. m.</option>
                    </select>
                </div>

                <div id="horaTermino">
                    <p>Hora de término</p>
                    <!-- <p class="hrTermino" onload="inicio()"></p> -->
                    <span id="hrTermino"></span>
                </div>
            </div>
            <div class="botones">
                <a href="#paso1" class="btn back_btn">Atrás</a>
                <div></div>
                <a href="#paso3" class="btn">Siguiente</a>
            </div>
        </section>

        <section id="paso3" class="pasos">
            <h1><span>PASO 3.</span> Horas extras</h1>
            <h6>Puedes tener las horas extras que quieras siempre y cuando no exceda las 11 p. m. ($300 mx por cada hora extra).</h6>

            <div id="infoPaso3">
                <div di="P3">
                    <h6><span>Horario</span></h6>
                    <p id="horarioInicial"></p>
                    <p class="costoP3">$2,190</p>
                </div>

                <div class="op">
                    <h6>+</h6>
                </div>

                <div di="P3">
                    <h6><span>Horas extras</span></h6>
                    <select title="selectHrsExtra" name="hrsExtra" id="horasExtra" onchange="setValuesPaso3();">
                        <option selected id="0h" value="0">0</option>
                        <option id="1h" value="1">1 hr</option>
                        <option id="2h" value="2">2 hrs</option>
                        <option id="3h" value="3">3 hrs</option>
                        <option id="4h" value="4">4 hrs</option>
                        <option id="5h" value="5">5 hrs</option>
                    </select>
                    <p class="costoP3" id="costoExtraP3"></p>
                </div>

                <div class="op">
                    <h6>=</h6>
                </div>

                <div di="P3">
                    <h6><span>Horario final</span></h6>
                    <p id="horarioFinal"></p>
                    <p class="costoP3" id="costoConHrsExtra"></p>
                </div>
            </div>

            <div class="botones">
                <a href="#paso2" class="btn back_btn">Atrás</a>
                <div></div>
                <a href="#paso4" class="btn">Siguiente</a>
            </div>
        </section>

        <section id="paso4" class="pasos">
            <h1><span>PASO 4. <br></span> ¿Puedo llegar antes que inicie mi evento?</h1>
            <h6>Puedes llegar hasta 2 horas antes de tu evento para llevar cosas o decorar.</h6>

            <div class="botones">
                <a href="#paso3" class="btn back_btn">Atrás</a>
                <div></div>
                <a href="#paso5" class="btn">De acuerdo</a>
            </div>
        </section>

        <section id="paso5" class="pasos">
            <h1><span>PASO 5.</span> Servicios adicionales</h1>
            <h6>Puedes elegir uno más servicios adicionales para que tu evento sea memorable ($300.00 mx por cada servicio).</h6>

            <div id="adicionales">
                <div class="adicional">
                    <img src="../imgs/index/ludoteca.jpeg" alt="" id="ludotecaSelect" onclick="addAdicional(1)">
                    <h5>Ludoteca</h5>
                </div>
                <div class="adicional">
                    <img src="../imgs/index/fut.jpg" alt="" id="futSelect" onclick="addAdicional(2)">
                    <h5>Futbolito</h5>
                </div>
                <div class="adicional">
                    <img src="../imgs/index/balcon.jpg" alt="" id="balconSelect" onclick="addAdicional(3)">
                    <h5>Balcón</h5>
                </div>
            </div>

            <div class="botones">
                <a href="#paso4" class="btn back_btn">Atrás</a>
                <div>
                    <p id="costAdicionales"></p>
                </div>
                <a href="#finalStep" class="btn">Listo</a>
            </div>
        </section>

        <section id="finalStep">
            <br><br><br><br>
            <div id="resumenEvento">
                <div class="resumen">
                    <h2>¡Tu evento será grandioso!</h2>
                    <br>
                    <h3>Resumen</h3>
                    <h4>Fecha: <span id="fechaLetra"></span></h4>

                    <div class="hrsResumen">
                        <div class="hrResumen">
                            <p>Puedes ir desde las:</p>
                            <h5 id="hrDesdeResumen" class="hrResumenTarget"></h5>
                        </div>
                        <div class="hrResumen">
                            <p>Tu evento inicia a las:</p>
                            <h5 id="hrInicioResumen" class="hrResumenTarget"></h5>
                        </div>
                        <div class="hrResumen">
                            <p>Tu evento termina a las:</p>
                            <h5 id="hrFinResumen" class="hrResumenTarget"></h5>
                        </div>
                    </div>

                    <h4>Tu evento incluye:</h4>
                    <div id="itemsIncluidos">
                        <div class="item">
                            <img src="../imgs/icons/c_mobiliario.png" alt="">
                            <p>Mobiliario</p>
                        </div>
                        <div class="item">
                            <img src="../imgs/icons/c_asador.png" alt="">
                            <p>Asador</p>
                        </div>
                        <div class="item">
                            <img src="../imgs/icons/c_cocina.png" alt="">
                            <p>Cocina <br> equipada</p>
                        </div>
                        <div class="item">
                            <img src="../imgs/icons/c_toldo.png" alt="">
                            <p>Toldo</p>
                        </div>
                        <div class="item">
                            <img src="../imgs/icons/c_tv.png" alt="">
                            <p>TV y <br> sonido</p>
                        </div>
                    </div>

                    <h4>Servicios adicionales:</h4>
                    <div id="itemsIncluidos">
                        <div class="item" id="itemNinguno">
                            <p>Sin adicionales</p>
                        </div>
                        <div class="item" id="itemLudoteca">
                            <img src="../imgs/icons/d_ludoteca.png" alt="">
                            <p>Ludoteca</p>
                        </div>
                        <div class=" item" id="itemFut">
                            <img src="../imgs/icons/d_futbolito.png " alt=" ">
                            <p>Futbolito</p>
                        </div>
                        <div class="item" id="itemBalcon">
                            <img src="../imgs/icons/d_balcon.png " alt=" ">
                            <p>Balcón</p>
                        </div>
                    </div>

                    <h4>Costos</h4>
                    <div class="infoCostoResumen">
                        <p class="descResumen">Salón</p>
                        <p class="cantResumen">5 hrs</p>
                        <p class="costResumen">$2,190</p>
                    </div>
                    <div class="infoCostoResumen">
                        <p class="descResumen">Horas extra</p>
                        <p class="cantResumen" id="cant2"></p>
                        <p class="costResumen" id="cost2"></p>
                    </div>
                    <div class="infoCostoResumen">
                        <p class="descResumen">Servicios adicionales</p>
                        <p class="cantResumen" id="cant3"></p>
                        <p class="costResumen" id="cost3"></p>
                    </div>
                    <div class="infoCostoResumen totResumen">
                        <p class="descResumen">Total</p>
                        <p class="costResumen" id="costTotal"></p>
                    </div>
                    <br>
                    <h4 id="agendacon">¡Agenda con solo $1000 mx y paga el resto el día de tu evento!</h4>
                    <br>
                    <div class="btnAgendar">
                        <form id="sigPagResumen" method="POST" action="./generaContrato.php">
                            <a class="large_btn"  href="javascript:{}" onclick="validacionFecha()">Agendar </a>
                            <!-- <a class="large_btn"  href="javascript:{}" onclick="creaForms()">Agendar </a> -->
                        </form>
                        <!-- <form id="sigPagResumen" method="POST" action="./prueba_resultado.php">
                            <a class="large_btn"  href="javascript:{}" onclick="creaForms()">Prueba </a>
                        </form> -->
                    </div>
                </div>

            </div>
        </section>

    </main>

    <?php
        include "../pages/commonPages/footer.php";
    ?>

    <!-- <script type="text/javascript " src="../js/function_calendar.js"></script> -->
    <script type="text/javascript " src="../js/funcionesCalendario.js"></script>
    <script type="text/javascript " src="../js/function_enLinea.js "></script>


    <script type="text/javascript " src="../js/prueba.js"></script>

    <!-- *BOOTSTRAP JS INTERNO -->
    <script src="../js/bootstrap.min.js "></script>
</body>

</html>
                <?php
                    // vinculamos con conexión para vincular a la BD
                    require_once "../sql/CAD.php"; //entre "" ponemos la dirección del archivo
                    $cad = new CAD();

                    if ($agendado == false) {
                        // No hacer nada
                    } else {
                        // $cad = new CAD();
                        // $numContrato = $cad->consultaIDevento($selectedDay, $selectedMonth, $selectedYear); //ve si existe el cliente

                        // Contrato num ###
                        $eventoID = $cad->consultaIDevento($selectedDay, $selectedMonth, $selectedYear);
                        // var_dump($eventoID);
                        // echo "<h3>Contrato num: $eventoID</h3>";
                    }

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
                <h2 id="esteTuContrato">¡Este es tu contrato!</h2>

                <p id="introContrato">Contrato de prestación de servicios de eventos sociales, que celebran por una parte Marco Antonio López Arriaga a quien en lo sucesivo se le denominara “EL PRESTADOR DEL SERVICIO”, y por la otra <?php echo $insertNombre ?> a quien en lo sucesivo se le denominara “EL CONSUMIDOR”, al tenor de las siguientes declaraciones y cláusulas:</p>
                <br>
                <h3>DECLARACIONES</h3>
                <h5>I.- Declara “EL PRESTADOR DEL SERVICIO”:</h5>
                <p><b>A)</b> Que su domicilio se encuentra ubicado en Fray Diego de la Magdalena #46A con número 
                    telefónico 4441315125, con correo electrónico salonelpuno@gmail.com. </p>
                <p><b>B)</b> Que cuenta con la capacidad, infraestructura, servicios y recursos necesarios para dar
                    cumplimiento a las obligaciones contenidas en el presente contrato.</p>
                <h5>II.- DECLARA “EL CONSUMIDOR”:</h5>
                <p><b>A)</b> Llamarse como ha quedado plasmado en el proemio de este contrato.</p>
                <p><b>B)</b> Que es su deseo obligarse en los términos y condiciones del presente contrato, que tiene 
                    nacionalidad mexicana y es mayor de edad. Que su domicilio se encuentra ubicado en <b><?php echo $insertDireccion?>, 
                    teléfono <?php echo $insertCelular?> y correo electrónico <?php echo $email?>. </b> <br><br> Expuesto lo anterior, las partes se sujetan al contenido de las siguientes: </p>
                <br>
                <h3>CLÁUSULAS</h3>
                <p><b>PRIMERA</b> -  El objeto del presente contrato es la prestación de servicios para la organización 
                    de un evento social para 50 personas máximo, el cual se llevará a cabo el día <b><?php echo $selectedDay?> del mes 
                    de <?php echo $mesLetra?> del año <?php echo $selectedYear?>, iniciando el evento 
                    a las <?php echo $hrInicio?> pm y terminará a las <?php echo $horarioFinalConHrsExtra?> pm</b>, en el salón “El puño de tierra” ubicado 
                    en Fray Diego de la Magdalena #46ª, Saucito.</p>
                <p>EL PRESTADOR DEL SERVICIO podrá cobrar una cantidad adicional, debidamente prevista 
                    en el presupuesto, en el caso de que el evento prolongue su duración y/o el número de 
                    invitados exceda del estipulado (a menos que se tenga el permiso del PRESTADOR DE 
                    SERVICIOS). Se ofrecerá a EL CONSUMIDOR 20 minutos después de la terminación del 
                    evento para recoger sus pertenencias. La duración del evento no podrá rebasar el horario de 
                    las 22:00 hrs. (a excepción que se pague por la extensión de la duración del evento por hora, 
                    en ese caso sería hasta las 23:00 hrs.)
                    </p>
                <p><b>SEGUNDA</b> - El precio total que EL CONSUMIDOR debe solventar por la prestación del servicio 
                    es el estipulado en el presupuesto que forma parte del presente contrato, no importando si el 
                    número de asistentes al evento es inferior al estipulado.</p>
                <p><b>A)</b> El CONSUMIDOR deberá otorgar la cantidad de <b>$1000.00 (Mil pesos 00/100 M.N.) </b>a la 
                    firma del presente contrato por concepto de anticipo. </p>
                <p><b>B)</b> El CONSUMIDOR deberá pagar la cantidad restante de <b><?php echo "$" . $restante?></b> antes o el mismo día del evento antes de iniciar el mismo</p>
                <p>Por el pago del anticipo, EL PRESTADOR DEL SERVICIO deberá expedir el comprobante 
                    respectivo, el que contendrá por lo menos la siguiente información: fecha e importe del 
                    anticipo, nombre y firma de la persona debidamente autorizada que recibe el anticipo, el 
                    concepto y el nombre de EL CONSUMIDOR. </p>
                <p><b>TERCERA</b> - EL CONSUMIDOR se obliga al pago de servicios excedentes, imprevistos, o 
                    daños o perjuicios en su caso. Dicho pago será si durante o al finalizar el evento se verificó
                    alguno de esos supuestos, igualmente en caso de encontrarse algún daño o faltante el día 
                    posterior al evento. </p>
                <p><b>CUARTA</b> - EL CONSUMIDOR cuenta con un plazo de 2 días hábiles posteriores a la firma del 
                    presente contrato para cancelar la operación sin responsabilidad alguna, en cuyo caso EL 
                    PRESTADOR DEL SERVICIO se obliga a reintegrar todas las cantidades que EL 
                    CONSUMIDOR le haya entregado. Si la cancelación se realiza después de los dos días hábiles 
                    antes señalados, EL CONSUMIDOR deberá indemnizar a EL PRESTADOR DEL SERVICIO 
                    por los gastos generados por un 30% del precio total de la operación.</p>
                <p><b>QUINTA</b> - En caso de que el CONSUMIDOR quisiera cambiar la fecha del evento, se deberá 
                    hacer con un plazo mayor a 15 días antes del evento agendado y deberá pagar una 
                    penalización de $300 pesos, después del tiempo estipulado no será posible cambiar la fecha 
                    del evento.</p>
                <p><b>SEXTA</b> - EL CONSUMIDOR se obliga a cumplir con conductas favorables, cuidar el inmueble, 
                    y procurar que los asistentes al evento observen la misma conducta. El PRESTADOR DE 
                    SERVICIOS tiene la facultad de dar por terminado el evento en caso de que se presente un
                    incumplimiento a esta cláusula y/o excedente de volumen (considerando que es un espacio 
                    para eventos familiares).</p>
                <p><b>SEPTIMA</b> - En caso de que EL PRESTADOR DEL SERVICIO incurra en incumplimiento del 
                    presente contrato por causas imputables a él, se obliga a elección de EL CONSUMIDOR a 
                    reintegrar las cantidades que se le hubieren entregado y a pagar una pena convencional del 
                    20% del precio total del servicio. </p>
                <p><b>OCTAVA</b> Si los bienes destinados a la prestación del servicio sufrieren un menoscabo por 
                    culpa o negligencia debidamente comprobada de EL CONSUMIDOR o de sus invitados, éste 
                    se obliga a cubrir los gastos de reparación de los mismos, o en su caso, indemnizar al prestador 
                    del servicio con el 100% de su valor.</p>
                <p><b>NOVENA</b> - Las partes podrán acordar que EL CONSUMIDOR, contrate libremente servicios 
                    específicos relacionados con el evento social con otros prestadores de servicios por así 
                    convenir a sus intereses, A EXCEPCIÓN DE CONTRATACIÓN DE DJ O EQUIPOS DE 
                    SONIDO. Por lo que en caso de actualizarse dicho supuesto EL CONSUMIDOR exime de toda 
                    responsabilidad a EL PRESTADOR DEL SERVICIO en lo que respecta a dichos servicios en 
                    específico. </p>
                <p><b>DECIMA</b> - En caso de que EL PRESTADOR DEL SERVICIO se encuentre imposibilitado para 
                    prestar el servicio por caso fortuito o fuerza mayor, como incendio, temblor u otros 
                    acontecimientos de la naturaleza o hechos del hombre ajenos a la voluntad de EL 
                    PRESTADOR DEL SERVICIO, no se incurrirá en incumplimiento, únicamente EL 
                    PRESTADOR DEL SERVICIO reintegrará a EL CONSUMIDOR, el anticipo que le hubiera 
                    entregado. </p>
                <br>
                <!-- <span>Ok</span> -->
                <div id="resumenEvento">
                <div class="resumen">

                    <div class="infoCostoResumen totResumen">
                        <p class="descResumen">Apartado</p>
                        <p class="costResumen">$1000</p>
                    </div>
                    <hr>

                    <h2>¡Tu evento será grandioso!</h2>
                    <br>
                    <h3>Resumen</h3>
                    <h4>Fecha: <span id="fechaLetra"><?php echo $selectedDay . "/" . $selectedMonth . "/" . $selectedYear; ?></span></h4>

                    <div class="hrsResumen">
                        <div class="hrResumen">
                            <p>Puedes ir desde las:</p>
                            <!-- <h5 id="hrDesdeResumen" class="hrResumenTarget"> <? echo "hola" ?> </h5> -->
                            <!-- <h5 id="hrDesdeResumen" class="hrResumenTarget"></h5> -->
                            <h5 id="hrInicioResumen" class="hrResumenTarget"> <?php echo $puedesIrDesde ?> </h5>
                            

                        </div>
                        <div class="hrResumen">
                            <p>Tu evento inicia a las:</p>
                            <h5 id="hrInicioResumen" class="hrResumenTarget"> <?php echo $hrInicio . " pm" ?> </h5>
                        </div>
                        <div class="hrResumen">
                            <p>Tu evento termina a las:</p>
                            <h5 id="hrFinResumen" class="hrResumenTarget"> <?php echo $horarioFinalConHrsExtra . " pm" ?> </h5>
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
                        <?php
                        $trueValue = true;
                        if($costoAdicionales == 0)
                        {
                            echo "<div class='item' id='itemNinguno'>
                                    <p>Sin adicionales</p>
                                </div>";
                        }else{
                            
                            // echo $ludSelected;
                            // echo $futSelected;
                            // echo $balconSelected;
                            if($ludSelected == "true"){
                                echo "<div class='item' id='itemLudoteca'>
                                        <img src='../imgs/icons/d_ludoteca.png' alt=''>
                                        <p>Ludoteca</p>
                                    </div>";
                            };
                            if($futSelected == "true"){
                                echo "<div class=' item' id='itemFut'>
                                        <img src='../imgs/icons/d_futbolito.png ' alt=''>
                                        <p>Futbolito</p>
                                    </div>";
                            };
                            if($balconSelected == "true"){
                                echo "<div class='item' id='itemBalcon'>
                                        <img src='../imgs/icons/d_balcon.png ' alt=''>
                                        <p>Balcón</p>
                                    </div>";
                            };
                        }
                        ?>
                    </div>

                    <h4>Costos</h4>
                    <div class="infoCostoResumen">
                        <p class="descResumen">Salón</p>
                        <p class="cantResumen">5 hrs</p>
                        <p class="costResumen">$2,190</p>
                    </div>
                    <div class="infoCostoResumen">
                        <p class="descResumen">Horas extra</p>
                        <p class="cantResumen" id="cant2"> <?php echo $hrsExtra . " hrs" ?> </p>
                        <p class="costResumen" id="cost2"> <?php echo "$" . $costoHrsExtra?> </p>
                    </div>
                    <div class="infoCostoResumen">
                        <p class="descResumen">Servicios adicionales</p>
                        <p class="cantResumen" id="cant3"> <?php echo $numAdicionales . " servicios" ?> </p>
                        <p class="costResumen" id="cost3"> <?php echo "$" . $costoAdicionales ?> </p>
                    </div>
                    <div class="infoCostoResumen totResumen">
                        <p class="descResumen">Total</p>
                        <p class="costResumen" id="costTotal"> <?php echo "$" . $costoTotal ?> </p>
                    </div>
                    <hr>
                    <div class="infoCostoResumen totResumen">
                        <p class="descResumen">Apartado</p>
                        <p class="costResumen">$1000</p>
                    </div>
                    <div class="infoCostoResumen totResumen">
                        <p class="descResumen">Restante</p>
                        <p class="costResumen" id="cosRestante"> <?php echo "$" . $restante ?> </p>
                    </div>
                </div>
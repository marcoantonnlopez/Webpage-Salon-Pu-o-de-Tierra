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
                        <!-- <div class="item" id="itemNinguno">
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
                        </div> -->
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

            </div>
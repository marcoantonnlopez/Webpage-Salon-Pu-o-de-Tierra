<?php
                // var_dump($eventoID);
                $selectedDay = $cad->consultaDiaEvento($eventoID);
                $selectedMonth = $cad->consultaMesEvento($eventoID);
                $selectedYear = $cad->consultaAnioEvento($eventoID);
                
                $hrInicio = $cad->consultaHrInicioEvento($eventoID);
                $hrsExtra = $cad->consultaHrExtraEvento($eventoID);
                $horarioFinalConHrsExtra = $cad->consultaHrTerminoEvento($eventoID);
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
                
                $ludSelected = $cad->consultaLudotecaEvento($eventoID);
                $futSelected = $cad->consultaFutbolitoEvento($eventoID);
                $balconSelected = $cad->consultaBalconEvento($eventoID);
                
                // COSTOS
                // $hrsExtraNum = intval($hrsExtra);
                // $costoHrsExtra = $hrsExtraInt * 300;
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

                $costoTotal = $cad->consultaCostoTotalEvento($eventoID);
                $costoRestante = $cad->consultaCostoRestanteEvento($eventoID);

                $restante = $costoRestante; //esto es por un error en evento.php
            ?>
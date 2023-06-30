// Variables Paso 2
var hrInicio;
var hrFinal;
// Variables Paso 3
var hrsExtra;
var costoHrsExtra;
var horarioFinalConHrsExtra;
var costoFinalConHrsExtra;
// Variables Paso 5
var ludSelected = false;
var futSelected = false;
var balconSelected = false;
var costoAdicionales = 0;
// Total
var costoTotal = 2190;

function inicio() {
    SeleccionarHorario();

    // document.getElementById("costTotal").innerHTML = '$' + `${costoTotal.toString()}`;
}

//*PASO 2

function SeleccionarHorario() {
    let horaSelect = document.getElementById('horaSelect'); //guarda la hora
    hrInicio = parseInt(horaSelect.value); // convierte el valor a un número entero
    hrFinal = hrInicio + 5; // suma 5 al valor seleccionado
    // console.log(hrFinal);

    document.getElementById('hrTermino').innerText = `${hrFinal.toString()}` + ' p. m.';

    // Poner en resumen
    if (hrInicio == 1) {
        document.getElementById("hrDesdeResumen").innerHTML = '11' + ' a. m.'

    } else {
        if (hrInicio == 2) {
            document.getElementById("hrDesdeResumen").innerHTML = '12' + ' p. m.'

        } else {
            document.getElementById("hrDesdeResumen").innerHTML = `${(hrInicio-2).toString()}` + ' p. m.'
        }
    }
    document.getElementById("hrInicioResumen").innerHTML = `${hrInicio.toString()}` + ' p. m.'
        // if (costoHrsExtra != null) {
        //     costoTotal -= costoHrsExtra;
        // }
        // console.log("help");

    // Paso 3
    setOptionsHrsExtra();
    setValuesPaso3();

    document.getElementById("costAdicionales").innerHTML = "$" + `${costoAdicionales.toString()}`;


    // Poner en resumen

}

//* PASO 3
function setValuesPaso3() {

    document.getElementById('horarioInicial').innerHTML = `${hrInicio.toString()}` + ' p. m. - ' + `${hrFinal.toString()}` + ' p. m.'; //escribir el horario

    let hrsExtraAux = document.getElementById('horasExtra'); //guarda la hora extra
    hrsExtra = parseInt(hrsExtraAux.value);
    costoHrsExtra = hrsExtra * 300;
    // console.log(costoHrsExtra);
    // costoTotal += costoHrsExtra;
    // document.getElementById("costTotal").innerHTML = '$' + `${costoTotal.toString()}`;


    document.getElementById('costoExtraP3').innerHTML = '$' + `${costoHrsExtra.toString()}`; //escribir el costo de las horas extra

    horarioFinalConHrsExtra = hrFinal + hrsExtra;
    document.getElementById('horarioFinal').innerHTML = `${hrInicio.toString()}` + ' p. m. - ' + `${horarioFinalConHrsExtra.toString()}` + ' p. m.'; //escribe horario final

    costoFinalConHrsExtra = 2190 + costoHrsExtra;
    document.getElementById('costoConHrsExtra').innerHTML = '$' + `${costoFinalConHrsExtra.toString()}`;

    // Poner en resumen
    document.getElementById("hrFinResumen").innerHTML = `${horarioFinalConHrsExtra.toString()}` + ' p. m.'
    document.getElementById("cant2").innerHTML = `${hrsExtra.toString()}` + ' hrs';
    document.getElementById("cost2").innerHTML = '$' + `${costoHrsExtra.toString()}`;
    // Resumen adicionales
    var cantServicios = costoAdicionales / 300;
    document.getElementById("cant3").innerHTML = `${cantServicios.toString()}` + ' servicio';
    document.getElementById("cost3").innerHTML = '$' + `${costoAdicionales.toString()}`;
    if (cantServicios >= 2) {
        document.getElementById("cant3").innerHTML = `${cantServicios.toString()}` + ' servicios';
    }
    // Resumen Total
    costoTotal = 2190;
    costoTotal += costoHrsExtra;
    costoTotal += costoAdicionales;
    document.getElementById("costTotal").innerHTML = '$' + `${costoTotal.toString()}`;

}

function setOptionsHrsExtra() {
    if (hrFinal == 10) {
        // ? OCULTAR
        if (document.getElementById('2h').style.display != "none") {
            const miSelect = document.getElementById("horasExtra");
            const opcion2 = miSelect.querySelector("option[value='2']");
            opcion2.style.display = "none";
        }

        if (document.getElementById('3h').style.display != "none") {
            const miSelect = document.getElementById("horasExtra");
            const opcion2 = miSelect.querySelector("option[value='3']");
            opcion2.style.display = "none";
        }

        if (document.getElementById('4h').style.display != "none") {
            const miSelect = document.getElementById("horasExtra");
            const opcion2 = miSelect.querySelector("option[value='4']");
            opcion2.style.display = "none";
        }

        if (document.getElementById('5h').style.display != "none") {
            const miSelect = document.getElementById("horasExtra");
            const opcion2 = miSelect.querySelector("option[value='5']");
            opcion2.style.display = "none";
        }
        // Seleccionar la primera opción
        document.getElementById("horasExtra").selectedIndex = 0;
        // if (costoHrsExtra != null) {
        //     costoTotal -= costoHrsExtra;
        // }

    }

    if (hrFinal == 9) {
        // ? MOSTRAR
        if (document.getElementById('2h').style.display == "none") {
            document.querySelector('option[id="2h"]').style.display = "block";
        }

        // ? OCULTAR
        if (document.getElementById('3h').style.display != "none") {
            const miSelect = document.getElementById("horasExtra");
            const opcion2 = miSelect.querySelector("option[value='3']");
            opcion2.style.display = "none";
        }

        if (document.getElementById('4h').style.display != "none") {
            const miSelect = document.getElementById("horasExtra");
            const opcion2 = miSelect.querySelector("option[value='4']");
            opcion2.style.display = "none";
        }

        if (document.getElementById('5h').style.display != "none") {
            const miSelect = document.getElementById("horasExtra");
            const opcion2 = miSelect.querySelector("option[value='5']");
            opcion2.style.display = "none";
        }
        document.getElementById("horasExtra").selectedIndex = 0;
        // if (costoHrsExtra != null) {
        //     costoTotal -= costoHrsExtra;
        // }
    }

    if (hrFinal == 8) {
        // ? MOSTRAR
        if (document.getElementById('2h').style.display == "none") {
            document.querySelector('option[id="2h"]').style.display = "block";
        }

        if (document.getElementById('3h').style.display == "none") {
            document.querySelector('option[id="3h"]').style.display = "block";
        }

        // ? OCULTAR
        if (document.getElementById('4h').style.display != "none") {
            const miSelect = document.getElementById("horasExtra");
            const opcion2 = miSelect.querySelector("option[value='4']");
            opcion2.style.display = "none";
        }

        if (document.getElementById('5h').style.display != "none") {
            const miSelect = document.getElementById("horasExtra");
            const opcion2 = miSelect.querySelector("option[value='5']");
            opcion2.style.display = "none";
        }
        document.getElementById("horasExtra").selectedIndex = 0;
        // if (costoHrsExtra != null) {
        //     costoTotal -= costoHrsExtra;
        // }
    }

    if (hrFinal == 7) {
        // ? MOSTRAR
        if (document.getElementById('2h').style.display == "none") {
            document.querySelector('option[id="2h"]').style.display = "block";
        }

        if (document.getElementById('3h').style.display == "none") {
            document.querySelector('option[id="3h"]').style.display = "block";
        }

        if (document.getElementById('4h').style.display == "none") {
            document.querySelector('option[id="4h"]').style.display = "block";
        }

        // ? OCULTAR
        if (document.getElementById('5h').style.display != "none") {
            const miSelect = document.getElementById("horasExtra");
            const opcion2 = miSelect.querySelector("option[value='5']");
            opcion2.style.display = "none";
        }
        document.getElementById("horasExtra").selectedIndex = 0;
        // if (costoHrsExtra != null) {
        //     costoTotal -= costoHrsExtra;
        // }
    }

    if (hrFinal == 6) {
        // ? MOSTRAR
        if (document.getElementById('2h').style.display == "none") {
            document.querySelector('option[id="2h"]').style.display = "block";
        }

        if (document.getElementById('3h').style.display == "none") {
            document.querySelector('option[id="3h"]').style.display = "block";
        }

        if (document.getElementById('4h').style.display == "none") {
            document.querySelector('option[id="4h"]').style.display = "block";
        }

        if (document.getElementById('5h').style.display == "none") {
            document.querySelector('option[id="5h"]').style.display = "block";
        }

        document.getElementById("horasExtra").selectedIndex = 0;
        // if (costoHrsExtra != null) {
        //     costoTotal -= costoHrsExtra;
        // }
    }

}

// * PASO 5
function addAdicional(option) {
    //? SELECCIONAR
    if (option == 1 && ludSelected == false) {
        document.getElementById("ludotecaSelect").style.boxShadow = "0px 0px 50px rgba(253, 173, 34, 0.805)";
        document.getElementById("ludotecaSelect").style.border = "solid #C38937";
        costoAdicionales += 300;
        document.getElementById("costAdicionales").innerHTML = "$" + `${costoAdicionales.toString()}`;
        ludSelected = true;

        // RESUMEN
        addAdicionalResumen("itemLudoteca");
    } else {
        if (option == 2 && futSelected == false) {
            document.getElementById("futSelect").style.boxShadow = "0px 0px 50px rgba(253, 173, 34, 0.805)";
            document.getElementById("futSelect").style.border = "solid #C38937";
            costoAdicionales += 300;
            document.getElementById("costAdicionales").innerHTML = "$" + `${costoAdicionales.toString()}`;
            futSelected = true;

            // RESUMEN
            addAdicionalResumen("itemFut");
        } else {
            if (option == 3 && balconSelected == false) {
                document.getElementById("balconSelect").style.boxShadow = "0px 0px 50px rgba(253, 173, 34, 0.805)";
                document.getElementById("balconSelect").style.border = "solid #C38937";
                costoAdicionales += 300;
                document.getElementById("costAdicionales").innerHTML = "$" + `${costoAdicionales.toString()}`;
                balconSelected = true;

                // RESUMEN
                addAdicionalResumen("itemBalcon");
            } else {
                //? DESELECCIONAR
                if (option == 1 && ludSelected == true) {
                    document.getElementById("ludotecaSelect").style.boxShadow = "none";
                    document.getElementById("ludotecaSelect").style.border = "none";
                    costoAdicionales -= 300;
                    document.getElementById("costAdicionales").innerHTML = "$" + `${costoAdicionales.toString()}`;
                    ludSelected = false;

                    // RESUMEN
                    deleteAdicionalResumen("itemLudoteca");
                } else {
                    if (option == 2 && futSelected == true) {
                        document.getElementById("futSelect").style.boxShadow = "none";
                        document.getElementById("futSelect").style.border = "none";
                        costoAdicionales -= 300;
                        document.getElementById("costAdicionales").innerHTML = "$" + `${costoAdicionales.toString()}`;
                        futSelected = false;

                        // RESUMEN
                        deleteAdicionalResumen("itemFut");
                    } else {
                        if (option == 3 && balconSelected == true) {
                            document.getElementById("balconSelect").style.boxShadow = "none";
                            document.getElementById("balconSelect").style.border = "none";
                            costoAdicionales -= 300;
                            document.getElementById("costAdicionales").innerHTML = "$" + `${costoAdicionales.toString()}`;
                            balconSelected = false;

                            // RESUMEN
                            deleteAdicionalResumen("itemBalcon");
                        }
                    }
                }
            }
        }
    }

    var cantServicios = costoAdicionales / 300;
    document.getElementById("cant3").innerHTML = `${cantServicios.toString()}` + ' servicio';
    document.getElementById("cost3").innerHTML = '$' + `${costoAdicionales.toString()}`;
    if (cantServicios >= 2) {
        document.getElementById("cant3").innerHTML = `${cantServicios.toString()}` + ' servicios';
    }

    // Resumen Total
    costoTotal = 2190;
    costoTotal += costoHrsExtra;
    costoTotal += costoAdicionales;
    document.getElementById("costTotal").innerHTML = '$' + `${costoTotal.toString()}`;

    // document.getElementById("cant3").innerHTML = 'servicios';
}

// * RESUMEN
function addAdicionalResumen(item) {
    if (document.getElementById("itemNinguno").style.display != "none") {
        document.getElementById("itemNinguno").style.display = "none";
    }
    document.getElementById(item).style.display = "block";
}

function deleteAdicionalResumen(item) {
    document.getElementById(item).style.display = "none";

    if (costoAdicionales == 0) {
        document.getElementById("itemNinguno").style.display = "block";
    }
}


//* --------------------- CREA FORMS ------------------------

function creaForms() {
    var padre = document.getElementById("sigPagResumen");

    creaElementoForms("hrInicio", hrInicio, padre);
    creaElementoForms("hrFinal", hrFinal, padre);

    creaElementoForms("hrsExtra", hrsExtra, padre);
    creaElementoForms("costoHrsExtra", costoHrsExtra, padre);
    creaElementoForms("horarioFinalConHrsExtra", horarioFinalConHrsExtra, padre);
    creaElementoForms("costoFinalConHrsExtra", costoFinalConHrsExtra, padre);

    creaElementoForms("ludSelected", ludSelected, padre);
    creaElementoForms("futSelected", futSelected, padre);
    creaElementoForms("balconSelected", balconSelected, padre);
    creaElementoForms("costoAdicionales", costoAdicionales, padre);

    creaElementoForms("costoTotal", costoTotal, padre);

    padre.submit(); //enviar
}

function creaElementoForms(info, val, padre) {
    var elemento = document.createElement("input");

    elemento.setAttribute("type", "hidden");
    elemento.setAttribute("name", info);
    elemento.setAttribute("value", val);
    console.log(elemento.value);

    padre.appendChild(elemento); //agregamos el elemento al formulario
}




//* ----------- FUNCIONES PARA MODIFICAR EVENTO ----------

function creaFormsCancelar() {
    var padre = document.getElementById("sigPagResumen");

    creaElementoForms("hrInicio", hrInicio, padre);
    creaElementoForms("hrFinal", hrFinal, padre);

    creaElementoForms("hrsExtra", hrsExtra, padre);
    creaElementoForms("costoHrsExtra", costoHrsExtra, padre);
    creaElementoForms("horarioFinalConHrsExtra", horarioFinalConHrsExtra, padre);
    creaElementoForms("costoFinalConHrsExtra", costoFinalConHrsExtra, padre);

    creaElementoForms("ludSelected", ludSelected, padre);
    creaElementoForms("futSelected", futSelected, padre);
    creaElementoForms("balconSelected", balconSelected, padre);
    creaElementoForms("costoAdicionales", costoAdicionales, padre);

    creaElementoForms("costoTotal", costoTotal, padre);

    padre.submit(); //enviar
}
const calendar = document.querySelector('.calendar');
const prevBtn = calendar.querySelector('.prev-btn');
const nextBtn = calendar.querySelector('.next-btn');
const monthYear = calendar.querySelector('.month-year');
const calendarBody = calendar.querySelector('.calendar-body');

let selectedDay = null;
let selectedMonth = null;
let selectedYear = null;


let currentDate = new Date();

function getReservedDays() {
    console.log(fechasReservadas);
    generateCalendar();

}

function generateCalendar() {
    // Limpiamos el contenido del cuerpo del calendario
    calendarBody.innerHTML = '';

    // Creamos los nombres de los días de la semana
    const weekDays = ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'];

    // Creamos las celdas de los días de la semana
    for (let i = 0; i < weekDays.length; i++) {
        const cell = document.createElement('div');
        cell.classList.add('day');
        cell.textContent = weekDays[i];
        calendarBody.appendChild(cell);
    }

    // Obtenemos el primer día del mes actual y el último día del mes actual
    const firstDayOfMonth = new Date(currentDate.getFullYear(), currentDate.getMonth(), 1);
    const lastDayOfMonth = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 0);

    // Creamos las celdas de los días del mes anterior
    const prevMonthDays = firstDayOfMonth.getDay() === 0 ? 0 : firstDayOfMonth.getDay();
    // console.log(prevMonthDays);
    for (let i = prevMonthDays; i >= 1; i--) {
        const day = new Date(currentDate.getFullYear(), currentDate.getMonth() - 1, new Date(currentDate.getFullYear(), currentDate.getMonth() - 1, i).getDate());
        const cell = document.createElement('div');
        cell.classList.add('day', 'disabled');
        cell.textContent = day.getDate();

        // Agrega estas líneas para mostrar el día anterior
        if (day.getDate() === 1) {
            const prevMonthLastDay = new Date(currentDate.getFullYear(), currentDate.getMonth(), 0);
            cell.textContent = prevMonthLastDay.getDate();
        }

        calendarBody.appendChild(cell);
    }


    // Creamos las celdas de los días del mes actual
    for (let i = 1; i <= lastDayOfMonth.getDate(); i++) {
        const day = new Date(currentDate.getFullYear(), currentDate.getMonth(), i);
        const cell = document.createElement('div');
        cell.classList.add('day');
        cell.textContent = day.getDate();
        if (day.toDateString() === new Date().toDateString()) {
            cell.classList.add('today');
        }

        cell.addEventListener('click', () => {
            if (selectedDay) {
                selectedDay.classList.remove('selected');
            }

            selectedDay = cell;
            selectedDay.classList.add('selected');
            selectedMonth = currentDate.getMonth() + 1; // Se agrega 1 porque los meses se indexan desde 0
            selectedYear = currentDate.getFullYear();

            // Actualizar la interfaz con los valores seleccionados
            // Por ejemplo, puedes imprimir los valores en la consola:
            console.log(`Día seleccionado: ${selectedDay.textContent}`);
            console.log(`Mes seleccionado: ${selectedMonth}`);
            console.log(`Año seleccionado: ${selectedYear}`);

            // Imprime la fecha en RESUMEN
            if (document.getElementById("fechaLetra")) {
                // document.getElementById("fechaLetra").innerHTML = "/" + `${(selectedMonth).toString()}` + "/" + `${(selectedYear).toString()}`;
                document.getElementById("fechaLetra").innerHTML = `${(selectedDay.textContent).toString()}` + "/" + `${(selectedMonth).toString()}` + "/" + `${(selectedYear).toString()}`;
            }
        });


        calendarBody.appendChild(cell);
    }

    // Creamos las celdas de los días del mes siguiente
    const nextMonthDays = calendarBody.children.length % 7 === 0 ? 0 : 7 - calendarBody.children.length % 7;
    for (let i = 1; i <= nextMonthDays; i++) {
        const day = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, i);
        const cell = document.createElement('div');
        cell.classList.add('day', 'disabled');
        cell.textContent = day.getDate();
        calendarBody.appendChild(cell);
    }

    // Actualizamos el mes y el año en la interfaz
    const monthNames = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
    monthYear.textContent = `${monthNames[currentDate.getMonth()]} ${currentDate.getFullYear()}`;

    disablePastDays();
    disableReservedDays();
}

prevBtn.addEventListener('click', () => {
    currentDate.setMonth(currentDate.getMonth() - 1);
    generateCalendar();
});

nextBtn.addEventListener('click', () => {
    currentDate.setMonth(currentDate.getMonth() + 1);
    generateCalendar();
});

// function disablePastDays() {
//     const today = new Date();
//     const days = calendarBody.querySelectorAll('.day');

//     days.forEach(day => {
//         const dayValue = parseInt(day.textContent);
//         const month = currentDate.getMonth();
//         const year = currentDate.getFullYear();

//         if (month < today.getMonth() || (month === today.getMonth() && dayValue <= today.getDate())) {
//             day.classList.add('disabled');
//         }
//     });
// }

function disablePastDays() {
    const today = new Date();
    const days = calendarBody.querySelectorAll('.day');

    days.forEach(day => {
        const dayValue = parseInt(day.textContent);
        const month = currentDate.getMonth();
        const year = currentDate.getFullYear();

        if (year < today.getFullYear() || (year === today.getFullYear() && (month < today.getMonth() || (month === today.getMonth() && dayValue <= today.getDate())))) {
            day.classList.add('disabled');
        }
    });
}


function disableReservedDays() {
    const cells = document.querySelectorAll('.day');

    fechasReservadas.forEach(reserva => {
        const dia = reserva.Dia;
        const mes = reserva.Mes;
        const año = reserva.Anio;

        cells.forEach(cell => {
            if (
                cell.textContent === dia.toString() &&
                (currentDate.getMonth() + 1).toString() === mes &&
                currentDate.getFullYear().toString() === año
            ) {
                cell.classList.add('disabled');
                // También puedes eliminar el evento click de la celda deshabilitada aquí si es necesario
                // cell.removeEventListener('click', selectDay);
            }
        });
    });
}

function disableDay(dia, mes, año) {
    // Obtener todas las celdas de los días en el calendario
    const days = calendarBody.querySelectorAll('.day');

    // Recorrer cada celda y buscar el día específico para deshabilitarlo
    days.forEach(day => {
        const dayValue = parseInt(day.textContent);
        const month = currentDate.getMonth() + 1; // Se agrega 1 porque los meses se indexan desde 0
        const year = currentDate.getFullYear();

        // Comparar el día, mes y año especificados con la fecha en cada celda
        if (dayValue === dia && month === mes && year === año) {
            day.classList.add('disabled');
        }
    });
}


function creaFormsCalendar() {
    var padre = document.getElementById("sigPagResumen");

    creaElementoForm("selectedDay", selectedDay.textContent, padre);
    creaElementoForm("selectedMonth", selectedMonth, padre);
    creaElementoForm("selectedYear", selectedYear, padre);

    padre.submit(); //enviar
}

function creaElementoForm(info, val, padre) {
    var elemento = document.createElement("input");

    elemento.setAttribute("type", "hidden");
    elemento.setAttribute("name", info);
    elemento.setAttribute("value", val);
    console.log(elemento.value);

    padre.appendChild(elemento); //agregamos el elemento al formulario
}

function validacionFecha() {
    if (selectedDay == null) {
        alert("Selecciona una fecha para continuar");
    } else {
        creaForms();
        creaFormsCalendar();
    }
}


//* ----------- FUNCIONES PARA MODIFICAR EVENTO ----------

function enableAndSelectDate(day, month, year) {
    const days = calendarBody.querySelectorAll('.day');

    days.forEach(dayElement => {
        const dayValue = parseInt(dayElement.textContent);
        const monthValue = currentDate.getMonth();
        const yearValue = currentDate.getFullYear();

        if (
            yearValue === year &&
            monthValue === month &&
            dayValue === day
        ) {
            dayElement.classList.remove('disabled');
            dayElement.classList.add('selected');

            selectedDay = dayElement;
            selectedMonth = month + 1;
            selectedYear = year;
        }
    });
}
function validarFormulario(event) {
    event.preventDefault();

    var buscarMail = document.getElementById("buscarMail").value;
    var codigoEvento = document.getElementById("codigoEvento").value;
    var email = "<?php echo $email = $cad->consultaMailUsuario(buscaMail);    ?>";

    if (buscarMail === email && codigoEvento === "12345") {
        event.target.form.submit();
    } else {
        alert("Los datos ingresados son incorrectos. Por favor, verifícalos.");
    }
}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- *BOOTSTRAP CSS INTERNO -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/style_agendar.css">
    <link rel="salon icon" href="../imgs/icons/logo.png">
    <title>Agendar | Puño de tierra</title>
</head>

<body>
    <?php
        include "../pages/commonPages/header.php";
    ?>

    <main>
        <section id="agenda">
            <h1>Agenda tu evento</h1>
            <h4>Elige una manera de agedar</h4>
        </section>
        <section id="opciones">
            <div class="opcion">
                <img src="../imgs/icons/clic.svg" alt="">
                <h3>En Línea</h3>
                <p>Agenda, personaliza y paga fácilmente desde la página web.</p>
                <a href="./agendarEnLinea.php">
                    <p class="btn">En Línea</p>
                </a>
            </div>
            <div class="opcion">
                <img src="../imgs/icons/shaking-hands.svg" alt="">
                <h3>Presencial</h3>
                <p>Contáctanos y agenda una cita para ir a ver el salón presencialmente.</p>
                <a href="./agendarPresencial.php">
                    <p class="btn">Presencial</p>
                </a>
            </div>
        </section>
    </main>

    <?php
        include "../pages/commonPages/footer.php";
    ?>
    <!-- *BOOTSTRAP JS INTERNO -->
    <script src="../js/bootstrap.min.js "></script>
</body>

</html>
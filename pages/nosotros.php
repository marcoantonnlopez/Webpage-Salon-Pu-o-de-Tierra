<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- *BOOTSTRAP CSS INTERNO -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/style_nosotros.css">
    <link rel="salon icon" href="../imgs/icons/logo.png">
    <title>Nosotros | Puño de tierra</title>
</head>

<body>
    <?php
        include "../pages/commonPages/header.php";
    ?>

    <main>

        <section id="porQue">
            <h1>¿Por qué el Puño de Tierra?</h1>
        </section>
        <section id="historia">
            <h1>Nuestra historia</h1>
            <div id="histImg">
                <img src="../imgs/Nosotros/anciano.png" alt="">
                <div id="histFamiliar">
                    <h3>Una historia familiar.</h3>
                    <p>El lugar donde ahora es el salón “Puño de tierra” fue hogar de 3 generaciones de la misma familia. El salón recibe su nombre debido a la canción favorita del último dueño de la casa, “El Puño de Tierra” de Antonio Aguilar, el cual
                        se llevó hasta mudarse al otro lado de la calle (Panteón del saucito).</p>
                </div>
            </div>
        </section>
        <section id="unSalon">
            <h1>¿Por qué un salón?</h1>
            <p>Queremos mantener viva la magia que alguna vez albergó aquel hogar, es por ello que cada evento trae alegría al lugar.</p>
        </section>
        <section id="seParte">
            <h1>Sé parte de la historia<br></h1>
            <a href="./agendarEnLinea.php" class="large_btn">Ver fechas disponibles</a>
        </section>
    </main>

    <?php
        include "../pages/commonPages/footer.php";
    ?>
    <!-- *BOOTSTRAP JS INTERNO -->
    <script src="../js/bootstrap.min.js "></script>
</body>

</html>
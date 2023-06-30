<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- *BOOTSTRAP CSS INTERNO -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style_index.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="salon icon" href="../imgs/icons/logo.png">
    <title>Puño de tierra</title>
</head>

<body>
    <!-- <header>
        <nav class="navbar navbar-expand-lg navbar-light ">
            <div class="container-fluid">
                <a class="navbar-brand" href="./index.php"><img class="logo" src="./imgs/index/logo.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav  menu_header">
                        <a class="list_item_header" aria-current="page" href="./index.php">Inicio </a>
                        <a class="list_item_header" href="./pages/nosotros.php">Nosotros </a>
                        <a class="list_item_header" href="./pages/salon.php">Salón </a>
                        <a class="list_item_header" href="./pages/galeria.php">Galería </a>
                        <a class="list_item_header" href="./pages/contacto.php">Contacto </a>
                        <a class="list_item_header btn" href="./pages/agendar.php">Agendar </a>
                        <a class="list_item_header" href="./pages/buscar.php">Buscar </a>

                    </div>
                </div>
            </div>
        </nav>
    </header> -->

    <?php
        include "../pages/commonPages/header.php";
    ?>

    <main>
        <section id="tuTierra">
            <div id="tuTierra1">
            </div>
            <div id="tuTierra2">
                <h1>¡Ésta es tu tierra!</h1>
                <p>El mejor salón para tus mejores eventos</p>
                <a href="../pages/agendar.php" class="large_btn">Agendar</a>
            </div>
            <div id="tuTierra3">

            </div>

        </section>

        <section id="todoEnUno">
            <h1>Todo en uno</h1>
            <div id="miniCards">
                <div class="miniCard">
                    <!-- <img src="./imgs/index/mobiliario.jpg" alt="">
                    <p>Mobiliario</p> -->
                    <a href="../pages/salon.php#mobiliario"><img src="../imgs/index/mobiliario.jpg" alt=""></a>
                    <p>Mobiliario</p>
                </div>
                <div class="miniCard">
                    <a href="../pages/salon.php#asador"><img src="../imgs/index/chimenea.jpg" alt=""></a>
                    <p>Asador</p>
                </div>
                <div class="miniCard">
                    <a href="../pages/salon.php#cocina">
                        <img src="../imgs/index/COCINA.PNG" alt="">
                    </a>
                    <p>Cocina Equipada</p>
                </div>
                <div class="miniCard">
                    <a href="../pages/salon.php#toldo">
                        <img src="../imgs/index/Toldo.jpg" alt="">
                    </a>
                    <p>Toldo</p>
                </div>
                <div class="miniCard">
                    <a href="../pages/salon.php#tv">
                        <img src="../imgs/index/tvSonido.jpg" alt="">
                    </a>
                    <p>TV y Sonido</p>
                </div>
            </div>
        </section>

        <section id="tenemosTambien">
            <h1>Tenemos también</h1>
            <div id="bigCards">
                <a href="../pages/salon.php#ludoteca">
                    <div class="bigCard ludoteca">
                        <h3>Ludoteca</h3>
                    </div>
                </a>
                <a href="../pages/salon.php#futbolito">
                    <div class="bigCard futbolito">
                        <h3>Futbolito</h3>
                    </div>
                </a>
                <a href="../pages/salon.php#balcon">
                    <div class="bigCard balcon">
                        <h3>Balcón</h3>
                    </div>
                </a>
            </div>
            <a href="../pages/salon.php" class="large_btn">Ver Salón</a>
        </section>

        <section id="nuestraTierra">
            <h1>Nuestra tierra es tu tierra</h1>
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d230.90735005897054!2d-100.99912140169812!3d22.182427461876983!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2smx!4v1682045797732!5m2!1ses!2smx" width="600" height="450" style="border:0;"
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <div class="ubi">
                <img src="../imgs/icons/baseline-location-on.svg" alt="">
                <p>FrayDiego de la Magdalena, SLP, México</p>
            </div>
            <h6>50 personas aprox. | Duración de 5 horas</h6>
        </section>

        <section id="perfectoParaTi">
            <div>
                <h1> Perfecto para ti</h1>
            </div>
            <div id="eventos">
                <div class="evento">
                    <img src="../imgs/icons/party-popper.svg" alt="">
                    <p>Cumpleaños</p>
                </div>
                <div class="evento">
                    <img src="../imgs/icons/baby-fill.svg" alt="">
                    <p>Bautizos</p>
                </div>
                <div class="evento">
                    <img src="../imgs/icons/grill.svg" alt="">
                    <p>Parrilladas</p>
                </div>
                <div class="evento">
                    <img src="../imgs/icons/briefcase.svg" alt="">
                    <p>Eventos <br> empresariales</p>
                </div>
            </div>
            <a href="../pages/agendarEnLinea.php" class="large_btn">Ver fechas disponibles</a>
        </section>

        <section id="puñoDeRecuerdos">
            <h1>Crea un puño de recuerdos</h1>
            <a href="../pages/galeria.php" class="large_btn">Galería</a>
        </section>

        <section id="agenda">
            <h1>No esperes más <br></h1>
            <a href="../pages/agendar.php" class="large_btn">Agenda tu evento</a>
        </section>
    </main>

    <?php
        include "../pages/commonPages/footer.php";
    ?>

    <!-- *BOOTSTRAP JS INTERNO -->
    <script src="../js/bootstrap.min.js "></script>
</body>

</html>
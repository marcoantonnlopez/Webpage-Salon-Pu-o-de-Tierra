<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- *BOOTSTRAP CSS INTERNO -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/style_salon.css">
    <link rel="salon icon" href="../imgs/icons/logo.png">
    <title>Salon | Puño de tierra</title>
</head>

<body>
    
    <?php
        include "../pages/commonPages/header.php";
    ?>
    <main>
        <section id="somos">
            <h1>Somos lo que necesitas</h1>
        </section>

        <section id="incluido">
            <h1>Todo incluido</h1>
            <div id="itemsIncluidos">
                <div class="item">
                    <img src="../imgs/icons/c_mobiliario.png" alt="">
                    <h4>Mobiliario</h4>
                </div>
                <div class="item">
                    <img src="../imgs/icons/c_asador.png" alt="">
                    <h4>Asador</h4>
                </div>
                <div class="item">
                    <img src="../imgs/icons/c_cocina.png" alt="">
                    <h4>Cocina <br> equipada</h4>
                </div>
                <div class="item">
                    <img src="../imgs/icons/c_toldo.png" alt="">
                    <h4>Toldo</h4>
                </div>
                <div class="item">
                    <img src="../imgs/icons/c_tv.png" alt="">
                    <h4>TV y <br> sonido</h4>
                </div>
            </div>

            <div id="expl_incluido">
                <div class="explicacion" id="mobiliario">
                    <img src="../imgs/salon/mobiliario.jpg" alt="">
                    <div class="expl_text">
                        <h2>Mobiliario</h2>
                        <p>Seis mesas con mantelería y cincuenta sillas, además incluye 2 mesitas de madera y una barra desayunador.</p>
                    </div>
                </div>
                <div class="explicacion exp_rev" id="asador">
                    <img src="../imgs/salon/asador.jpg" alt="">
                    <div class="expl_text">
                        <h2>Asador</h2>
                        <p>Asador con chimenea para que puedas disfrutas de hacer una carnita asada.</p>
                    </div>
                </div>
                <div class="explicacion" id="cocina">
                    <img src="../imgs/salon/cocina.jpg" alt="">
                    <div class="expl_text">
                        <h2>Cocina equipada</h2>
                        <p>La cocina incluye hielera, microondas, estufa, fregadero y refrigerador, todo para que puedas almacenar tu comida e inclusive cocinar ahí si así lo deseas.</p>
                    </div>
                </div>
                <div class="explicacion exp_rev" id="toldo">
                    <img src="../imgs/salon/toldo.jpg" alt="">
                    <div class="expl_text">
                        <h2>Toldo</h2>
                        <p>Toldo con iluminación para cubrir del sol en la tarde e iluminar el salón por la noche.</p>
                    </div>
                </div>
                <div class="explicacion" id="tv">
                    <img src="../imgs/salon/tv.jpg" alt="">
                    <div class="expl_text">
                        <h2>TV y Sonido</h2>
                        <p>Incluye dos bocinas conectadas a una televisión con internet y dos micrófonos para que puedas poner Youtube o Spotify y disfrutar de música o karaoke.</p>
                    </div>
                </div>
            </div>
        </section>


        <section id="adicionales">
            <h1>Servicios Adicionales</h1>
            <div id="itemsIncluidos">
                <div class="item" id="">
                    <img src="../imgs/icons/d_ludoteca.png" alt="">
                    <h4>Ludoteca</h4>
                </div>
                <div class="item">
                    <img src="../imgs/icons/d_futbolito.png" alt="">
                    <h4>Futbolito</h4>
                </div>
                <div class="item">
                    <img src="../imgs/icons/d_balcon.png" alt="">
                    <h4>Balcón</h4>
                </div>
            </div>

            <div id="expl_incluido">
                <div class="explicacion" id="ludoteca">
                    <img src="../imgs/salon/ludo.jpg" alt="">
                    <div class="expl_text">
                        <h2>Ludoteca</h2>
                        <p>Servicio de ludoteca por tres horas a cargo de una licenciada en psicopedagogía, incluye juegos de mesa, actividades para los niños, caballetes y un baño extra disponible durante esas tres horas. <br> <br> <b> El costo es $300 mx adicionales. </b></p>
                    </div>
                </div>
                <div class="explicacion exp_rev" id="futbolito">
                    <img src="../imgs/salon/futbolito.jpg" alt="">
                    <div class="expl_text">
                        <h2>Futbolito</h2>
                        <p>Renta de futbolito durante todo el evento. <br> <br> <b> El costo es $300 mx adicionales. </b></p>
                    </div>
                </div>
                <div id="balcon" class="explicacion">
                    <!-- <img src="../imgs/salon/balcon_vid.mp4" alt=""> -->
                    <video src="../imgs/salon/balcon_vid.mp4" autoplay muted loop></video>
                    <div class="expl_text">
                        <h2>Balcón</h2>
                        <p>Acceso al balcón y andador del salón, si usted lo desea le subiremos una mesa de las que incluye el salón, es decir, habrá 5 mesas en la parte de abajo y una arriba. <br> <br> <b> El costo es $300 mx adicionales. </b></p>
                    </div>
                </div>
        </section>


        <section id="nuestraTierra">
            <h1>¿Dónde nos ubicamos?</h1>
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d230.90735005897054!2d-100.99912140169812!3d22.182427461876983!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2smx!4v1682045797732!5m2!1ses!2smx" style="border:0;" allowfullscreen=""
                loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <div class="ubi">
                <img src="../imgs/icons/baseline-location-on.svg" alt="">
                <p>FrayDiego de la Magdalena, SLP, México</p>
            </div>
            <h6>50 personas aprox. | Duración de 5 horas</h6>
        </section>

        <section id="costo">
            <h1>$2,190</h1>
            <h3>5hrs</h3>
            <a href="./agendar.php" class="large_btn">Agendar</a>
        </section>

        <section id="preguntas" class="pregFrec">
            <h1>Preguntas Frecuentes</h1>
            <details>
                <summary> 1. ¿Qué incluye el salón?</summary>
                <p>6 mesas con mantelería, 50 sillas, un baño con jabón y papel, toldo, cocina completamente equipada con asador, estufa, hielera, microondas, refrigerador, 2 bocinas, una pantalla conectada a internet, 2 microfonos. Se renta por 5 hrs a
                    $2,190.00 mx.</p>
            </details>
            <details>
                <summary> 2. ¿Cómo funcionan los servicios adicionales?</summary>
                <p>Contamos con 3 servicios adicionales, cada uno con un costo de $300 mx adicionales al costo del salón. Ludoteca: 3 hrs de ludoteca a cargo de una lic. en psicopedagogía. Incluyen juegos de mesa, juguetes, caballetes para pintar, un baño
                    adicional. Futbolito: Renta de futbolito durante todo el evento. Balcón: Acceso al balcón de la parte de arriba, con una de las 6 mesas de abajo, quedarían 5 mesas abajo y una mesa arriba en el balcón.</p>
            </details>
            <details>
                <summary> 3. ¿Cuál es el límite de horario? ¿hay horas extra?</summary>
                <p>El límite de horario por las 5 hrs. del salón es a las 10 p.m. sin embargo puede extenderse hasta las 11 p.m. pagando horas extra, cada hora extra tiene un costo de $300 mx.</p>
            </details>
            <details>
                <summary> 4. ¿Puedo ir a decorar o llevar cosas al salón antes de que inicie mi evento?</summary>
                <p>Sí, te damos hasta 2 hrs de anticipación para que puedas ir a decorar o dejar cosas si así lo deseas. Estaremos limpiando y esperándote.</p>
            </details>
            <details>
                <summary> 5. ¿Cómo puedo apartar? ¿Cuándo puedo ir a ver el salón?</summary>
                <p>Hay 2 formas de agendar tu evento, la primera es en línea dando clic AQUÍ y la segunda es presencial mandándonos mensaje al WhatsApp 4441315125.</p>
            </details>
            <details>
                <summary> 6. ¿Con cuánto dinero se aparta el salón?</summary>
                <p>Agenda tu evento pagando $1,000 mx y paga el resto el día de tu evento antes de que inicie.</p>
            </details>
            <details>
                <summary> 7. ¿Puedo hacer modificaaciones a mi evento después de haber agendado?</summary>
                <p>Sí, envíanos un mensaje de WhatsApp al número 4441315125 con el cambio que quieres, ya sea modificar horario, agregar o quitar servicios adicionales u horas extra. Para cancelar o cambiar fecha del evento lee las cláusulas del contrato
                    que se genera al agendar evento.</p>
            </details>
            <details>
                <summary> 8. ¿Manejan contrato?</summary>
                <p>Sí, al momento de ajendar se te dará a conocer el contrato con las especificaciones del evento y algunas reglas del salón.</p>
            </details>
            <details>
                <summary> 9. ¿Qué está prohibido?</summary>
                <p>Tenemos prohibido llevar DJ a los eventos, hacer imperfecciones en el salón, y tener mala conducta dentro o en la parte de afuera del salón. </p>
            </details>
        </section>

        <section></section>


    </main>

    <?php
        include "../pages/commonPages/footer.php";
    ?>
    <!-- *BOOTSTRAP JS INTERNO -->
    <script src="../js/bootstrap.min.js "></script>
</body>

</html>
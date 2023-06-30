<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Si el usuario no ha iniciado sesión, redirigir al formulario de inicio de sesión
    header('Location: login_admin.php');
    exit;
}

// vinculamos con conexión para vincular a la BD
require_once "../sql/CAD.php"; 
$cad = new CAD();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- *BOOTSTRAP CSS INTERNO -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/style_admin.css">
    <link rel="stylesheet" href="../css/style_calendario.css">
    <!-- <link rel="stylesheet" href="../css/style_calendario.css"> -->
    <link rel="salon icon" href="../imgs/icons/logo.png">
    <title>Admin | Puño de tierra</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light ">
            <div class="container-fluid">
                <a class="navbar-brand" ><img class="logo" src="../imgs/index/logo.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav  menu_header">
                        <a class="list_item_header" href="./logout_admin.php">Cerrar sesión</a>

                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main>
    
    
        <section id="eventos">
            <h1 style="color: #C38937">¡Hola Familia!<span id="nombre"></span></h1>
            <br>
            <section>
    <div class="calendarioAdmin">
            <br>
            <h3>Tus Ingresos:</h3>
            <?php
                $sumaCostos = CAD::calcularSumaCostosTotalesEventos();

                if ($sumaCostos !== null) {
                    echo "<h2 id='costTotales'>$" . $sumaCostos . "</h2>";
                } else {
                    echo "Error al calcular la suma de los costos totales de los eventos.";
                }            
            ?>
            <br>
            

        </div>
    </section>
            <h3>Eventos</h3>
            <div class="evento">
            </div>
        </section>

    <?php

    // Obtener todos los eventos utilizando el método de la clase CAD
    $eventos = CAD::obtenerTodosEventos();

    // Verificar si hay eventos
    if ($eventos) {
        // Iterar sobre los eventos y generar el código HTML para cada uno
        foreach ($eventos as $evento) {
            echo '<div class="evento">';
            echo '<div>';
            echo '<div class="cabecera_evento bordSup">Clave</div>';
            echo '<div class="contenido_evento bordInf" id="clave_evento">' . $evento['EventoID'] . '</div>';
            echo '</div>';
            echo '<div>';
            echo '<div class="cabecera_evento">Fecha</div>';
            echo '<div class="contenido_evento" id="fecha_evento">' . $evento['Dia'] . '/' . $evento['Mes'] . '/' . $evento['Anio'] . '</div>';
            echo '</div>';
            echo '<div>';
            echo '<div class="cabecera_evento">Horario</div>';
            echo '<div class="contenido_evento" id="horario_evento">' . $evento['Hora_inicio'] . ' - ' . $evento['Hora_termino'] . '</div>';
            echo '</div>';
            echo '<div>';
            echo '<div class="cabecera_evento">Hrs extra</div>';
            echo '<div class="contenido_evento" id="hrs_extra_evento">' . $evento['Horas_extra'] . '</div>';
            echo '</div>';
            echo '<div>';
            echo '<div class="cabecera_evento">Ludoteca</div>';
            echo '<div class="contenido_evento" id="ludoteca_evento">' . $evento['Ludoteca'] . '</div>';
            echo '</div>';
            echo '<div>';
            echo '<div class="cabecera_evento">Futbolito</div>';
            echo '<div class="contenido_evento" id="futbolito_evento">' . $evento['Futbolito'] . '</div>';
            echo '</div>';
            echo '<div>';
            echo '<div class="cabecera_evento">Balcón</div>';
            echo '<div class="contenido_evento" id="balcon_evento">' . $evento['Balcon'] . '</div>';
            echo '</div>';
            echo '<div>';
            echo '<div class="cabecera_evento">Restante</div>';
            echo '<div class="contenido_evento" id="restante_evento">' . $evento['Costo_restante'] . '</div>';
            echo '</div>';

            echo '<form action="evento.php" method="GET" style="display: inline;">';
            echo '<input type="hidden" name="IDevento" value="' . $evento['EventoID'] . '">';
            echo '<button class="editBtn" type="submit">Editar</button>';
            echo '</form>';
        
            echo '</div>';
        }
    } else {
        echo 'No se encontraron eventos.';
    }
    ?>

    </main>

    <footer>
        <a class="navbar-brand"><img src="../imgs/index/logo.png" alt=""></a>
        <div id="whats">
            <a href="https://wa.me/4441315125" target="_blank"><img src="../imgs/icons/whatsapp.svg" alt=""></a>
            <p> 4441315125</p>
        </div>
        <div>
            <a href="https://www.facebook.com/profile.php?id=100083134181756&mibextid=LQQJ4d">

                <img src="../imgs/icons/facebook.svg" alt="">
            </a>
            <a href="https://www.instagram.com/el_puno_de_tierra/">

                <img src="../imgs/icons/instagram-alt.svg" alt="">
            </a>
        </div>
    </footer>

    <script type="text/javascript" src="../js/function_calendar.js"></script>
    <script type="text/javascript " src="../js/function_enLinea.js "></script>

    <!-- *BOOTSTRAP JS INTERNO -->
    <script src="../js/bootstrap.min.js "></script>
</body>

</html>
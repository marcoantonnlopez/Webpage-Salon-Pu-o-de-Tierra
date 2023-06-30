<!-- CAPA DE ACCESO A DATOS -->

<?php

// vinculamos con conexión para vincular a la BD
require_once "conexion.php"; //entre "" ponemos la dirección del archivo

class CAD 
{
    public $con;


// * --------------------------- INSERTAR A LA BASE DE DATOS ---------------------
    
    static public function agregaUsuarioAdmin($nombre, $contrasena, $correo)
    {
        // enviar a la BD
        $con = new Conexion(); //establecer la conexión a la BD
        // inserto en la BD
        $query = $con->conectar()->prepare("INSERT INTO usuario (Rol, Correo, Nombre, contraseña) VALUES ('Administrador', '$correo', '$nombre', '$contrasena')"); //el prepare nos sirve para poner la consulta de BD
        // ejecutamos el query
        if($query->execute())
        {
            echo "<br> El usuario administrador $nombre se ha agregado correctamente";
        }else{
            echo "hubo un error agregando al administrador";
            print_r($con->conectar()->errorInfo());
        }
    }

    static public function agregaUsuarioCliente($nombre, $correo, $celular, $direccion)
    {
        // enviar a la BD
        $con = new Conexion(); //establecer la conexión a la BD
    
        // inserto en la 
        $query = $con->conectar()->prepare("INSERT INTO usuario(Nombre, Rol, Correo, Celular, Direccion) VALUES ('$nombre', 'Cliente', '$correo', '$celular', '$direccion')");

        // ejecutamos el query
        if($query->execute()) {
            // echo "<br> Se agregó exitosamente el cliente";
        } else {
            echo "Hubo un error agregando al cliente";
            print_r($query->errorInfo());
        }
    }

    static public function agregaEvento($selectedDay, $selectedMonth, $selectedYear, $hrInicio, $horarioFinalConHrsExtra, $hrsExtra, $ludSelected, $futSelected, $balconSelected, $costoTotal, $restante, $usuarioID)
    {
        // enviar a la BD
        $con = new Conexion(); //establecer la conexión a la BD
        //saca la fecha de hoy
        $fechaHoy = date('Y-m-d');
        // var_dump($fechaHoy) . "<br>";
        // inserto en la BD
        $query = $con->conectar()->prepare("INSERT INTO evento (Dia, Mes, Anio, Hora_inicio, Hora_termino, Horas_extra, Fecha_generaContrato, Ludoteca, Futbolito, Balcon, Costo_total, Costo_restante, UsuarioID) VALUES ('$selectedDay', '$selectedMonth', '$selectedYear', '$hrInicio', '$horarioFinalConHrsExtra', '$hrsExtra', '$fechaHoy', '$ludSelected', '$futSelected', '$balconSelected', '$costoTotal', $restante, $usuarioID)"); //el prepare nos sirve para poner la consulta de BD
        // ejecutamos el query
        if($query->execute())
        {
            // echo "<br> Se agregó exitosamente el evento";
        }else{
            echo "hubo un error agregando el evento";
            print_r($con->conectar()->errorInfo());
        }
    }

    
    static public function imprimeVariablesAgregaEvento($selectedDay, $selectedMonth, $selectedYear, $hrInicio, $horarioFinalConHrsExtra, $hrsExtra, $ludSelect, $futSelect, $balconSelect, $costoTotal)
    {
        var_dump($selectedDay) . "<br>";
        var_dump($selectedMonth) . "<br>";
        var_dump($selectedYear) . "<br>";

        var_dump($hrInicio) . "<br>";
        var_dump($horarioFinalConHrsExtra) . "<br>";
        var_dump($hrsExtra) . "<br>";

        $fechaHoy = date('Y-m-d');
        var_dump($fechaHoy) . "<br>";


        var_dump($ludSelect) . "<br>";
        var_dump($futSelect) . "<br>";
        var_dump($balconSelect) . "<br>";

        var_dump($costoTotal) . "<br>";
    }
    
//*-------------------- CONSULTAS -------------------- 
    
    static public function consultaFechasReservadas()
    {
        $con = new Conexion(); // Establecer la conexión a la BD

        $reservedDates = array(); // Crear un arreglo para almacenar las fechas reservadas

        try {
            $consulta = $con->conectar()->prepare("SELECT Dia, Mes, Anio FROM Evento");
            $consulta->execute();

            // Obtener todos los resultados de la consulta en un arreglo
            $reservedDates = $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Hubo un error ejecutando la consulta: " . $e->getMessage();
        }

        return $reservedDates;
    }

    // ?--- Consultas usuario ----
    
    static public function recuperaIDusuario($correo)
    {
        // enviar a la BD
        $con = new Conexion(); // establecer la conexión a la BD

        // inserto en la
        $query = $con->conectar()->prepare("SELECT UsuarioID FROM Usuario WHERE Correo = :correo");
        $query->bindParam(':correo', $correo);

        // ejecutamos el query
        if($query->execute()) {
            $result = $query->fetch(PDO::FETCH_ASSOC);
            if ($result) {
    //         echo "<br> Se recuperó el ID del usuario";
                return $result['UsuarioID'];
            } else {
                return null; // El correo no existe en la base de datos
            }
        } else {
            return null; // Error al ejecutar la consulta
        }
    }

    // static public function consultaMailUsuario($idEvento)
    // {
    //     // enviar a la BD
    //     $con = new Conexion(); // establecer la conexión a la BD

    //     // inserto en la
    //     $query = $con->conectar()->prepare("SELECT Correo FROM Usuario WHERE UsuarioID = :idUsuario");
    //     $query->bindParam(':idUsuario', $idEvento);

    //     // ejecutamos el query
    //     if($query->execute()) {
    //         $result = $query->fetch(PDO::FETCH_ASSOC);
    //         if ($result) {
    // //         echo "<br> Se recuperó el ID del usuario";
    //             return $result['Correo'];
    //         } else {
    //             return null; // El correo no existe en la base de datos
    //         }
    //     } else {
    //         return null; // Error al ejecutar la consulta
    //     }
    // }

    static public function consultaMailUsuario($idEvento)
    {
        // Establecer la conexión a la BD
        $con = new Conexion();

        // Preparar y ejecutar la consulta
        $query = $con->conectar()->prepare("SELECT u.Correo FROM Usuario AS u JOIN Evento AS e ON u.UsuarioID = e.UsuarioID WHERE e.EventoID = :idEvento");
        $query->bindParam(':idEvento', $idEvento);

        if ($query->execute()) {
            $result = $query->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                return $result['Correo']; // Devolver el correo electrónico del usuario
            } else {
                return null; // El evento no existe en la base de datos
            }
        } else {
            return null; // Error al ejecutar la consulta
        }
    }

    static public function consultaNombreUsuario($correo)
    {
        // Establecer la conexión a la BD
        $con = new Conexion();

        // Preparar y ejecutar la consulta
        $query = $con->conectar()->prepare("SELECT Nombre FROM Usuario WHERE Correo = :correo");
        $query->bindParam(':correo', $correo);

        if ($query->execute()) {
            $result = $query->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                return $result['Nombre']; // Devolver el nombre del usuario
            } else {
                return null; // El correo no existe en la base de datos
            }
        } else {
            return null; // Error al ejecutar la consulta
        }
    }

    static public function consultaDireccionUsuario($correo)
    {
        // Establecer la conexión a la BD
        $con = new Conexion();

        // Preparar y ejecutar la consulta
        $query = $con->conectar()->prepare("SELECT Direccion FROM Usuario WHERE Correo = :correo");
        $query->bindParam(':correo', $correo);

        if ($query->execute()) {
            $result = $query->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                return $result['Direccion']; // Devolver la dirección del usuario
            } else {
                return null; // El correo no existe en la base de datos
            }
        } else {
            return null; // Error al ejecutar la consulta
        }
    }

    static public function consultaCelularUsuario($correo)
    {
        // Establecer la conexión a la BD
        $con = new Conexion();

        // Preparar y ejecutar la consulta
        $query = $con->conectar()->prepare("SELECT Celular FROM Usuario WHERE Correo = :correo");
        $query->bindParam(':correo', $correo);

        if ($query->execute()) {
            $result = $query->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                return $result['Celular']; // Devolver el número de celular del usuario
            } else {
                return null; // El correo no existe en la base de datos
            }
        } else {
            return null; // Error al ejecutar la consulta
        }
    }


    static public function validarCorreoUsuario($usermail)
    {
        // enviar a la BD
        $con = new Conexion(); // establecer la conexión a la BD

        // inserto en la
        $query = $con->conectar()->prepare("SELECT Correo FROM Usuario WHERE Correo = :userMail");
        $query->bindParam(':userMail', $usermail);

        // ejecutamos el query
        if($query->execute()) {
            $result = $query->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                // echo "<br> Se recuperó el correo del usuario";
                return $result['Correo'];
            } else {
                return null; // El correo no existe en la base de datos
            }
        } else {
            return null; // Error al ejecutar la consulta
        }
    }


    // !--- Consultas evento ----
    
    static public function validarIDevento($usermail, $IdEvento)
    {
        // Establecer la conexión a la BD
        $con = new Conexion();

        // Preparar y ejecutar la consulta
        $query = $con->conectar()->prepare("SELECT EventoID FROM Evento AS e, Usuario AS u WHERE u.Correo = :userMail AND e.EventoID = :IDevento AND e.UsuarioID = u.UsuarioID");
        $query->bindParam(':userMail', $usermail);
        $query->bindParam(':IDevento', $IdEvento);

        // Ejecutar la consulta
        if ($query->execute()) {
            $result = $query->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                return $result['EventoID'];
            } else {
                return null; // El correo o el ID del evento no existe en la base de datos
            }
        } else {
            return null; // Error al ejecutar la consulta
        }
    }

    static public function consultaIDevento($selectedDay, $selectedMonth, $selectedYear)
    {
        // enviar a la BD
        $con = new Conexion(); // establecer la conexión a la BD

        // inserto en la
        $query = $con->conectar()->prepare("SELECT EventoID FROM Evento WHERE Dia = :dia AND Mes = :mes AND Anio = :anio");
        $query->bindParam(':dia', $selectedDay);
        $query->bindParam(':mes', $selectedMonth);
        $query->bindParam(':anio', $selectedYear);

        // ejecutamos el query
        if ($query->execute()) {
            $result = $query->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                // echo "<br> Se recuperó el ID del evento";
                return $result['EventoID'];
            } else {
                return null; // No se encontró ningún evento con la fecha especificada
            }
        } else {
            return null; // Error al ejecutar la consulta
        }
    }

    static public function consultaDiaEvento($idEvento)
    {
        // enviar a la BD
        $con = new Conexion(); // establecer la conexión a la BD

        // inserto en la
        $query = $con->conectar()->prepare("SELECT Dia FROM Evento WHERE EventoID = :id");
        $query->bindParam(':id', $idEvento);

        // ejecutamos el query
        if ($query->execute()) {
            $result = $query->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                // echo "<br> Se recuperó el ID del evento";
                return $result['Dia'];
            } else {
                return null; // No se encontró ningún evento con la fecha especificada
            }
        } else {
            return null; // Error al ejecutar la consulta
        }
    }

    static public function consultaMesEvento($idEvento)
    {
        // enviar a la BD
        $con = new Conexion(); // establecer la conexión a la BD

        // inserto en la
        $query = $con->conectar()->prepare("SELECT Mes FROM Evento WHERE EventoID = :id");
        $query->bindParam(':id', $idEvento);

        // ejecutamos el query
        if ($query->execute()) {
            $result = $query->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                // echo "<br> Se recuperó el ID del evento";
                return $result['Mes'];
            } else {
                return null; // No se encontró ningún evento con la fecha especificada
            }
        } else {
            return null; // Error al ejecutar la consulta
        }
    }

    static public function consultaAnioEvento($idEvento)
    {
        // enviar a la BD
        $con = new Conexion(); // establecer la conexión a la BD

        // inserto en la
        $query = $con->conectar()->prepare("SELECT Anio FROM Evento WHERE EventoID = :id");
        $query->bindParam(':id', $idEvento);

        // ejecutamos el query
        if ($query->execute()) {
            $result = $query->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                // echo "<br> Se recuperó el ID del evento";
                return $result['Anio'];
            } else {
                return null; // No se encontró ningún evento con la fecha especificada
            }
        } else {
            return null; // Error al ejecutar la consulta
        }
    }

    static public function consultaHrInicioEvento($idEvento)
    {
        // enviar a la BD
        $con = new Conexion(); // establecer la conexión a la BD

        // inserto en la
        $query = $con->conectar()->prepare("SELECT Hora_inicio FROM Evento WHERE EventoID = :id");
        $query->bindParam(':id', $idEvento);

        // ejecutamos el query
        if ($query->execute()) {
            $result = $query->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                // echo "<br> Se recuperó el ID del evento";
                return $result['Hora_inicio'];
            } else {
                return null; // No se encontró ningún evento con la fecha especificada
            }
        } else {
            return null; // Error al ejecutar la consulta
        }
    }

    static public function consultaHrExtraEvento($idEvento)
    {
        // enviar a la BD
        $con = new Conexion(); // establecer la conexión a la BD

        // inserto en la
        $query = $con->conectar()->prepare("SELECT Horas_extra FROM Evento WHERE EventoID = :id");
        $query->bindParam(':id', $idEvento);

        // ejecutamos el query
        if ($query->execute()) {
            $result = $query->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                // echo "<br> Se recuperó el ID del evento";
                return $result['Horas_extra'];
            } else {
                return null; // No se encontró ningún evento con la fecha especificada
            }
        } else {
            return null; // Error al ejecutar la consulta
        }
    }

    static public function consultaHrTerminoEvento($idEvento)
    {
        // enviar a la BD
        $con = new Conexion(); // establecer la conexión a la BD

        // inserto en la
        $query = $con->conectar()->prepare("SELECT Hora_termino FROM Evento WHERE EventoID = :id");
        $query->bindParam(':id', $idEvento);

        // ejecutamos el query
        if ($query->execute()) {
            $result = $query->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                // echo "<br> Se recuperó el ID del evento";
                return $result['Hora_termino'];
            } else {
                return null; // No se encontró ningún evento con la fecha especificada
            }
        } else {
            return null; // Error al ejecutar la consulta
        }
    }

    static public function consultaLudotecaEvento($idEvento)
    {
        // enviar a la BD
        $con = new Conexion(); // establecer la conexión a la BD

        // inserto en la
        $query = $con->conectar()->prepare("SELECT Ludoteca FROM Evento WHERE EventoID = :id");
        $query->bindParam(':id', $idEvento);

        // ejecutamos el query
        if ($query->execute()) {
            $result = $query->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                // echo "<br> Se recuperó el ID del evento";
                return $result['Ludoteca'];
            } else {
                return null; // No se encontró ningún evento con la fecha especificada
            }
        } else {
            return null; // Error al ejecutar la consulta
        }
    }

    static public function consultaFutbolitoEvento($idEvento)
    {
        // enviar a la BD
        $con = new Conexion(); // establecer la conexión a la BD

        // inserto en la
        $query = $con->conectar()->prepare("SELECT Futbolito FROM Evento WHERE EventoID = :id");
        $query->bindParam(':id', $idEvento);

        // ejecutamos el query
        if ($query->execute()) {
            $result = $query->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                // echo "<br> Se recuperó el ID del evento";
                return $result['Futbolito'];
            } else {
                return null; // No se encontró ningún evento con la fecha especificada
            }
        } else {
            return null; // Error al ejecutar la consulta
        }
    }

    static public function consultaBalconEvento($idEvento)
    {
        // enviar a la BD
        $con = new Conexion(); // establecer la conexión a la BD

        // inserto en la
        $query = $con->conectar()->prepare("SELECT Balcon FROM Evento WHERE EventoID = :id");
        $query->bindParam(':id', $idEvento);

        // ejecutamos el query
        if ($query->execute()) {
            $result = $query->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                // echo "<br> Se recuperó el ID del evento";
                return $result['Balcon'];
            } else {
                return null; // No se encontró ningún evento con la fecha especificada
            }
        } else {
            return null; // Error al ejecutar la consulta
        }
    }

    static public function consultaCostoTotalEvento($idEvento)
    {
        // enviar a la BD
        $con = new Conexion(); // establecer la conexión a la BD

        // inserto en la
        $query = $con->conectar()->prepare("SELECT Costo_total FROM Evento WHERE EventoID = :id");
        $query->bindParam(':id', $idEvento);

        // ejecutamos el query
        if ($query->execute()) {
            $result = $query->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                // echo "<br> Se recuperó el ID del evento";
                return $result['Costo_total'];
            } else {
                return null; // No se encontró ningún evento con la fecha especificada
            }
        } else {
            return null; // Error al ejecutar la consulta
        }
    }

    static public function consultaCostoRestanteEvento($idEvento)
    {
        // enviar a la BD
        $con = new Conexion(); // establecer la conexión a la BD

        // inserto en la
        $query = $con->conectar()->prepare("SELECT Costo_restante FROM Evento WHERE EventoID = :id");
        $query->bindParam(':id', $idEvento);

        // ejecutamos el query
        if ($query->execute()) {
            $result = $query->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                // echo "<br> Se recuperó el ID del evento";
                return $result['Costo_restante'];
            } else {
                return null; // No se encontró ningún evento con la fecha especificada
            }
        } else {
            return null; // Error al ejecutar la consulta
        }
    }

// * ------------ MODIFICACIONES/ ACTUALIZACIONES A LA BD -----------------
    
    static public function actualizaFechaEvento($selectedDay, $selectedMonth, $selectedYear, $eventoID)
    {
        // Establecer la conexión a la BD
        $con = new Conexion();

        // Preparar y ejecutar la consulta
        $query = $con->conectar()->prepare("UPDATE Evento SET Dia = :selectedDay, Mes = :selectedMonth, Anio = :selectedYear WHERE EventoID = :eventoID");
        $query->bindParam(':selectedDay', $selectedDay);
        $query->bindParam(':selectedMonth', $selectedMonth);
        $query->bindParam(':selectedYear', $selectedYear);
        $query->bindParam(':eventoID', $eventoID);

        if ($query->execute()) {
            return true; // La actualización se realizó correctamente
        } else {
            return false; // Error al ejecutar la consulta de actualización
        }
    }

    static public function actualizaHorarioEvento($hrInicio, $horarioFinalConHrsExtra, $hrsExtra, $eventoID)
    {
        // Establecer la conexión a la BD
        $con = new Conexion();

        // Preparar y ejecutar la consulta
        $query = $con->conectar()->prepare("UPDATE Evento SET Hora_inicio = :hrInicio, Hora_termino = :horarioFinalConHrsExtra, Horas_extra = :hrsExtra WHERE EventoID = :eventoID");
        $query->bindParam(':hrInicio', $hrInicio);
        $query->bindParam(':horarioFinalConHrsExtra', $horarioFinalConHrsExtra);
        $query->bindParam(':hrsExtra', $hrsExtra);
        $query->bindParam(':eventoID', $eventoID);

        if ($query->execute()) {
            return true; // La actualización se realizó correctamente
        } else {
            return false; // Error al ejecutar la consulta de actualización
        }
    }


    static public function actualizaAdicionalesEvento($ludSelected, $futSelected, $balconSelected, $eventoID)
    {
        // Establecer la conexión a la BD
        $con = new Conexion();

        // Preparar y ejecutar la consulta
        $query = $con->conectar()->prepare("UPDATE Evento SET Ludoteca = :ludSelected, Futbolito = :futSelected, Balcon = :balconSelected WHERE EventoID = :eventoID");
        $query->bindParam(':ludSelected', $ludSelected);
        $query->bindParam(':futSelected', $futSelected);
        $query->bindParam(':balconSelected', $balconSelected);
        $query->bindParam(':eventoID', $eventoID);

        if ($query->execute()) {
            return true; // La actualización se realizó correctamente
        } else {
            return false; // Error al ejecutar la consulta de actualización
        }
    }

    static public function actualizaCostoFinalEvento($costoTotal, $eventoID)
    {
        // Establecer la conexión a la BD
        $con = new Conexion();

        // Preparar y ejecutar la consulta
        $query = $con->conectar()->prepare("UPDATE Evento SET Costo_total = :costoTotal WHERE EventoID = :eventoID");
        $query->bindParam(':costoTotal', $costoTotal);
        $query->bindParam(':eventoID', $eventoID);

        if ($query->execute()) {
            return true; // La actualización se realizó correctamente
        } else {
            return false; // Error al ejecutar la consulta de actualización
        }
    }

    static public function actualizaCostoRestanteEvento($restante, $eventoID)
    {
        // Establecer la conexión a la BD
        $con = new Conexion();

        // Preparar y ejecutar la consulta
        $query = $con->conectar()->prepare("UPDATE Evento SET Costo_restante = :restante WHERE EventoID = :eventoID");
        $query->bindParam(':restante', $restante);
        $query->bindParam(':eventoID', $eventoID);

        if ($query->execute()) {
            return true; // La actualización se realizó correctamente
        } else {
            return false; // Error al ejecutar la consulta de actualización
        }
    }

    // ! ---------------- INICIO SESION ADMIN ----------
    
    static public function iniciaSesionAdmin($usermail, $password)
    {
        // Establecer la conexión a la BD
        $con = new Conexion();

        // Preparar y ejecutar la consulta
        $query = $con->conectar()->prepare("SELECT * FROM Usuario WHERE Correo = :usermail AND Contraseña = :password AND Rol = 'Administrador'");
        $query->bindParam(':usermail', $usermail);
        $query->bindParam(':password', $password);

        // Ejecutar la consulta
        if ($query->execute()) {
            $result = $query->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                return true; // Existe un usuario administrador con el nombre de usuario y contraseña proporcionados
            } else {
                var_dump($usermail);
                return false; // No se encontró un usuario administrador con los datos proporcionados
            }
        } else {
            return false; // Error al ejecutar la consulta
        }
    }

    // * -------- CONSULTAS EVENTOS (ADMIN)

    // static public function obtenerEventoProximo()
    // {
        // Establecer la conexión a la BD
        // $con = new Conexion();
    // 
        // Preparar y ejecutar la consulta
        // $query = $con->conectar()->prepare("SELECT * FROM Evento WHERE CONCAT(Anio, '-', Mes, '-', Dia) >= CURDATE() ORDER BY CONCAT(Anio, '-', Mes, '-', Dia), Hora_inicio ASC LIMIT 1");
    // 
        // Ejecutar la consulta
        // if ($query->execute()) {
            // $result = $query->fetch(PDO::FETCH_ASSOC);
            // return $result; // Devolver los datos del evento más próximo
        // } else {
            // return null; // Error al ejecutar la consulta
        // }
    // }

    // static public function obtenerTodosEventos()
    // {
    //     // Establecer la conexión a la BD
    //     $con = new Conexion();

    //     // Preparar y ejecutar la consulta
    //     $query = $con->conectar()->prepare("SELECT * FROM Evento");

    //     // Ejecutar la consulta
    //     if ($query->execute()) {
    //         $result = $query->fetchAll(PDO::FETCH_ASSOC);
    //         return $result; // Devolver todos los eventos
    //     } else {
    //         return null; // Error al ejecutar la consulta
    //     }
    // }


    static public function obtenerTodosEventos()
    {
        // Establecer la conexión a la BD
        $con = new Conexion();
    
        // Preparar y ejecutar la consulta
        $query = $con->conectar()->prepare("SELECT * FROM Evento ORDER BY CONCAT(Anio, '-', Mes, '-', Dia) ASC");
    
        // Ejecutar la consulta
        if ($query->execute()) {
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result; // Devolver todos los eventos ordenados por fecha
        } else {
            return null; // Error al ejecutar la consulta
        }
    }
    

// * --------------- CALCULA COSTOS ---------------
    static public function calcularSumaCostosTotalesEventos()
    {
        // Establecer la conexión a la BD
        $con = new Conexion();
    
        // Preparar y ejecutar la consulta
        $query = $con->conectar()->prepare("SELECT SUM(Costo_total) AS SumaCostos FROM Evento");
    
        // Ejecutar la consulta
        if ($query->execute()) {
            $result = $query->fetch(PDO::FETCH_ASSOC);
            $sumaCostos = $result['SumaCostos'];
        
            return $sumaCostos; // Devolver la suma de los costos totales de los eventos
        } else {
            return null; // Error al ejecutar la consulta
        }
    }


}

?>
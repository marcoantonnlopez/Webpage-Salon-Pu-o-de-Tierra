<?php

// clase
class Conexion
{
    // Atributos
    private $host; //Localhost o IP
    private $db; //nombre de la BD
    private $usuario; //usuario de la BD -> root
    private $pass; //contraseña, en este caso no tiene una
    private $charset; //utf8

    // Constructor
    public function __construct()
    {
        $this->host = 'localhost';
        $this->db = 'punodetierradatabase';
        $this->usuario = 'root';
        $this->pass = '';
        $this->charset = 'utf8';
    }
    
    //* Método Conectar
    public function conectar()
    {
        // Conectar a la BD --> PDO
        $com = "mysql:host=".$this->host.";dbname=".$this->db.";charset=".$this->charset;
        $enlace = new PDO($com, $this->usuario, $this->pass);
        // print_r($enlace); //para verificar xd
        return $enlace;
    }
}


$conexion = new Conexion();
$conexion->conectar();

?>
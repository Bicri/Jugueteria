<?php

class Conexion{

    private $host = "localhost";
    private $user = "bicri";
    private $password = "b1cr11999_";
    private $db = "jugueteria";
    private $con;
    private $conexion;

    public function conectar()
    {
        $this->conexion = "mysql:host=".$this->host.";dbname=".$this->db.";charset=utf8";
        try{
            $this->con = new PDO($this->conexion,$this->user,$this->password);
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "conectado perrito";
        }catch(Excepction $e)
        {
            $this->con = "Error en base de datos";
            echo "Error en el servidor: ".$e->getMessage();
        }
    }
}
?>
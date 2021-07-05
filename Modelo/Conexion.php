<?php
require_once ("Juguete.php");

class Conexion{

    private $host = "localhost";
    private $user = "bicri";
    private $password = "b1cr11999_";
    //private $host = "localhost:3307";
    //private $user = "root";
    //private $password = "";
    private $db = "jugueteria";
    private $con;
    private $conexion;

    public function conectar()
    {
        $this->conexion = "mysql:host=".$this->host.";dbname=".$this->db.";charset=utf8";
        try{
            $this->con = new PDO($this->conexion,$this->user,$this->password);
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->con;
        }catch(Exception $e)
        {
            return $this->con = null;
            echo "Error en el servidor: ".$e->getMessage();
        }
    }

    public function desconectar()
    {
        $this->con = null;
    }
}
?>
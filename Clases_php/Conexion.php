<?php
require_once ("Juguete.php");

class Conexion{

    private $host = "localhost:3307";
    private $user = "root";
    private $password = "";
    private $db = "jugueteria";
    private $con;
    private $conexion;

    public function conectar()
    {
        $this->conexion = "mysql:host=".$this->host.";dbname=".$this->db.";charset=utf8";
        try{
            $this->con = new PDO($this->conexion,$this->user,$this->password);
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(Exception $e)
        {
            $this->con = "Error en base de datos";
            echo "Error en el servidor: ".$e->getMessage();
        }
    }

    public function desconectar()
    {
        $this->con = null;
    }

    public function obtener()
    {
        try
        {
            $sql = "select * from Producto";
            $execute = $this->con->query($sql);
            $request = $execute->fetchall(PDO::FETCH_ASSOC);
            return $request;
        }catch(Exception $e)
        {
            echo "Error en el servidor: ".$e->getMessage();
        }
        
    }

    public function obtenerProc()
    {
        try
        {
            $sql = 'CALL pcd_obtener_producto()';
            $stmt = $this->con->query($sql);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $items=[];
            while ($r = $stmt->fetch()){   
                $juguete = new Juguete($r['codigo'],$r['nombre'],$r['precioventa'],$r['existencia'],0,0,0,0);
                //echo $juguete->toString();
                //echo "<br>";
                $item = [
                    'codigo' => $r['codigo'],
                    'nombre' => $r['nombre'],
                    'venta'  => $r['precioventa'],
                    'existencia' => $r['existencia']
                ];
                array_push($items,$item);
            }
            //$stmt=null;
            return $items;
        }catch(Exception $e)
        {
            echo "Error en el servidor: ".$e->getMessage();
        }
    }
}
?>
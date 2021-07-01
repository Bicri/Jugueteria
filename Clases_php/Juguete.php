<?php

require_once ("Conexion.php");

class Juguete{

    private $conexion; //para instancia de conexion

    public function ObtenerTodos()
    {
        
        try
        {
            $this->conexion = new Conexion();
            $con = $this->conexion->conectar();
            $sql = 'CALL pcd_obtener_producto()';
            $stmt = $con->query($sql);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $items=[];
            while ($r = $stmt->fetch()){   
                $juguete = new Juguete($r['codigo'],$r['nombre'],$r['precioventa'],$r['existencia'],0,0,0,0);
                $item = [
                    'codigo' => $r['codigo'],
                    'nombre' => $r['nombre'],
                    'venta'  => $r['precioventa'],
                    'existencia' => $r['existencia']
                ];
                array_push($items,$item);
            }
            $this->conexion->desconectar();
            $stmt=null;
            return $items;
        }catch(Exception $e)
        {
            return null;
            echo "Error en el servidor: ".$e->getMessage();
        }
    }

    public function obtenerProductoCoincidencia($patron)
    {
        try
        {
            $this->conexion = new Conexion();
            $con = $this->conexion->conectar();
            $sql = 'CALL pcd_Busca_coincidencias_prod(:patron)';
            $stmt = $con->prepare($sql);
            $stmt->bindParam(':patron',$patron, PDO::PARAM_STR, 100);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $items=[];
            while ($r = $stmt->fetch()){
                $item = [
                    'codigo' => $r['codigo'],
                    'nombre' => $r['nombre'],
                    'venta'  => $r['PrecioVenta'],
                    'existencia' => $r['Existencia']
                ];
                array_push($items,$item);
            }
            $stmt=null;
            $this->conexion->desconectar();
            return $items;
        }catch(Exception $e)
        {
            return null;
            echo "Error en el servidor: ".$e->getMessage();
        }
    }



}

?>
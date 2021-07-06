<?php 
require_once ("Conexion.php");


class Lista{


    private $conexion; //para instancia de conexion

    public function ObtenerLista()
    {
        
        try
        {
            $this->conexion = new Conexion();
            $con = $this->conexion->conectar();
            $sql = 'CALL pcd_recupera_lista()';
            $stmt = $con->query($sql);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $items=[];
            while ($r = $stmt->fetch()){   
                $item = [
                    'codigo' => $r['Codigo'],
                    'nombre' => $r['Nombre'],
                    'existencia' => $r['Existencia'],
                    'deseado' => $r['Deseado']
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
}

?>
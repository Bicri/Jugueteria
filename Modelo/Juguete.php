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

    public function insertarCarrito($juguete)
    {
        try
        {
            $this->conexion = new Conexion();
            $con = $this->conexion->conectar();
            $sql = 'CALL pcd_add_carrito(:_clave, :_cant, :_prec)';
            $stmt = $con->prepare($sql);
            $stmt->bindParam(':_clave',$juguete->id, PDO::PARAM_STR);
            $stmt->bindParam(':_cant',$juguete->cantidad, PDO::PARAM_INT);
            $stmt->bindParam(':_prec',$juguete->precio, PDO::PARAM_STR);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            
            $stmt=null;
            $this->conexion->desconectar();
            return 0;
        }catch(Exception $e)
        {
            return 1;
            echo "Error en el servidor: ".$e->getMessage();
        }
    }

    public function tarjetaCarrito($juguete)
    {
        $resp = "";
        try
        {
            $this->conexion = new Conexion();
            $con = $this->conexion->conectar();

            if($juguete->accion == "1")
            {
                $sql = 'CALL pcd_addUno_carrito(:_codigo)';
            }
            else
            {
                $sql = 'CALL pcd_RestUno_carrito(:_codigo)';
            }
            
            $stmt = $con->prepare($sql);
            $stmt->bindParam(':_codigo',$juguete->id, PDO::PARAM_STR, 100);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            while ($r = $stmt->fetch()){
                $resp =  $r['Resp'];
            }
            $stmt=null;
            $this->conexion->desconectar();
            return $resp;
        }catch(Exception $e)
        {
            echo "Error en el servidor: ".$e->getMessage();
            return -1;
        }
    }

    public function ObtenerCarrito()
    {
        
        try
        {
            $this->conexion = new Conexion();
            $con = $this->conexion->conectar();
            $sql = 'CALL pcd_obtener_carrito()';
            $stmt = $con->query($sql);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $items=[];
            while ($r = $stmt->fetch()){   
                $item = [
                    'codigo' => $r['clave'],
                    'nombre' => $r['Nombre'],
                    'cantidad'  => $r['cantidad'],
                    'precio' => $r['precio'],
                    'subtotal' => $r['Subtotal']
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

    public function rollbackCarrito()
    {
        try
        {
            $this->conexion = new Conexion();
            $con = $this->conexion->conectar();
            $sql = 'CALL pcd_rollback_carrito()';
            $stmt = $con->prepare($sql);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            
            $stmt=null;
            $this->conexion->desconectar();
            return 0;
        }catch(Exception $e)
        {
            return -1;
            echo "Error en el servidor: ".$e->getMessage();
        }
    }

    public function efectuarVenta($hoy, $total)
    {
        try
        {
            $this->conexion = new Conexion();
            $con = $this->conexion->conectar();
            $sql = 'CALL pcd_efectua_venta(:_anioT, :_mesT, :_diaT, :_totalT)';
            $stmt = $con->prepare($sql);
            $stmt->bindParam(':_anioT',$hoy->getAnio(), PDO::PARAM_INT);
            $stmt->bindParam(':_mesT',$hoy->getMes(), PDO::PARAM_INT);
            $stmt->bindParam(':_diaT',$hoy->getDia(), PDO::PARAM_INT);
            $stmt->bindParam(':_totalT',$total, PDO::PARAM_STR);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            
            $stmt=null;
            $this->conexion->desconectar();
            return 0;
        }catch(Exception $e)
        {
            echo "Error en el servidor: ".$e->getMessage();
            return $e;
            
        }
    }




}

?>
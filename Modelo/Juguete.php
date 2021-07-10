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
            return -1;
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

    public function efectuarVenta($hoy)
    {
        try
        {
            $this->conexion = new Conexion();
            $con = $this->conexion->conectar();
            $sql = 'CALL pcd_efectua_venta(:_anioT, :_mesT, :_diaT)';
            $stmt = $con->prepare($sql);
            $stmt->bindParam(':_anioT',$hoy->getAnio(), PDO::PARAM_INT);
            $stmt->bindParam(':_mesT',$hoy->getMes(), PDO::PARAM_INT);
            $stmt->bindParam(':_diaT',$hoy->getDia(), PDO::PARAM_INT);
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

//----------------------- Almacen ----------------------------------------------------------

    public function NuevoJuguete($juguete,$hoy)
    {
        $resp = null;
        try
        {
            $this->conexion = new Conexion();
            $con = $this->conexion->conectar();

            $sql = 'CALL pcd_agregar_nuevo_producto(:_codigo,:_nombre,:_venta,:_costo,:_cantidad,:_anio,:_mes,:_dia)';
        
            $stmt = $con->prepare($sql);
            if($juguete->idNuevo != "")
            {
                $stmt->bindParam(':_codigo',$juguete->idNuevo, PDO::PARAM_STR);
            }else
            {
                $stmt->bindParam(':_codigo',$resp, PDO::PARAM_STR);
            }
            
            $stmt->bindParam(':_nombre',$juguete->nombre, PDO::PARAM_STR);
            $stmt->bindParam(':_venta',$juguete->precio, PDO::PARAM_STR);
            $stmt->bindParam(':_costo',$juguete->costo, PDO::PARAM_STR);
            $stmt->bindParam(':_cantidad',$juguete->cantidad, PDO::PARAM_INT);
            $stmt->bindParam(':_anio',$hoy->getAnio(), PDO::PARAM_INT);
            $stmt->bindParam(':_mes',$hoy->getMes(), PDO::PARAM_INT);
            $stmt->bindParam(':_dia',$hoy->getDia(), PDO::PARAM_INT);

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



    public function AgregarStock($juguete,$hoy)
    {
        try
        {
            $this->conexion = new Conexion();
            $con = $this->conexion->conectar();

            $sql = 'CALL pcd_agrega_juguetesPEPS(:_codigo,:_anio,:_mes,:_dia,:_costo,:_cantidad,:_venta)';
        
            $stmt = $con->prepare($sql);
            
            $stmt->bindParam(':_codigo',$juguete->idNuevo, PDO::PARAM_STR);
            $stmt->bindParam(':_anio',$hoy->getAnio(), PDO::PARAM_INT);
            $stmt->bindParam(':_mes',$hoy->getMes(), PDO::PARAM_INT);
            $stmt->bindParam(':_dia',$hoy->getDia(), PDO::PARAM_INT);
            $stmt->bindParam(':_costo',$juguete->costo, PDO::PARAM_STR);
            $stmt->bindParam(':_cantidad',$juguete->cantidad, PDO::PARAM_INT);
            $stmt->bindParam(':_venta',$juguete->precio, PDO::PARAM_STR);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);

            $stmt=null;
            $this->conexion->desconectar();
            return 0;
        }catch(Exception $e)
        {
            echo "Error en el servidor: ".$e->getMessage();
            return -1;
        }
    }

    public function SolicitarEdicion($juguete)
    {
        try
        {
            $this->conexion = new Conexion();
            $con = $this->conexion->conectar();

            $sql = 'CALL pcd_obten_producto(:_codigo)';
        
            $stmt = $con->prepare($sql);
            
            $stmt->bindParam(':_codigo',$juguete->idNuevo, PDO::PARAM_STR);

            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);

            while ($r = $stmt->fetch()){   
                $item = [
                    'codigo' => $r['codigo'],
                    'nombre' => $r['nombre'],
                    'precio'  => $r['PrecioVenta'],
                    'existencia' => $r['existencia'],
                    'costo' => $r['costo'],
                    'anio' => $r['anio'],
                    'mes' => $r['mes'],
                    'dia' => $r['dia']
                ];
            }

            $stmt=null;
            $this->conexion->desconectar();
            return $item;
        }catch(Exception $e)
        {
            echo "Error en el servidor: ".$e->getMessage();
            return -1;
        }
    }

    public function EditaProducto($juguete)
    {
        $resp = null;
        try
        {
            $this->conexion = new Conexion();
            $con = $this->conexion->conectar();

            $sql = 'CALL pcd_actualiza_prod(:codVjo,:codNvo,:_nombre,:_venta,:_cantidad,:_costo,:_anio,:_mes,:_dia)';
        
            $stmt = $con->prepare($sql);
            if($juguete->idNuevo != "")
            {
                $stmt->bindParam(':codNvo',$juguete->idNuevo, PDO::PARAM_STR);
            }else
            {
                $stmt->bindParam(':codNvo',$resp, PDO::PARAM_STR);
            }
            $stmt->bindParam(':codVjo',$juguete->idViejo, PDO::PARAM_STR);
            $stmt->bindParam(':_nombre',$juguete->nombre, PDO::PARAM_STR);
            $stmt->bindParam(':_venta',$juguete->precio, PDO::PARAM_STR);
            $stmt->bindParam(':_cantidad',$juguete->cantidad, PDO::PARAM_INT);
            $stmt->bindParam(':_costo',$juguete->costo, PDO::PARAM_STR);
            $stmt->bindParam(':_anio',$juguete->anio, PDO::PARAM_INT);
            $stmt->bindParam(':_mes',$juguete->mes, PDO::PARAM_INT);
            $stmt->bindParam(':_dia',$juguete->dia, PDO::PARAM_INT);

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


    public function AgregarLista($juguete)
    {
        $resp = null;
        try
        {
            $this->conexion = new Conexion();
            $con = $this->conexion->conectar();

            $sql = 'CALL pcd_Inserta_lista(:clave,:_nombre,:_desea)';
        
            $stmt = $con->prepare($sql);
            
            if($juguete->idNuevo != "")
            {
                $stmt->bindParam(':clave',$juguete->idNuevo, PDO::PARAM_STR);
                $stmt->bindParam(':_nombre',$resp, PDO::PARAM_STR);
                $stmt->bindParam(':_desea',$juguete->cantidad, PDO::PARAM_INT);
            }
            else
            {
                $stmt->bindParam(':clave',$resp, PDO::PARAM_STR);
                $stmt->bindParam(':_nombre',$juguete->nombre, PDO::PARAM_STR);
                $stmt->bindParam(':_desea',$juguete->cantidad, PDO::PARAM_INT);
            }

            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);

            $stmt=null;
            $this->conexion->desconectar();
            return 0;
        }catch(Exception $e)
        {
            echo "Error en el servidor: ".$e->getMessage();
            return -1;
        }
    }


}

?>
<?php
require_once ("Conexion.php");
require_once ("Fecha.php");

class Utilidad{
    private $conexion; //para instancia de conexion

    public function InsertaIndirecto($indirecto, $hoy)
    {
        try
        {
            $this->conexion = new Conexion();
            $con = $this->conexion->conectar();
            $sql = 'CALL pcd_tabla_indirecto(:_anio, :_mes, :_dia, :_vig,:_com,:_otros)';
            $stmt = $con->prepare($sql);
            $stmt->bindParam(':_anio',$hoy->anio, PDO::PARAM_INT);
            $stmt->bindParam(':_mes',$hoy->mes, PDO::PARAM_INT);
            $stmt->bindParam(':_dia',$hoy->dia, PDO::PARAM_INT);
            $stmt->bindParam(':_vig',$indirecto->vigilancia, PDO::PARAM_STR);
            $stmt->bindParam(':_com',$indirecto->comida, PDO::PARAM_STR);
            $stmt->bindParam(':_otros',$indirecto->otros, PDO::PARAM_STR);
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

    public function UtilidadSemanal($hoy, $lunes)
    {
        try
        {
            $this->conexion = new Conexion();
            $con = $this->conexion->conectar();

            $sql = 'CALL pcd_Utilidad_Semanal(:_diaI, :_mesI, :_anioI, :_diaF, :_mesF, :_anioF)';
        
            $stmt = $con->prepare($sql);
            
            $stmt->bindParam(':_diaI',$lunes->dia, PDO::PARAM_INT);
            $stmt->bindParam(':_mesI',$lunes->mes, PDO::PARAM_INT);
            $stmt->bindParam(':_anioI',$lunes->anio, PDO::PARAM_INT);
            $stmt->bindParam(':_diaF',$hoy->dia, PDO::PARAM_INT);
            $stmt->bindParam(':_mesF',$hoy->mes, PDO::PARAM_INT);
            $stmt->bindParam(':_anioF',$hoy->anio, PDO::PARAM_INT);

            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $items = [];
            while ($r = $stmt->fetch()){   
                $item = [
                    'Ingresos' => $r['Ingresos'],
                    'Costos' => $r['Costos'],
                    'Indirecto'  => $r['Indirecto'],
                    'Utilidad' => $r['Resultado']
                ];
                array_push($items,$item);
            }

            $stmt=null;
            $this->conexion->desconectar();
            return $items;
        }catch(Exception $e)
        {
            echo "Error en el servidor: ".$e->getMessage();
            return -1;
        }
    }

    public function UtilidadPeriodo($util)
    {
        try
        {
            $this->conexion = new Conexion();
            $con = $this->conexion->conectar();

            $sql = 'CALL pcd_Utilidad_periodo(:_diaI, :_mesI, :_anioI, :_diaF, :_mesF, :_anioF)';
        
            $stmt = $con->prepare($sql);
            
            $stmt->bindParam(':_diaI',$util->diaI, PDO::PARAM_INT);
            $stmt->bindParam(':_mesI',$util->mesI, PDO::PARAM_INT);
            $stmt->bindParam(':_anioI',$util->anioI, PDO::PARAM_INT);
            $stmt->bindParam(':_diaF',$util->diaF, PDO::PARAM_INT);
            $stmt->bindParam(':_mesF',$util->mesF, PDO::PARAM_INT);
            $stmt->bindParam(':_anioF',$util->anioF, PDO::PARAM_INT);

            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            while ($r = $stmt->fetch()){   
                $item = [
                    'Ingresos' => $r['Ingresos'],
                    'Costos' => $r['Costos'],
                    'Indirecto'  => $r['Indirecto'],
                    'Utilidad' => $r['Total'],
                    'Almacen' => $r['Inversion en almacen']
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
}



?>
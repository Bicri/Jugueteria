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
}



?>
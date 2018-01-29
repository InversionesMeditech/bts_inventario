<?php
require_once("../db/bdconectar.php");
include('is_logged.php');
class model_categoria{
    private $db;
    private $categorias;
 

    public function __construct(){
        $this->db=Conectar::conexion();
        $this->categorias=array();
    }
    public function get_total_categorias()
    {
        $consulta=$this->db->query("select id_categoria AS numrows from categorias;");
        while($filas=$consulta->fetch_assoc()){
            $this->categorias[]=$filas;
        }
        return $this->categorias;
    }

    public function get_categorias($offset,$per_page,$nombre_categoria){
        $sTable = 'categorias';
        $sWhere = "Where 'Y' = 'Y' ";
            if ( $nombre_categoria != '' )
                {
                    $sWhere.= "and nombre_categoria Like '%$nombre_categoria%'";
                }
        $sWhere.= "and Ruc = '".$_SESSION['Ruc']."'";
        $sWhere.= ' order by nombre_categoria';
        $sql = "SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";        
        $consulta=$this->db->query($sql);
        while($filas=$consulta->fetch_assoc()){
            $this->categorias[]=$filas;
        }
        return $this->categorias;
        
    }


    
}
?>
<?php
require_once("../config/conexion.php");
require_once('is_logged.php');

class model_categoria
{
        function buscar_categoria($con)
        {
                $consulta = "select * from categorias;";
                $registro = mysqli_query($con,$consulta);               
                return $registro;
        }
        
        function insertar_categoria($con,$nombre_categoria,$descripcion_categoria)
        {
                $date_added = date('Y-m-d H:i:s'); 
                $Ruc = $_SESSION['Ruc']; 
                $sql = "INSERT INTO categorias (nombre_categoria,descripcion_categoria,date_added,Ruc) VALUES ('$nombre_categoria','$descripcion_categoria','$date_added','$Ruc')";
                $insert = mysqli_query($con,$sql);
                return $insert;
        }

        function eliminar_categoria($con,$id)
        {       $sql = "DELETE FROM categorias WHERE id_categoria='$id'";
                $delete = mysqli_query($con,$sql);
                return $delete;
        }
        
        function actualizar_categoria($con,$id_categoria,$nombre_categoria,$descripcion_categoria){
                $sql = "UPDATE categorias SET nombre_categoria='$nombre_categoria',descripcion_categoria='$descripcion_categoria' WHERE id_categoria = '$id_categoria'";
                $update = mysqli_query($con,$sql);
                return $update;               
        }
        
}

        


?>
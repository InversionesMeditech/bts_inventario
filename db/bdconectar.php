<?php
class Conectar{
    public static function conexion(){
        $conexion=new mysqli("localhost", "root", "", "simple_stock");
        return $conexion;
    }
}
?>
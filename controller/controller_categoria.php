<?php
require_once('../models/model_categoria.php');
require_once('../libraries/mensajes.php');
$categorias = new model_categoria();
$mensaje = new mensajes();
$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != NULL)?$_REQUEST['action']:'';
if ($action == "b")
{
    $datos = $categorias->buscar_categoria($con);
    $tabla = "";
    while($row = mysqli_fetch_array($datos)){
        $descripcion_categoria = $row['descripcion_categoria'];//($row['descripcion_categoria']=="") ? " ": $row['descripcion_categoria'];
        $id_categoria = $row['id_categoria'];
        $nombre_categoria = $row['nombre_categoria'];
        $editar = "<a href = '#' class='btn btn-success' title='Editar Categoría'"; 
        $editar .="data-id_categoria='$id_categoria'"; 
        $editar .="data-nombre_categoria='$nombre_categoria'"; 
        $editar .="data-descripcion_categoria='$descripcion_categoria'";  
        $editar .="data-id='$id_categoria'"; 
        $editar .="data-toggle='modal'"; 
        $editar .="data-target='#updcategorias'><i class='fa fa-edit'></i></a>";
        $eliminar ="<a href = '#' class='btn btn-danger' title='Borrar Categoría' onclick='eliminar(".$id_categoria.")'><i class='fa fa-trash'></i></a>";           
        $tabla.='{
                "id_categoria":"'.$row['id_categoria'].'",
                "nombre_categoria":"'.$row['nombre_categoria'].'",
                "descripcion_categoria":"'.$row['descripcion_categoria'].'",
                "date_added":"'.$row['date_added'].'",
                "acciones":"'.$editar.$eliminar.'"
                },';		
    }	
    $tabla = substr($tabla,0, strlen($tabla) - 1);
    $datos = '{"data":['.$tabla.']}';
    echo $datos;
}

if ($action == "add")
{
    $nombre_categoria = mysqli_real_escape_string($con, (strip_tags($_POST['add_nombre_categoria'], ENT_QUOTES)));
    $descripcion_categoria = mysqli_real_escape_string($con, (strip_tags($_POST['add_descripcion_categoria'], ENT_QUOTES)));
    $datos = $categorias->insertar_categoria($con,$nombre_categoria,$descripcion_categoria);
    if ($datos){
        echo $mensaje->m_correcto('Categoría ha sido ingresada satisfactoriamente.');
    }else{
        echo $mensaje->m_error('Lo siento algo ha salido mal intenta nuevamente.'.mysqli_error($con));
    }

}

if($action == "d")
{
    $id = (isset($_REQUEST['id']) && $_REQUEST['id'] != NULL)?$_REQUEST['id']:'';
    $datos = $categorias->eliminar_categoria($con,$id);

    if ($datos){
        echo $mensaje->m_correcto('Datos eliminados exitosamente.');
    }else{
        echo $mensaje->m_error('Lo siento algo ha salido mal intenta nuevamente.'.mysqli_error($con));
    }
}
                
if ($action == "upd")
{
    $id_categoria = mysqli_real_escape_string($con, (strip_tags($_POST['upd_id'], ENT_QUOTES)));
    $nombre_categoria = mysqli_real_escape_string($con, (strip_tags($_POST['upd_nombre_categoria'], ENT_QUOTES)));
    $descripcion_categoria = mysqli_real_escape_string($con, (strip_tags($_POST['upd_descripcion_categoria'], ENT_QUOTES)));
    
    $datos = $categorias->actualizar_categoria($con,$id_categoria,$nombre_categoria,$descripcion_categoria);
    if ($datos){
        echo $mensaje->m_correcto('Categoría ha sido Actualizada satisfactoriamente.');
    }else{
        echo $mensaje->m_error('Lo siento algo ha salido mal intenta nuevamente.'.mysqli_error($con));
    }

}

?>
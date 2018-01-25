<?php
include('../is_logged.php');
if (empty($_POST['upd_codigo_producto']))
{
        $errors[] = 'Código vacío';
}
if (empty($_POST['upd_nombre_producto']))
{
        $errors[] = 'Nombre vacío';
}
if (empty($_POST['upd_precio_producto']))
{
        $errors[] = 'Precio vacío';
}
if (empty($_POST['upd_stock']))
{
        $errors[] = 'stock vacío';
}
if (empty($_POST['upd_id_categoria']))
{
        $errors[] = 'id_categoria vacío';
}
if (empty($_POST['upd_idmaterial']))
{
        $errors[] = 'idmaterial vacío';
}
if (empty($_POST['upd_idmodelo']))
{
        $errors[] = 'idmodelo vacío';
}
else if (!empty($_POST['upd_idmodelo']))
{
    require_once('../../config/db.php');
    require_once('../../config/conexion.php');
    $id_producto = mysqli_real_escape_string($con, (strip_tags($_POST['upd_id'], ENT_QUOTES)));
    $codigo_producto = mysqli_real_escape_string($con, (strip_tags($_POST['upd_codigo_producto'], ENT_QUOTES)));
    $nombre_producto = mysqli_real_escape_string($con, (strip_tags($_POST['upd_nombre_producto'], ENT_QUOTES)));
    $precio_producto = mysqli_real_escape_string($con, (strip_tags($_POST['upd_precio_producto'], ENT_QUOTES)));
    $stock = mysqli_real_escape_string($con, (strip_tags($_POST['upd_stock'], ENT_QUOTES)));
    $id_categoria = mysqli_real_escape_string($con, (strip_tags($_POST['upd_id_categoria'], ENT_QUOTES)));
    $idmaterial = mysqli_real_escape_string($con, (strip_tags($_POST['upd_idmaterial'], ENT_QUOTES)));
    $idmodelo = mysqli_real_escape_string($con, (strip_tags($_POST['upd_idmodelo'], ENT_QUOTES)));
    $sql = "UPDATE products SET codigo_producto='$codigo_producto',nombre_producto='$nombre_producto',precio_producto='$precio_producto',stock='$stock',id_categoria='$id_categoria',idmaterial='$idmaterial',idmodelo='$idmodelo' WHERE id_producto = '$id_producto'";
    $query_new_insert = mysqli_query($con,$sql);
    if ($query_new_insert){
            $messages[] = 'Productos ha sido Actualizado satisfactoriamente.';
    } else{
            $errors[]= 'Lo siento algo ha salido mal intenta nuevamente.'.mysqli_error($con);
    }
} else {
    $errors[]= 'Error desconocido.';
}
if (isset($errors)){
?>
    <div class='alert alert-danger' role='alert'>
    <button type = 'button' class='close' data-dismiss='alert'>&times;</button>
    <strong>Error!</strong> 
<?php
    foreach ($errors as $error) {
    $error;}
?>
    </div>
<?php
}
if (isset($messages)){
?>
    <div class='alert alert-success' role='alert'>
    <button type = 'button' class='close' data-dismiss='alert'>&times;</button>
    <strong>¡Bien hecho!</strong>
<?php
    foreach ($messages as $message) {
    echo $message;}
?>
    </div>
<?php } ?>

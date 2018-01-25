<?php
include('../is_logged.php');
if (empty($_POST['add_codigo_producto']))
{
        $errors[] = 'Código vacío';
}
if (empty($_POST['add_nombre_producto']))
{
        $errors[] = 'Nombre vacío';
}
if (empty($_POST['add_precio_producto']))
{
        $errors[] = 'Precio vacío';
}
if (empty($_POST['add_stock']))
{
        $errors[] = 'stock vacío';
}
if (empty($_POST['add_id_categoria']))
{
        $errors[] = 'id_categoria vacío';
}
if (empty($_POST['add_idmaterial']))
{
        $errors[] = 'idmaterial vacío';
}
if (empty($_POST['add_idmodelo']))
{
        $errors[] = 'idmodelo vacío';
}
else if (!empty($_POST['add_idmodelo']))
{
    require_once('../../config/db.php');
    require_once('../../config/conexion.php');
    $codigo_producto = mysqli_real_escape_string($con, (strip_tags($_POST['add_codigo_producto'], ENT_QUOTES)));
    $nombre_producto = mysqli_real_escape_string($con, (strip_tags($_POST['add_nombre_producto'], ENT_QUOTES)));
    $date_added = date('Y-m-d H:i:s'); 
    $precio_producto = mysqli_real_escape_string($con, (strip_tags($_POST['add_precio_producto'], ENT_QUOTES)));
    $stock = mysqli_real_escape_string($con, (strip_tags($_POST['add_stock'], ENT_QUOTES)));
    $id_categoria = mysqli_real_escape_string($con, (strip_tags($_POST['add_id_categoria'], ENT_QUOTES)));
    $idmaterial = mysqli_real_escape_string($con, (strip_tags($_POST['add_idmaterial'], ENT_QUOTES)));
    $idmodelo = mysqli_real_escape_string($con, (strip_tags($_POST['add_idmodelo'], ENT_QUOTES)));
    $sql = "INSERT INTO products (codigo_producto,nombre_producto,date_added,precio_producto,stock,id_categoria,idmaterial,idmodelo) VALUES ('$codigo_producto','$nombre_producto','$date_added','$precio_producto','$stock','$id_categoria','$idmaterial','$idmodelo')";
    $query_new_insert = mysqli_query($con,$sql);
    if ($query_new_insert){
            $messages[] = 'Productos ha sido ingresada satisfactoriamente.';
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

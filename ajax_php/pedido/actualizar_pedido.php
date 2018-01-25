<?php
include('../is_logged.php');
if (empty($_POST['upd_fecha']))
{
        $errors[] = 'fecha vacío';
}
if (empty($_POST['upd_idproveedor']))
{
        $errors[] = 'idproveedor vacío';
}
if (empty($_POST['upd_idestado_pedido']))
{
        $errors[] = 'idestado_pedido vacío';
}
else if (!empty($_POST['upd_idestado_pedido']))
{
    require_once('../../config/db.php');
    require_once('../../config/conexion.php');
    $idpedido = mysqli_real_escape_string($con, (strip_tags($_POST['upd_id'], ENT_QUOTES)));
    $fecha = mysqli_real_escape_string($con, (strip_tags($_POST['upd_fecha'], ENT_QUOTES)));
    $idproveedor = mysqli_real_escape_string($con, (strip_tags($_POST['upd_idproveedor'], ENT_QUOTES)));
    $idestado_pedido = mysqli_real_escape_string($con, (strip_tags($_POST['upd_idestado_pedido'], ENT_QUOTES)));
    $sql = "UPDATE pedido SET fecha='$fecha',idproveedor='$idproveedor',idestado_pedido='$idestado_pedido' WHERE idpedido = '$idpedido'";
    $query_new_insert = mysqli_query($con,$sql);
    if ($query_new_insert){
            $messages[] = 'Pedido ha sido Actualizado satisfactoriamente.';
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

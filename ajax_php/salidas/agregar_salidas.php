<?php
include('../is_logged.php');
if (empty($_POST['add_fecha']))
{
        $errors[] = 'fecha vacío';
}
if (empty($_POST['add_Detalles']))
{
        $errors[] = 'Detalles vacío';
}
if (empty($_POST['add_idestado_salida']))
{
        $errors[] = 'idestado_salida vacío';
}
else if (!empty($_POST['add_idestado_salida']))
{
    require_once('../../config/db.php');
    require_once('../../config/conexion.php');
    $fecha = mysqli_real_escape_string($con, (strip_tags($_POST['add_fecha'], ENT_QUOTES)));
    $Detalles = mysqli_real_escape_string($con, (strip_tags($_POST['add_Detalles'], ENT_QUOTES)));
    $idestado_salida = mysqli_real_escape_string($con, (strip_tags($_POST['add_idestado_salida'], ENT_QUOTES)));
    $Ruc = $_SESSION['Ruc']; 
    $sql = "INSERT INTO salidas (fecha,Detalles,idestado_salida,Ruc) VALUES ('$fecha','$Detalles','$idestado_salida','$Ruc')";
    $query_new_insert = mysqli_query($con,$sql);
    if ($query_new_insert){
            $messages[] = 'Salidas ha sido ingresada satisfactoriamente.';
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

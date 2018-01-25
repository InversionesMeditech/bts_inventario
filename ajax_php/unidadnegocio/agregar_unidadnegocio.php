<?php
include('../is_logged.php');
if (empty($_POST['add_UnegNombre']))
{
        $errors[] = 'UnegNombre vacío';
}
if (empty($_POST['add_UnegDireccion']))
{
        $errors[] = 'UnegDireccion vacío';
}
else if (!empty($_POST['add_UnegDireccion']))
{
    require_once('../../config/db.php');
    require_once('../../config/conexion.php');
    $sql = "INSERT INTO unidadnegocio () VALUES ()";
    $query_new_insert = mysqli_query($con,$sql);
    if ($query_new_insert){
            $messages[] = 'Empresa ha sido ingresada satisfactoriamente.';
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

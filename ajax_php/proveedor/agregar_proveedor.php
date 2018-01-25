<?php
include('../is_logged.php');
if (empty($_POST['add_nom_proveedor']))
{
        $errors[] = 'Nombre vacío';
}
if (empty($_POST['add_ruc_proveedor']))
{
        $errors[] = 'Ruc vacío';
}
if (empty($_POST['add_dir_proveedor']))
{
        $errors[] = 'Dirección vacío';
}
else if (!empty($_POST['add_dir_proveedor']))
{
    require_once('../../config/db.php');
    require_once('../../config/conexion.php');
    $nom_proveedor = mysqli_real_escape_string($con, (strip_tags($_POST['add_nom_proveedor'], ENT_QUOTES)));
    $telf_proveedor = mysqli_real_escape_string($con, (strip_tags($_POST['add_telf_proveedor'], ENT_QUOTES)));
    $cel_proveedor = mysqli_real_escape_string($con, (strip_tags($_POST['add_cel_proveedor'], ENT_QUOTES)));
    $ruc_proveedor = mysqli_real_escape_string($con, (strip_tags($_POST['add_ruc_proveedor'], ENT_QUOTES)));
    $dir_proveedor = mysqli_real_escape_string($con, (strip_tags($_POST['add_dir_proveedor'], ENT_QUOTES)));
    $Ruc = $_SESSION['Ruc']; 
    $sql = "INSERT INTO proveedor (nom_proveedor,telf_proveedor,cel_proveedor,ruc_proveedor,dir_proveedor,Ruc) VALUES ('$nom_proveedor','$telf_proveedor','$cel_proveedor','$ruc_proveedor','$dir_proveedor','$Ruc')";
    $query_new_insert = mysqli_query($con,$sql);
    if ($query_new_insert){
            $messages[] = 'Proveedor ha sido ingresada satisfactoriamente.';
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

<?php
include('../is_logged.php');
if (empty($_POST['add_nom_material']))
{
        $errors[] = 'Nombre vacío';
}
else if (!empty($_POST['add_nom_material']))
{
    require_once('../../config/db.php');
    require_once('../../config/conexion.php');
    $nom_material = mysqli_real_escape_string($con, (strip_tags($_POST['add_nom_material'], ENT_QUOTES)));
    $des_material = mysqli_real_escape_string($con, (strip_tags($_POST['add_des_material'], ENT_QUOTES)));
    $Ruc = $_SESSION['Ruc']; 
    $sql = "INSERT INTO material (nom_material,des_material,Ruc) VALUES ('$nom_material','$des_material','$Ruc')";
    $query_new_insert = mysqli_query($con,$sql);
    if ($query_new_insert){
            $messages[] = 'Material ha sido ingresada satisfactoriamente.';
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

<?php
include('../is_logged.php');
if (empty($_POST['add_firstname']))
{
        $errors[] = 'Nombre vacío';
}
if (empty($_POST['add_user_password_hash']))
{
        $errors[] = 'Clave vacío';
}
if (empty($_POST['add_user_email']))
{
        $errors[] = 'Correo vacío';
}
else if (!empty($_POST['add_user_email']))
{
    require_once('../../config/db.php');
    require_once('../../config/conexion.php');
    $firstname = mysqli_real_escape_string($con, (strip_tags($_POST['add_firstname'], ENT_QUOTES)));
    $lastname = mysqli_real_escape_string($con, (strip_tags($_POST['add_lastname'], ENT_QUOTES)));
    $user_password_hash = mysqli_real_escape_string($con, (strip_tags($_POST['add_user_password_hash'], ENT_QUOTES)));
    $user_email = mysqli_real_escape_string($con, (strip_tags($_POST['add_user_email'], ENT_QUOTES)));
    $date_added = date('Y-m-d H:i:s'); 
    $Ruc = $_SESSION['Ruc']; 
    $Admin = mysqli_real_escape_string($con, (strip_tags($_POST['add_Admin'], ENT_QUOTES)));
    $sql = "INSERT INTO users (firstname,lastname,user_password_hash,user_email,date_added,Ruc,Admin) VALUES ('$firstname','$lastname','$user_password_hash','$user_email','$date_added','$Ruc','$Admin')";
    $query_new_insert = mysqli_query($con,$sql);
    if ($query_new_insert){
            $messages[] = 'Usuarios ha sido ingresada satisfactoriamente.';
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

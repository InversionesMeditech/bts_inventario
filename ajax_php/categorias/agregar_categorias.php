<?php
include('../is_logged.php');
if (empty($_POST['add_nombre_categoria']))
{
        $errors[] = 'Nombre vacío';
}
else if (!empty($_POST['add_nombre_categoria']))
{
    require_once('../../config/db.php');
    require_once('../../config/conexion.php');
    $nombre_categoria = mysqli_real_escape_string($con, (strip_tags($_POST['add_nombre_categoria'], ENT_QUOTES)));
    $descripcion_categoria = mysqli_real_escape_string($con, (strip_tags($_POST['add_descripcion_categoria'], ENT_QUOTES)));
    $date_added = date('Y-m-d H:i:s'); 
    $Ruc = $_SESSION['Ruc']; 
    $sql = "INSERT INTO categorias (nombre_categoria,descripcion_categoria,date_added,Ruc) VALUES ('$nombre_categoria','$descripcion_categoria','$date_added','$Ruc')";
    $query_new_insert = mysqli_query($con,$sql);
    if ($query_new_insert){
            $messages[] = 'Categoría ha sido ingresada satisfactoriamente.';
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

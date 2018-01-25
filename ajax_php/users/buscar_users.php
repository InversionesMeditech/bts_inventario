<?php
include('../is_logged.php');
require_once('../../config/db.php');
require_once('../../config/conexion.php');
$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != NULL)?$_REQUEST['action']:'';
if (isset($_GET['id']))
    {
        $id = intval($_GET['id']);
        if ($delete1 = mysqli_query($con, "DELETE FROM users WHERE user_id='$id'")){
?>
            <div class='alert alert-success alert-dismissible' role='alert'>
                <button type = 'button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                <strong>Aviso!</strong> Datos eliminados exitosamente.
            </div>
<?php
        }else {
?>
            <div class='alert alert-danger alert-dismissible' role='alert'>
                <button type = 'button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                <strong>Error!</strong> Lo siento algo ha salido mal, verifique que no tenga informacion relacionada e intenta nuevamente.
            </div>
<?php }}
    if ($action == 'ajax')
        {
            $firstname = mysqli_real_escape_string($con, (strip_tags($_REQUEST['firstname'], ENT_QUOTES)));
            $aColumns = array('firstname');
            $sTable = 'users';
            $sWhere = "Where 'Y' = 'Y' ";
            if ( $_GET['firstname'] != '' )
                {
                    $sWhere.= "and firstname Like '%$firstname%'";
                }
     $sWhere.= "and Ruc = '".$_SESSION['Ruc']."'";
            $sWhere.= ' order by firstname';
            include '../pagination.php'; 
            $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ?$_REQUEST['page']:1;
            $per_page = 10; 
            $adjacents = 4; 
            $offset = ($page - 1) * $per_page;
            $count_query = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
            $row = mysqli_fetch_array($count_query);
            $numrows = $row['numrows'];
            $total_pages = ceil($numrows /$per_page);
            $reload = '../../users.php';
            $sql = "SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
            $query = mysqli_query($con, $sql);
            if ($numrows > 0){
?>
                <div class='table-responsive'>
                <table class='table'>
                <tr class='btn-info'>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Clave</th>
                    <th>Correo</th>
                    <th>date_added</th>
                    <th>Admin</th>
                    <th class='text-right'>Acciones</th>
                </tr>
<?php
                    while ($row=mysqli_fetch_array($query)){
?>
                    <tr>
                        <td><?php echo $row['firstname']; ?></td>
                        <td><?php echo $row['lastname']; ?></td>
                        <td><?php echo $row['user_password_hash']; ?></td>
                        <td><?php echo $row['user_email']; ?></td>
                        <td><?php echo $row['date_added']; ?></td>
                        <td><?php echo $row['Admin']; ?></td>
                        <td class='text-right'>
                        <a href = '#' class='btn btn-success' title='Editar Usuarios'data-firstname='<?php echo $row['firstname']; ?>' data-lastname='<?php echo $row['lastname']; ?>' data-user_password_hash='<?php echo $row['user_password_hash']; ?>' data-user_email='<?php echo $row['user_email']; ?>' data-date_added='<?php echo $row['date_added']; ?>' data-Admin='<?php echo $row['Admin']; ?>'  data-id='<?php echo $row['user_id']; ?>' data-toggle='modal' data-target='#updusers'><i class='fa fa-edit'></i></a>
                        <a href = '#' class='btn btn-danger' title='Borrar Usuarios' onclick="eliminar('<?php echo $row['user_id']; ?>')"><i class='fa fa-trash'></i> </a>
                        </td>
                    </tr>
<?php
                  }
?>
                    <tr>
                    <td colspan = 4 ><span class='pull-right'>
<?php
                    echo paginate($reload, $page, $total_pages, $adjacents);
?>                  </span></td>
                    </tr>
            </table>
        </div>
<?php
}
}
?>

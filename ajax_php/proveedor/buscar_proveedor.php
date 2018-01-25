<?php
include('../is_logged.php');
require_once('../../config/db.php');
require_once('../../config/conexion.php');
$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != NULL)?$_REQUEST['action']:'';
if (isset($_GET['id']))
    {
        $id = intval($_GET['id']);
        if ($delete1 = mysqli_query($con, "DELETE FROM proveedor WHERE idproveedor='$id'")){
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
            $nom_proveedor = mysqli_real_escape_string($con, (strip_tags($_REQUEST['nom_proveedor'], ENT_QUOTES)));
            $ruc_proveedor = mysqli_real_escape_string($con, (strip_tags($_REQUEST['ruc_proveedor'], ENT_QUOTES)));
            $aColumns = array('nom_proveedor,ruc_proveedor');
            $sTable = 'proveedor';
            $sWhere = "Where 'Y' = 'Y' ";
            if ( $_GET['nom_proveedor'] != '' )
                {
                    $sWhere.= "and nom_proveedor Like '%$nom_proveedor%'";
                }
            if ( $_GET['ruc_proveedor'] != '' )
                {
                    $sWhere.= "and ruc_proveedor Like '%$ruc_proveedor%'";
                }
     $sWhere.= "and Ruc = '".$_SESSION['Ruc']."'";
            $sWhere.= ' order by nom_proveedor,ruc_proveedor';
            include '../pagination.php'; 
            $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ?$_REQUEST['page']:1;
            $per_page = 10; 
            $adjacents = 4; 
            $offset = ($page - 1) * $per_page;
            $count_query = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
            $row = mysqli_fetch_array($count_query);
            $numrows = $row['numrows'];
            $total_pages = ceil($numrows /$per_page);
            $reload = '../../proveedor.php';
            $sql = "SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
            $query = mysqli_query($con, $sql);
            if ($numrows > 0){
?>
                <div class='table-responsive'>
                <table class='table'>
                <tr class='btn-info'>
                    <th>idproveedor</th>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Celular</th>
                    <th>Ruc</th>
                    <th>Dirección</th>
                    <th class='text-right'>Acciones</th>
                </tr>
<?php
                    while ($row=mysqli_fetch_array($query)){
?>
                    <tr>
                        <td><?php echo $row['idproveedor']; ?></td>
                        <td><?php echo $row['nom_proveedor']; ?></td>
                        <td><?php echo $row['telf_proveedor']; ?></td>
                        <td><?php echo $row['cel_proveedor']; ?></td>
                        <td><?php echo $row['ruc_proveedor']; ?></td>
                        <td><?php echo $row['dir_proveedor']; ?></td>
                        <td class='text-right'>
                        <a href = '#' class='btn btn-success' title='Editar Proveedor'data-idproveedor='<?php echo $row['idproveedor']; ?>' data-nom_proveedor='<?php echo $row['nom_proveedor']; ?>' data-telf_proveedor='<?php echo $row['telf_proveedor']; ?>' data-cel_proveedor='<?php echo $row['cel_proveedor']; ?>' data-ruc_proveedor='<?php echo $row['ruc_proveedor']; ?>' data-dir_proveedor='<?php echo $row['dir_proveedor']; ?>'  data-id='<?php echo $row['idproveedor']; ?>' data-toggle='modal' data-target='#updproveedor'><i class='fa fa-edit'></i></a>
                        <a href = '#' class='btn btn-danger' title='Borrar Proveedor' onclick="eliminar('<?php echo $row['idproveedor']; ?>')"><i class='fa fa-trash'></i> </a>
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

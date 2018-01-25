<?php
include('../is_logged.php');
require_once('../../config/db.php');
require_once('../../config/conexion.php');
$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != NULL)?$_REQUEST['action']:'';
if (isset($_GET['id']))
    {
        $id = intval($_GET['id']);
        if ($delete1 = mysqli_query($con, "DELETE FROM modelo WHERE idmodelo='$id'")){
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
            $nom_modelo = mysqli_real_escape_string($con, (strip_tags($_REQUEST['nom_modelo'], ENT_QUOTES)));
            $idmarca = mysqli_real_escape_string($con, (strip_tags($_REQUEST['idmarca'], ENT_QUOTES)));
            $aColumns = array('nom_modelo,idmarca');
            $sTable = 'modelo';
            $sWhere = "Where 'Y' = 'Y' ";
            if ( $_GET['nom_modelo'] != '' )
                {
                    $sWhere.= "and nom_modelo Like '%$nom_modelo%'";
                }
            if ( $_GET['idmarca'] != '' )
                {
                    $sWhere.= "and idmarca Like '%$idmarca%'";
                }
     $sWhere.= "and Ruc = '".$_SESSION['Ruc']."'";
            $sWhere.= ' order by nom_modelo,idmarca';
            include '../pagination.php'; 
            $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ?$_REQUEST['page']:1;
            $per_page = 10; 
            $adjacents = 4; 
            $offset = ($page - 1) * $per_page;
            $count_query = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
            $row = mysqli_fetch_array($count_query);
            $numrows = $row['numrows'];
            $total_pages = ceil($numrows /$per_page);
            $reload = '../../modelo.php';
            $sql = "SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
            $query = mysqli_query($con, $sql);
            if ($numrows > 0){
?>
                <div class='table-responsive'>
                <table class='table'>
                <tr class='btn-info'>
                    <th>idmodelo</th>
                    <th>Nombre</th>
                    <th>idmarca</th>
                    <th class='text-right'>Acciones</th>
                </tr>
<?php
                    while ($row=mysqli_fetch_array($query)){
?>
                    <tr>
                        <td><?php echo $row['idmodelo']; ?></td>
                        <td><?php echo $row['nom_modelo']; ?></td>
                        <td><?php echo $row['idmarca']; ?></td>
                        <td class='text-right'>
                        <a href = '#' class='btn btn-success' title='Editar Modelo'data-idmodelo='<?php echo $row['idmodelo']; ?>' data-nom_modelo='<?php echo $row['nom_modelo']; ?>' data-idmarca='<?php echo $row['idmarca']; ?>'  data-id='<?php echo $row['idmodelo']; ?>' data-toggle='modal' data-target='#updmodelo'><i class='fa fa-edit'></i></a>
                        <a href = '#' class='btn btn-danger' title='Borrar Modelo' onclick="eliminar('<?php echo $row['idmodelo']; ?>')"><i class='fa fa-trash'></i> </a>
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

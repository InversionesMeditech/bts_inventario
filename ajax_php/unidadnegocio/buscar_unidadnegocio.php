<?php
include('../is_logged.php');
require_once('../../config/db.php');
require_once('../../config/conexion.php');
$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != NULL)?$_REQUEST['action']:'';
if (isset($_GET['id']))
    {
        $id = intval($_GET['id']);
        if ($delete1 = mysqli_query($con, "DELETE FROM unidadnegocio WHERE Ruc='$id'")){
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
            $Ruc = mysqli_real_escape_string($con, (strip_tags($_REQUEST['Ruc'], ENT_QUOTES)));
            $aColumns = array('Ruc');
            $sTable = 'unidadnegocio';
            $sWhere = "Where 'Y' = 'Y' ";
            if ( $_GET['Ruc'] != '' )
                {
                    $sWhere.= "and Ruc Like '%$Ruc%'";
                }
            $sWhere.= ' order by Ruc';
            include '../pagination.php'; 
            $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ?$_REQUEST['page']:1;
            $per_page = 10; 
            $adjacents = 4; 
            $offset = ($page - 1) * $per_page;
            $count_query = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
            $row = mysqli_fetch_array($count_query);
            $numrows = $row['numrows'];
            $total_pages = ceil($numrows /$per_page);
            $reload = '../../unidadnegocio.php';
            $sql = "SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
            $query = mysqli_query($con, $sql);
            if ($numrows > 0){
?>
                <div class='table-responsive'>
                <table class='table'>
                <tr class='btn-info'>
                    <th>Ruc</th>
                    <th>UnegNombre</th>
                    <th>UnegDireccion</th>
                    <th>UnegTelefono</th>
                    <th>UnegCelular</th>
                    <th class='text-right'>Acciones</th>
                </tr>
<?php
                    while ($row=mysqli_fetch_array($query)){
?>
                    <tr>
                        <td><?php echo $row['Ruc']; ?></td>
                        <td><?php echo $row['UnegNombre']; ?></td>
                        <td><?php echo $row['UnegDireccion']; ?></td>
                        <td><?php echo $row['UnegTelefono']; ?></td>
                        <td><?php echo $row['UnegCelular']; ?></td>
                        <td class='text-right'>
                        <a href = '#' class='btn btn-success' title='Editar Empresa'data-Ruc='<?php echo $row['Ruc']; ?>' data-UnegNombre='<?php echo $row['UnegNombre']; ?>' data-UnegDireccion='<?php echo $row['UnegDireccion']; ?>' data-UnegTelefono='<?php echo $row['UnegTelefono']; ?>' data-UnegCelular='<?php echo $row['UnegCelular']; ?>'  data-id='<?php echo $row['Ruc']; ?>' data-toggle='modal' data-target='#updunidadnegocio'><i class='fa fa-edit'></i></a>
                        <a href = '#' class='btn btn-danger' title='Borrar Empresa' onclick="eliminar('<?php echo $row['Ruc']; ?>')"><i class='fa fa-trash'></i> </a>
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

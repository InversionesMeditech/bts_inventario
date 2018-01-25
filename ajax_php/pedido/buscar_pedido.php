<?php
include('../is_logged.php');
require_once('../../config/db.php');
require_once('../../config/conexion.php');
$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != NULL)?$_REQUEST['action']:'';
if (isset($_GET['id']))
    {
        $id = intval($_GET['id']);
        if ($delete1 = mysqli_query($con, "DELETE FROM pedido WHERE idpedido='$id'")){
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
            $fecha = mysqli_real_escape_string($con, (strip_tags($_REQUEST['fecha'], ENT_QUOTES)));
            $aColumns = array('fecha');
            $sTable = 'pedido';
            $sWhere = "Where 'Y' = 'Y' ";
            if ( $_GET['fecha'] != '' )
                {
                    $sWhere.= "and fecha Like '%$fecha%'";
                }
            $sWhere.= ' order by fecha';
            include '../pagination.php'; 
            $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ?$_REQUEST['page']:1;
            $per_page = 10; 
            $adjacents = 4; 
            $offset = ($page - 1) * $per_page;
            $count_query = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
            $row = mysqli_fetch_array($count_query);
            $numrows = $row['numrows'];
            $total_pages = ceil($numrows /$per_page);
            $reload = '../../pedido.php';
            $sql = "SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
            $query = mysqli_query($con, $sql);
            if ($numrows > 0){
?>
                <div class='table-responsive'>
                <table class='table'>
                <tr class='btn-info'>
                    <th>idpedido</th>
                    <th>fecha</th>
                    <th>idproveedor</th>
                    <th>idestado_pedido</th>
                    <th class='text-right'>Acciones</th>
                </tr>
<?php
                    while ($row=mysqli_fetch_array($query)){
?>
                    <tr>
                        <td><?php echo $row['idpedido']; ?></td>
                        <td><?php echo $row['fecha']; ?></td>
                        <td><?php echo $row['idproveedor']; ?></td>
                        <td><?php echo $row['idestado_pedido']; ?></td>
                        <td class='text-right'>
                        <a href = '#' class='btn btn-success' title='Editar Pedido'data-idpedido='<?php echo $row['idpedido']; ?>' data-fecha='<?php echo $row['fecha']; ?>' data-idproveedor='<?php echo $row['idproveedor']; ?>' data-idestado_pedido='<?php echo $row['idestado_pedido']; ?>'  data-id='<?php echo $row['idpedido']; ?>' data-toggle='modal' data-target='#updpedido'><i class='fa fa-edit'></i></a>
                        <a href = '#' class='btn btn-danger' title='Borrar Pedido' onclick="eliminar('<?php echo $row['idpedido']; ?>')"><i class='fa fa-trash'></i> </a>
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

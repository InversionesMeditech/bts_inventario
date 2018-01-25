<?php
include('../is_logged.php');
require_once('../../config/db.php');
require_once('../../config/conexion.php');
$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != NULL)?$_REQUEST['action']:'';
if (isset($_GET['id']))
    {
        $id = intval($_GET['id']);
        if ($delete1 = mysqli_query($con, "DELETE FROM products WHERE id_producto='$id'")){
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
            $nombre_producto = mysqli_real_escape_string($con, (strip_tags($_REQUEST['nombre_producto'], ENT_QUOTES)));
            $id_categoria = mysqli_real_escape_string($con, (strip_tags($_REQUEST['id_categoria'], ENT_QUOTES)));
            $idmaterial = mysqli_real_escape_string($con, (strip_tags($_REQUEST['idmaterial'], ENT_QUOTES)));
            $idmodelo = mysqli_real_escape_string($con, (strip_tags($_REQUEST['idmodelo'], ENT_QUOTES)));
            $aColumns = array('nombre_producto,id_categoria,idmaterial,idmodelo');
            $sTable = 'products';
            $sWhere = "Where 'Y' = 'Y' ";
            if ( $_GET['nombre_producto'] != '' )
                {
                    $sWhere.= "and nombre_producto Like '%$nombre_producto%'";
                }
            if ( $_GET['id_categoria'] != '' )
                {
                    $sWhere.= "and id_categoria Like '%$id_categoria%'";
                }
            if ( $_GET['idmaterial'] != '' )
                {
                    $sWhere.= "and idmaterial Like '%$idmaterial%'";
                }
            if ( $_GET['idmodelo'] != '' )
                {
                    $sWhere.= "and idmodelo Like '%$idmodelo%'";
                }
            $sWhere.= ' order by nombre_producto,id_categoria,idmaterial,idmodelo';
            include '../pagination.php'; 
            $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ?$_REQUEST['page']:1;
            $per_page = 10; 
            $adjacents = 4; 
            $offset = ($page - 1) * $per_page;
            $count_query = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
            $row = mysqli_fetch_array($count_query);
            $numrows = $row['numrows'];
            $total_pages = ceil($numrows /$per_page);
            $reload = '../../products.php';
            $sql = "SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
            $query = mysqli_query($con, $sql);
            if ($numrows > 0){
?>
                <div class='table-responsive'>
                <table class='table'>
                <tr class='btn-info'>
                    <th>id_producto</th>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>date_added</th>
                    <th>Precio</th>
                    <th>stock</th>
                    <th>id_categoria</th>
                    <th>idmaterial</th>
                    <th>idmodelo</th>
                    <th class='text-right'>Acciones</th>
                </tr>
<?php
                    while ($row=mysqli_fetch_array($query)){
?>
                    <tr>
                        <td><?php echo $row['id_producto']; ?></td>
                        <td><?php echo $row['codigo_producto']; ?></td>
                        <td><?php echo $row['nombre_producto']; ?></td>
                        <td><?php echo $row['date_added']; ?></td>
                        <td><?php echo $row['precio_producto']; ?></td>
                        <td><?php echo $row['stock']; ?></td>
                        <td><?php echo $row['id_categoria']; ?></td>
                        <td><?php echo $row['idmaterial']; ?></td>
                        <td><?php echo $row['idmodelo']; ?></td>
                        <td class='text-right'>
                        <a href = '#' class='btn btn-success' title='Editar Productos'data-id_producto='<?php echo $row['id_producto']; ?>' data-codigo_producto='<?php echo $row['codigo_producto']; ?>' data-nombre_producto='<?php echo $row['nombre_producto']; ?>' data-date_added='<?php echo $row['date_added']; ?>' data-precio_producto='<?php echo $row['precio_producto']; ?>' data-stock='<?php echo $row['stock']; ?>' data-id_categoria='<?php echo $row['id_categoria']; ?>' data-idmaterial='<?php echo $row['idmaterial']; ?>' data-idmodelo='<?php echo $row['idmodelo']; ?>'  data-id='<?php echo $row['id_producto']; ?>' data-toggle='modal' data-target='#updproducts'><i class='fa fa-edit'></i></a>
                        <a href = '#' class='btn btn-danger' title='Borrar Productos' onclick="eliminar('<?php echo $row['id_producto']; ?>')"><i class='fa fa-trash'></i> </a>
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

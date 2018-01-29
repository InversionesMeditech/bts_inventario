<?php
include('../is_logged.php');
require_once('../../config/db.php');
require_once('../../config/conexion.php');
$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != NULL)?$_REQUEST['action']:'';
if (isset($_GET['id']))
    {
        $id = intval($_GET['id']);
        if ($delete1 = mysqli_query($con, "DELETE FROM categorias WHERE id_categoria='$id'")){
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
            $nombre_categoria = mysqli_real_escape_string($con, (strip_tags($_REQUEST['nombre_categoria'], ENT_QUOTES)));
            $aColumns = array('nombre_categoria');
            $sTable = 'categorias';
            $sWhere = "Where 'Y' = 'Y' ";
            if ( $_GET['nombre_categoria'] != '' )
                {
                    $sWhere.= "and nombre_categoria Like '%$nombre_categoria%'";
                }
            $sWhere.= "and Ruc = '".$_SESSION['Ruc']."'";
            $sWhere.= ' order by nombre_categoria';
            include '../pagination.php'; 
            $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ?$_REQUEST['page']:1;
            $per_page = 10; 
            $adjacents = 4; 
            $offset = ($page - 1) * $per_page;
            $count_query = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
            $row = mysqli_fetch_array($count_query);
            $numrows = $row['numrows'];
            $total_pages = ceil($numrows /$per_page);
            $reload = '../../categorias.php';
            $sql = "SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
            $query = mysqli_query($con, $sql);
            if ($numrows > 0){
?>
                <div class='table-responsive'>
                <table id ="tabla_prueba" class='table'>
                <thead>
                <tr class='btn-info'>
                    <th>Id categoría</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Fecha</th>
                    <th class='text-right'>Acciones</th>
                </tr>
            </thead>
<?php
                    while ($row=mysqli_fetch_array($query)){
?>
                    <tr>
                        <td><?php echo $row['id_categoria']; ?></td>
                        <td><?php echo $row['nombre_categoria']; ?></td>
                        <td><?php echo $row['descripcion_categoria']; ?></td>
                        <td><?php echo $row['date_added']; ?></td>
                        <td class='text-right'>
                        <a href = '#' class='btn btn-success' title='Editar Categoría'data-id_categoria='<?php echo $row['id_categoria']; ?>' data-nombre_categoria='<?php echo $row['nombre_categoria']; ?>' data-descripcion_categoria='<?php echo $row['descripcion_categoria']; ?>' data-date_added='<?php echo $row['date_added']; ?>'  data-id='<?php echo $row['id_categoria']; ?>' data-toggle='modal' data-target='#updcategorias'><i class='fa fa-edit'></i></a>
                        <a href = '#' class='btn btn-danger' title='Borrar Categoría' onclick="eliminar('<?php echo $row['id_categoria']; ?>')"><i class='fa fa-trash'></i> </a>
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

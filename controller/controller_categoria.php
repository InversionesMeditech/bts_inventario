<?php
//Llamada al modelo
require_once('../models/model_categoria.php');
include 'pagination.php'; 
$categorias=new model_categoria();
$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != NULL)?$_REQUEST['action']:'';

if ($action == 'buscar')
{
    $nombre_categoria = $_REQUEST['nombre_categoria'];
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ?$_REQUEST['page']:1;
    $per_page = 2; 
    $adjacents = 4;
    $reload = '../../categorias.php'; 
    $offset = ($page - 1) * $per_page;
    $datos=$categorias->get_categorias($offset,$per_page,$nombre_categoria);
    $total_rows = $categorias->get_total_categorias();
    $numrows = count($total_rows);
    $total_pages = ceil($numrows /$per_page);
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
    foreach ($datos as $dato) {
?>
                    <tr>
                        <td><?php echo $dato['id_categoria']; ?></td>
                        <td><?php echo $dato['nombre_categoria']; ?></td>
                        <td><?php echo $dato['descripcion_categoria']; ?></td>
                        <td><?php echo $dato['date_added']; ?></td>
                        <td class='text-right'>
                        <a href = '#' class='btn btn-success' title='Editar Categoría'data-id_categoria='<?php echo $dato['id_categoria']; ?>' data-nombre_categoria='<?php echo $dato['nombre_categoria']; ?>' data-descripcion_categoria='<?php echo $dato['descripcion_categoria']; ?>' data-date_added='<?php echo $dato['date_added']; ?>'  data-id='<?php echo $dato['id_categoria']; ?>' data-toggle='modal' data-target='#updcategorias'><i class='fa fa-edit'></i></a>
                        <a href = '#' class='btn btn-danger' title='Borrar Categoría' onclick="eliminar('<?php echo $dato['id_categoria']; ?>')"><i class='fa fa-trash'></i> </a>
                        </td>
                    </tr>
<?php
    }
?>    
                    <tr>
                        <td colspan = 4 ><span class='pull-right'>
<?php
                        echo paginate($reload, $page, $total_pages, $adjacents);
?>                      </span></td>
                    </tr>
            </table>
        </div>
<?php        
}
?>
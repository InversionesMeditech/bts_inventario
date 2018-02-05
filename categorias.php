<?php
session_start();
if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
header('location: login');exit;}
//require_once('config/db.php');
//require_once('config/conexion.php');
$active_categorias = 'active';
$title = 'Categoría | B-Inventario';
include('head.php');
include('navbar.php');?>
<section class = 'content-header'>
<h1>Categoría</h1></section>
<section class='content'>
<div class='box box-info'>
        <div class='box-header with-border'>
        <div class='btn-group pull-right'>
                <button type = 'button' class='btn btn-block btn-primary' data-toggle='modal' data-target='#addcategorias'><i class='fa fa-plus-circle' ></i> Agregar Categoría</button>
        </div>
        <h4 class='box-title'><i class='fa fa-search'></i> Buscar Categoría</h4>
        </div>
        <div class='box-body pad'>
                <?php
                        include('modal/add/m_add_categorias.php');
                        include('modal/upd/m_upd_categorias.php');
                ?>
                <div id = 'resultados' ></div>
                <div class='outer_div'></div>
                <div>
                        <table id="table_categorias" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                <th>id</th>
                                <th>categoria</th>
                                <th>descr</th>
                                <th>fecha</th>               
                                <th>Acciones</th>
                                </tr>
                                </thead>
                                <tr>
                                </tr>
                        </table>     
                </div>
        </div>
</div>
</section>
<?php
include('footer.php');
?>
<script type = 'text/javascript' src='js/ajax/categorias.js'></script>

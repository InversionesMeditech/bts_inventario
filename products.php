<?php
session_start();
if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
header('location: login');exit;}
require_once('config/db.php');
require_once('config/conexion.php');
$active_products = 'active';
$title = 'Productos | B-Inventario';
include('head.php');
include('navbar.php');?>
<section class = 'content-header'>
<h1>Productos</h1></section>
<section class='content'>
<div class='box box-info'>
        <div class='box-header with-border'>
        <div class='btn-group pull-right'>
                <button type = 'button' class='btn btn-block btn-primary' data-toggle='modal' data-target='#addproducts'><i class='fa fa-plus-circle' ></i> Agregar Productos</button>
        </div>
        <h4 class='box-title'><i class='fa fa-search'></i> Buscar Productos</h4>
        </div>
        <div class='box-body pad'>
                <?php
                        include('modal/add/m_add_products.php');
                        include('modal/upd/m_upd_products.php');
                ?>
                <form class='form-horizontal' role='form' id='datos_products'>
                <label for='nombre_producto' class='control-label text-aqua'>Ingresar Nombre</label>
                <div class='input-group input-group-sm'>
                        <input type = 'text' class='form-control' id='nombre_producto' placeholder='Nombre de la Productos' onkeyup='load(1);'>
                        <span class='input-group-btn '>
                        <button type = 'button' class='btn btn-info btn-flat fa fa-search' onclick='load(1);'>Buscar!</button>
                        </span>
                </div>
                <label for='id_categoria' class='control-label text-aqua'>Ingresar id_categoria</label>
                <div class='input-group input-group-sm'>
                        <input type = 'text' class='form-control' id='id_categoria' placeholder='id_categoria de la Productos' onkeyup='load(1);'>
                        <span class='input-group-btn '>
                        <button type = 'button' class='btn btn-info btn-flat fa fa-search' onclick='load(1);'>Buscar!</button>
                        </span>
                </div>
                <label for='idmaterial' class='control-label text-aqua'>Ingresar idmaterial</label>
                <div class='input-group input-group-sm'>
                        <input type = 'text' class='form-control' id='idmaterial' placeholder='idmaterial de la Productos' onkeyup='load(1);'>
                        <span class='input-group-btn '>
                        <button type = 'button' class='btn btn-info btn-flat fa fa-search' onclick='load(1);'>Buscar!</button>
                        </span>
                </div>
                <label for='idmodelo' class='control-label text-aqua'>Ingresar idmodelo</label>
                <div class='input-group input-group-sm'>
                        <input type = 'text' class='form-control' id='idmodelo' placeholder='idmodelo de la Productos' onkeyup='load(1);'>
                        <span class='input-group-btn '>
                        <button type = 'button' class='btn btn-info btn-flat fa fa-search' onclick='load(1);'>Buscar!</button>
                        </span>
                </div>
                <br>
                </form>
                <div id = 'resultados' ></div>
                <div class='outer_div'></div>
        </div>
</div>
</section>
<?php
include('footer.php');
?>
<script type = 'text/javascript' src='js/ajax/products.js'></script>

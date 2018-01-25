<?php
session_start();
if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
header('location: login');exit;}
require_once('config/db.php');
require_once('config/conexion.php');
$active_proveedor = 'active';
$title = 'Proveedor | B-Inventario';
include('head.php');
include('navbar.php');?>
<section class = 'content-header'>
<h1>Proveedor</h1></section>
<section class='content'>
<div class='box box-info'>
        <div class='box-header with-border'>
        <div class='btn-group pull-right'>
                <button type = 'button' class='btn btn-block btn-primary' data-toggle='modal' data-target='#addproveedor'><i class='fa fa-plus-circle' ></i> Agregar Proveedor</button>
        </div>
        <h4 class='box-title'><i class='fa fa-search'></i> Buscar Proveedor</h4>
        </div>
        <div class='box-body pad'>
                <?php
                        include('modal/add/m_add_proveedor.php');
                        include('modal/upd/m_upd_proveedor.php');
                ?>
                <form class='form-horizontal' role='form' id='datos_proveedor'>
                <label for='nom_proveedor' class='control-label text-aqua'>Ingresar Nombre</label>
                <div class='input-group input-group-sm'>
                        <input type = 'text' class='form-control' id='nom_proveedor' placeholder='Nombre de la Proveedor' onkeyup='load(1);'>
                        <span class='input-group-btn '>
                        <button type = 'button' class='btn btn-info btn-flat fa fa-search' onclick='load(1);'>Buscar!</button>
                        </span>
                </div>
                <label for='ruc_proveedor' class='control-label text-aqua'>Ingresar Ruc</label>
                <div class='input-group input-group-sm'>
                        <input type = 'text' class='form-control' id='ruc_proveedor' placeholder='Ruc de la Proveedor' onkeyup='load(1);'>
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
<script type = 'text/javascript' src='js/ajax/proveedor.js'></script>

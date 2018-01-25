<?php
session_start();
if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
header('location: login');exit;}
require_once('config/db.php');
require_once('config/conexion.php');
$active_pedido = 'active';
$title = 'Pedido | B-Inventario';
include('head.php');
include('navbar.php');?>
<section class = 'content-header'>
<h1>Pedido</h1></section>
<section class='content'>
<div class='box box-info'>
        <div class='box-header with-border'>
        <div class='btn-group pull-right'>
                <button type = 'button' class='btn btn-block btn-primary' data-toggle='modal' data-target='#addpedido'><i class='fa fa-plus-circle' ></i> Agregar Pedido</button>
        </div>
        <h4 class='box-title'><i class='fa fa-search'></i> Buscar Pedido</h4>
        </div>
        <div class='box-body pad'>
                <?php
                        include('modal/add/m_add_pedido.php');
                        include('modal/upd/m_upd_pedido.php');
                ?>
                <form class='form-horizontal' role='form' id='datos_pedido'>
                <label for='fecha' class='control-label text-aqua'>Ingresar fecha</label>
                <div class='input-group input-group-sm'>
                        <input type = 'text' class='form-control' id='fecha' placeholder='fecha de la Pedido' onkeyup='load(1);'>
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
<script type = 'text/javascript' src='js/ajax/pedido.js'></script>

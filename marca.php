<?php
session_start();
if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
header('location: login');exit;}
require_once('config/db.php');
require_once('config/conexion.php');
$active_marca = 'active';
$title = 'Marca | B-Inventario';
include('head.php');
include('navbar.php');?>
<section class = 'content-header'>
<h1>Marca</h1></section>
<section class='content'>
<div class='box box-info'>
        <div class='box-header with-border'>
        <div class='btn-group pull-right'>
                <button type = 'button' class='btn btn-block btn-primary' data-toggle='modal' data-target='#addmarca'><i class='fa fa-plus-circle' ></i> Agregar Marca</button>
        </div>
        <h4 class='box-title'><i class='fa fa-search'></i> Buscar Marca</h4>
        </div>
        <div class='box-body pad'>
                <?php
                        include('modal/add/m_add_marca.php');
                        include('modal/upd/m_upd_marca.php');
                ?>
                <form class='form-horizontal' role='form' id='datos_marca'>
                <label for='nom_marca' class='control-label text-aqua'>Ingresar Nombre</label>
                <div class='input-group input-group-sm'>
                        <input type = 'text' class='form-control' id='nom_marca' placeholder='Nombre de la Marca' onkeyup='load(1);'>
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
<script type = 'text/javascript' src='js/ajax/marca.js'></script>

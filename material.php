<?php
session_start();
if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
header('location: login');exit;}
require_once('config/db.php');
require_once('config/conexion.php');
$active_material = 'active';
$title = 'Material | B-Inventario';
include('head.php');
include('navbar.php');?>
<section class = 'content-header'>
<h1>Material</h1></section>
<section class='content'>
<div class='box box-info'>
        <div class='box-header with-border'>
        <div class='btn-group pull-right'>
                <button type = 'button' class='btn btn-block btn-primary' data-toggle='modal' data-target='#addmaterial'><i class='fa fa-plus-circle' ></i> Agregar Material</button>
        </div>
        <h4 class='box-title'><i class='fa fa-search'></i> Buscar Material</h4>
        </div>
        <div class='box-body pad'>
                <?php
                        include('modal/add/m_add_material.php');
                        include('modal/upd/m_upd_material.php');
                ?>
                <form class='form-horizontal' role='form' id='datos_material'>
                <label for='nom_material' class='control-label text-aqua'>Ingresar Nombre</label>
                <div class='input-group input-group-sm'>
                        <input type = 'text' class='form-control' id='nom_material' placeholder='Nombre de la Material' onkeyup='load(1);'>
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
<script type = 'text/javascript' src='js/ajax/material.js'></script>

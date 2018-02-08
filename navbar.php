<?php if (isset( $title)){  require_once("config/db.php"); require_once("config/conexion.php");?>
<body class="hold-transition skin-blue sidebar-mini">
<div class='wrapper'><header class="main-header">
         <a href = "index2.html" class="logo">
         <span class="logo-mini"><b>B</b> TSI</span>
         <span class="logo-lg"><b>BTS</b> Inventario</span></a>
<nav class="navbar navbar-static-top">
         <a href = "#" class="sidebar-toggle" data-toggle="push-menu" role="button">
         <span class="sr-only">Navegación</span></a>
         <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                    <li class="dropdown user user-menu">
                    <a href = "#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src = "img /user2-160x160.jpg" class="user-image" alt="User Image">
                    <span class="hidden-xs">Alexander Pierce</span></a>
            <ul class="dropdown-menu">
                    <li class="user-header">
                    <img src ="img /user2-160x160.jpg" class="img-circle" alt="User Image">
                    <p>Alexander Pierce - Web Developer<small>Member since Nov. 2012</small></p></li>
                    <li class="user-footer">
            <div class="pull-left">
            <a href = "#" class="btn btn-default btn-flat">Perfil</a></div>
            <div class="pull-right">
                    <a href = "login.php?logout" class="btn btn-default btn-flat">Cerrar</a></div></li></ul></li>
                    <li><a href = "#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a></li></ul>
                    </div></nav></header>




<aside class="main-sidebar">
     <section class="sidebar">
         <div class="user-panel">
         <div class="pull-left image">
             <img src = "img /user2-160x160.jpg" class="img-circle" alt="User Image"></div>
         <div class="pull-left info">
             <p>Alexander Pierce</p>
             <a href = "#" ><i class="fa fa-circle text-success"></i> Online</a></div></div>
         <ul class="sidebar-menu" data-widget="tree">
		        <li class="header">MENU</li>
         <li class="<?php if (isset($active_dashboard)) { echo $active_dashboard; }?> ">
             <a href = 'dashboard' >
              <i class='fa fa-dashboard'></i> <span>Dashboard</span></a>
         </li>
         <li class="<?php if (isset($active_productos)) { echo $active_productos; }?> ">
             <a href = 'products' >
              <i class='fa fa-archive'></i> <span>Productos</span></a>
         </li>
        <li class="treeview">
             <a href = "#" ><i class='fa fa-shopping-cart'></i> <span>Compras</span>
             <span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i></span></a>
             <ul class="treeview-menu">
<li class="<?php if (isset($active_proveedor)){echo $active_proveedor;}?>">
<a href = 'proveedor' ><i  class='fa fa-industry'></i>Proveedor</a>
</li>
<li class="<?php if (isset($active_pedidos)){echo $active_pedidos;}?>">
<a href = 'pedido' ><i  class='fa fa-cart-plus'></i>Pedidos</a>
</li>
              </ul></li>
         <li class="<?php if (isset($active_salidas)) { echo $active_salidas; }?> ">
             <a href = 'salidas' >
              <i class='fa fa-truck'></i> <span>Salidas</span></a>
         </li>
        <li class="treeview">
             <a href = "#" ><i class='fa fa-wrench'></i> <span>Configuración</span>
             <span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i></span></a>
             <ul class="treeview-menu">
<li class="<?php if (isset($active_categorias)){echo $active_categorias;}?>">
<a href = 'categorias' ><i  class='fa fa-ticket'></i>Categorias</a>
</li>
<li class="<?php if (isset($active_material)){echo $active_material;}?>">
<a href = 'material' ><i  class='fa fa-cube'></i>Material</a>
</li>
<li class="<?php if (isset($active_marca)){echo $active_marca;}?>">
<a href = 'marca' ><i  class='fa fa-edit'></i>Marca</a>
</li>
<li class="<?php if (isset($active_modelo)){echo $active_modelo;}?>">
<a href = 'modelo' ><i  class='fa fa-cubes'></i>Modelo</a>
</li>
              </ul></li>
        <li class="treeview">
             <a href = "#" ><i class='fa fa-lock'></i> <span>Seguridad</span>
             <span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i></span></a>
             <ul class="treeview-menu">
<li class="<?php if (isset($active_empresa)){echo $active_empresa;}?>">
<a href = 'unidadnegocio' ><i  class='fa fa-industry'></i>Empresa</a>
</li>
<li class="<?php if (isset($active_usuarios)){echo $active_usuarios;}?>">
<a href = 'users' ><i  class='fa fa-user-plus'></i>Usuarios</a>
</li>
              </ul></li>
        </ul></section></aside>
<div class="content-wrapper">
<?php } ?>

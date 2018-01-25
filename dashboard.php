<?php
session_start();
if ( !isset( $_SESSION[ 'user_login_status' ] )AND $_SESSION[ 'user_login_status' ] != 1 ) {
	header( "location: login" );
	exit;
}
/* Connect To Database*/
require_once( "config/db.php" ); //Contiene las variables de configuracion para conectar a la base de datos
require_once( "config/conexion.php" ); //Contiene funcion que conecta a la base de datos	
$active_dashboard = "active";
$title = "Dashboard | B-Logistico";
$Ruc = $_SESSION[ 'Ruc' ];
/************************DATOS*******************************/
$query_unidadnegocio = mysqli_query( $con, "select * from unidadnegocio where Ruc = '$Ruc' " );
while ( $rw = mysqli_fetch_array( $query_unidadnegocio ) ) {
	$unidad_negocio = $rw[ 'UnegNombre' ];
}
$query_ctProveedor = mysqli_query( $con, "select count(*) cantidad from proveedor where Ruc = '$Ruc' " );
while ( $rw = mysqli_fetch_array( $query_ctProveedor ) ) {
	$cantProveedor = $rw[ 'cantidad' ];
}
$query_ctProductos = mysqli_query( $con, "select count(*) cantidad from w_producto where Ruc = '$Ruc' " );
while ( $rw = mysqli_fetch_array( $query_ctProductos ) ) {
	$cantProductos = $rw[ 'cantidad' ];
}
$query_ctPedidos = mysqli_query( $con, "select count(*) cantidad from w_pedido where Ruc = '$Ruc' and idestado_pedido = '2' " );
while ( $rw = mysqli_fetch_array( $query_ctPedidos ) ) {
	$cantPpedido = $rw[ 'cantidad' ];
}
$query_ctPedidosaprob = mysqli_query( $con, "select count(*) cantidad from salidas where Ruc = '$Ruc' " );
while ( $rw = mysqli_fetch_array( $query_ctPedidosaprob ) ) {
	$cantPsalida = $rw[ 'cantidad' ];
}
?>
<?php
include( "head.php" );
include( "navbar.php" );
?>

<?php include( "footer.php" ); ?>
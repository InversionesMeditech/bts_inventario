<?php
if ( version_compare( PHP_VERSION, '5.3.7', '<' ) ) {
	exit( "Sorry, Simple PHP Login does not run on a PHP version smaller than 5.3.7 !" );
} else if ( version_compare( PHP_VERSION, '5.5.0', '<' ) ) {
	require_once( "libraries/password_compatibility_library.php" );
}

require_once( "config/db.php" );
require_once( "classes/Login.php" );
require_once( "libraries/mensajes.php" );
$login = new Login();
$mensaje = new mensajes();

if ( $login->isUserLoggedIn() == true ) {
	header( "location: dashboard" );
} else {
	?>
	<!DOCTYPE html>
	<html lang="es">

	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/skins/_all-skins.min.css">
	<link rel="stylesheet" href="css/login.css">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
	<link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">
	
	<link rel=icon href='img/logo-icon.png' sizes="32x32" type="image/png">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
		<title>bts_inventario | Login</title>
		<script>
			( function ( i, s, o, g, r, a, m ) {
				i[ 'GoogleAnalyticsObject' ] = r;
				i[ r ] = i[ r ] || function () {
					( i[ r ].q = i[ r ].q || [] ).push( arguments )
				}, i[ r ].l = 1 * new Date();
				a = s.createElement( o ),
					m = s.getElementsByTagName( o )[ 0 ];
				a.async = 1;
				a.src = g;
				m.parentNode.insertBefore( a, m )
			} )( window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga' );

			ga( 'create', 'UA-91061268-1', 'auto' );
			ga( 'send', 'pageview' );
		</script>

	</head>

<body>
<div class="testbox">
  <h1>Ingresar</h1>
  <form method="post" accept-charset="utf-8" action="login.php" name="loginform" autocomplete="off" role="form">
  
      <!--<hr>
    <div class="accounttype">
      <input type="radio" value="None" id="radioOne" name="account" checked/>
      <label for="radioOne" class="radio" chec>Personal</label>
      <input type="radio" value="None" id="radioTwo" name="account" />
      <label for="radioTwo" class="radio">Company</label>
    </div>
  <hr>-->
  <label id="icon" for="name"><i class="icon-user"></i></label>
  <input type="text" name="user_name" id="user_name" placeholder="Usuario" required/>

  <label id="icon" for="name"><i class="icon-shield"></i></label>
  <input type="password" name="user_password" id="user_password" placeholder="Contraseña" required/>

   <button class="button" type="submit" name="login" id="submit">Iniciar Sesión</button>
   <?php
if ( isset( $login ) ) {
	if ( $login->errors ) {
		foreach ($login->errors as $error) {
				echo $message->m_error($error);;
		}
		}
		if ( $login->messages ) {
		foreach ( $login->messages as $message ) {
				 echo $mensaje->m_correcto($message);
				
		}
	}
}
?>
  </form>
</div>
</body>
<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>						 
</html>
<?php
}
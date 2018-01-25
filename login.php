<?php
if ( version_compare( PHP_VERSION, '5.3.7', '<' ) ) {
	exit( "Sorry, Simple PHP Login does not run on a PHP version smaller than 5.3.7 !" );
} else if ( version_compare( PHP_VERSION, '5.5.0', '<' ) ) {
	require_once( "libraries/password_compatibility_library.php" );
}

require_once( "config/db.php" );
require_once( "classes/Login.php" );

$login = new Login();

if ( $login->isUserLoggedIn() == true ) {
	header( "location: dashboard" );
} else {
	?>
	<!DOCTYPE html>
	<html lang="es">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
		<title>B-Logistico | Login</title>
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
		<div>
			<div>
				<form method="post" accept-charset="utf-8" action="login.php" name="loginform" autocomplete="off" role="form">
					<?php
					if ( isset( $login ) ) {
						if ( $login->errors ) {
							?>
					<div role="alert">
						<strong>Error!</strong>
						<?php 
                                             foreach ($login->errors as $error) {
                                                     echo $error;
                                             }
                                             ?>
					</div>
					<?php
					}
					if ( $login->messages ) {
						?>
					<div role="alert">
						<strong>Aviso!</strong>
						<?php
						foreach ( $login->messages as $message ) {
							echo $message;
						}
						?>
					</div>
					<?php 
                                     }
                             }
                             ?>


					<div>
						<input class="form-control " placeholder="Usuario" name="user_name" type="text" value="" autofocus="" required>
					</div>

					<div>
						<input class="form-control" placeholder="Contraseña" name="user_password" type="password" value="" autocomplete="off" required>
					</div>
					<button type="submit" name="login" id="submit">Iniciar Sesión</button>
				</form>
			</div>
		</div>
	</body>

	</html>
	<?php
}
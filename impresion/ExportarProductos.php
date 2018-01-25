<?php
 session_start();
      if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1)
          {
            header("location: login.php");
            exit;
        }
       /* Connect To Database*/
        require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
        require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos

//fecha de la exportación
$Ruc = $_SESSION['Ruc'];
$fecha = date("d-m-Y");
$query_producto= $query_categoria=mysqli_query($con,"select * from w_producto where Ruc = '$Ruc' ");
//Inicio de la instancia para la exportación en Excel
header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=Listado_$fecha.xls");
header("Pragma: no-cache");
header("Expires: 0");

echo "<table border=1> ";
echo "<tr> ";
echo     "<th>Codigo</th> ";
echo 	"<th>Nombre</th> ";
echo 	"<th>Precio</th> ";
echo 	"<th>Stock</th> ";
echo 	"<th>Material</th> ";
echo 	"<th>Modelo</th> ";
echo 	"<th>Marca</th> ";
echo "</tr> ";

while($row = mysqli_fetch_array($query_producto)){	

	$codigo_producto = $row['codigo_producto'];
	$nombre_producto = $row['nombre_producto'];
	$precio_producto = $row['precio_producto'];
                     $stock = $row['stock'];
                     $material = $row['nom_material'];
                     $modelo = $row['nom_modelo'];
                      $marca = $row['nom_marca'];

	echo "<tr> ";
	echo 	"<td>".$codigo_producto."</td> "; 
	echo 	"<td>".$nombre_producto."</td> "; 
	echo 	"<td>".$precio_producto."</td> "; 
                    echo 	"<td>".$stock."</td> "; 
                    echo 	"<td>".$material."</td> "; 
                    echo 	"<td>".$modelo."</td> "; 
                    echo 	"<td>".$marca."</td> "; 
        
	echo "</tr> ";

}
echo "</table> ";
?>
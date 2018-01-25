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
        $action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
if (isset($_GET['idsalida'])){        
                        //fecha de la exportación
                        $idsalida = $_GET['idsalida'];
                        $fecha = date("d-m-Y");
                        $query_Salida= mysqli_query($con,"select * from w_salida where idsalida = '$idsalida' ");
                        while($row = mysqli_fetch_array($query_Salida)){	
                                $pedido_fecha = $row['fecha'];
                                $Detalles = $row['Detalles'];
                                $cant_producto = $row['cant_prod'];
                        }
                        //Inicio de la instancia para la exportación en Excel
                        header('Content-type: application/vnd.ms-excel');
                        header("Content-Disposition: attachment; filename=Salida_$idsalida.xls");
                        header("Pragma: no-cache");
                        header("Expires: 0");

                        echo "<table border=0> ";
                        echo "<tr> ";
                        echo     "<td><strong>Pedido : </strong></td> ";
                        echo     "<td>".$idsalida."</td> ";
                        echo     "<td><strong>Cantidad productos : </strong></td> ";
                        echo     "<td>".$cant_producto."</td> ";
                        echo "</tr> ";
                        echo "<tr> ";
                        echo     "<td><strong>Detalles : </strong></td> ";
                        echo     "<td>".$Detalles."</td> ";
                        echo     "<td></td> ";
                        echo     "<td></td> ";
                        echo "</tr> ";
                        echo "</table> ";
                        echo "<table border=1> ";

                        echo "<tr> ";
                        echo     "<th>Nro</th> ";
                        echo 	"<th>Codigo Producto</th> ";
                        echo 	"<th>Nombre Producto</th> ";
                        echo 	"<th>Cantidad</th> ";
                        echo "</tr> ";
                        $query_salidaproducto= mysqli_query($con,"select * from w_salidaproducto where idsalida = '$idsalida' order by idsalida_producto");
                        $id=0;
                        while($row = mysqli_fetch_array($query_salidaproducto)){	

                                $codigo_producto = $row['codigo_producto'];
                                $nombre_producto = $row['nombre_producto'];
                                $cantidad = $row['cantidad'];
                                             $id=$id+1;
                                            echo "<tr> ";
                                            echo 	"<td>".$id."</td> "; 
                                            echo 	"<td>".$codigo_producto."</td> "; 
                                            echo 	"<td>".$nombre_producto."</td> "; 
                                            echo 	"<td>".$cantidad."</td> "; 
                                            echo "</tr> ";

                        }
                        echo "</table> ";
}
if($action == 'imprimir'){
                            $idestado = intval($_REQUEST['idestado_salida']); 
                            $fecha = date("d-m-Y");
                             $Ruc = $_SESSION['Ruc'];
                            //Inicio de la instancia para la exportación en Excel
                            header('Content-type: application/vnd.ms-excel');
                            header("Content-Disposition: attachment; filename=Salidas_$fecha.xls");
                            header("Pragma: no-cache");
                            header("Expires: 0");

                            echo "<table border=0> ";
                            echo "<tr> ";
                            echo     "<td><strong>Fecha de Impresión : </strong></td> ";
                            echo     "<td>".$fecha."</td> ";
                           echo "</tr> ";
                            echo "</table> ";
                            
                            
                            echo "<table border=1> ";
                            echo "<tr> ";
                            echo     "<th>Nro</th> ";
                            echo 	"<th>Id Salida</th> ";
                            echo 	"<th>Fecha</th> ";
                            echo 	"<th>Detalles</th> ";
                            echo 	"<th>Estado</th> ";
                            echo 	"<th>Cantidad</th> ";
                            echo "</tr> ";
                            $sWhere = "where Ruc = '$Ruc' ";
                             if  ( $idestado !=0)
                                        {
                                            $sWhere.= "and idestado_salida = '$idestado' ";
                                        }
                            $query_pedidoproducto= mysqli_query($con,"select * from w_salida ".$sWhere);
                            $id=0;
                            while($row = mysqli_fetch_array($query_pedidoproducto)){	

                                    $idsalida = $row['idsalida'];
                                    $fecha = $row['fecha'];
                                    $Detalles =  $row['Detalles'];
                                    $estado_salida =  $row['Estado'];
                                    $cantidad = $row['cant_prod'];
                                                 $id=$id+1;
                                                echo "<tr> ";
                                                echo 	"<td>".$id."</td> "; 
                                                echo 	"<td>".$idsalida."</td> "; 
                                                echo 	"<td>".$fecha."</td> "; 
                                                echo 	"<td>".$Detalles."</td> "; 
                                                  echo 	"<td>".$estado_salida."</td> "; 
                                                echo 	"<td>".$cantidad."</td> "; 
                                                echo "</tr> ";

                            }
                            echo "</table> ";   
    
    
    
    
}

?>
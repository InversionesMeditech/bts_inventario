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
//fecha de la exportación
if (isset($_GET['idpedido'])){        
                            $idpedido = $_GET['idpedido'];
                            $fecha = date("d-m-Y");
                            $query_Pedido= mysqli_query($con,"select * from w_pedido where idpedido = '$idpedido' ");
                            while($row = mysqli_fetch_array($query_Pedido)){	
                                    $pedido_fecha = $row['fecha'];
                                    $nom_proveedor = $row['nom_proveedor'];
                                    $ruc_proveedor = $row['ruc_proveedor'];
                                                 $cant_producto = $row['cant_prod'];
                            }
                            //Inicio de la instancia para la exportación en Excel
                            header('Content-type: application/vnd.ms-excel');
                            header("Content-Disposition: attachment; filename=Pedido_$fecha.xls");
                            header("Pragma: no-cache");
                            header("Expires: 0");

                            echo "<table border=0> ";
                            echo "<tr> ";
                            echo     "<td><strong>Pedido : </strong></td> ";
                            echo     "<td>".$idpedido."</td> ";
                            echo     "<td><strong>Cantidad productos : </strong></td> ";
                            echo     "<td>".$cant_producto."</td> ";
                            echo "</tr> ";
                            echo "<tr> ";
                            echo     "<td><strong>Proveedor : </strong></td> ";
                            echo     "<td>".$nom_proveedor."</td> ";
                            echo     "<td><strong>Ruc : </strong></td> ";
                            echo     "<td>".$ruc_proveedor."</td> ";
                            echo "</tr> ";
                            echo "</table> ";
                            echo "<table border=1> ";

                            echo "<tr> ";
                            echo     "<th>Nro</th> ";
                            echo 	"<th>Codigo Producto</th> ";
                            echo 	"<th>Nombre Producto</th> ";
                            echo 	"<th>Cantidad</th> ";
                            echo "</tr> ";
                            $query_pedidoproducto= mysqli_query($con,"select * from w_pedidoproducto where idpedido = '$idpedido' order by idpedido_producto");
                            $id=0;
                            while($row = mysqli_fetch_array($query_pedidoproducto)){	

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
                            $idestado = intval($_REQUEST['idestado_pedido']); 
                            $fecha = date("d-m-Y");
                             $Ruc = $_SESSION['Ruc'];
                            //Inicio de la instancia para la exportación en Excel
                            header('Content-type: application/vnd.ms-excel');
                            header("Content-Disposition: attachment; filename=Pedidos_$fecha.xls");
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
                            echo 	"<th>Id Pedido</th> ";
                            echo 	"<th>Fecha</th> ";
                            echo 	"<th>Nombre Proveedor</th> ";
                            echo 	"<th>Ruc Proveedor</th> ";
                            echo 	"<th>Estado</th> ";
                            echo 	"<th>Cantidad</th> ";
                            echo "</tr> ";
                            $sWhere = "where Ruc = '$Ruc' ";
                             if  ( $idestado !=0)
                                        {
                                            $sWhere.= "and idestado_pedido = '$idestado' ";
                                        }
                            $query_pedidoproducto= mysqli_query($con,"select * from w_pedido ".$sWhere);
                            $id=0;
                            while($row = mysqli_fetch_array($query_pedidoproducto)){	

                                    $idpedido = $row['idpedido'];
                                    $fecha = $row['fecha'];
                                    $nom_proveedor =  $row['nom_proveedor'];
                                    $ruc_proveedor =  $row['ruc_proveedor'];
                                    $estado_pedido =  $row['Estado'];
                                    $cantidad = $row['cant_prod'];
                                                 $id=$id+1;
                                                echo "<tr> ";
                                                echo 	"<td>".$id."</td> "; 
                                                echo 	"<td>".$idpedido."</td> "; 
                                                echo 	"<td>".$fecha."</td> "; 
                                                echo 	"<td>".$nom_proveedor."</td> "; 
                                                echo 	"<td>".$ruc_proveedor."</td> "; 
                                                echo 	"<td>".$estado_pedido."</td> "; 
                                                echo 	"<td>".$cantidad."</td> "; 
                                                echo "</tr> ";

                            }
                            echo "</table> ";   
    
    
    
    
}



?>
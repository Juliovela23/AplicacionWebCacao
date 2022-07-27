<?php 
use Illuminate\Mail\Mailable;
use App\Mail\SendActivationMail;
use Illuminate\Support\Facades\Mail;

    include 'conexionDB.php';
    
    $IdCliente= $_POST["Id_clientes"];
    $Id_producto= $_POST["Id_producto"];
    $nombreP = $_POST["producto"];
    $precp = $_POST["precio"];
   
    $cantidad = $_POST["cantidad"];
    $Numero_Orden = $_POST["Numero_Orden"];
    $Fecha = $_POST["Fecha"];



    $sqlinsert="INSERT INTO pedidos(Numero_de_orden,Fecha_pedido,Estado_pedido,Monto_total,Id_cliente) VALUES ('$Numero_Orden','$Fecha','En proceso','$precp','$IdCliente')";
 
    if($conexion->query($sqlinsert)===true){
        $UltimoPedido=mysqli_query($conexion,"SELECT Id_pedidos FROM pedidos ORDER BY Id_pedidos DESC LIMIT 1");
        while($prueba1=mysqli_fetch_array($UltimoPedido)){
          
        $ultimoIdP=$prueba1['Id_pedidos'];
       
        }
        $sqlinsert1="INSERT INTO detalle_pedido(Cantidad_pedida,Precio_producto,Id_pedidos,Id_productos) VALUES ('$cantidad','$precp','$ultimoIdP','$Id_producto')";
        if($conexion->query($sqlinsert1)===true){
            $MenosPedidos=mysqli_query($conexion,"SELECT u.Id_empleado, COUNT(*) as Pedidos FROM pedidos as p INNER JOIN usuarios as u on p.Id_usuarios=u.Id_usuarios WHERE p.Estado_pedido='En proceso'  GROUP BY u.Id_usuarios DESC LIMIT 1");
            while($prueba2=mysqli_fetch_array($MenosPedidos)){
          
                $ultimoIdE=$prueba2['Id_empleado'];
               

            }

                $Update="UPDATE pedidos SET Id_usuarios='$ultimoIdE' WHERE Id_pedidos='$ultimoIdP'";
                if($conexion->query($Update)===true){
                    $DataUsuario=mysqli_query($conexion,"SELECT * FROM usuarios WHERE Id_empleado='$ultimoIdE'");
                    while($prueba5=mysqli_fetch_array($DataUsuario)){
          
                    $Correo=$prueba5['Correo_electronico'];

               
                }
                $header="Se le ha asignado un pedido";
                $mensajeCompleto= "El dia de hoy".$Fecha."Se le fue asignado el pedido con la orden". $Numero_Orden."\nAtentamente Administracion"; 
                mail($Correo,"Asgnacion pedido",$mensajeCompleto,$header);
                

                echo "<script> alert('Correo enviado con exito')</script>";
                ?>
             
                <script>
                window.location="/pedidoHecho/?<?php echo 'Id_empleado='.$ultimoIdE;?>&<?php echo 'Id_pedido='.$ultimoIdP;?>";
                </script>
                 <?php
                }
               

        }
        else{
            die("Error al insertar datos: ".$conexion->error);
        }
    }
    else{
        die("Error al insertar datos: ".$conexion->error);
    }

?>
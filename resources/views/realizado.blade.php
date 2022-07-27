<?php 
include 'php/conexionDB.php';

$id_p = $_GET['Id_pedido'];


?>
@extends('layouts.vistaPadre')

@section('contenedorPrimario')
<div class="row vh-100 justify-content-center align-items-center">

<div class="jumbotron " style="background-color: #f5f5dc;">
        <div>
                           <?php
                              $sql = "SELECT * from pedidos as p INNER JOIN detalle_pedido as det on p.Id_pedidos=det.Id_pedidos INNER JOIN usuarios as u on u.Id_usuarios=p.Id_usuarios INNER JOIN clientes AS c on c.Id_cliente=p.Id_cliente INNER JOIN personas as per1 on per1.Id_personas=c.Id_personas INNER JOIN empleados as e on e.Id_empleado=u.Id_empleado WHERE p.Id_pedidos='$id_p'";
                              $resultset = mysqli_query($conexion, $sql) or die("database error:". mysqli_error($conexion));
                              while( $rows = mysqli_fetch_assoc($resultset) ) { 
                                $idProducro=$rows['Id_productos']; 
                                $idEmpleados=$rows['Id_empleado'];

                             
                              ?>
                              <Label style="font-size: 30px;">Cliente:  <?php echo $rows['Nombres']; ?> <?php echo $rows['Apellidos']; ?></Label> 
                              
                              
        </div>
        <hr>
                    <?php    $sql1 = "SELECT * FROM productos where Id_productos='$idProducro'";
             
                                $resultset1 = mysqli_query($conexion, $sql1) or die("database error:". mysqli_error($conexion));
                              while( $row1 = mysqli_fetch_assoc($resultset1) ) { 
                                $nombreP = $row1['Nombre_producto']; ?>
                                    <p>Nombre del producto:  <?php echo $nombreP ?></p>
                                    <hr>
                              <?php }?>
  <p class="lead">Fecha del pedido: <?php echo $rows['Fecha_pedido']; ?>-- Direccion: <?php echo $rows['Direccion']; ?>-- Total del pedido: <?php echo $rows['Monto_total'] ?>-- Estado del pedido: <?php echo $rows['Estado_pedido'] ?></p>
  <hr class="my-4">
  <?php    $sql2 = "SELECT * FROM empleados as e INNER JOIN personas as p on p.Id_personas=e.Id_personas WHERE e.Id_empleado='$idEmpleados'";
             
                                $resultset2 = mysqli_query($conexion, $sql2) or die("database error:". mysqli_error($conexion));
                              while( $row2 = mysqli_fetch_assoc($resultset2) ) { 
                                $nombreEmpleado = $row2['Nombres']; 
                                $ApellidoEmpleado = $row2['Apellidos']; 
                                
                                ?>
                                
                                    <p style="font-size: 25px;" >El empleado asignado es:  <?php echo $nombreEmpleado ?>  <?php echo $ApellidoEmpleado ?></p>
                                    <hr>
                              <?php }?>
  

  <?php }	?>
</div>
</div>
@endsection
<?php 
include 'php/conexionDB.php';

$IdCliente= $_GET["Id_cl"];
$Id_producto= $_GET["Id_producto"];
$nombreP = $_GET["Nombre"];
$precp = $_GET["Precio"];
$total = $_GET["total"];
$cantidad = $_GET["Cantidad"];
$codeCiu = $_GET["HoraCiudad"];
?> 

@extends('layouts.vistaPadre')

@section('contenedorPrimario')

      <!-- Informacion  -->
      <div id="Info" class="Best">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Información</h2>
                     <p>Esta pagina pretende simular la experiencia de realizar pedidos web, es la segunda parte de una aplicación de pedidos</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end Best -->
      <!-- Pedidos -->
      <?php 
    
      
      ?>
       <div id="Pedidos" class="contact">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Detalles del pedido</h2>
                        <p>La unica opcion modificable es direccion</p>
                        
                    </div>
               </div>
            </div>
            <div class="row vh-100 justify-content-center align-items-center">
               <div class="col-xl-10 col-lg-10 col-md-10 col-sm-12">
                  <div class="contact">
                     <form action="php/Hacerpedido.php" method="POST" >
                        <div class="row">
                           <div class="col-sm-12">
                           <input class="contactus" readonly value="<?php echo $total ?>" type="text" name="precio" style="display: none;">
                           <input class="contactus" readonly value="<?php echo $cantidad; ?>" type="text" name="cantidad" style="display: none;">
                           <input class="contactus" readonly value="<?php echo $nombreP; ?>" type="text" name="producto" style="display: none;">
                           <input class="contactus" readonly value="<?php echo $IdCliente; ?>" type="text" name="Id_clientes" style="display: none;">
                           <input class="contactus" readonly value="<?php echo $Id_producto; ?>" type="text" name="Id_producto" style="display: none;">
                          
                           
                           
                                <?php 
                                date_default_timezone_set('America/Guatemala'); 
                                $t = date('h:i', time());?>

                                <label class="fecha" for="">Hora: <input type="text" class="fecha" name="Hora" readonly  value="<?php echo $t;?>" ></label>
                                <?php $fcha = date("Y-m-d");?>

                                <label class="fecha">Fecha: <input type="date" class="fecha" name="Fecha" readonly  value="<?php echo $fcha;?>" ></label>
                                <input style="display: none;" class="contactus" readonly value="a<?php echo $IdCliente; ?>-<?php echo $t; ?>-<?php echo $codeCiu; ?>" type="text" name="Numero_Orden">
                           </div>
                           <div class="col-sm-12">
                           <?php
                              $sql = "SELECT * FROM personas as p INNER JOIN clientes as c on p.Id_personas=c.Id_personas WHERE c.Id_cliente=$IdCliente";
                              $resultset = mysqli_query($conexion, $sql) or die("database error:". mysqli_error($conexion));
                              while( $rows = mysqli_fetch_assoc($resultset) ) { 
                              ?>
                              <Label>Nombres:</Label> 
                              <input class="contactus" readonly value="<?php echo $rows['Nombres']; ?>" type="text" name="nombres">
                              <Label>Apellidos:</Label> 
                              <input class="contactus" readonly value="<?php echo $rows['Apellidos']; ?>" type="text" name="apellidos">
                              
                              <div class="col-sm-12">
                             <Label>Direccion:</Label> <input class="contactus"  value="<?php echo $rows['Direccion']; ?>" type="text" name="Direccion">
                              <?php }	?>
                           </div>
                           </div>
                           
                           <div class="col-sm-12">
                              

                           <Label>Detalles del producto :</Label> <input class="fecha" id="ocultar" value="<?php echo $nombreP; ?>-- precio: <?php echo $precp; ?>" readonly type="text" name="ciu">
                              
                           </div> 
                           <div class="col-sm-12">
                              <button class="send">Hacer pedido</button>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
             
            </div>
         </div>
      </div>
      <!-- contact -->
      <div id="contact" class="contact">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Contacto</h2>
                     <p>En caso de necesitar comunicarse con el desarrollador, enviar un correo a la direccion de correo electronico: Juliovel86@gmail.com</p>
                                       
                    </div>
               </div>
           
            </div>
         </div>
      </div>
      <!-- end contact -->
   

@endsection
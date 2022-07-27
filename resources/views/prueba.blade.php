<?php 
include 'php/conexionDB.php';


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
                     <h2>Informacion de cliente</h2>
                        <p>Ingresar al sistema para realizar un pedido, en caso de no estar registrado se agregara automaticamente</p>
                        
                    </div>
               </div>
            </div>
            <div class="row vh-100 justify-content-center align-items-center">
               <div class="col-xl-10 col-lg-10 col-md-10 col-sm-12">
                  <div class="contact">
                     <form action="php/ValidacionUsuario.php" method="POST" >
                        <div class="row">
                           <div class="col-sm-12">
                           
                                <?php 
                                date_default_timezone_set('America/Guatemala'); 
                                $t = date('h:i', time());?>

                                <label class="fecha" for="">Hora: <input type="text" class="fecha" name="Hora" disabled  value="<?php echo $t;?>" ></label>
                                <?php $fcha = date("Y-m-d");?>

                                <label class="fecha">Fecha: <input type="date" class="fecha" name="Fecha" disabled  value="<?php echo $fcha;?>" ></label>
                           </div>
                           <div class="col-sm-12">
                              <input class="contactus1" placeholder="Nombres" type="text" name="nombres">
                              <input class="contactus1" placeholder="Apellidos" type="text" name="apellidos">
                           </div>
                           <div class="col-sm-12">
                              <input class="contactus" placeholder="Direccion" type="text" name="Direccion">
                           </div>
                           <div class="col-sm-12">
                              <select class="fecha" name="Productos" id="mostrar" >
                              <option value="" selected="selected">Seleccione un producto</option>
                              <?php
                              $sql = "SELECT Id_productos, Nombre_producto FROM productos";
                              $resultset = mysqli_query($conexion, $sql) or die("database error:". mysqli_error($conexion));
                              while( $rows = mysqli_fetch_assoc($resultset) ) { 
                              ?>
                              <option value="<?php echo $rows["Id_productos"]; ?>"><?php echo $rows["Nombre_producto"]; ?></option>
                              <?php }	?>
                              </select>

                              <input class="fecha" id="ocultar" placeholder="Ciudad" type="text" name="ciu" style="display: none;">
                              <input class="fecha" id="ocultar1" placeholder="Pais" type="text" name="pais" style="display: none;">
                            
                           </div> 
                           <div class="col-sm-12">
                              <button class="send">Send</button>
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
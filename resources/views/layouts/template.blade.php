<?php 
include 'php/conexionDB.php';
?> 
<!DOCTYPE html>
<html lang="en">
   <head>
   <script type="text/javascript">
                              function showContent() {
                                    element = document.getElementById("ocultar");
                                    element2 = document.getElementById("ocultar1");
                                    element1 = document.getElementById("mostrar");
                                    check = document.getElementById("check");
                                    if (check.checked) {
                                          element.style.display='block';
                                          element2.style.display='block';
                                          element1.style.display='none';
                                    }
                                    else {
                                          element.style.display='none';
                                          
                                          element2.style.display='none';
                                          element1.style.display='block';
                                    }
                                 }
   </script>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Inicio</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
     <!-- <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#" /></div>
      </div>
    -->
      <!-- end loader -->
      <!-- header -->
      <header>
         <!-- header inner -->
         <div class="header-top">
            <div class="header">
               <div class="container">
                  <div class="row">
                     <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                        <div class="full">
                           <div class="center-desk">
                             
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                        <div class="menu-area">
                           <div class="limit-box">
                              <nav class="main-menu">
                                 <ul class="menu-area-main">
                                    <li class="active"> <a href="index.html">Inicio</a> </li>
                                    
                                    <li> <a href="#Info">Informacion</a> </li>
                                    <li> <a href="#Cliente">Cliente</a> </li>
                                    
                                    <li> <a href="#contact">Contacto</a> </li>
                                 </ul>
                              </nav>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- end header inner -->
            <!-- end header -->
            <section class="slider_section">
               <div class="banner_main">
                  <div class="container">
                     <div class="row d_flex">
                        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-9 ">
                           <div class="text-bg">
                              <h1>Tienda "los 3 Monosabios"</h1>

                              <span>Seguridad en productos <br> 
                              <strong class="land_bold">Prueba de pedidos</strong></span>
                           </div>
                        </div>
                        </div>
                     </div>
                  </div>
               </div>
         
         </section>
         
         </div>
      </header>
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
      <!-- Cliente -->
      <div id="Cliente" class="contact">
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
                              <input class="contactus1" placeholder="Telefono" required type="number" name="telefono">
                              <input class="contactus1" placeholder="NIT" required type="text" name="NIT">
                           </div>
                           <div class="col-sm-12">
                              <input class="contactus1" placeholder="Nombres" type="text" name="nombres">
                              <input class="contactus1" placeholder="Apellidos" required type="text" name="apellidos">
                           </div>
                           <div class="col-sm-12">
                              <input class="contactus" placeholder="Direccion" required type="text" name="Direccion">
                           </div>
                           <div class="col-sm-12">
                              <input class="fecha" type="date" name="Fecha" >
                              <select class="fecha" name="Ciudades" id="mostrar" >
                              <option value="" selected="selected">Seleccione una ciudad</option>
                              <?php
                              $sql = "SELECT Id_ciudad, Nombre_ciudad FROM ciudades";
                              $resultset = mysqli_query($conexion, $sql) or die("database error:". mysqli_error($conexion));
                              while( $rows = mysqli_fetch_assoc($resultset) ) { 
                              ?>
                              <option value="<?php echo $rows["Id_ciudad"]; ?>"><?php echo $rows["Nombre_ciudad"]; ?></option>
                              <?php }	?>
                              </select>

                              <input class="fecha"  id="ocultar" placeholder="Ciudad" type="text" name="ciu" style="display: none;">
                              <input class="fecha"  id="ocultar1" placeholder="Pais" type="text" name="pais" style="display: none;">
                            
                           </div>
                           <div class="col-sm-12" >
                           <label><input onchange="javascript:showContent()" name="check" value="1" type="checkbox" id="check" value="first_checkbox"> No esta tu ciudad?</label>
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
      <!--  footer -->
      <footer>
         <div class="footer">
            <div class="container">
               <div class="row vh-12 justify-content-center align-items-center">
                  <div class="col-md-6">
                     <div class="call_now2">
                        <h3>Tienda "Los 3 monosabios" </h3>
                        <span>Productos de seguridad</span>
                     </div>
                  </div>
                
               </div>
            </div>
            <div class="copyright">
               
            </div>
         </div>
      </footer>
      <!-- end footer -->
      <!-- Javascript files-->
     
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/plugin.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
    
   </body>
</html>
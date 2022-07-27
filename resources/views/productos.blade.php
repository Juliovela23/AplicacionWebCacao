<?php 

include 'php/conexionDB.php';
include 'php/carrito.php';
$IdCliente= $_GET["Id_cl"];

?> 

@extends('layouts.vistaPadre')

@section('contenedorPrimario')


<?php  $busquedaP=mysqli_query($conexion,"SELECT * FROM productos");
    

?>
<div class="center mt-5">
<div class="card pt-3">
<div class="container-fluid p-2" style="background-color: #F5F5DC;"> 

    <?php
        while ($resultado = mysqli_fetch_assoc($busquedaP)){?>
        <div class="row vh-100 justify-content-center align-items-center">
        <div class="card" style="width: 25rem;">
        <form action="php/carrito.php" method="POST">
            <input class="contactus1" style="
            display: none;
            border-top: inherit;
            border-bottom: inherit;
            border-right: inherit;
            border-left: inherit;
            " type="text" name="Id_cl" value="<?php echo $IdCliente;?>"  >
            
            <!-- Id Producto-->
            <div class="card-body">
            <input class="contactus1" style="
            border-top: inherit;
            display: none;
            border-bottom: inherit;
            border-right: inherit;
            border-left: inherit;
            " type="text" name="Id_Productos" value="<?php echo $resultado["Id_productos"];?>" readonly >
           
            <!-- Cuerpo de carta-->
            <div class="card-body">
            <input class="contactus1" style="
            border-top: inherit;
            border-bottom: inherit;
            border-right: inherit;
            border-left: inherit;
            " type="text" name="Nombre" value="<?php echo $resultado["Nombre_producto"];?>" readonly >
                
                <p class="card-text" name="Desc"><?php echo $resultado["Descripcion_producto"];?></p>
            </div>
            <ul class="list-group list-group-flush">

                <input class="contactus1" style="
                border-top: inherit;
                border-bottom: inherit;
                border-right: inherit;
                border-left: inherit;
                "  type="text" value="<?php echo $resultado["Precio_p"];?>" readonly name="precio">
                <li class="list-group-item" name="marca"><?php echo $resultado["Marca"];?></li>
                <ul class="list-group list-group-flush">

                <input class="contactus1" placeholder="Ingrese la cantidad a comprar" type="text"  name="cantidad">
            </ul>
            <br>
            <div class="card-body">
                <button  name="btnAccion" value="agregar" class="send btn-primary">Agregar al carrito</button>
            </div>
                
        </form>
        </div>
        </div>
        <br> <br>
        <?php }?>
</div>
</div>
</div>
@endsection
<?php

use Illuminate\Support\Arr;
$mensaje="";

include 'conexionDB.php';


    if (isset($_POST['btnAccion'])) {

        switch ($_POST['btnAccion']){
            case 'agregar':
            
                    $IdP=$_POST['Id_Productos'];
                    
                    $Idcliente=$_POST['Id_cl'];
                    $Nombre= $_POST['Nombre'];
                    $precio= $_POST['precio'];
                    $cantidad= $_POST['cantidad'];
                    
                    $total = $cantidad * $precio;

                    include 'conexionDB.php';
                    $ObtenerDatos = mysqli_query($conexion,"SELECT * FROM clientes as c INNER JOIN ciudades as Ciu ON c.Id_ciudad= Ciu.Id_ciudad INNER JOIN personas as p on p.Id_personas= c.Id_personas where c.Id_cliente=$Idcliente");
                    if(mysqli_num_rows($ObtenerDatos)>0){
                
                        while($ciudadesaux=mysqli_fetch_array($ObtenerDatos)){
                            $NombreCiudad=$ciudadesaux['Nombre_ciudad'];
                            $NombrePais=$ciudadesaux['Pais'];
                        }
                        //Obtener Ciudad
                        $curl = curl_init();
                
                        curl_setopt_array($curl, [
                            CURLOPT_URL => "https://wft-geo-db.p.rapidapi.com/v1/geo/cities?limit=1&country=".$NombrePais."&namePrefix=".$NombreCiudad,
                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_FOLLOWLOCATION => true,
                            CURLOPT_ENCODING => "",
                            CURLOPT_MAXREDIRS => 10,
                            CURLOPT_TIMEOUT => 30,
                            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                            CURLOPT_CUSTOMREQUEST => "GET",
                            CURLOPT_HTTPHEADER => [
                                "X-RapidAPI-Host: wft-geo-db.p.rapidapi.com",
                                "X-RapidAPI-Key: 6b89f95673msh85294dd190d1eedp1b353djsn691ab38efb63"
                            ],
                        ]);
                       
                        $response = curl_exec($curl);
                        $datos=json_decode($response,true);
                        $CiudadID=$datos["data"][0]["id"];
                        curl_close($curl);
                        if($CiudadID !=""){
                             //Obtener Ciudad
                           $curlHora = curl_init();
                
                           curl_setopt_array($curlHora, [
                               CURLOPT_URL => "https://wft-geo-db.p.rapidapi.com/v1/geo/cities/".$CiudadID."/time",
                               CURLOPT_RETURNTRANSFER => true,
                               CURLOPT_FOLLOWLOCATION => true,
                               CURLOPT_ENCODING => "",
                               CURLOPT_MAXREDIRS => 10,
                               CURLOPT_TIMEOUT => 30,
                               CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                               CURLOPT_CUSTOMREQUEST => "GET",
                               CURLOPT_HTTPHEADER => [
                                   "X-RapidAPI-Host: wft-geo-db.p.rapidapi.com",
                                   "X-RapidAPI-Key: 6b89f95673msh85294dd190d1eedp1b353djsn691ab38efb63"
                               ],
                           ]);
                          
                           $response1 = curl_exec($curlHora);
                           $datos1=json_decode($response1,true);
                           $HoraCiudad=$datos1;
                           curl_close($curlHora);
                
                    }

                        }
                        
                          
                    ?>
                        
                        <script>
                            
                        window.location="/pedido/?<?php echo 'Id_cl='.$Idcliente;?>&<?php echo 'Nombre='.$Nombre;?>&<?php echo 'Precio='.$precio;?>&<?php echo 'Cantidad='.$cantidad;?>&<?php echo 'total='.$total;?>&<?php echo 'HoraCiudad='.$CiudadID;?>&<?php echo 'Id_producto='.$IdP;?>";
                       
                        </script>
                        
                        <?php
                    
            break;

        }
         
     }
        
    

?>
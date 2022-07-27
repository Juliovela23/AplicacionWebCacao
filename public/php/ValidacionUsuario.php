<?php
include 'conexionDB.php';

$telefono= $_POST['telefono'];
$NIT=$_POST['NIT'];
$ciudad=$_POST['Ciudades'];
$nombre=$_POST['nombres'];
$apellidos=$_POST['apellidos'];
$Direccion=$_POST['Direccion'];
$Fecha=$_POST['Fecha'];
$Ciu=$_POST['ciu'];
$pais=$_POST['pais'];
//Verificacion de telefono
$veroficar_cudad=mysqli_query($conexion,"SELECT * FROM ciudades WHERE Id_ciudad=$ciudad");
$verificar_telefono = mysqli_query($conexion,"SELECT * FROM personas as p INNER JOIN clientes as c on p.Id_personas=c.Id_personas WHERE p.Telefono=$telefono");
if(mysqli_num_rows($verificar_telefono)>0){
    if(mysqli_num_rows($veroficar_cudad)>0){
        
        while($prueba1=mysqli_fetch_array($verificar_telefono)){?>
            echo'
        <script>
        window.location="/producto/?<?php echo 'Id_cl='.$prueba1['Id_cliente'];?>&<?php echo $prueba1['Telefono'];?>";
        </script>
        ';
        <?php
        }
       

        
    }
    else{
 
        //Obtener Ciudad
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://wft-geo-db.p.rapidapi.com/v1/geo/cities?limit=1&country=".$pais."&namePrefix=".$Ciu,
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
        $ciudad1=$datos["data"][0]["name"];
        $Pais=$datos["data"][0]["country"];
        $Departamento=$datos["data"][0]["region"];
        curl_close($curl);
        $sqlinsert="INSERT INTO ciudades(Nombre_ciudad,Pais,Region_O_Departamento) VALUES ('$ciudad1','$Pais','$Departamento')";
        if($conexion->query($sqlinsert)===true){
           
        }
        else{
            die("Error al insertar datos: ".$conexion->error);
        }
        while($prueba1=mysqli_fetch_array($verificar_telefono)){?>
            echo'
        <script>
        window.location="/producto/?<?php echo 'Id_cl='.$prueba1['Id_cliente'];?>&<?php echo $prueba1['Telefono'];?>";
        </script>
        ';
        <?php
        }

    }
}else{
    //Cliente Nuevo
    if(mysqli_num_rows($veroficar_cudad)>0){
        $sqlinsert="INSERT INTO personas(Nombres,Apellidos,Telefono,Direccion,Fecha_nacimiento) VALUES ('$nombre','$apellidos','$telefono','$Direccion','$Fecha')";
        if($conexion->query($sqlinsert)===true){
            $UltimaPersona=mysqli_query($conexion,"SELECT Id_personas FROM personas ORDER BY Id_personas DESC LIMIT 1");
            while($prueba1=mysqli_fetch_array($UltimaPersona)){
              
            $ultimoIdP=$prueba1['Id_personas'];
           
            }
            $sqlinsert1="INSERT INTO clientes(Estado_cliente,NIT,Id_personas,Id_ciudad) VALUES ('1','$NIT','$ultimoIdP','$ciudad')";
            if($conexion->query($sqlinsert1)===true){
                $UltimoCliente=mysqli_query($conexion,"SELECT Id_cliente FROM clientes ORDER BY Id_cliente DESC LIMIT 1");
                while($prueba2=mysqli_fetch_array($UltimoCliente)){
              
                    $ultimoIdC=$prueba2['Id_cliente'];
                   
                    }
                    ?>
                 
                    <script>
                    window.location="/producto/?<?php echo 'Id_cl='.$prueba1['Id_cliente'];?>&<?php echo $prueba1['Telefono'];?>";
                    </script>
                     <?php

            }
            else{
                die("Error al insertar datos: ".$conexion->error);
            }
        }
        else{
            die("Error al insertar datos: ".$conexion->error);
        }
        
       
       

        
    }
    else{
        
         
        //Obtener Ciudad
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://wft-geo-db.p.rapidapi.com/v1/geo/cities?limit=1&country=".$pais."&namePrefix=".$Ciu,
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
        $ciudad1=$datos["data"][0]["name"];
        $Pais=$datos["data"][0]["country"];
        $Departamento=$datos["data"][0]["region"];
        curl_close($curl);
        $sqlinsert="INSERT INTO ciudades(Nombre_ciudad,Pais,Region_O_Departamento) VALUES ('$ciudad1','$Pais','$Departamento')";
        if($conexion->query($sqlinsert)===true){
            $UltimaCiudad=mysqli_query($conexion,"SELECT Id_ciudad FROM ciudades ORDER BY Id_ciudad Desc LIMIT 1");
            while($prueba5=mysqli_fetch_array($UltimaCiudad)){
              
            $ultimoIdCiu=$prueba5['Id_ciudad'];
           
            }
        }
        else{
            die("Error al insertar datos: ".$conexion->error);
        }
        $sqlinsert="INSERT INTO personas(Nombres,Apellidos,Telefono,Direccion,Fecha_nacimiento) VALUES ('$nombre','$apellidos','$telefono','$Direccion','$Fecha')";
        if($conexion->query($sqlinsert)===true){
            $UltimaPersona=mysqli_query($conexion,"SELECT Id_personas FROM personas ORDER BY Id_personas DESC LIMIT 1");
            while($prueba1=mysqli_fetch_array($UltimaPersona)){
              
            $ultimoIdP=$prueba1['Id_personas'];
           
            }
            $sqlinsert1="INSERT INTO clientes(Estado_cliente,NIT,Id_personas,Id_ciudad) VALUES ('1','$NIT','$ultimoIdP','$ultimoIdCiu')";
            if($conexion->query($sqlinsert1)===true){
                $UltimoCliente=mysqli_query($conexion,"SELECT Id_cliente FROM clientes ORDER BY Id_cliente DESC LIMIT 1");
                while($prueba2=mysqli_fetch_array($UltimoCliente)){
              
                    $ultimoIdC=$prueba2['Id_cliente'];
                   
                    }
                    ?>
                 
                    <script>
                    window.location="/producto/?<?php echo 'Id_cl='.$prueba1['Id_cliente'];?>&<?php echo $prueba1['Telefono'];?>";
                    </script>
                     <?php

            }
            else{
                die("Error al insertar datos: ".$conexion->error);
            }
        }
        else{
            die("Error al insertar datos: ".$conexion->error);
        }


    }


}

?>


<?php 


function ObtenerHora($Id_usuario) {

    $ObtenerDatos = mysqli_query($conexion,"SELECT * FROM clientes as c INNER JOIN ciudades as Ciu ON c.Id_ciudad= Ciu.Id_ciudad INNER JOIN personas as p on p.Id_personas= c.Id_personas where c.Id_cliente=$Id_usuario");
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
          
           $response = curl_exec($curlHora);
           $datos=json_decode($response,true);
           $HoraCiudad=$datos["data"];
           curl_close($curlHora);

    }
   

}
?>
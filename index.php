
<?php

// varios y vencidos -> 17365859 , 92464319 , 8479688
// uno solo y vencido -> 93114749
// varios y Charla vigente ->  11847596 , 34178809 , 11361530

// Estado 500 -> 17726412 , 93981034 , 93971990

// $ch = curl_init('http://404.php.net/');
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// if(curl_exec($ch) === false)
// {
//     echo 'Curl error: ' . curl_error($ch);
// }
// else
// {
//     echo 'Operación completada sin errores';
// }

// // Cerrar recurso
// curl_close($ch);

// die;




 






$nro_doc = "93114749";

$body = '<?xml version="1.0" encoding="utf-8"?>
<soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
  <soap:Body>
    <ConductorGet xmlns="http://tempuri.org/">
      <CLIENTE_ID>HOze7U99Xm8W8PG6Dv3uCYDqIngnNVh9</CLIENTE_ID>
      <DocumentoTipoId>1</DocumentoTipoId>
      <DocumentoNro> '.$nro_doc.'






      </DocumentoNro>
    </ConductorGet>
  </soap:Body>
</soap:Envelope>' ;



$curl = curl_init();


curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://taxis.dtsconsulting.com.ar/ServiceSacta.asmx' ,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
   CURLOPT_HEADER => false,
 CURLOPT_POSTFIELDS => $body,

  CURLOPT_HTTPHEADER => array(
    'Content-Type: text/xml'
    
  ),
  
  
));



$response = curl_exec($curl);


curl_close($curl);



  
if ($response === Null || $response === false){
  echo "Servicio caido" ;
}else{
 
  $b = html_entity_decode($response); 

  $string = $b;
  
  
  $respuesta=substr($string , 334); 
  
  $a=trim($respuesta); 
  
  $response = $a ;
  
  $resultado = substr($response,0, -72);
  
  
   
  
  $XML = simplexml_load_string($resultado, "SimpleXMLElement", LIBXML_NOCDATA);
  $json = json_encode($XML);
  $arr = json_decode($json,TRUE);  
  echo"<pre>";
  
  var_dump($arr);
  echo"<pre>";
  
  
   /*
  $personas = array("Conductor" =>
    array("AlumnoTipoId" => "1 " ,"CUIL" => "20931147499","Apellidos" => "GALARZA ROCHA " ,"Nombres" => "Americo Salvador " ,"RegistroNumero" => "93114749 ","RegistroTipo" => "D21 " ,"RegistroExpedidoPor" => "GOBIERNO DE LA CIUDAD DE BSAS","RegistroVencimiento" => "20150907","LicenciaNumero" => array(),"LicenciaVencimiento" =>"20130914","RegistroExpedidoPor" => "GOBIERNO DE LA CIUDAD DE BSAS"),"Cursadas" => array("Cursada" => array("Inscripcion" => "20130927" ,"FechaCursada" => "20220722","Dictamen" => "20220722","Resultado" => "APTO" )),"Estado" => "200","EstadoMsg" => "Conductor consultado exitosamente.","TiempoRespuesta" => "0.031 segundos",
    );
  
    var_dump($personas)  ;
  
    
  
  
  $estado = $personas["Estado"];
  var_dump($estado);
  
  
  if ($estado == 200) {   
    $date=date('m/d/Y');  
  $date2 = date("d-m-Y", strtotime($date));
    
    $count=count($Cursadas= $personas['Cursadas']['Cursada']);
    $e=$Cursadas["FechaCursada"];
    $Cursadas= $personas['Cursadas']['Cursada'];
    $ultimaCursada = end(array_values($Cursadas));
  
    if ($count == 4 &&  isset($e) ) {
  
      if($Cursadas["Resultado"] == "APTO" ){
  
        $NuevoFormatoFecha = date("d-m-Y", strtotime($e));
        var_dump($NuevoFormatoFecha);
  
        $fecha1= new DateTime($date2);
        $fecha2= new DateTime($NuevoFormatoFecha);
        $diff = $fecha1->diff($fecha2);
        
        if ($diff->days <= 365)
        {
          echo "VIGENTE";
        }elseif ($diff->days > 365){
          echo "VENCIDO";
        }
        
        // El resultados sera 3 dias
        echo $diff->days . ' dias';
  
      }else {
  
        echo "NO APTO";
      }
      
     
      
      }else {
      
      
      
       $Cursadas= $personas['Cursadas']['Cursada'];
       $ultimaCursada = end(array_values($Cursadas));
    
       $fechaUltimaCursada = $ultimaCursada ["FechaCursada"];
  
    
       $resultados = $ultimaCursada["Resultado"];
       $estado = $personas["Estado"];
       $NuevoFormatoFecha = date("d-m-Y", strtotime($fechaUltimaCursada));
       echo $NuevoFormatoFecha;
  
       $fecha1= new DateTime($date2);
       $fecha2= new DateTime($NuevoFormatoFecha);
       $diff = $fecha1->diff($fecha2);
       
       if ($diff->days <= 365)
       {
         echo "VIGENTE";
       }elseif ($diff->days > 365){
         echo "VENCIDO";
       }
       
       // El resultados sera 3 dias
       echo $diff->days . ' dias';
      
  }
  }else {
  
    echo "Estado 500";
    
    }
    
  */
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  $estado = $arr["Estado"];
  
  
  if ($estado == 200) {   
    $date=date('m/d/Y');  
  $date2 = date("d-m-Y", strtotime($date));
    
    $count=count($Cursadas= $arr['Cursadas']['Cursada']);
    $e=$Cursadas["FechaCursada"];
    $Cursadas= $arr['Cursadas']['Cursada'];
    $ultimaCursada = end(array_values($Cursadas));
  
    if ($count == 4 &&  isset($e) ) {
  
      if($Cursadas["Resultado"] == "APTO" ){
  
        $NuevoFormatoFecha = date("d-m-Y", strtotime($e));
        var_dump($NuevoFormatoFecha);
  
        $fecha1= new DateTime($date2);
        $fecha2= new DateTime($NuevoFormatoFecha);
        $diff = $fecha1->diff($fecha2);
        
        if ($diff->days <= 365)
        {
          echo "VIGENTE";
        }elseif ($diff->days > 365){
          echo "VENCIDO";
        }
        
        // El resultados sera 3 dias
        echo $diff->days . ' dias';
  
      }else {
  
        echo "NO APTO";
      }
      
     
      
      }else {
      
      
      
       $Cursadas= $arr['Cursadas']['Cursada'];
       $ultimaCursada = end(array_values($Cursadas));
    
       $fechaUltimaCursada = $ultimaCursada ["FechaCursada"];
  
    
       $resultados = $ultimaCursada["Resultado"];
       $estado = $arr["Estado"];
       $NuevoFormatoFecha = date("d-m-Y", strtotime($fechaUltimaCursada));
       echo $NuevoFormatoFecha;
  
       $fecha1= new DateTime($date2);
       $fecha2= new DateTime($NuevoFormatoFecha);
       $diff = $fecha1->diff($fecha2);
       
       if ($diff->days <= 365)
       {
         echo "VIGENTE";
       }elseif ($diff->days > 365){
         echo "VENCIDO";
       }
       
       // El resultados sera 3 dias
       echo $diff->days . ' dias';
      
  }
  }else {
  
    echo "Estado 500";
    
    }
    



}







?>

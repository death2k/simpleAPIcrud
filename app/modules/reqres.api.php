<?php

// 3 parametros para acessar e consumir a api
function pullAPI($param1, $uri, $data){

//iniciar o curl
    $curl = curl_init();
    switch ($param1) {
        case 'POST':
            curl_setopt($curl, CURLOPT_POST, 1);
            if($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
        case 'PUT':
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST,  "PUT");
            if($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
        
        default:
            if($data)
                $uri = sprintf("%s?%s", $uri, http_build_query($data));
        break;
    }

    //
   curl_setopt($curl, CURLOPT_URL, $uri);
   curl_setopt($curl, CURLOPT_HTTPHEADER, array(
      'APIKEY: 111111111111111111111',
      'Content-Type: application/json',
   ));
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

   $result = curl_exec($curl);
   if(!$result){die("Connection Failure");}
   curl_close($curl);
   return $result;

}

?>
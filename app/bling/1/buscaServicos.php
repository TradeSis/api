<?php


  $outputType = "json";
  
  $service_url = 
  "https://www.bling.com.br/Api/v2/notasservico/".$outputType."/?".
  "apikey=".$apikey.
  "&filters=".urlencode($filters);

  //$service_url = 'https://www.bling.com.br/Api/v2/notasservico/' . $outputType  . '?apikey=' . $apikey 
  //. '&filters=' . $filters;

    $curl = curl_init($service_url);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
   // curl_setopt($curl, CURLOPT_POSTFIELDS, $parametro);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 0);
    curl_setopt($curl, CURLOPT_TIMEOUT, 120); //timeout in seconds
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
      'Content-Type: application/json',
      'Content-Length: ' . strlen($parametro))
    );
//    curl_setopt($curl, CURLOPT_HEADER, true);
//    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    $curl_response = curl_exec($curl);
    $info = curl_getinfo($curl);

    curl_close($curl); // close cURL handler

    $retorno = json_decode($curl_response,true);
//
 //  var_dump($retorno);
      

    if ($info['http_code']==200) {

       // echo $retorno;
       $vi = 0;
      $retornoParametros = array();
      foreach ($retorno["retorno"]["notasservico"] as $key=>$value) {
          $notaservico = (object) $value["notaservico"];

//          echo "\n".$notaservico->numeroNFSe;
//          echo "\n".$notaservico->cliente["nome"];
//          echo "\n".$notaservico->dataEmissao;
//          echo "\n".$notaservico->valorNota;
          $retornoParametros[$vi] = array(
            "numeroNFSe"  => $notaservico->numeroNFSe,
            "cliente"     => $notaservico->cliente["nome"],
            "clienteCNPJ" => $notaservico->cliente["cnpj"],
            "dataEmissao" => $notaservico->dataEmissao,
            "valorNota"   => $notaservico->valorNota);
          $vi = $vi + 1;
        }
          $jsonSaida     = array(
            "notasServico"   =>  array($retornoParametros)
                );

    
  }

    

  //  var_dump($retorno);

    //echo json_decode(json_encode($jsonSaida))

    //echo $conteudoFormatado;

<?php
$progr = new progress($dlc,$pf,$propath,$progresscfg,$tmp);

if (isset($jsonEntrada)){
  $conteudo = json_decode(json_encode($jsonEntrada["dadosEntrada"]));

  if (isset($conteudo)) {
    $conteudoEntrada=json_encode(array('clientes' => array(array(
                            'cpfCnpj' => $conteudo->cpfCliente)
                            )));
  } else {
    $conteudo = json_decode(json_encode($jsonEntrada));

    $conteudoEntrada=json_encode(array('clientes' => array(array(
                            'cpfCnpj' => $conteudo->cpfCliente)
                            )));

  }


} else {
  $conteudoEntrada=json_encode(array('clientes' => array(array(
                          'cpfCnpj' => $parametro)
                          )));
}

  if(isset($conteudoEntrada)){


      $retorno = $progr->executarprogress("dbpro/1/consultar",$conteudoEntrada,$dlc,$pf,$propath,$progresscfg,$tmp,$proginicial);


      $conteudo = json_decode($retorno,true);
    //  $jsonSaida = $conteudo;

      //var_dump($conteudo);
      //echo $retorno;

      if (isset($conteudo["conteudoSaida"][0])) {
        $jsonSaida = $conteudo["conteudoSaida"][0];
      }
      if (!isset($jsonSaida)) {
        if ($conteudo["conteudoSaida"]) {
          $jsonSaida = $conteudo["conteudoSaida"];
        }
        if (!isset($jsonSaida)) {

              echo $retorno;

        }
      }



  } else {
    $jsonSaida = json_decode(json_encode(
     array("status" => 400,
         "retorno" => "conteudo JSON de entrada vazio")
       ), TRUE);

  }

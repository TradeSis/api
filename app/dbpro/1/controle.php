<?php

//echo "funcao=".$funcao."\n";
//echo "parametro=".$parametro."\n";

switch ($funcao) {

   default:
       if ($metodo=="GET"){
           if (!isset($jsonEntrada)){
              if (isset($parametro)) {
                 //$parametro = $funcao;
                 $funcao = "consultar";
               } else {
                 $jsonSaida = json_decode(json_encode(
                  array("status" => 401,
                      "retorno" => "conteudo JSON vazio")
                    ), TRUE);
               }
           } else {
             $funcao = "consultar";
           }
        }

        if ($metodo=="POST"){
            if (isset($jsonEntrada)){
                  $funcao = "cadastrar";
                } else {
              $jsonSaida = json_decode(json_encode(
               array("status" => 402,
                   "retorno" => "conteudo JSON vazio")
                 ), TRUE);

            }
        }

      break;
}
//echo $funcao."\n";
if (!isset($jsonSaida)) {
    switch ($funcao) {
      case "cadastrar":
          if (isset($jsonEntrada)){
             include 'cadastrar.php';
           } else {
             $jsonSaida = json_decode(json_encode(
              array("status" => 400,
                  "retorno" => "conteudo JSON vazio")
                ), TRUE);
           }
      break;
      case "consultar":

        include 'consultar.php';

      break;

      default:
         $jsonSaida = json_decode(json_encode(
          array("status" => 400,
              "retorno" => "Aplicacao " . $aplicacao . "Metodo ".$metodo. " Funcao  '".$funcao."'  Invalida")
            ), TRUE);
         break;
    }
}

<?php


if (!isset($funcao)) {
  if ($parametro=="buscaServicos") {
    $funcao=$parametro;
    $parametro=null;
  }
  
}

//echo "funcao=".$funcao."\n";
//echo "parametro=".$parametro."\n";


switch ($funcao) {

  case "buscaServicos":
    if ($metodo=="GET"){
       include 'buscaServicos.php';
    } else {
      $jsonSaida = json_decode(json_encode(
       array("erro" => "400",
           "retorno" => "Metodo Invalido")
         ), TRUE);
    }
    break;

   default:
       if ($metodo=="GET"){
           if (!isset($jsonEntrada)){
              if (isset($parametro)) {
                 //$parametro = $funcao;
                 $funcao = "consultar";
               } else {
                 $jsonSaida = json_decode(json_encode(
                  array("status" => 401,
                      "retorno" => "conteudo JSON vazio x")
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

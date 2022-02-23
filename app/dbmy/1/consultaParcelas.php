<?php
    
      $query = "SELECT * FROM parcelas";
	
      $result = mysqli_query($dbmy,$query);
    
      if($result){
          while($row = mysqli_fetch_assoc($result)){
    //    while($row = mysqli_fetch_array($result)){
              $retorno['parcelas'][] = $row;
              //$retorno[] = $row;
        }
      }

      $jsonSaida = $retorno;

      /*
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
      */




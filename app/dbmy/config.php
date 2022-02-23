<?php

    // parametros de conexao
    $hostname="sql486.main-hosting.eu";
	$username="u384787522_helio";
	$password="2Et*MNY1oJul";
	$dbname="u384787522_tswebdev";
	
    $dbmy=mysqli_connect($hostname,$username, $password,$dbname);

    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        die ("html>script language='JavaScript'>alert('Unable to connect to database! Please try again later.'),history.go(-1)/script>/html>");
    }



?>

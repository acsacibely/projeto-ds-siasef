<?php

    $servidor = "localhost";
    $usuario = "root";
    $senha = "acsa0495";
    $dbname = "siasef_bd";
    //criando conexão
    $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

    /*
    if($conn->connect_errno){
        echo "Erro!";
    }
    else{
        echo "Conexão efetuada com sucesso";
    }
   */

?>
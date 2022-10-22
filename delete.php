<?php

    if(!empty($_GET['idmateriais'])){
        include_once('config.php');

        $id = $_GET['idmateriais'];

        $sqlSelect = "SELECT * FROM materiais WHERE idmateriais=$id";

        $result = $conn->query($sqlSelect);

        if($result->num_rows > 0){
            $sqlDelete = "DELETE FROM materiais WHERE idmateriais=$id";
            $resultDelete = $conn->query($sqlDelete);
        }
    }
    header('Location: sistema.php');
?>
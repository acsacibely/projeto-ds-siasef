<?php
    //salvar os dados alterados do edit.php

    include_once('config.php');

    if(isset($_POST['update'])){
        $id = $_POST['id'];
        $nome = $_POST['name'];
        $categoria = $_POST['category'];
        $qntd = $_POST['qntd'];
        $estado = $_POST['estado'];


        $sqlUpadate = "UPDATE materiais SET nome = '$nome', categoria='$categoria', qntd = '$qntd', estado = '$estado' WHERE idmateriais ='$id'";

        $result = $conn->query($sqlUpadate);   
    }
    header('Location: sistema.php');
?>
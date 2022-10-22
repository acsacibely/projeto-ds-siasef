<?php
session_start();
    if(isset($_POST['submit']) && !empty($_POST['matricula']) && !empty($_POST['password']) ){
        //acessa
        //print_r($_REQUEST);
        include_once('../config.php');
        $matricula = $_POST['matricula'];
        $senha = $_POST['password'];

        /*
        print_r('Matricula: ' . $matricula);
        print_r('<br>');
        print_r('Senha: ' . $senha);
        */


        $sql = "SELECT * FROM respon WHERE matricula = '$matricula' and senha = '$senha'";

        $result = $conn->query($sql);

        //print_r($result);

        if(mysqli_num_rows($result) < 1){
            unset($_SESSION['matricula']);
            unset($_SESSION['senha']);

            header('Location: ./login.php');
        }else{
            $_SESSION['matricula'] = $matricula;
            $_SESSION['senha'] = $senha;
            header('Location: ../sistema.php');
        }
        
    }else{
        //não acessa
        header('Location: ./login.php');
    }

?>
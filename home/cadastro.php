<?php
    if(isset($_POST['submit'])){
        include_once('config.php');

        $nome = $_POST['nome'];
        $matricula = $_POST['matricula'];
        $senha = $_POST['password'];

        $result = mysqli_query($conn, "INSERT INTO respon(nome, matricula, senha) VALUES('$nome','$matricula','$senha')");

        header('Location: ./login.php');
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php
    include_once('../head.php')
    ?>
     <link rel="stylesheet" href="./style.css">
</head>
<body>
    <img class="logo" src="../img/logo-h-white.png" alt="logo SIASEF" width = "350px"
    
    style="padding-bottom:20px">
    <main class="container">
        <h1>Cadastro</h1>
        <form action="cadastro.php" method="post">
            <div class="input-field">
                <input type="text" name="nome" id="nome" placeholder="Digite seu nome completo">
                <div class="underline"></div>
            </div>
            <div class="input-field">
                <input type="text" name="matricula" id="matricula" placeholder="Digite sua matrícula">
                <div class="underline"></div>
            </div>
            <div class="input-field">
                <input type="password" name="password" id="password" placeholder="Digite sua senha">
                <div class="underline"></div>
            </div>
    
            <button type="submit" name="submit">Cadastrar</button>
            <a class="voltar" href="./login.php">Voltar</a>
        </form>
    </main>
</body>
</html>
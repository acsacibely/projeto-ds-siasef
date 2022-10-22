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
</head>
<body>
    <div class="consulta">
        <form action="cadastro.php" method="POST">
            <div class="single">
                <input type="text" name="nome" id="name">
                <label for="name">Nome completo</label>
            </div>
            <div class="single">
                <input type="text" name="matricula" id="mat">
                <label for="mat">Matrícula</label>
            </div>
            <div class="single">
                <input type="password" name="password" id="pass">
                <label for="pass">Senha</label>
            </div>
            <a class="cancel" href="../home.php">Cancelar</a>
            <button type="submit" name="submit">Cadastrar</button>
        </form>
    </div>

</body>
</html>
<?php

    if(isset($_POST['submit'])){
        
        //print_r($_POST['name']);
        //print_r($_POST['category']);
        //print_r($_POST['qntd']);
        include_once('config.php');

        $nome = $_POST['name'];
        $categoria = $_POST['category'];
        $qntd = $_POST['qntd'];
        $estado = $_POST['estado'];

        $result = mysqli_query($conn, "INSERT INTO materiais(nome, categoria, qntd, estado) VALUES('$nome','$categoria','$qntd','$estado')");
    }

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include_once('head-sistema.php')?>
</head>
<body>
    <div class="consulta">
        <form action="index.php" method="POST">
            <div class="single">
                <input id="pes" type="text" name="name">
                <label for="pes">Nome</label>
            </div>
            <div class="single">
                <input type="text" name="category" id="category">
                <label for="category">Categoria</label>
            </div>
            <div class="single">
                 <input type="text" name="qntd" id="qntd">
                 <label for="qntd">Quantidade</label>
            </div>
            <div class="single">
                <input type="text" name="estado" id="estado">
                <label for="estado">Estado do material</label>
            </div>
            <a href="./sistema.php" class="cancel">Cancelar</a>
            <button type="submit" name="submit">Adicionar</button>
        </form>
    </div>
</body>
</html>
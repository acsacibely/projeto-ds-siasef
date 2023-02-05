<?php

    if(isset($_POST['submit'])){
        
        include_once('config.php');

        $nome = $_POST['name'];
        $categoria = $_POST['category'];
        $qntd = $_POST['qntd'];
        $estado = $_POST['estado'];

        $result = mysqli_query($conn, "INSERT INTO materiais(nome, categoria, qntd, estado) VALUES('$nome','$categoria','$qntd','$estado')");
       
    };
    
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include_once('head-sistema.php')?>
    <!--CSS-->
    <link rel="stylesheet" href="./teststyle.css">
   
</head>
<body class="pattern">
    <main class="container">
        <h1>Adicionar material</h1>
        <form action="adicionar.php" method="post">
            <div class="input-field">
                <input required type="text" name="name" id="nome">
                <div class="line"></div>
                <label for="nome">Descrição</label>
            </div>

            <div class="input-field">
                <input required type="text" name="category" id="category">
                <div class="line"></div>
                <label for="category">Categoria</label>
            </div>

            <div class="input-field">
                <input required type="int" name="qntd" id="qntd">
                <div class="line"></div>
                <label for="qntd">Quantidade</label>
            </div>

            <div class="input-field">
                <input required type="text" name="estado" id="estado">
                <div class="line"></div>
                <label for="estado">Condições de uso</label>
            </div>

            <div class="buttons">
                <button type="submit" name="submit">Adicionar</button>
                <button type="text" onclick="Reset();" class="cancel">Cancelar</button>
            </div>
        </form>


    <script>
        function Reset(){
            document.getElementById('nome').value=''; 
            document.getElementById('category').value='';
            document.getElementById('qntd').value='';
            document.getElementById('estado').value='';
        }
     
    </script>

</body>
</html>
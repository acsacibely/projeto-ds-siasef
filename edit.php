<?php

    if(!empty($_GET['idmateriais'])){
        
        include_once('config.php');

        $id = $_GET['idmateriais'];
        $sqlSelect = "SELECT * FROM materiais WHERE idmateriais=$id";


        $result = $conn->query($sqlSelect);

        if($result->num_rows > 0){
            while($user_data = mysqli_fetch_assoc($result)){
                $nome = $user_data['nome'];
                $categoria = $user_data['categoria'];
                $qntd = $user_data['qntd'];
                $estado = $user_data['estado'];
            }
        }else{
            header('Location: sistema.php');
        }
    }else{
        header('Location: sistema.php');
    }
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
        <h1>Editar material</h1>
       
        <form action="saveEdit.php" method="POST">
            
            <div class="input-field">
                <input id="pes" type="text" name="name" value="<?php echo $nome?>">
                <div class="line"></div>
                <label for="pes">Nome</label>
            </div>
            <div class="input-field">
                <input type="text" name="category" id="category" value="<?php echo $categoria?>">
                <div class="line"></div>
                <label for="category">Categoria</label>
            </div>
            <div class="input-field">
                <input type="text" name="qntd" id="qntd" value="<?php echo $qntd?>">
                <div class="line"></div>
                <label for="qntd">Quantidade</label>
            </div>
            <div class="input-field">
                <input type="text" name="estado" id="estado" value="<?php echo $estado?>">
                <div class="line"></div>
                <label for="estado">Estado do material</label>
            </div>

            <div class="buttons">
                <button type="submit" name="update" id="update">Alterar</button>
               <button class="cancel" onclick="voltar();">Voltar</button>
            </div>

            <input type="hidden" name="id" value="<?php echo $id?>">
        </form>  
    </main>
    <script>
        function voltar() {
            window.history.back();
        }
    </script>
</body>
</html>
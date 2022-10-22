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
</head>
<body>
    <div class="consulta">
        <form action="saveEdit.php" method="POST">
            <div class="single">
                <input id="pes" type="text" name="name" value="<?php echo $nome?>">
                <label for="pes">Nome</label>
            </div>
            <div class="single">
                <input type="text" name="category" id="category" value="<?php echo $categoria?>">
                <label for="category">Categoria</label>
            </div>
            <div class="single">
                <input type="text" name="qntd" id="qntd" value="<?php echo $qntd?>">
                <label for="qntd">Quantidade</label>
            </div>
            <div class="single">
                <input type="text" name="estado" id="estado" value="<?php echo $estado?>">
                <label for="estado">Estado do material</label>
            </div>
        
            <a class="cancel" href="./sistema.php">Cancelar</a>
            <button type="submit" name="update" id="update">Alterar</button>

            <input type="hidden" name="id" value="<?php echo $id?>">
        </form>
      
    </div>
   
</body>
</html>
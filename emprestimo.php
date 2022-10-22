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
            header('Location: ./sistema.php');
        }
    }else{
        header('Location: ./sistema.php');
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste | Empréstimo</title>
</head>
<body>
    <h1>Dados para empréstimo</h1>
    <form action="./saveEmprestimo.php" method="post">
        <input type="text" name="nome-disc" id="nome-disc">
        <label for="nome-disc">Nome</label>

        <input type="text" name="matri-disc" id="matri-disc">
        <label for="matri-disc">Matrícula</label>

        <input type="email" name="email-disc" id="email-disc">
        <label for="email-disc">E-mail</label>

        <button type="submit" name="salvar">Salvar</button>

        <!--diminuir a quantidade de material pós-empréstimo-->

        <input id="pes" type="text" name="name" value="<?php echo $nome?>">
        <label for="pes">Nome</label>

        <input type="text" name="category" id="category" value="<?php echo $categoria?>">
        <label for="category">Categoria</label>

        <input type="text" name="qntd" id="qntd" value="<?php echo $qntd?>">
        <label for="qntd">Quantidade</label>

        <input type="text" name="estado" id="estado" value="<?php echo $estado?>">
        <label for="estado">Estado do material</label>

        <button onclick="gerarRecibo()">Imprimir</button> 
    </form>


    <script>
        
    </script>
</body>
</html>
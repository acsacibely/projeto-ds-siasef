<?php
    include_once('../config.php');

    session_start();

    //CAMPO DE PESQUISA
    if((!isset($_SESSION['matricula']) == true) and (!isset($_SESSION['senha']) == true)){
        header('Location: login.php');
    }else{
        $logado = $_SESSION['matricula']; //aqui deve pegar o nome para aparecer na tela
    };

    $sqlDiscente = "SELECT * FROM discentes ORDER BY id";
    $resultDiscente = $conn->query($sqlDiscente);
    

    if(!empty($_GET['idmateriais'])){
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
            header('Location: ../sistema/sistema.php');
        }
    }else{
        header('Location: ../sistema/sistema.php');
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include_once('../sistema/head-sistema.php')?>
    <!--CSS-->
    <link rel="stylesheet" href="../style.css">
</head>
<body class="pattern">
    <main class="container">
        <a href="../sistema/sistema.php" title="voltar"><i class="bi bi-arrow-left-circle"></i></a>
        <h1>Dados para empréstimo</h1>
        <form action="./testEmprestimo.php" method="post" class=form>

            <div class="input-field">
                <input id="pes" type="text" name="nome" value="<?php echo $nome?>">
                <div class="line"></div>
                <label for="pes">Nome</label>
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

            <div class="input-field">
                <input type="text" name="categoria" id="categoria" value="<?php echo $categoria?>">
                <div class="line"></div>
                <label for="estado">Categoria</label>
            </div>

            <div class="input-field">
                <input type="text" name="logado" id="respon" value="<?php echo $logado?>">
                <div class="line"></div>
                <label for="respon">Responsável pelo empréstimo</label>
            </div>
        
            <div class="input-field">
                <p>Discente</p>
                <select name="select" id="">
                <?php
                    while($user_data = mysqli_fetch_assoc($resultDiscente)){
                        echo "<option>" . $user_data['matriDisc'] . "</option>";
                    }?>
            
            </select>
            </div>
            

            <input type="hidden" name="id" value="<?php echo $id?>">

            <div class="buttons">
                <button type="submit" name="submit">Gerar PDF</button>
                <button type='submit' name="enviar">Enviar por email</button>
                 
            </div>
        </form>
    </main>
    <script>
        function voltar(){
            window.location.href = "../sistema/sistema.php";
        }
    </script>
   
</body>
</html>
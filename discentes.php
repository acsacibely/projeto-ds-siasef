<?php
   
    if(isset($_POST['salvar'])){
        include_once('./config.php');
        $nome = $_POST['nome-disc'];
        $matri = $_POST['matri-disc'];
        $email = $_POST['email-disc'];

        $sql = "INSERT INTO `siasef_bd`.`discentes` (`nomeDisc`, `matriDisc`, `emailDisc`) VALUES ('$nome', '$matri', '$email')";

        $result = $conn->query($sql);

        header('Location: ./sistema.php');
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
        <h1>Adicionar discentes</h1>
        <form action="discentes.php" method="post">
            <div class="input-field">
                <input required type="text" name="nome-disc" id="nome-disc">
                <div class="line"></div>
                <label for="nome-disc">Nome</label>
            </div>
              
                <div class="input-field">
                    <input required  type="text" name="matri-disc" id="matri-disc">
                    <div class="line"></div>
                    <label for="matri-disc">Matrícula</label>
                </div>
               
                <div class="input-field">
                    <input required  type="text" name="email-disc" id="email-disc">
                    <div class="line"></div>
                    <label for="email-disc">E-mail</label>
                </div>
               

              
            </div> 
            <div class="buttons">
                <button type="submit" name="submit">Adicionar</button>
                <button type="text" onclick="Reset();" class="cancel">Cancelar</button>
            </div>
        </form>
    </main>

    <script>
        function Reset(){
            document.getElementById('nome-disc').value=''; 
            document.getElementById('matri-disc').value='';
            document.getElementById('email-dis').value='';
        }
     
    </script>
</body>
</html>
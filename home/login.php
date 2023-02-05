
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php
    include_once('../head.php');
    
    ?>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <img class="logo" src="../img/logo-h-white.png" alt="logo SIASEF" width = "350px"
    
    style="padding-bottom:20px"
    >
    <main class="container">
            <h1>Login</h1>
            <form action="testLogin.php" method="post">
                <div class="input-field">
                    <input type="text" name="matricula" id="matricula" placeholder="Digite sua matrícula">
                    <div class="underline"></div>
                </div>

                <div class="input-field">
                    <input type="password" name="password" id="password" placeholder="Digite sua senha">
                    <div class="underline"></div>
                </div>
            
                <button type="submit" name="submit">Entrar</button>
                <button class="cancel" onclick="Reset()">Cancelar</button>
              
            </form>
            <div class="cadastro">
                <p>Ou faça seu cadastro</p>
                <a href="./cadastro.php">Cadastro</a>
            </div>
    </main>
    <script>
        function Reset(){
            document.getElementById('matricula').value=''; // Limpa o campo
            document.getElementById('password').value='';
        }
     
    </script>

</body>
</html>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php
    include_once('../head.php');
    ?>
</head>
<body>
    <div class="consulta">
        <form action="testLogin.php" method="POST">
            <div class="single">
                <input type="text" name="matricula" id="mat">
                <label for="mat">Matrícula</label>
            </div>
            <div class="single">
                <input type="password" name="password" id="pass">
                <label for="pass">Senha</label>
            </div>
            <a class="cancel" href="../home.php">Cancelar</a>
            <button type="submit" name="submit">Entrar</button>
        </form>
        
    </div>
</body>
</html>

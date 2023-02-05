<?php
 include_once('config.php');

 if(!isset($_POST['enviar'])){
    $discEscolhido = $_POST['disc'];
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="test.php">
        <input name="nomeDisc" value="<?php $discEscolhido;?>"></input>
    </form>
</body>
</html>
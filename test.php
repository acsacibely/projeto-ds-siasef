
<?php
/*

    include_once('config.php');
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste</title>
    <?php include_once('head.php')?>
</head>
<body>
  <!--enviando para email-->
  <?php
require_once('src/PHPMailer.php');
require_once('src/SMTP.php');
require_once('src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
	$mail->SMTPDebug = SMTP::DEBUG_SERVER;
	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'cibellyacsa@gmail.com';
	$mail->Password = 'acsa0495';
	$mail->Port = 587;

	$mail->setFrom('cibellyacsa@gmail.com');
	$mail->addAddress('cibellyacsa@gmail.com');
	//váris endereços$mail->addAddress('endereco2@provedor.com.br');

	$mail->isHTML(true);
	$mail->Subject = 'Teste de email via gmail SIASEF';
	$mail->Body = 'Chegou o email teste de <strong>acsa<strong>';
	$mail->AltBody = 'Chegou o email teste do SIASEF';

	if($mail->send()) {
		echo 'Email enviado com sucesso';
	} else {
		echo 'Email nao enviado';
	}
} catch (Exception $e) {
	echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
}
*/
?>
<?php 
include_once('config.php');

$sql = "SELECT `mat.nome`, `em.qntdMaterial`, `disc.nomeDisc`, `disc.matriDisc`, `em.dataEmprestimo`, `em.dataDevolPrevista`, `em.dataDevol`
FROM materiais AS mat
INNER JOIN emprestimo AS em
INNER JOIN discentes AS disc
";

$result = $conn->query($sql);

if ($result-> num_rows > 0){
	while($user_data = mysqli_fetch_assoc($result)){
		print_r $user_data['nome'];
	}
}
/*
if($result-> num_rows > 0){
	while($row = mysqli_fetch_assoc($result)){
		echo $row->nome;
		echo $row->qntdMaterial;
	}
	
}

if($result->num_rows > 0){
	while($user_data = mysqli_fetch_assoc($result)){
		$qntdDevol = $user_data['qntdMaterial'];
		*/
?>


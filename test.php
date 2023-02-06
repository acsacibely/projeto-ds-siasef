
<?php 
include_once('./config.php');

$sql = "SELECT  `disc.nomeDisc`
FROM `emprestimo` AS `em`
INNER JOIN `discentes` AS `disc`
WHERE `em.idemprestimo` = 19; 
";

$result = $conn->query($sql);

if ($result) {                      
	foreach($result->fetchAll() as $row):
		printf($row['nomeDisc']);
	endforeach;
} else {
	echo 'não deu certo';
}
/*
if($result-> num_rows > 0){
	while($row = mysqli_fetch_assoc($result)){
		printf($row['nomeDisc']); 
	}
	
}

if($result->num_rows > 0){
	while($user_data = mysqli_fetch_assoc($result)){
		$qntdDevol = $user_data['qntdMaterial'];
		*/
?>


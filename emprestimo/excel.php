<?php
    ob_start();
	include_once('../config.php');

	
	// Definimos o nome do arquivo que será exportado
	$arquivo = 'historico.xls';
	
	
	// Criamos uma tabela HTML com o formato da planilha
	$html = '';
	$html .= '<table border="1">';
	$html .= '<tr>';
	$html .= '<td colspan="8">Planilha Histórico de Empréstimo</tr>';
	$html .= '</tr>';
	
	
	$html .= '<tr>';
	$html .= '<td>#</td>';
	$html .= '<td>Data do empréstimo</td>';
	$html .= '<td>Previsão de devolução</td>';
	$html .= '<td>Data da devolução</td>';
	$html .= '<td>ID do responsável</td>';
	$html .= '<td>ID do material</td>';
	$html .= '<td>ID do aluno</td>';
	$html .= '<td>Quantidade emprestada</td>';
	$html .= '</tr>';
	
	//Selecionar todos os itens da tabela 
	$sql = "SELECT * FROM emprestimo";
	$result = mysqli_query($conn , $sql);
	$count = 1;
	
	while($row = mysqli_fetch_assoc($result)){
		
		
		$html .= '<tr>';
		$html .= '<td>'. $count++ .'</td>';

		$dataEmprestimo = date('d/m/Y',strtotime($row["dataEmprestimo"]));

		$html .= '<td>'.$dataEmprestimo.'</td>';

		$dataDevolPrevista = date('d/m/Y',strtotime($row["dataDevolPrevista"]));

		$html .= '<td>'.$dataDevolPrevista.'</td>';

		$dataDevol = date('d/m/Y',strtotime($row["dataDevol"]));

		$html .= '<td>'.$dataDevol.'</td>';

		$html .= '<td>'.$row["idRespon"].'</td>';
		$html .= '<td>'.$row["idMateriais"].'</td>';
		$html .= '<td>'.$row["idDiscente"].'</td>';
		$html .= '<td>'.$row["qntdMaterial"].'</td>';
		$html .= '</tr>';
		;
	}
	// Configurações header para forçar o download
	header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
	header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
	header ("Cache-Control: no-cache, must-revalidate");
	header ("Pragma: no-cache");
	header ("Content-type: application/x-msexcel");
	header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
	header ("Content-Description: PHP Generated Data" );
	// Envia o conteúdo do arquivo
	echo $html;
	exit; 
?>

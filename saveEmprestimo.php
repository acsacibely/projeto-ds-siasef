<?php
    //salvar os dados alterados do emprestimo.php e imprimir

    include_once('config.php');

    if(isset($_POST['salvar'])){
        $nome = $_POST['nome-disc'];
        $matri = $_POST['matri-disc'];
        $email = $_POST['email-disc'];

        $sql = "INSERT INTO discentes(nomeDisc, matriDisc, emailDisc) VALUES('$nome','$matri','$email')";

        $result = $conn->query($sql); 
    }
    header('Location: sistema.php');
/*
    // QUERY para recuperar os registros do banco de dados
    $query_discentes = "SELECT * FROM discentes WHERE id = 1";

    // Prepara a QUERY
    $result_discentes = $conn->prepare($query_discentes);

    // Executar a QUERY
    $result_discentes->execute();

// Informacoes para o PDF
$dados = "<!DOCTYPE html>";
$dados .= "<html lang='pt-br'>";
$dados .= "<head>";
$dados .= "<meta charset='UTF-8'>";
$dados .= "<link rel='stylesheet' href='http://localhost/celke/css/custom.css'";
$dados .= "<title>Celke - Gerar PDF</title>";
$dados .= "</head>";
$dados .= "<body>";
$dados .= "<h1>Listar os Usuário</h1>";

// Ler os registros retornado do BD
while($row_discente = $result_discentes->fetch(PDO::FETCH_ASSOC)){
    //var_dump($row_usuario);
    extract($row_discente);
    $dados .= "Nome: $nome <br>";
    $dados .= "Matrícula: $email <br>";
    $dados .= "E-mail: $email <br>";
    $dados .= "<hr>";
}

$dados .= "<img src='http://localhost/celke/imagens/celke.jpg'><br>";
$dados .= "O PHP proin iaculis, libero et dictum fringilla, ex metus scelerisque mauris, sit amet lobortis enim justo quis arcu. Proin eget pharetra ipsum, eget auctor purus.";
$dados .= "</body>";


// Referenciar o namespace Dompdf
use Dompdf\Dompdf;

// Instanciar e usar a classe dompdf
$dompdf = new Dompdf(['enable_remote' => true]);

// Instanciar o metodo loadHtml e enviar o conteudo do PDF
$dompdf->loadHtml($dados);

// Configurar o tamanho e a orientacao do papel
// landscape - Imprimir no formato paisagem
//$dompdf->setPaper('A4', 'landscape');
// portrait - Imprimir no formato retrato
$dompdf->setPaper('A4', 'portrait');

// Renderizar o HTML como PDF
$dompdf->render();

// Gerar o PDF
$dompdf->stream();
*/
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baixar PDF</title>
</head>
<body>
    
</body>
</html>
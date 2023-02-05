<?php

use Dompdf\Dompdf;
require_once '../dompdf/autoload.inc.php';

date_default_timezone_set('UTC');

include_once('../config.php');


if(isset($_POST['submit'])){

    $idMaterial = $_POST['id'];

    $nome = $_POST['nome'];
    $qntdInformada = $_POST['qntd'];
    $estado = $_POST['estado'];
    $categoria = $_POST['categoria'];
    $logado = $_POST['logado'];
    $discente = $_POST['select'];

    //$data = new DateTime(); // Pega o momento atual
    //$dataEmprestimo = $data->format('Y-m-d');
    //$dataDevol = date('Y-m-d', strtotime('+5 days', strtotime('$data')));
    $dataD = new DateInterval('P1D');
    $dataE = new DateTimeImmutable();
    $dataEmprestimo = $dataE->format('Y-m-d'); 
    //echo "<br>";
    $dataDev = $dataE->add($dataD);
    $dataDevol = $dataDev->format('Y-m-d');
    //echo $dataEmprestimo;
    //echo "<br>";
    //echo $dataDevol; 
    //echo "<br>";



    //pesquisar o id od responsável pela matrícula
    $sqlRespon =  mysqli_query($conn, "SELECT idrespon FROM respon WHERE matricula=$logado");
    if ($sqlRespon->num_rows > 0){
        while($user_data = mysqli_fetch_assoc($sqlRespon)){
            $idRespon = $user_data['idrespon'];
           
        }
    }else{
        echo "mensagem de erro para a busca do id do responsável";
    }

    //buscar dados dos discentes
    $sqlDiscente = mysqli_query($conn, "SELECT * FROM discentes WHERE matriDisc=$discente");
    if ($sqlDiscente->num_rows > 0){
        while($user_data = mysqli_fetch_assoc($sqlDiscente)){
            $idDisc = $user_data['id'];
            $nomeDisc = $user_data['nomeDisc'];
            $matriDisc = $user_data['matriDisc'];
           
        }
    }else{
        echo "mensagem de erro para a busca do id do discente";
    }

    //pegar todas as informações de responsável, discente e material para gerar PDF
    $sqlResponPDF =  mysqli_query($conn, "SELECT * FROM respon WHERE matricula=$logado");


    if ($sqlResponPDF->num_rows > 0){
        while($user_data = mysqli_fetch_assoc($sqlResponPDF)){
            $nomeRespon = $user_data['nome'];
            $matriRespon = $user_data['matricula'];
        }
    }else{
        echo "mensagem de erro para a busca do responsável";
    }

    //fazer uma consulta da qntd e salvar numa variável
    $sqlSelect = "SELECT qntd FROM materiais WHERE idmateriais=$idMaterial";
    $resultQntd = $conn->query($sqlSelect);

    if ($resultQntd->num_rows > 0){
        while($user_data = mysqli_fetch_assoc($resultQntd)){
            $qntdEstoque = $user_data['qntd'];
            //echo $qntdEstoque;
        }
    }else{
        echo "mensagem de erro para a busca da quantidade de material em estoque";
    }
 

    if ($qntdInformada <= $qntdEstoque AND $qntdInformada != 0){
        //codigo do emprestimo acontecendo
        //diminuir a qntd em estoque e atualiza
        $qntdAtualizada = $qntdEstoque - $qntdInformada;
       
        //atualizar no banco de dados
        $sqlUpdate = "UPDATE `siasef_bd`.`materiais` SET `qntd` = $qntdAtualizada WHERE (`idmateriais` = $idMaterial)";
        $resultUpdate = $conn->query($sqlUpdate);

        //calcular o tempo de devolução
        //salvar tudo na tabela empréstimo
    
        $resultTabela = mysqli_query($conn, "INSERT INTO `siasef_bd`.`emprestimo`(`dataEmprestimo`, `dataDevolPrevista`, `idMateriais`, `qntdMaterial`, `idRespon`, `idDiscente`) VALUES('$dataEmprestimo', '$dataDevol', '$idMaterial','$qntdInformada', '$idRespon', '$idDisc')");


        //PDF


        $dompdf = new Dompdf();

        //['enable_remote' => true]
        //$img = "<img src='../img/icon-green.png' style='width:100px; height: 30px;'>";


        $dompdf->loadHtml('
        <h1> SIASEF | Registro de Empréstimo </h1>
        <h2>Dados do material</h2>
        <p>Nome: '. $nome . '</p>
        <p>Quantidade: '. $qntdInformada . '</p>
        <p>Estado: '. $estado . '</p>
        <p>Categoria: '. $categoria . '</p>
        <hr>
        <h2>Dados do discente</h2>
        <p>Nome: ' . $nomeDisc . '</p>
        <p>Matrícula: '. $matriDisc . '</p>
        <h2>Dados do responsável</h2>
        <p>Responsável: '. $nomeRespon . '</p>
        <p>Matrícula: '. $matriRespon . '</p>
        <hr>
        <p>Data de empréstimo: '. $dataEmprestimo . '</p>
        <p>Data de devolução prevista: '. $dataDevol . ' </p>
        <hr>

        ');

        //renderizando o html

        $dompdf->render();

        //gerar a saída do documento pdf
        $dompdf->stream(
            "relatorio-de-emprestimo.pdf", //nome do arquivo
            array(
                "Attachment" => false //(apenas visualizar e true é para download)
            )
            );



    } else if ($qntdInformada > $qntdEstoque){
        //mandar um alert dizendo que não pode
        $alert = "<script>alert('A quantidade informada está acima da disponível para empréstimo. Tente novamente.');</script>";
        echo  $alert;
        echo "<a href='emprestimo.php'>Voltar</a>";

    } else {
        $alert = "<script>alert('A quantidade informada não está disponível para empréstimo. Tente novamente.');</script>";
        echo  $alert;
        echo "<a href='emprestimo.php'>Voltar</a>";
        
    }

//$dataDevol = date('Y-m-D', strtotime('+7 days', strtotime('$dataEmprestimo')));

}


?>

<?php

date_default_timezone_set('UTC');

include_once('../config.php');

if(isset($_POST['submit']) OR (isset($_POST['enviar']))){

    $idMaterial = $_POST['id'];

    $nome = $_POST['nome'];
    $qntdInformada = $_POST['qntd'];
    $estado = $_POST['estado'];
    $categoria = $_POST['categoria'];
    $logado = $_POST['logado'];
    $discente = $_POST['select'];

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
            $emailDisc = $user_data['emailDisc'];
           
        }
    }else{
        echo "mensagem de erro para a busca do id do discente";
    }

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

        if(isset($_POST['submit'])){
            // gera PDF
            include_once('gerarpdf.php');
        }
        if(isset($_POST['enviar'])){
            //envia por email
            include_once('email.php');
        }

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
   
}


?>

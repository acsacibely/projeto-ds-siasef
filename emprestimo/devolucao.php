<?php


    date_default_timezone_set('UTC');
    include_once('../config.php');

    
    if(!empty($_GET['idmateriais'])){
        $id = $_GET['idmateriais'];
        $sqlSelect = "SELECT * FROM emprestimo WHERE idMateriais=$id";
        $result = $conn->query($sqlSelect);
        //gerar pdf de devolução com $dataDevol preenchida
        //condição para tempo de devolução excedido

        if($result->num_rows > 0){
            while($user_data = mysqli_fetch_assoc($result)){
                $qntdDevol = $user_data['qntdMaterial'];
            }

        }

        //fazer uma consulta da qntd e salvar numa variável
        $resultQntd =  mysqli_query($conn, "SELECT qntd FROM materiais WHERE (`idmateriais` = $id)");
        if ($resultQntd->num_rows > 0){
            while($user_data = mysqli_fetch_assoc($resultQntd)){
                $qntdEstoque = $user_data['qntd'];
                $novaQntd = $qntdEstoque + $qntdDevol;
            }}
        
        //atualizar quantidade no banco de dados
        $sqlUpdate = "UPDATE `siasef_bd`.`materiais` SET `qntd` = $novaQntd WHERE (`idmateriais` = $id)";
        $resultUpdate = $conn->query($sqlUpdate);

        //add a data de devolução
        $dataDev = new DateTimeImmutable();
        $dataDevol = $dataDev->format('Y-m-d'); 

        //atualizar a data de devolução na tabela empréstimo
        $dataUpdate = "UPDATE `siasef_bd`.`emprestimo` set `dataDevol` = '$dataDevol' WHERE (`idMateriais` = $id)";
        $resultDataUpdate = $conn->query($dataUpdate);

        $alert = "<script>alert('Material devolvido com sucesso.');</script>";
        echo  $alert;
        echo "<a href='../sistema/sistema.php'>Voltar</a>";

    }  

    


?>

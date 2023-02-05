<?php
 include_once('config.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include_once('head-sistema.php')?>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <?php
    $sqlHistory = "SELECT * FROM emprestimo ORDER BY idemprestimo";
    $result = $conn->query($sqlHistory);

    ?>
    
    
    <div class="m-5">
    <a href="excel.php">
    <button class="btn btn-success gerar">Gerar relatório</button>
    </a>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Data do empréstimo</th>
                <th scope="col">Data de devolução prevista</th>
                <th scope="col">Data de devolução</th>
                <th scope="col">Quantidade de material</th>
                <th scope="col">Matrícula do responsável</th>
                <th scope="col">ID do material</th>
                <th scope="col">ID do discente</th>
                <th scope="col">Devolver</th>
            
                </tr>
            </thead>
            <tbody>
                <?php
                    $count = 1;
                    while($user_data = mysqli_fetch_assoc($result)){
                        echo "<tr>";
                        echo "<td>". $count++ . "</td>";
                        echo "<td>".$user_data['dataEmprestimo']. "</td>";
                        echo "<td>".$user_data['dataDevolPrevista']. "</td>";
                        echo "<td>".$user_data['dataDevol']. "</td>";
                        echo "<td>".$user_data['qntdMaterial']. "</td>";
                        echo "<td>".$user_data['idRespon']. "</td>";
                        echo "<td>".$user_data['idMateriais']. "</td>";
                        echo "<td>".$user_data['idDiscente']. "</td>";
                        echo "<td>
                        <a class='btn btn-sm btn-success' href='devolucao.php?idmateriais=$user_data[idMateriais]'>
                        <i class='bi bi-file-arrow-down'></i>
                        </a>
                        </td>";
                    
                        echo "</tr>";
                        
                    }

                ?>
            </tbody>
        </table>

    </div>
</body>
</html>
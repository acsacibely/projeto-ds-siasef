<?php
    session_start();

    include_once('../config.php');

    if((!isset($_SESSION['matricula']) == true) and (!isset($_SESSION['senha']) == true)){
        header('Location: ../home/login.php');
    }else{
        $logado = $_SESSION['matricula']; //aqui deve pegar o nome para aparecer na tela
        $sqlNome = ("SELECT * FROM respon WHERE matricula LIKE '$logado'");
        $resultNome = $conn->query($sqlNome);

        if ($resultNome->num_rows > 0){
            while($user_data = mysqli_fetch_assoc($resultNome)){
                $respon = $user_data['nome'];
               
            }
        }else{
            echo "mensagem de erro para a busca do id do responsável";
        }
        
    }

    //CAMPO DE PESQUISA

    if(!empty($_GET['search'])){
       $data = $_GET['search'];
       $sql = "SELECT * FROM materiais WHERE idmateriais LIKE '%$data%' or nome LIKE '%$data%' or categoria LIKE '%$data%' or qntd LIKE '%$data%' or estado LIKE '%$data%' ORDER BY idmateriais";
    }else{
        $sql = "SELECT * FROM materiais ORDER BY idmateriais";
    }

    $result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include_once('./head-sistema.php')?>
</head>
<body>
<div class="head">
    <p>Boas vindas: <span><?php echo $respon; ?></span></p>
    <!--ESPAÇO PARA PESQUISA-->
    <div class="box-search">
        <input class="form-control w=10" type="search" name="" id="pesquisar" placeholder="Pesquisar">
        <button onclick="searchData()" class="btn btn-primary"><i class="bi bi-search"></i></button>
    </div>
</div>
    <!--TABELA COM AS INFORMAÇÕES DO BANCO DE DADOS LISTADAS-->
    <div class="m-5 table-responsive-sm">
        <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Categoria</th>
                <th scope="col">Quantidade</th>
                <th scope="col">Estado</th>
                <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $count = 1;
                    while($user_data = mysqli_fetch_assoc($result)){
                        echo "<tr>";
                        $id = $user_data['idmateriais'];
                        echo "<td> ".$count++ . "</td>";
                        echo "<td>".$user_data['nome']. "</td>";
                        echo "<td>".$user_data['categoria']. "</td>";
                        echo "<td>".$user_data['qntd']. "</td>";
                        echo "<td>".$user_data['estado']. "</td>";
                        echo "<td>
                            <a class='btn btn-sm btn-primary' title='editar' href='./edit.php?idmateriais=$id'>
                                <i class='bi bi-pencil'></i>
                            </a>
                            <button title='excluir' class='btn btn-sm btn-danger' data-toggle='modal' data-target='#idmodal'>
                                <i class='bi bi-trash-fill'></i>
                                
                            </button>
                            <a class='btn btn-sm btn-success' title='emprestar' href='../emprestimo/emprestimo.php?idmateriais=$id'>
                                <i class='bi bi-file-arrow-up'></i>
                            </a>
                            
                        
                        </td>";
                        echo "</tr>";
                        
                    }
                ?>
            </tbody>
        </table>
    </div>

    <!--MODAL PARA CONFIRMAR EXCLUSÃO--->
    <!-- Botão para acionar modal -->


    <!-- Modal -->
    <div class="modal fade" id="idmodal" tabindex="-1" role="dialog" aria-labelledby="labelmodal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="labelmodal">Confirmar exclusão</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            Deseja realmente excluir as linhas de informação?
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            <a href='<?php echo "delete.php?idmateriais=$id"?>' class="btn btn-danger">Confirmar</a>
        </div>
        </div>
    </div>
    </div>

    <script>
        var search = document.getElementById('pesquisar');

        //fará a pesquisa quando o usuário teclar enter
        search.addEventListener("keydown", function(event){
            if (event.key === "Enter"){
                searchData();
            }
        });

        function searchData(){
            window.location = 'sistema.php?search='+search.value;
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>

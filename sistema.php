<?php
    session_start();

    include_once('config.php');

    if((!isset($_SESSION['matricula']) == true) and (!isset($_SESSION['senha']) == true)){
        header('Location: login.php');
    }else{
        $logado = $_SESSION['matricula']; //aqui deve pegar o nome para aparecer na tela
    }

    //CAMPO DE PESQUISA

    if(!empty($_GET['search'])){
       $data = $_GET['search'];
       $sql = "SELECT * FROM materiais WHERE idmateriais LIKE '%$data%' or nome LIKE '%$data%' or categoria LIKE '%$data%' ORDER BY idmateriais";
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
    <p>Usuário logado de matrícula: <span><?php echo $logado; ?></span></p>
    <!--ESPAÇO PARA PESQUISA-->
    <div class="box-search">
        <input class="form-control w=10" type="search" name="" id="pesquisar" placeholder="Pesquisar">
        <button onclick="searchData()" class="btn btn-primary"><i class="bi bi-search"></i></button>
    </div>
</div>
    <!--TABELA COM AS INFORMAÇÕES DO BANCO DE DADOS LISTADAS-->
    <div class="m-5">
        <table class="table">
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
                    while($user_data = mysqli_fetch_assoc($result)){
                        echo "<tr>";
                        echo "<td>".$user_data['idmateriais']. "</td>";
                        echo "<td>".$user_data['nome']. "</td>";
                        echo "<td>".$user_data['categoria']. "</td>";
                        echo "<td>".$user_data['qntd']. "</td>";
                        echo "<td>".$user_data['estado']. "</td>";
                        echo "<td>
                            <a class='btn btn-sm btn-primary' href='edit.php?idmateriais=$user_data[idmateriais]'>
                                <i class='bi bi-pencil'></i>
                            </a>
                            <a class='btn btn-sm btn-danger' href='delete.php?idmateriais=$user_data[idmateriais]'>
                                <i class='bi bi-trash-fill'></i>
                            </a>
                            <a class='btn btn-sm btn-success' href='emprestimo.php?idmateriais=$user_data[idmateriais]'>
                                <i class='bi bi-file-arrow-up'></i>
                            </a>
                            
                        
                        </td>";
                        echo "</tr>";
                        
                    }
                ?>
            </tbody>
        </table>
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

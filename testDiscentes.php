<?php
// Incluir a conexão com o banco de dados
include_once './config.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php include_once('head.php');?>
    <meta charset="UTF-8">
    <title>Pesquisar em duas tabelas</title>
</head>

<body>
    <h1>Pesquisar Usuário</h1>

    <?php
    // Receber os dados do formulário
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    ?>

    <!-- Início do formulário -->
    <form method="POST" action="">
        <?php
        $texto_pesquisar = "";
        if (isset($dados['texto_pesquisar'])) {
            $texto_pesquisar = $dados['texto_pesquisar'];
        }
        ?>
        <label>Pesquisar</label>
        <input type="text" name="texto_pesquisar" placeholder="Pesquisar pelo termo" value="<?php echo $texto_pesquisar; ?>"><br><br>

        <input type="submit" value="Pesquisar" name="PesquisarUsuario"><br><br>
    </form>

    <!-- Fim do formulário -->

    <?php
    // Acessa o IF quando o usuário clicar no botão
    if (!empty($dados['PesquisarUsuario'])) {
        //var_dump($dados);
        $nome = "%" . $dados['texto_pesquisar'] . "%";

        // Criar a QUERY pesquisar no banco de dados
        $query_usuarios = "SELECT usr.id, usr.nome AS nome_usr, usr.email,
             emp.nome AS nome_emp
            FROM usuarios AS usr
            INNER JOIN empresas AS emp ON emp.id=usr.empresa_id
            WHERE usr.nome LIKE :nome_usr
            OR emp.nome LIKE :nome_emp
            ORDER BY usr.id DESC";

        // Prepara a QUERY
        $result_usuarios = $conn->prepare($query_usuarios);

        // Substituir o link :nome_usr pelo valor que vem do formulário
        $result_usuarios->bindParam(':nome_usr', $nome);
        $result_usuarios->bindParam(':nome_emp', $nome);

        // Executar a QUERY
        $result_usuarios->execute();

        if (($result_usuarios) and ($result_usuarios->rowCount() != 0)) {
            // Ler os registros retornado do banco de dados
            while ($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)) {
                //var_dump($row_usuario);
                // Extrair o array para imprimir através da chave no array
                extract($row_usuario);

                // Imprimir o valor de cada coluna retornada do banco de dados
                echo "ID: $id<br>";
                echo "Nome: $nome_usr<br>";
                echo "E-mail: $email<br>";
                echo "Empresa: $nome_emp<br>";

                echo "<hr>";
            }
        } else {
            echo "<p style='color: #f00;'>Erro: Nenhum usuário encontrado!</p>";
        }
    }
    ?>

</body>

</html>
<?php

use Dompdf\Dompdf;
require_once '../dompdf/autoload.inc.php';


$dompdf = new Dompdf();
     
    
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
    <p>Data de empréstimo: '. date('d/m/Y', strtotime($dataEmprestimo)) . '</p>
    <p>Data de devolução prevista: '. date('d/m/Y', strtotime($dataDevol)) . ' </p>
    <hr>

    ');

    //renderizando o html

    $dompdf->render();

    //gerar a saída do documento pdf
    $dompdf->stream(
        "comprovante-de-emprestimo.pdf", //nome do arquivo
        array(
            "Attachment" => false //(apenas visualizar e true é para download)
        )
        );


?>
<?php 

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nome = $_POST["nome"];
    $dados = $_POST["dados"];
    $status = $_POST["status"];
    $prazo = $_POST["prazo"];

    $arquivo = "projetos.json";

    if(file_exists($arquivo)){
        $projetos = json_decode(file_get_contents($arquivo), true);
    } else {
        $projetos = [];
    }

    $novoProjeto = [
        "nome" => $nome,
        "dados" => $dados,
        "status" => $status,
        "prazo" => $prazo
    ];

    $projetos[] = $novoProjeto;

    file_put_contents($arquivo, json_encode($projetos, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

    echo "Projeto adicionado com sucesso";
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="desenvolvimento.css">
    <title>Document</title>
</head>
<body>
        <div class="Nav-bar">
        <img src="imgHtml/Gemini_Generated_Image_5kpxl15kpxl15kpx-removebg-preview.png" alt="">
        <a href="#">INICIO</a>
        <a href="orcamentos.php">Orçamento</a>
        <a href="#">FINANCEIRO</a>
        <a href="juridico.php">JURIDICO</a>
        <a href="projetos.php">PROJETOS</a>
        <a href="#">DESENVOLVIMENTO</a>
    </div><!--Nav-bar-->

     <h1>CADASTRO DE PROJETOS</h1>

    <form method = "POST">

    <label>Nome do projeto:</label>
    <input type="text" name = "nome" required>
    <br><br>
    <label>Dados do projeto:</label>
    <input type="text" name = "dados" required>
    <br><br>
    <label>Status do projeto:</label>
    <input type="text" name = "status" required>
    <br><br>
    <label>Prazo para conclusão:</label>
    <input type="number" name = "prazo" required>
    <br><br>

    <div class="desenvolver">
        <h1><?= $nome ?></h1>
        <p><?= $dados ?></p>
        <p><?= $status ?></p>
        <p><?= $prazo ?></p>


    </div>
</body>
</html>
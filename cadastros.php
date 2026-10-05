<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $arquivo = "/dadosP/dados-produtos.json";

    $dados =  file_get_contents(__DIR__ . "/dadosP/dados-produtos.json");

    $produtos = json_decode($dados, true);

    $produto = [
        "nome" => $_POST["nome"],
        "categoria" => $_POST["categoria"],
        "marca" => $_POST["marca"],
        "preco" => $_POST["preco"],
        "quantidade" => $_POST["quantidade"],
        "fabricante" => [
            "nome" => $_POST["fabricante"],
            "pais" => $_POST["pais"]
             ]
        ];

        $produtos[] = $produto;

        $json = json_encode($produtos, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

        file_put_contents($arquivo, $json);
}

$dados = file_get_contents($arquivo);
$produtos = json_decode($dados, true);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
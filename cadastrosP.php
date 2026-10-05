<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $nome = $_POST["nome"];
        $categoria = $_POST["categoria"];
        $marca = $_POST["marca"];
        $preco = $_POST["preco"];
        $quantidade = $_POST["quantidade"];
        $fabricante = [
            $nome = $_POST["fabricante"],
            $pais = $_POST["pais"]
        ];

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

        $dados = file_get_contents(__DIR__ . "/dadosP/dados-produtos.json");

        $produtos = json_decode($dados, true);

        $produtos[] = $produto;

        $dadosAtualizado = json_encode(
            $produtos,
            JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE
        );

        file_put_contents(__DIR__ . "/dadosP/dados-produtos.json", $dadosAtualizado);


}

$dados = file_get_contents(__DIR__ . "/dadosP/dados-produtos.json");
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
    <h1>CADASTRO DE PRODUTOS</h1>

    <form method = "POST">

    <label>Nome do protudo:</label>
    <input type="text" name = "nome" required>
    <br><br>
    <label>Categoria:</label>
    <input type="text" name = "categoria" required>
    <br><br>
    <label>Marca:</label>
    <input type="text" name = "marca" required>
    <br><br>
    <label>Preço:</label>
    <input type="number" name = "preco" step = "0.01" required>
    <br><br>
    <label>quantidade em estoque:</label>
    <input type="number" name = "quantidade" required>
    <br><br>

    <h2>FABRICANTE</h2>

    <label>Fabricante:</label>
    <input type="text" name = "fabricante" required>
    <br><br>
    <label>País de origem:</label>
    <input type="text" name = "pais" required>
    <br><br>
    <button type="submit">CADASTRAR</button>
    </form>
    <hr>

    <h2>PRODUTOS CADASTRADOS</h2>

    <?php foreach ($produtos as $produto) { ?>
        <p> Nome: <?= $produto["nome"] ?> </p>
        <p> Categoria: <?= $produto["categoria"] ?> </p>
        <p> Marca: <?= $produto["marca"] ?> </p>
        <p> preço: R$ <?= $produto["preco"] ?> </p>
        <p> Quantidade: <?= $produto["quantidade"] ?> </p>
        <p> Fabricante: <?= $produto["fabricante"]["nome"] ?> </p>
        <p> País de origem: <?= $produto["fabricante"]["pais"] ?> </p>

        <?php } ?>

</body>
</html>
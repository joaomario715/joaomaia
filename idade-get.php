<?php
$nome = $_GET["nome"];
$idade = $_GET["idade"];
$resultado = "";

if ($idade >= 18) {
    $resultado = "Voce é maior de idade";
} else {
    $resultado = "Voce é menor de idade";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificador de idade</title>
    <link rel="stylesheet" href="idade.css">

</head>
<body>
<a href="index.php" class = "retorno">Voltar para Projetos</a>
<h2>Verificador de idade</h2>

<form method = "GET">
    <label>Digite seu nome:</label>
    <input type="text" class = "nome" id = "nome" name = "nome">
    <label>Digite sua idade:</label>
    <input type="number" class = "idade" id = "idade" name = "idade">
    <button type="submit">verificar</button>
</form>

<p> <?= $resultado ?> </p>


</body>
</html>
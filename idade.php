<?php
$nome = $_POST["nome"];
$idade = $_POST["idade"];
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
    <title>Document</title>
</head>
<body>
<a href="index.php">Voltar para Projetos</a>
<h2>Verificador de idade</h2>

<form method = "POST">
    <label>Digite seu nome:</label>
    <input type="text" class = "nome" id = "nome" name = "nome">
    <label>Digite sua idade:</label>
    <input type="number" class = "idade" id = "idade" name = "idade">
    <input type="submit" value = "verificar">
</form>

<p> <?= $resultado ?> </p>


</body>
</html>
<?php

require_once "helpdesk-func.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($_POST["acao"] == "cadastrar"){
        chamados("cadastrar", $_POST);
    }

    if ($_POST["acao"] == "atualizar"){
        chamados("atualizar", $_POST, $_POST["posicao"]);
    }

    if ($_POST["acao"] == "excluir"){
        chamados("excluir", [], $_POST["posicao"]);
    }
}

$lista = chamados("consultar");
$relatorio = chamados("relatorio");

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
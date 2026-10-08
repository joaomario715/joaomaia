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
    <h1>CHAMADOS TECNICOS</h1>
    <h2>Cadastrar chamados</h2>

    <form method="POST"></form>
    <input type="hidden" name="acao" value="cadastrar">

    <h3>Nome:</h3>
    <input type="text" name = "nome" required>
    <br><br>
    <h3>setor:</h3>
    <select name="setor">
        <option>Produção</option>
        <option>Administrativo</option>
        <option>Logística</option>
        <option>Financeiro</option>
        <option>T.I.</option>
    </select>
    <br><br>
    <h3>Equipamento:</h3>
    <select name="equipamento">
        <option>Computador</option>
        <option>Impressora</option>
        <option>Rede</option>
        <option>Sistema</option>
        <option>Outro</option>
    </select>
    <br><br>
</body>
</html>
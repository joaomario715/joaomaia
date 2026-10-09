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

    <form method="POST">
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
    <h3>Descrição</h3>
    <textarea name="descricao" required></textarea>
    <br><br>
    <h3>Prioridade</h3>
    <select>
    <option>Baixa</option>
    <option>Média</option>
    <option>Alta</option>
    </select>
    <br><br>
    <button type = "submmit">Cadastrar</button>
    </form>
    <hr>
    <h2>RELATÓRIO</h2>
    <P>Total: <?= count($lista) ?></P>
    <p>Abertos: <?= $relatorio[0] ?></p>
    <p>Em andamento: <?= $relatorio[1] ?></p>
    <p>Resolvidos: <?= $relatorio[2] ?></p>
    <hr>
    <h2>Lista de chamados</h2>
    <?php foreach ($lista as $posicao => $chamado) { ?>
    <h3>Chamado <?= $posicao + 1 ?></h3>
    <p>Nome: <?= $chamado["nome"] ?></p>
    <p>Setor: <?= $chamado["setor"] ?></p>
    <p>Equipamento: <?= $chamado["equipamento"] ?></p>
    <p>Descrição: <?= $chamado["descricao"] ?></p>
    <p>Prioridade: <?= $chamado["prioridade"] ?></p>
    <p>Status: <?= $chamado["status"] ?></p>
    <form method="POST">
        <input type="hidden" name="acao" value="atualizar">
        <input type="hidden" name="posicao" value="<?= $posicao ?>">
        <select name="status">
            <option>Aberto</option>
            <option>Em andamento</option>
            <option>Resolvido</option>
        </select>
        <button type="submit">Atualizar</button>
    </form>
        
    
    
    
    <?php } ?>
</body>
</html>
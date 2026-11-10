<?php


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>SISTEMA DE CADASTRO DE PRODUTOS</h1>
    <h2>
        <?php
        if ($produtoEditar) {
            echo "editar produto";
        } else {
            echo "cadastrar produto";
        }
        ?>
        <h2>

            <form method="POST">
                <?php if ($produtoEditar) { ?>
                    <input type="hidden" name="id" value="<?= $produtoEditar['id'] ?>">
                <?php } ?>
                <label>NOME DO PRODUTO</label>
                <input type="text" name="nome" value="<?= $produtoEditar['nome'] ?? '' ?>">
                <br><br>
                <label>PREÇO:</label>
                <input type="text" name="preco" step="0.01" min="0" required value="<?= $produtoEditar['preco'] ?? '' ?>">
                <br><br>
                <label>QUANTIDADE:</label>
                <input type="number" name="quantidade" min="0" required value="<?= $produtoEditar['quantidade'] ?? '' ?>">
                <br><br>
                <?php if ($produtoEditar) { ?>
                    <button type="submit" name="atualizar">ATUALIZAR PRODUTO</button>
                <?php } else { ?>
                    <button type="submit" name="cadastrar">CADASTRAR PEDIDOS</button>
                <?php } ?>
            </form>
            <hr>
            <h2>PRODUTOS CADASTRADOS</h2>
            <table>
                <!-- tr cria uma linha dentro da tebela -->
                <tr>
                    <th>ID</th>
                    <th>NOME</th>
                    <th>PREÇO</th>
                    <th>QUANTIDADE</th>
                    <th>AÇÕES</th>
                </tr>
                <?php foreach ($produtos as $produto){ ?>
                <tr>
                    <!-- td cria uma celula de dados na tabela-->
                    <td> <?= $produto["id"] ?></td>
                    <td><?= htmlspecialchars($produto["nome"]) ?></td>
                    <td>R$ <?= number_format($produto["preco"], 2, ",", ".") ?></td>
                    <td><?= $produto["quantidade"] ?></td>
                </tr>
                <?php } ?>
            </table>
</body>

</html>
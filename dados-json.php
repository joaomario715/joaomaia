<?php

// Verifica se o formulário foi enviado usando o método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $idade = $_POST["idade"];

    // recebe as notas de portugues
    $portugues_prova1 = $_POST["portugues_prova1"];
    $portugues_prova2 = $_POST["portugues_prova2"];
    $portugues_prova3 = $_POST["portugues_prova3"];

    // recebe as notas de matematica
    $matematica_prova1 = $_POST["matematica_prova1"];
    $matematica_prova2 = $_POST["matematica_prova2"];
    $matematica_prova3 = $_POST["matematica_prova3"];

    // recebe nota de historia
    $historia_prova1 = $_POST["historia_prova1"];
    $historia_prova2 = $_POST["historia_prova2"];
    $historia_prova3 = $_POST["historia_prova3"];

    // organiza os dados em um array

    $novoAluno = [
        "nome" => $nome,
        "idade" => $idade,

        "notas" => [
            "portugues" => [
                "prova1" => $portugues_prova1,
                "prova2" => $portugues_prova2,
                "prova3" => $portugues_prova3,
            ],
            
            "matematica" => [
                "prova1" => $matematica_prova1,
                "prova2" => $matematica_prova2,
                "prova3" => $matematica_prova3,
            ],

             "historia" => [
                "prova1" => $historia_prova1,
                "prova2" => $historia_prova2,
                "prova3" => $historia_prova3,
             ],

           
        ]

    ];

    // serve para ler/abri arquivos json

    $conteudoJson = file_get_contents(__DIR__ . "/dados/intro.json");

    // serve para converter json para array php
    // true serve para converter o json em array associativo para php ler
    $alunos = json_decode($conteudoJson, true);

    // adicionar um novo aluno

    $alunos[] = $novoAluno;

    // converter array php para json

    $jsonAtualizado = json_encode(
        $alunos,
        JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE
    );

    // SALVAR NO ARQUIVO JSON

    file_put_contents(__DIR__ . "/dados/intro.json", $jsonAtualizado);
}

// leitura dos dados para exibição

// le o arquivo json
$conteudoJson = file_get_contents(__DIR__ . "/dados/intro.json");

// converte o json para array php
$alunos = json_decode($conteudoJson, true);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>CADASTRO DE NOTAS</h1>
    <form method="POST">
    <Label>Nome:</Label>
    <input type="text" name="nome" required>
    <br><br>
    <label>Idade:</label>
    <input type="number" name="idade" required>
    <h2>Português</h2>
    <label>Prova 1:</label>
    <input type="number" name="portugues_prova1" min="0" max="10" step="0.1" required>
    <br><br>
    <label>Prova 2:</label>
    <input type="number" name="portugues_prova2" min="0" max="10" step="0.1" required>
    <br><br>
    <label>Prova 3:</label>
    <input type="number" name="portugues_prova3" min="0" max="10" step="0.1" required>
    <br><br>
    <h2>Matemática</h2>
    <label>Prova 1:</label>
    <input type="number" name="matematica_prova1" min="0" max="10" step="0.1" required>
    <br><br>
    <label>Prova 2:</label>
    <input type="number" name="matematica_prova2" min="0" max="10" step="0.1" required>
    <br><br>
    <label>Prova 3:</label>
    <input type="number" name="matematica_prova3" min="0" max="10" step="0.1" required>
    <br><br>
    <h2>História</h2>
    <label>Prova 1:</label>
    <input type="number" name="historia_prova1" min="0" max="10" step="0.1" required>
    <br><br>
    <label>Prova 2:</label>
    <input type="number" name="historia_prova2" min="0" max="10" step="0.1" required>
    <br><br>
    <label>Prova 3:</label>
    <input type="number" name="historia_prova3" min="0" max="10" step="0.1" required>
    <br><br>
    <button type="submit">Enviar</button>
    </form>

    <h1>ALUNOS CADASTRADOS</h1>

    <?php foreach ($alunos as $aluno) { ?>
        <h2> <?= $aluno["nome"] ?> </h2>
        <p> Idade: <?= $aluno["idade"] ?> </p>

        <!-- PORTUGUES -->
         <h2>PORTUGUÊS</h2>
         <P>Prova 1: <?= $aluno["notas"]["portugues"]["prova1"] ?> </P>
         <P>Prova 2: <?= $aluno["notas"]["portugues"]["prova2"] ?> </P>
         <P>Prova 3: <?= $aluno["notas"]["portugues"]["prova3"] ?> </P>

        <!-- MATEMATICA -->
         <H2>MATEMÁTICA</H2>
         <P>Prova 1: <?= $aluno["notas"]["matematica"]["prova1"] ?> </P>
         <P>Prova 2: <?= $aluno["notas"]["matematica"]["prova2"] ?> </P>
         <P>Prova 3: <?= $aluno["notas"]["matematica"]["prova3"] ?> </P>

        <!-- HISTORIA -->
         <H2>HISTÓRIA</H2>
         <P>Prova 1: <?= $aluno["notas"]["historia"]["prova1"] ?> </P>
         <P>Prova 2: <?= $aluno["notas"]["historia"]["prova2"] ?> </P>
         <P>Prova 3: <?= $aluno["notas"]["historia"]["prova3"] ?> </P>



    
    <?php } ?>


        





        








 











</body>
</html>
<?php
 
 // camionho do arquivo json
$arquivo = __DIR__ . "/dados/teste.json";

// 1. ler o arquivo json
$conteudo = file_get_contents($arquivo);

//2. transformar  o json em array php
$alunos = json_decode($conteudo, true);

// 3. percorrer todos os alunos
// para cada aluno dentro de $alunos, guarda a posicao dele em $posicao e os dados dele em $aluno
foreach($alunos as $posicao => $aluno){

    // 4. procurar o aluno com nome: "maria"
    if ($aluno["nome"] == "maria") {

    // 5. excluir o aluno
    unset($alunos[$posicao]);

    }
}

// 6. reorganizar as posições do array
$alunos = array_values($alunos);

// 7. transformar array php em json novamente
$json = json_encode($alunos,
JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

// 8. salvar no arquivo
file_put_contents($arquivo, $json);

echo "aluno excluido";






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
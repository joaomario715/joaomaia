<?php

function chamados ($acao, $dados = [], $posicao = 0){
    
    $arquivo = "chamados.json";

    if (!file_exists($arquivo)){

        file_put_contents($arquivo, []);
    }

    $lista = json_decode(file_get_contents($arquivo), true);

    if ($acao == "cadastrar"){
        if ($dados["nome"] == ""){
            return false;
        }

        $dados["status"] = "aberto";
        $lista[] = $dados;
    }

    if ($acao == "atualizar"){
        if (array_key_exists($posicao, $lista) == false){
            return false;
        }

        if ()
    }

}










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

        if ($dados["status"] != "aberto" && $dados["status"] != "em andamento" && $dados["status"] != "resolvido"){
            return false;
        }

        $lista[$posicao]["status"] = $dados["status"];
    }

    if ($acao == "excluir"){
        if (array_key_exists($posicao, $lista) == false){
            return false;
        }

        unset($lista[$posicao]);
        $lista = array_values($lista);
    }

    if ($acao == "consultar"){
        return $lista;
    }

    if ($acao == "relatorio"){
        $abertos = 0;
        $andamento = 0;
        $resolvidos = 0;

        foreach($lista as $c){
            if($c["status"] == "aberto"){
                $abertos++;
            }

            if($c["status"] == "em andamento"){
                $andamento++;
            }

            if($c["status"] == "resolvido"){
                $resolvidos++;
            }
        }

        return[$abertos, $andamento, $resolvidos];
    }

    file_put_contents($arquivo, json_encode($lista));

    return true;

}
?>









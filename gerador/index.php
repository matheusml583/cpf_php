<?php
// ABC.DEF.GHI-JK
// 196.080.967-90

// "ABCDEFGH" SÃO DEFINIDOS PELA RF
// "I" DEFINE A REGIÃO FISCAL RESPONSÁVEL PELA INSCRIÇÃO
// "J" DIGITO VERIFICADOR DOS PRIMEIROS 9 DÍGITOS
// "K" DIGITO VERIFICADOR DOS 9 ANTES DELE

// CÁLCULO:
// ### PARTE 1 ###
// SE((10A  + 9B + 8C... + 2I) % 11 == (1 || 0)) ENTÃO I == "0"
// SE NÃO I == "11 - RESTO DA DIVISÃO"
// ### PARTE 2 ###
// SE((10B + 9C + 8D... + 2J) % 11 == (1 || 0)) ENTÃO J == "0
// SE NÃO J == "11 - RESTO DA DIVISÃO"

function getCheckers($cpf){
    $checker_j = getJ($cpf)[0];
    $cpf = getJ($cpf)[1];
    $checker_k = getK($cpf);
    return [$checker_j, $checker_k];
}

function getJ($cpf){
    $multiplicador = 10;
    $soma = 0;
    for($j = 0; $j < 9; $j++){
        $soma += $cpf[$j] * $multiplicador;
        $multiplicador--;
    }
    if($soma % 11 == 0 || $soma % 11 == 1 ){
        $checker_j = 0;
    }
    else{
        $checker_j = 11 - ($soma % 11);
    }
    $cpf[9] = $checker_j;
    return [$checker_j, $cpf];
}

function getK($cpf){
    $multiplicador = 10;
    $soma = 0;
    for($k = 1; $k < 10; $k++){
        $soma += $cpf[$k] * $multiplicador;
        $multiplicador--;
    }
    if($soma % 11 == 0 || $soma % 11 == 1 ){
        $checker_k = 0;
    }
    else{
        $checker_k = 11 - ($soma % 11);
    }
    return $checker_k;
}

$cpf_formatado = "";
$cpf_em_analise = [];
$trigger = 0;

for($i = 1; $i < 10; $i++){
    $num_aleatorio = rand(0, 9);
    $cpf_formatado .= $num_aleatorio;
    $cpf_em_analise[] += $num_aleatorio;
    if($i % 3 == 0){
        $trigger++;
        switch ($trigger){
            case 3:
                $cpf_formatado .= "-";
            break;
            default:
                $cpf_formatado .= ".";
            break;
        }
    }
}

$checkers = getCheckers($cpf_em_analise);
$cpf_formatado .= $checkers[0];
$cpf_formatado .= $checkers[1];
echo $cpf_formatado;
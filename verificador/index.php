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

// $cpf = "196.080.967-90 \n";
$cpf = "165.392.487-09 \n";
$cpf = explode("-", $cpf);
$cpf[0] = str_replace(".", "", $cpf[0]);

$j_recebido = $cpf[1][0];
$k_recebido = $cpf[1][1];

if(verificador($cpf, $j_recebido)){
    if(verificador($cpf, $k_recebido, $j_recebido)){
        resposta();
    }
    else{
        resposta("K errado!", 1);
    }
}
else{
    resposta("J errado!", 1);
}

function resposta($resp = "", $trigger = 0){
    if($trigger == 0){
        echo "CPF VALIDADO! \n";
    }
    else{
        echo $resp . "\nCPF INVÀLIDO!";
    }
}

function verificador($cpf, $param, $trigger = ""){
    $multiplicador = 10;
    $soma_total = 0;

    if($trigger == ""){
        for($i = 0; $i < 9; $i++){
            $soma_total += $cpf[0][$i] * $multiplicador;
            $multiplicador--;
        }
    }
    else{
        $cpf[0][9] = $trigger;
        for($i = 1; $i < 10; $i++){
            $soma_total += $cpf[0][$i] * $multiplicador;
            $multiplicador--;
        }
    }

    if($soma_total % 11 == 0 || $soma_total % 11 == 1){
        if($param == 0){
            return 1;
        }
        else{
            return 0;
        }
    }
    else{
        if($soma_total % 11 == 11 - $param){
            return 1;
        }
        else{
            return 0;
        }
    }
}
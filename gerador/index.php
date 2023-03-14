<!-- ABC.DEF.GHI-JK -->
<!-- 196.080.967-90 -->

<!-- "ABCDEFGH" SÃO DEFINIDOS PELA RF -->
<!-- "I" DEFINE A REGIÃO FISCAL RESPONSÁVEL PELA INSCRIÇÃO  -->
<!-- "J" DIGITO VERIFICADOR DOS PRIMEIROS 9 DÍGITOS -->
<!-- "K" DIGITO VERIFICADOR DOS 9 ANTES DELE -->

<!-- CÁLCULO: -->
<!-- ### PARTE 1 ### -->
<!-- SE((10A  + 9B + 8C... + 2I) % 11 == (1 || 0)) ENTÃO I == "0" -->
<!-- SE NÃO I == "11 - RESTO DA DIVISÃO" -->
<!-- ### PARTE 2 ### -->
<!-- SE((10B + 9C + 8D... + 2J) % 11 == (1 || 0)) ENTÃO J == "0 -->
<!-- SE NÃO J == "11 - RESTO DA DIVISÃO" -->

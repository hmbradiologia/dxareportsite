<?php
require_once("conecta.php");

function inserePaciente($conexao, $nome, $sexo, $dnasc, $dexame, $tslomb, $tscolo, $tsft, $dmolomb, $dmocolo, $dmoft, $zslomb, $zscolo, $zsft,    $selecionada) {
    $query = "insert into pacientes (nome, sexo, dnasc, dexame, tslomb, tscolo, tsft, dmolomb, dmocolo, dmoft, zslomb, zscolo, zsft, selecionada) 
    values ('{$nome}', '{$sexo}', '{$dnasc}', '{$dexame}', '{$tslomb}', '{$tscolo}', '{$tsft}', '{$dmolomb}', '{$dmocolo}', '{$dmoft}',
    '{$zslomb}', '{$zscolo}', '{$zsft}', '{$selecionada}')";

    return mysqli_query($conexao, $query);
}

function insereComposicao($conexao, $nome, $sexo, $dnasc, $dexame, $peso, $altura, $imc, $bmc, $dmot, $zstotal, $mmagra, $mapend, $mtotal, $gorduratotal, $gorduraporc, $indgord, $relag, $selecionada) {
    $query = "insert into composicaocorpo (nome, sexo, dnasc, dexame, peso, altura, imc, bmc, dmot, zstotal, mmagra, mapend, mtotal, gorduratotal, 
	gorduraporc, indgord, relag, selecionada) 
    values ('{$nome}', '{$sexo}', '{$dnasc}', '{$dexame}', '{$peso}', '{$altura}', '{$imc}','{$bmc}', '{$dmot}', '{$zstotal}', '{$mmagra}', '{$mapend}', '{$mtotal}', '{$gorduratotal}', '{$gorduraporc}', '{$indgord}', '{$relag}', '{$selecionada}')";

    return mysqli_query($conexao, $query);
}

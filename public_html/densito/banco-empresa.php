<?php
require_once("conecta.php");

function listaEmpresa($conexao) {
    $empresas = array();
    $resultado = mysqli_query($conexao, "select * from empresa");

    while($empresa = mysqli_fetch_assoc($resultado)) {
        array_push($empresas, $empresa);
    }

    return $empresas;
}

function insereEmpresa($conexao, $empresa, $cep, $rua, $bairro, $cidade, $uf, $contato, $cnpj, $diretor, $cpfdiretor, $equipamento) {
    $query = "insert into empresa (empresa, cep, rua, bairro, cidade, uf, contato, cnpj, diretor, cpfdiretor, equipamento)
    values ('{$empresa}', '{$cep}', '{$rua}', '{$bairro}', '{$cidade}', '{$uf}', '{$contato}', '{$cnpj}', '{$diretor}', '{$cpfdiretor}', '{$equipamento}')";
    return mysqli_query($conexao, $query);
}

function alteraEmpresa($conexao, $id, $empresa, $cep, $rua, $bairro, $cidade, $uf, $contato, $cnpj, $diretor, $cpfdiretor, $equipamento) {
    $query = "update empresa set empresa = '{$empresa}', cep = '{$cep}', rua = '{$rua}', bairro = '{$bairro}', cidade = '{$cidade}', uf = '{$uf}', contato = '{$contato}', cnpj = '{$cnpj}', diretor = '{$diretor}', cpfdiretor = '{$cpfdiretor}', equipamento = '{$equipamento}' where id = '{$id}'";
    return mysqli_query($conexao, $query);
}

function removeEmpresa($conexao, $id) {
    $query = "delete from empresa where id = {$id}";
    return mysqli_query($conexao, $query);
}

function buscaEmpresa($conexao, $id) {
    $query = "select * from empresa where id = {$id}";
    $resultado = mysqli_query($conexao, $query);
    return mysqli_fetch_assoc($resultado);
}


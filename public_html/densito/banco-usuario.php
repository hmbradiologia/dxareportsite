<?php
require_once("conecta.php");

function buscaUsuario($conexao, $id, $email, $senha) {
    $senhaMd5 = md5($senha);
    $email = mysqli_real_escape_string($conexao, $email);
    $query = "select * from usuarios where email='{$email}' and senha='{$senhaMd5}'";
    $resultado = mysqli_query($conexao, $query);
    $usuario = mysqli_fetch_assoc($resultado);
    return $usuario;
}

function listaMedico($conexao) {
    $medicos = array();
    $resultado = mysqli_query($conexao, "select * from usuarios");
    
    while($medico = mysqli_fetch_assoc($resultado)) {
        array_push($medicos, $medico);
    }

    return $medicos;
}

function buscaMedico($conexao, $id) {
    $query = "select * from usuarios where id = {$id}";
    $resultado = mysqli_query($conexao, $query);
    return mysqli_fetch_assoc($resultado);
}

function listaUsuario($conexao) {
    $usuarios = array();
    $resultado = mysqli_query($conexao, "select * from usuarios");

    while($usuario = mysqli_fetch_assoc($resultado)) {
        array_push($usuarios, $usuario);
    }

    return $usuarios;
}

function insereUsuario($conexao, $email, $senha, $medico, $nomemedico, $crm, $contato) {
    $senhaMd5 = md5($senha);
    $query = "insert into usuarios (email, senha, medico, nomemedico, crm, contato)
    values ('{$email}', '{$senhaMd5}', '{$medico}', '{$nomemedico}', '{$crm}', '{$contato}')";
    return mysqli_query($conexao, $query);
}

function alteraUsuario($conexao, $id, $email, $senha, $medico, $nomemedico, $crm, $contato) {
    $senhaMd5 = preg_match('/^[a-f0-9]{32}$/', $senha) ? $senha : md5($senha);
    $query = "update usuarios set email = '{$email}', senha = '{$senhaMd5}', medico = '{$medico}', nomemedico = '{$nomemedico}', crm = '{$crm}', contato = '{$contato}' where id = '{$id}'";
    return mysqli_query($conexao, $query);
}

function removeUsuario($conexao, $id) {
    $query = "delete from usuarios where id = {$id}";
    return mysqli_query($conexao, $query);
}

function buscaUsuarioId($conexao, $id) {
    $query = "select * from usuarios where id = {$id}";
    $resultado = mysqli_query($conexao, $query);
    return mysqli_fetch_assoc($resultado);
}
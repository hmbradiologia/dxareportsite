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

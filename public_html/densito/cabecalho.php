<?php
error_reporting(E_ALL ^ E_NOTICE);
require_once("mostra-alerta.php"); ?>

<html>
<head>
    <title>EMPRESAS</title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <link href="css/reset.css" rel="stylesheet" />
   <link href="css/bootstrap.css" rel="stylesheet" />
   <link href="css/formularios.css" rel="stylesheet" />
</head>

<body>
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
                    <ul class="nav navbar-nav">
                    <li><a href="formulariotscore.php" class="navbar-brand">TSCORE</a></li>
                    <li><a href="formulariozscore.php" class="navbar-brand">ZSCORE</a></li>
                    <li><a href="formularioantebraco.php" class="navbar-brand">Antebraço</a></li>
                    <li><a href="formulariocomposicao.php" class="navbar-brand">Composição Corporal</a></li>
                    <li><a href="empresa-formulario.php">Adiciona empresa</a></li>
                    <li><a href="empresa-lista.php">Empresas</a></li>
                    <li><a href="usuario-lista.php">Usuários</a></li>
                    <li><a href="usuario-formulario.php">Adiciona usuário</a></li>
                    <li><a href="index.php">Login</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container">

    <div class="principal">

        <?php
        mostraAlerta("success");
        mostraAlerta("danger");
        ?>

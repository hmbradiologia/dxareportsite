<?php require_once("cabecalho.php");
      require_once("banco-usuario.php");
      require_once("logica-usuario.php");

$id = $_POST['id'];
removeUsuario($conexao, $id);
$_SESSION["success"] = "Usuário removido com sucesso.";
header("Location: usuario-lista.php");
die();
?>

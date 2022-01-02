<?php require_once("cabecalho.php");
      require_once("banco-empresa.php");
      require_once("logica-usuario.php");

$id = $_POST['id'];
removeEmpresa($conexao, $id);
$_SESSION["success"] = "Empresa removida com sucesso.";
header("Location: empresa-lista.php");
die();
?>

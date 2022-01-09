<?php require_once("cabecalho.php");
      require_once("banco-usuario.php"); 

$id = $_POST["id"];
$email=$_POST["email"];
$senha=$_POST["senha"];
$medico=$_POST["medico"];
$nomemedico=$_POST["nomemedico"];
$crm=$_POST["crm"];
$contato=$_POST["contato"];


if(alteraUsuario($conexao, $id, $email, $senha, $medico, $nomemedico, $crm, $contato)) { ?>
    <p class="text-success">O usuário <?= $usuario; ?>, alterado com sucesso!</p>
<?php } else {
    $msg = mysqli_error($conexao);
?>
    <p class="text-danger">O usuário <?= $usuario; ?> não foi alterado: <?= $msg ?></p>
<?php
}
?>
<?php require_once("rodape.php"); ?>
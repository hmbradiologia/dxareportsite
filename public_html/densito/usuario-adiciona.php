<?php require_once("cabecalho.php");
      require_once("banco-usuario.php");
      require_once("logica-usuario.php");

verificaUsuario();

$email=$_POST["email"];
$senha=$_POST["senha"];
$medico=$_POST["medico"];
$nomemedico=$_POST["nomemedico"];
$crm=$_POST["crm"];
$contato=$_POST["contato"];


if(insereUsuario($conexao, $email, $senha, $medico, $nomemedico, $crm, $contato)) { ?>
    <p class="text-success">O usuário <?= $usuario; ?> adicionado com sucesso!</p>
<?php } else {
    $msg = mysqli_error($conexao);
?>
    <p class="text-danger">O usuário <?= $usuario; ?> não foi adicionado: <?= $msg ?></p>
<?php
}
?>

<?php require_once("rodape.php"); ?>
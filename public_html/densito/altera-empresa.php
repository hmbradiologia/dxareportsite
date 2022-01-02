<?php require_once("cabecalho.php");
      require_once("banco-empresa.php"); 

$id = $_POST["id"];
$empresa=$_POST["empresa"];
$cep=$_POST["cep"];
$rua=$_POST["rua"];
$bairro=$_POST["bairro"];
$cidade=$_POST["cidade"];
$uf=$_POST["uf"];
$contato=$_POST["contato"];
$cnpj=$_POST["cnpj"];
$diretor=$_POST["diretor"];
$cpfdiretor=$_POST["cpfdiretor"];
$equipamento=$_POST["equipamento"];


if(alteraEmpresa($conexao, $id, $empresa, $cep, $rua, $bairro, $cidade, $uf, $contato, $cnpj, $diretor, $cpfdiretor, $equipamento)) { ?>
    <p class="text-success">A empresa <?= $empresa; ?>, alterada com sucesso!</p>
<?php } else {
    $msg = mysqli_error($conexao);
?>
    <p class="text-danger">A empresa <?= $empresa; ?> não foi alterada: <?= $msg ?></p>
<?php
}
?>
<?php require_once("rodape.php"); ?>
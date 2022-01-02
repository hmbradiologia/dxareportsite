<?php require_once("cabecalho.php");
      require_once("banco-empresa.php");

$id = $_GET['id'];
$empresa = buscaEmpresa($conexao, $id);


?>

<h1>Alterando empresa</h1>
<form action="altera-empresa.php" method="post">
    <input type="hidden" name="id" value="<?=$empresa['id']?>" />
    <table class="table">

        <?php include("empresa-formulario-base.php"); ?>

        <tr>
            <td><button class="btn btn-primary" type="submit">Alterar</button></td>
        </tr>
    </table>
</form>
<?php require_once("rodape.php"); ?>
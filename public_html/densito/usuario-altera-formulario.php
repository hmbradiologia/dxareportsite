<?php require_once("cabecalho.php");
      require_once("banco-usuario.php");

$id = $_GET['id'];
$usuario = buscaUsuarioId($conexao, $id);


?>

<h1>Alterando usuário</h1>
<form action="usuario-altera.php" method="post">
    <input type="hidden" name="id" value="<?=$usuario['id']?>" />
    <table class="table">

        <?php include("usuario-formulario-base.php"); ?>

        <tr>
            <td><button class="btn btn-primary" type="submit">Alterar</button></td>
        </tr>
    </table>
</form>
<?php require_once("rodape.php"); ?>
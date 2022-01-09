<?php require_once("cabecalho.php");
      require_once("logica-usuario.php");

verificaUsuario();

$usuario = array("email" => "", "senha" => "", "medico" => "", "nomemedico" => "",  "crm" => "", "contato" => "");

?>

<meta http-equiv="Content-Type" content="text/html; charset="utf-8">

<h1>Formulário de usuários</h1>

<form action="usuario-adiciona.php" method="post">
    <table class="table">

        <?php include("usuario-formulario-base.php"); ?>

        <tr>
            <td><button class="btn btn-primary" type="submit">Cadastrar</button></td>
        </tr>
    </table>
</form>

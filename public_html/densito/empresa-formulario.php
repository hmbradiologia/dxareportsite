<?php require_once("cabecalho.php");
      require_once("logica-usuario.php");

verificaUsuario();

$empresa = array("empresa" => "", "cep" => "", "rua" => "", "bairro" => "",  "cidade" => "", "uf" => "", "contato" => "",
 "cnpj" => "", "diretor" => "", "cpfdiretor" => "", "equipamento" =>"");

?>

<meta http-equiv="Content-Type" content="text/html; charset="utf-8">

<h1>Formulário de empresas</h1>

<form action="adiciona-empresa.php" method="post">
    <table class="table">

        <?php include("empresa-formulario-base.php"); ?>

        <tr>
            <td><button class="btn btn-primary" type="submit">Cadastrar</button></td>
        </tr>
    </table>
</form>

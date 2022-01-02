<?php require_once("cabecalho.php");
      require_once("banco-empresa.php"); 
      require_once("logica-usuario.php");
    verificaUsuario();
?>

<meta http-equiv="Content-Type" content="text/html; charset="utf-8">

<table class="table table-striped table-bordered">

<tr>
        <td>NOME DA EMPRESA</td>
        <td>CEP</td>
        <td>ENDEREÇO</td>
        <td>BAIRRO</td>
        <td>CIDADE</td>
        <td>ESTADO</td>
        <td>CONTATOS</td>
        <td>CNPJ</td>
        <td>DIRETOR</td>
        <td>CPF DIRETOR</td>
        <td>EQUIPAMENTO</td>
</tr>
    <?php
        $empresas = listaEmpresa($conexao);
        foreach($empresas as $empresa) :
    ?>
    
    <tr>
        <td><?= $empresa['empresa'] ?></td>
        <td><?= $empresa['cep'] ?></td>
        <td><?= $empresa['rua'] ?></td>
        <td><?= $empresa['bairro'] ?></td>
        <td><?= $empresa['cidade'] ?></td>
        <td><?= $empresa['uf'] ?></td>
        <td><?= $empresa['contato'] ?></td>
        <td><?= $empresa['cnpj'] ?></td> 
        <td><?= $empresa['diretor'] ?></td>
        <td><?= $empresa['cpfdiretor'] ?></td>
        <td><?= $empresa['equipamento'] ?></td>

        <td><a class="btn btn-primary" href="empresa-altera-formulario.php?id=<?=$empresa['id']?>">alterar</a></td>
        <td>
            <form action="remove-empresa.php" method="post">
                <input type="hidden" name="id" value="<?=$empresa['id']?>" />
                <button class="btn btn-danger">remover</button>
            </form>
        </td>
    </tr>
    <?php
        endforeach
    ?>
</table>
   
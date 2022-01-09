<?php require_once("cabecalho.php");
      require_once("banco-usuario.php"); 
      require_once("logica-usuario.php");
    verificaUsuario();
?>

<meta http-equiv="Content-Type" content="text/html; charset="utf-8">

<table class="table table-striped table-bordered">

<tr>
        <td>EMAIL</td>
        <td>MÉDICO</td>
        <td>NOME MÉDICO</td>
        <td>CRM</td>
        <td>CONTATO</td>
</tr>
    <?php
        $usuarios = listaUsuario($conexao);
        foreach($usuarios as $usuario) :
    ?>
    
    <tr>
        <td><?= $usuario['email'] ?></td>
        <td><?= $usuario['medico'] ?></td>
        <td><?= $usuario['nomemedico'] ?></td>
        <td><?= $usuario['crm'] ?></td>
        <td><?= $usuario['contato'] ?></td>

        <td><a class="btn btn-primary" href="usuario-altera-formulario.php?id=<?=$usuario['id']?>">alterar</a></td>
        <td>
            <form action="usuario-remove.php" method="post">
                <input type="hidden" name="id" value="<?=$usuario['id']?>" />
                <button class="btn btn-danger">remover</button>
            </form>
        </td>
    </tr>
    <?php
        endforeach
    ?>
</table>
   
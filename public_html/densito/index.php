<?php require_once("cabecalho.php");
      require_once("logica-usuario.php"); ?>

<h1>Bem vindo!</h1>

<?php if(usuarioEstaLogado()) { ?>
    <p class="text-success">Você está logado como <?= usuarioLogado() ?>. <a href="logout.php">Deslogar</a></p>
<?php } else { ?>
    <h2>Login</h2>
    <form action="login.php" method="post">
        <table class="table">
            <tr>
                <td>Email</td>
                <td><input class="form-control" type="text" name="email"></td>
            </tr>
            <tr>
                <td>Senha</td>
                <td><input class="form-control" type="password" name="senha"></td>
            </tr>
            <tr>
                
                <td><button class="btn btn-primary" type="submit">Login</button></td>
            </tr>
        </table>
    </form>
<?php } ?>

<?php require_once("rodape.php"); ?>
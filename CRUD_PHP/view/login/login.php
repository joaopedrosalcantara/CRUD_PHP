<?php include 'view/inicioHtml.php';  ?>

<form method="POST" ">
        <b><label style="width: 100%;text-align: center;">Login</label></b></br>
        <label>Usuario</label></br>
        <input type="text" name="usuario" class="form-control"></br>
        <label>Senha</label></br>
        <input type="password" name="senha" class="form-control"></br></br>
        <input type="submit" value="Entrar" class="btn btn-primary" style="margin-top: -40px;">
</form>
<?php include 'view/fimHtml.php';  ?>
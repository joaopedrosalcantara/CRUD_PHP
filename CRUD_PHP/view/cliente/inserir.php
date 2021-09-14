<?php 

if(!isset($_SESSION)){
    header('Location: ../../login');
    exit();
}
    if( $_SESSION['logado']==3){
        header('Location: listar');
        exit();
    }

include 'view/inicioHtml.php';
?>


    <form method="POST">
        <b><label style="width: 100%;text-align: center;">Inserir</label></b></br>
        <label>Nome</label></br>
        <input type="text" name="nome" required></br>
        <label>CPF</label></br>
        <input type="text" name="cpf" required></br>
        <label>RG</label></br>
        <input type="text" name="rg" required></br>
        <label>Data de Nascimento</label></br>
        <input type="text" name="dataNascimento" required></br>
        <label>Telefone</label></br>
        <input type="text" name="telefone" required></br>
        <label>email</label></br>
        <input type="email" name="email" required></br></br>
        <input type="submit" class="btn btn-primary">
        <a href="listar" class="btn btn-secondary">Voltar</a>
        
    </form>

<?php include 'view/fimHtml.php';  ?>
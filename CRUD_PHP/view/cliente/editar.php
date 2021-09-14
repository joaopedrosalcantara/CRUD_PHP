<?php

if(!isset($_SESSION)){
    header('Location: ../../login');
    exit();
}   
if( $_SESSION['logado']==3 || $_SESSION['logado']==2){
    header('Location: listar');
    exit();
}

include 'view/inicioHtml.php';
?>


    <form method="POST">
        <b><label style="width: 100%;text-align: center;">Editar</label></b></br>
        <input type="hidden" name="id" value="<?= $cliente->getId() ?>">
        <label>Nome</label></br>
        <input type="text" name="nome" required value="<?= $cliente->getNome() ?>"></br>
        <label>CPF</label></br>
        <input type="text" name="cpf" required value="<?= $cliente->getCpf() ?>"></br>
        <label>RG</label></br>
        <input type="text" name="rg" required value="<?= $cliente->getRg() ?>"></br>
        <label>Data de Nascimento</label></br>
        <input type="text" name="dataNascimento" required value="<?= $cliente->getDataNascimento() ?>"></br>
        <label>Telefone</label></br>
        <input type="text" name="telefone" required value="<?= $cliente->getTelefone() ?>"></br>
        <label>email</label></br>
        <input type="email" name="email" required value="<?= $cliente->getEmail() ?>"></br></br>
        <input type="submit" class="btn btn-primary">
        <a href="listar" class="btn btn-secondary">Voltar</a>
        
    </form>

<?php include 'view/fimHtml.php';  ?>
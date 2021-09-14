<?php  
    if(!isset($_SESSION)){
        header('Location: ../../login');
        exit();
    }

 include 'view/inicioHtml.php';  
 ?>
<?php if($_SESSION['logado'] == 1 || $_SESSION['logado'] == 2){ ?>
<a href="inserir" class="btn btn-success">Inserir</a>
<?php } ?>
    <table class="table">
        
        <th>Id</th>
        <th>Nome</th>
        <th>CPF</th>
        <th>RG</th>
        <th>Data de Nascimento</th>
        <th>Telefone</th>
        <th>Email</th>
        <?php if($_SESSION['logado'] == 1 ){ ?>
        <th>Editar</th>
        <th>Excluir</th>
        <?php } ?>
        
        <?php foreach ($clientes as $cliente){ ?>
        <tr>
        
            <td><?= $cliente['id'] ?></td>
            <td><?= $cliente['nome'] ?></td>
            <td><?= $cliente['cpf'] ?></td>
            <td><?= $cliente['rg'] ?></td>
            <td><?= $cliente['dataNascimento'] ?></td>
            <td><?= $cliente['telefone'] ?></td>
            <td><?= $cliente['email'] ?></td>
            <?php if($_SESSION['logado'] == 1 ){ ?>
            <td><a href="editar?id=<?= $cliente['id'] ?>" class="btn btn-primary">Editar</a></td>
            <td><a href="excluir?id=<?= $cliente['id'] ?>" class="btn btn-danger">Excluir</a></td>
            <?php } ?>
            
        </tr>
        <?php } ?>
          

    </table>
<a href="logout" class="btn btn-primary">Sair</a>
<a href="json" class="btn btn-primary">Json</a>
<?php include 'view/fimHtml.php';  ?>
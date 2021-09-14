<?php
/**
 * 
 * @author João Pedro Soares
 */
class controllerCliente {
    
    public function listar()
    {
        $lista = new cliente();
        $clientes = $lista->listar();
        include 'view/cliente/listar.php';
    }

    public function inserir()
    {
        include 'view/cliente/inserir.php';
        
        if(isset($_POST['email'])){
            $nome = $_POST['nome'];
            $cpf = $_POST['cpf'];
            $rg = $_POST['rg'];
            $dataNascimento = $_POST['dataNascimento'];
            $telefone = $_POST['telefone'];
            $email = $_POST['email'];
            
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            $erro = 0;
            if(is_null($email) || $email === false){
                echo 'email invalido <br/>';
                $erro = 1 ;
            }
            if(strlen($cpf)!= 11 || is_null($cpf) || !is_numeric($cpf)){
                echo 'CPF inválido <br/>';
                $erro = 1;
            }
            if(strlen($telefone)<8 || !is_numeric($telefone) || is_null($telefone)){
                echo 'Telefone inválido <br/>';
                $erro = 1;
            }
            if(strlen($dataNascimento)<8 || is_null($dataNascimento)){
                echo 'Data de nascimento inválida <br/>';
                $erro == 1;
            }
            if($erro === 0){
            $cliente = new cliente();
            $cliente->inserir($nome, $cpf, $rg, $dataNascimento, $telefone, $email);
            header('Location: listar');
            }
        }
    }
    public function editar()
    {
        $id = $_GET['id'];
        $cliente = new cliente($id);
        include 'view/cliente/editar.php';
        
        if(isset($_POST['id'])){
            
            $idPost = $_POST['id'];
            $nome = $_POST['nome'];
            $cpf = $_POST['cpf'];
            $rg = $_POST['rg'];
            $dataNascimento = $_POST['dataNascimento'];
            $telefone = $_POST['telefone'];
            $email = $_POST['email'];
            
             $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            $erro = 0;
            if(is_null($email) || $email === false){
                echo 'email invalido <br/>';
                $erro = 1 ;
            }
            if(strlen($cpf)!= 11 || is_null($cpf) || !is_numeric($cpf)){
                echo 'CPF nao e valido <br/>';
                $erro = 1;
            }
            if(strlen($telefone)<8 || !is_numeric($telefone) || is_null($telefone)){
                echo 'Telefone invalido <br/>';
                $erro = 1;
            }
            if(strlen($dataNascimento)<8 || is_null($dataNascimento)){
                echo 'data de nascimento invalida <br/>';
                $erro == 1;
            }
            if($erro === 0){
                
                $cliente = new cliente();
                $cliente->editar($idPost, $nome, $cpf, $rg, $dataNascimento, $telefone, $email);
                header('Location: listar');
            }
        
        }
    }
    public function excluir()
    {
        if(!isset($_SESSION)){
            header('Location: ../login');
            exit();
        }
        if( $_SESSION['logado']==1){
            $id = $_GET['id'];

            $cliente = new cliente();
            $cliente->excluir($id);

            header('Location: listar');
        }else{       
            header('Location: listar');
        }
    }
    public function json()
    {
        $lista = new cliente();
        $clientes = $lista->listar();
        
        echo json_encode($clientes);
    }
}

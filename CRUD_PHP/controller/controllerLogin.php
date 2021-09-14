<?php

/**
 * 
 * @author João Pedro Soares
 */
class controllerLogin {
    public function login()
    {
        include 'view/login/login.php';
        
        if(isset($_POST['usuario']) && isset($_POST['senha'])){
            
            $usuario = $_POST['usuario'];
            $senha = $_POST['senha'];
            
            $logar = new login();
            $logado = $logar->loginUsuario($usuario, $senha);
            
            session_start();
            if($logado==1){
                $_SESSION['logado']=1;
                header('Location: listar');
            }else if($logado==2){
                $_SESSION['logado']=2;
                header('Location: listar');
            }else if($logado==3){
                $_SESSION['logado']=3;
                header('Location: listar');
            }else{
                header('Location: login');
            }         
        }
    }
    public function logout()
    {
        session_destroy();
        header('Location: login');
    }
}

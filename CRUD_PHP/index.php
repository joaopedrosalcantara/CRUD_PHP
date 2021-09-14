<?php

require 'model/config.php';
require 'controller/controllerCliente.php';
require 'model/cliente.php';
require 'model/login.php';
require 'controller/controllerLogin.php';

session_start();

if(!isset($_SESSION['logado']) && $_SERVER['PHP_SELF']!= '/CRUD_PHP/index.php/login'){
    header('Location: login');
    exit();
}




switch ($_SERVER['PHP_SELF']){
    
    case '/CRUD_PHP/index.php/inserir':
        $controlador = new controllerCliente();
        $controlador->inserir();
        break;
    case '/CRUD_PHP/index.php/listar':
        $controlador = new controllerCliente();
        $controlador->listar();
        break;
    case '/CRUD_PHP/index.php/editar':
        $controlador = new controllerCliente();
        $controlador->editar();
        break;
    case '/CRUD_PHP/index.php/excluir':
        $controlador = new controllerCliente();
        $controlador->excluir();
        break;
    case '/CRUD_PHP/index.php/login':
        $controlador = new controllerLogin();
        $controlador->login();
        break;
    case '/CRUD_PHP/index.php/logout':
        $controlador = new controllerLogin();
        $controlador->logout();
        break;
    case '/CRUD_PHP/index.php/json':
        $controlador = new controllerCliente();
        $controlador->json();
        break;
    default :
        echo '404';
        break;
           
    
}
















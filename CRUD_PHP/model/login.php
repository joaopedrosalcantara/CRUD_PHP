<?php

/**
 * 
 * @author João Pedro Soares
 */
class login {
    public function loginUsuario($usuario, $senha)
    {
        $query = "SELECT usuario, senha, tipo FROM usuarios";
        $conexao = config::conexao();
        $stmt = $conexao->prepare($query);
        $stmt->execute();
        $contas = $stmt->fetchAll();
        foreach ($contas as $conta){
            if($conta['usuario']===$usuario && $conta['senha']===$senha){
                return $conta['tipo'];
            }
            
        }
    }
}

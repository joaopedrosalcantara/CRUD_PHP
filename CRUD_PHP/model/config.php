<?php


class config {
    public static function conexao()
    {
        $conexao = new PDO('mysql:host=127.0.0.1;dbname=crud_php', 'root', '');
        return $conexao;
    }  
}

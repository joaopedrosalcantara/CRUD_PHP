<?php
/**
 * 
 * @author João Pedro Soares
 */

class cliente{
    
    private $id;
    private $nome;
    private $cpf;
    private $rg;
    private $dataNascimento;
    private $telefone;
    private $email;

    public function __construct($id = false) {
        $this->id = $id;
        $this->carregar($id);
    }
    public function carregar($id)
    {
        $query = "SELECT nome, cpf, rg, dataNascimento, telefone, email FROM clientes WHERE id=:id";
        $conexao = config::conexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $cliente = $stmt->fetch();
        
        $this->nome = $cliente['nome'];
        $this->cpf = $cliente['cpf'];
        $this->rg = $cliente['rg'];
        $this->dataNascimento = $cliente['dataNascimento'];
        $this->telefone = $cliente['telefone'];
        $this->email = $cliente['email'];
    }

    public function listar()
    {
        $query = "SELECT id,nome,cpf,rg,dataNascimento,telefone,email FROM clientes";
        $conexao = config::conexao();
        $stmt = $conexao->prepare($query);
        $stmt->execute();
        $clientes = $stmt->fetchAll();
        return $clientes;
    }

    public function inserir($nome, $cpf, $rg, $dataNascimento, $telefone, $email)
    {
        
        $query = "INSERT INTO clientes (nome,cpf,rg,dataNascimento,telefone,email) VALUES (:nome,:cpf,:rg,:dataNascimento,:telefone,:email)";
        $conexao = config::conexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':cpf', $cpf);
        $stmt->bindValue(':rg', $rg);
        $stmt->bindValue(':dataNascimento', $dataNascimento);
        $stmt->bindValue(':telefone', $telefone);
        $stmt->bindValue(':email', $email);
        $stmt->execute();       
    }
    public function editar($id, $nome, $cpf, $rg, $dataNascimento, $telefone, $email)
    {
        $query = "UPDATE clientes SET nome=:nome, cpf=:cpf,rg=:rg,dataNascimento=:dataNascimento,telefone=:telefone,email=:email WHERE id=:id";
        $conexao = config::conexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':cpf', $cpf);
        $stmt->bindValue(':rg', $rg);
        $stmt->bindValue(':dataNascimento', $dataNascimento);
        $stmt->bindValue(':telefone', $telefone);
        $stmt->bindValue(':email', $email);
        $stmt->execute();       
    }
    public function excluir($id)
    {
        $query = "DELETE FROM clientes WHERE id=:id";
        $conexao = config::conexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }

    public function getId()
    {
        return $this->id;
    }
    public function getNome()
    {
        return $this->nome;
    }
    public function getCpf()
    {
        return $this->cpf;
    }
    public function getRg()
    {
        return $this->rg;
    }
    public function getDataNascimento()
    {
        return $this->dataNascimento;
    }
    public function getTelefone()
    {
        return $this->telefone;
    }
    public function getEmail()
    {
        return $this->email;
    }
}

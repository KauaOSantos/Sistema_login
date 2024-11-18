<?php
class Usuario {
    private $conexao;
    private $tabela = 'usuario';

    public function __construct($bd){
        $this->conexao = $bd;
    }

    protected $nome;
    protected $data_nascimento;
    protected $email;
    protected $senha;
    protected $endereco;
}
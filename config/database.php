<?php

class banco {
    const host = 'localhost';
    const banco = 'sistema_login';
    const usuario = 'root';
    const senha = '';
    public $conexao;

    public function conectar(){
        $this->conexao = new mysqli(self::host, self::usuario, self::senha, self::banco);
        
        if(!$this->conexao){
            echo 'erro na conexao';
        }
        else{
            return $this->conexao;
        }
    }
}
?>
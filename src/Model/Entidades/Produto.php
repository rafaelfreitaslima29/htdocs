<?php
namespace Model\Entidades;


class Produto
{
    private $pk;      // Primary	int(11) AUTO_INCREMENT
    private $nome;    //text
    private $valor;   //double

    
    // GET
    public function getPk()
    {
        return $this->pk;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getValor()
    {
        return $this->valor;
    }

    // SET
    public function setPk($pk)
    {
        $this->pk = $pk;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function setValor($valor)
    {
        $this->valor = $valor;
    }
    
    
    
    
    
}


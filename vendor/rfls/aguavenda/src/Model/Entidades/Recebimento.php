<?php
namespace Rfls\Model\Entidades;


class Recebimento
{
    
    private $pk;      // Primary	int(11) AUTO_INCREMENT
    private $cliente_fk; // 	int(11)
    private $valor; //	double(10,2)
    private $obs; //	text	utf8_general_ci
    private $data; //Data

    
    
    // GET
    public function getPk()
    {
        return $this->pk;
    }
    
    public function getCliente_fk()
    {
        return $this->cliente_fk;
    }
    
    public function getValor()
    {
        return $this->valor;
    }
    
    public function getObs()
    {
        return $this->obs;
    }
    
    public function getData()
    {
        return $this->data;
    }
    
    
    // SET
    public function setPk($pk)
    {
        $this->pk = $pk;
    }
    
    public function setCliente_fk($cliente_fk)
    {
        $this->cliente_fk = $cliente_fk;
    }
    
    public function setValor($valor)
    {
        $this->valor = $valor;
    }
    
    public function setObs($obs)
    {
        $this->obs = $obs;
    }
    
    public function setData($data)
    {
        $this->data = $data;
    }
    
    
    
}


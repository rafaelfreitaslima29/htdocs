<?php
namespace Model\Entidades;


use Model\Entidades\Produto;



class Pedido
{
    private $pk;      // Primary	int(11) AUTO_INCREMENT
    private $pedido_client_fk; //int(11)
    private $pedido_data; // timestamp
    private $pedido_estado; //int(11)
    private $pedido_saldo_total; //double
    // GET
    public function getPk()
    {
        $p = new Produto();
        return $this->pk;
    }
    
    public function getPedido_client_fk()
    {
        return $this->pedido_client_fk;
    }
    
    public function getPedido_data()
    {
        return $this->pedido_data;
    }
    
    public function getPedido_estado()
    {
        return $this->pedido_estado;
    }
    
    public function getPedido_saldo_total()
    {
        return $this->pedido_saldo_total;
    }
    
    
    
    // SET
    public function setPk($pk)
    {
        $this->pk = $pk;
    }
    
    public function setPedido_client_fk($pedido_client_fk)
    {
        $this->pedido_client_fk = $pedido_client_fk;
    }
    
    public function setPedido_data($pedido_data)
    {
        $this->pedido_data = $pedido_data;
    }
    
    
    public function setPedido_estado($pedido_estado)
    {
        $this->pedido_estado = $pedido_estado;
    }
    
    public function setPedido_saldo_total($pedido_saldo_total)
    {
        $this->pedido_saldo_total = $pedido_saldo_total;
    }
    
    
    
    
}




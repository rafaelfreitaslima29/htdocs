<?php
namespace Rfls\Model\Entidades;



class ListaPedido
{
    private $lista_pedido_pk; //Primary	int(11)	AUTO_INCREMENT
    private $lista_pedido_pedido_fk; // int(11)
    private $lista_pedido_produto; // Tipo Produto
    private $lista_pedido_quantidade; //int(11)
    private $lista_pedido_subtotal; //double(10,2)
    
    
    
    // GET
    
    public function getLista_pedido_pk()
    {
        return $this->lista_pedido_pk;
    }
    
    public function getLista_pedido_pedido_fk()
    {
        return $this->lista_pedido_pedido_fk;
    }
    
    public function getLista_pedido_produto()
    {
        return $this->lista_pedido_produto;
    }
    
    public function getLista_pedido_quantidade()
    {
        return $this->lista_pedido_quantidade;
    }
    
    public function getLista_pedido_subtotal()
    {
        return $this->lista_pedido_subtotal;
    }
    
    
    
    // SET
    
    public function setLista_pedido_pk($lista_pedido_pk)
    {
        $this->lista_pedido_pk = $lista_pedido_pk;
    }
    
    public function setLista_pedido_pedido_fk($lista_pedido_pedido_fk)
    {
        $this->lista_pedido_pedido_fk = $lista_pedido_pedido_fk;
    }
    
    public function setLista_pedido_produto($lista_pedido_produto)
    {
        $produto = new Produto();
        $produto = $lista_pedido_produto;
        $this->lista_pedido_produto = $produto;
    }
    
    public function setLista_pedido_quantidade($lista_pedido_quantidade)
    {
        $this->lista_pedido_quantidade = $lista_pedido_quantidade;
    }
    
    public function setLista_pedido_subtotal($lista_pedido_subtotal)
    {
        $this->lista_pedido_subtotal = $lista_pedido_subtotal;
    }
    
    
    
}




<?php
namespace Rfls\Model\Dao;

use Rfls\Model\Entidades\Pedido;

class PedidoDao extends AbstractDao
{
    /** 
     * {@inheritDoc}
     * @see \Rfls\Model\Dao\AbstractDao::incluir()
     * @desc Método que recebe um objeto do tipo Pedido com o campo do Id do cliente preenchido, para criar um registro no banco de dados.
     */
    public function incluir($order)
    {
        $pedido = new Pedido();      
        $pedido->setPedido_client_fk( $order->getPedido_client_fk() );
        
        $pdo = $this->Sql();
        // INSERT INTO `tb_pedido` (`pedido_pk`, `pedido_client_fk`, `pedido_data`, `pedido_estado`, `pedido_saldo_total`) VALUES (NULL, '11', CURRENT_TIMESTAMP, '0', '0.00');
        $stmt = $pdo->prepare("INSERT INTO `tb_pedido` (`pedido_pk`, `pedido_client_fk`, `pedido_data`, `pedido_estado`, `pedido_saldo_total`) VALUES (NULL, :cliid, CURRENT_TIMESTAMP, '0', '0.00');");        
        $stmt->bindValue( ":cliid",$pedido->getPedido_client_fk() );        
        $stmt->execute();
    }
    
    
    
    public function crirPedido($order)
    {
        $pedido = new Pedido();
        $pedido->setPedido_client_fk( $order->getPedido_client_fk() );
        
        $sql = "CALL
                 sp_pedido_criar
                (
                :cliid
                )";
        $pdo = $this->Sql();
        // INSERT INTO `tb_pedido` (`pedido_pk`, `pedido_client_fk`, `pedido_data`, `pedido_estado`, `pedido_saldo_total`) VALUES (NULL, '11', CURRENT_TIMESTAMP, '0', '0.00');
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue( ":cliid",$pedido->getPedido_client_fk() );
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $pedido->setPk( $result[0]["last_insert_id()"] );
        return $pedido;
    }
    
    
    
    
    
    /**      
     * {@inheritDoc}
     * @see \Rfls\Model\Dao\AbstractDao::alterar()
     * @desc Método que recebe um objeto do tipo Pedido com os campos idPk, pedido_estado e Pedido_saldo_total preenchido, para alterar um registro do pedido no banco de dados.
     */
    public function alterar($order)
    {       
        $pedido = new Pedido();
        $pedido->setPk( $order->getPk() );
        $pedido->setPedido_estado( $order->getPedido_estado() );
        $pedido->setPedido_saldo_total( $order->getPedido_saldo_total() );
        
        $pdo = $this->Sql();
        // UPDATE `tb_pedido` SET `pedido_estado` = '1', `pedido_saldo_total` = '12.50' WHERE `tb_pedido`.`pedido_pk` = 4;
        $stmt = $pdo->prepare("UPDATE `tb_pedido` SET `pedido_estado` = :estado, `pedido_saldo_total` = :saldototal WHERE `tb_pedido`.`pedido_pk` = :pedidoid");
        $stmt->bindValue( ":pedidoid", $pedido->getPk() );
        $stmt->bindValue( ":saldototal", $pedido->getPedido_saldo_total() );
        $stmt->bindValue( ":estado", $pedido->getPedido_estado() );
        $stmt->execute();
    }
    
    
    /**      
     * {@inheritDoc}
     * @see \Rfls\Model\Dao\AbstractDao::deletar()
     * @desc Método que recebe um objeto do tipo Pedido com o campo idPk preenchido, que apaga o registro do pedido no banco de dados.
     */
    public function deletar($order)
    {        
        $pedido = new Pedido();
        $pedido->setPk( $order->getPk() );
        
        $pdo = $this->Sql();
        // DELETE FROM `tb_pedido` WHERE `tb_pedido`.`pedido_pk` = 4
        $stmt = $pdo->prepare("DELETE FROM `tb_pedido` WHERE `tb_pedido`.`pedido_pk` = :pedidoid");
        $stmt->bindValue( ":pedidoid", $pedido->getPk() );
        $stmt->execute();
    }
    
    /**      
     * {@inheritDoc}
     * @see \Rfls\Model\Dao\AbstractDao::pesquisar()
     * @desc Método que recebe um objeto do tipo Pedido com os campos idPk preenchido, para retornar um objeto do tipo Pedido de um registro da tabela pedido do banco de dados.
     */    
    public function pesquisar($order)
    {       
        $pedido = new Pedido();
        $pedido->setPk( $order->getPk() );
          
        $pdo = $this->Sql();
        // SELECT * FROM `tb_pedido` WHERE `pedido_pk` = 2
        $stmt = $pdo->prepare("SELECT * FROM `tb_pedido` WHERE `pedido_pk` = :pedidoid");
        $stmt->bindValue( ":pedidoid", $pedido->getPk() );
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        
        $pedido->setPk( $result[0]["pedido_pk"] );
        $pedido->setPedido_client_fk( $result[0]["pedido_client_fk"] );
        $pedido->setPedido_data( $result[0]["pedido_data"] );
        $pedido->setPedido_estado( $result[0]["pedido_estado"] );
        $pedido->setPedido_saldo_total( $result[0]["pedido_saldo_total"] );
                
        return $pedido;
    }
    
    
    
    public function pesquisarUltimo()
    {
        $pedido = new Pedido();
        
        
        $pdo = $this->Sql();
        // SELECT * FROM `tb_pedido` WHERE `pedido_pk` = 2
        $stmt = $pdo->prepare("SELECT * FROM `tb_pedido` WHERE `pedido_pk` = last:pedidoid");
        $stmt->bindValue( ":pedidoid", $pedido->getPk() );
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        
        $pedido->setPk( $result[0]["pedido_pk"] );
        $pedido->setPedido_client_fk( $result[0]["pedido_client_fk"] );
        $pedido->setPedido_data( $result[0]["pedido_data"] );
        $pedido->setPedido_estado( $result[0]["pedido_estado"] );
        $pedido->setPedido_saldo_total( $result[0]["pedido_saldo_total"] );
        
        return $pedido;
    }
    
   
    
    /** 
     * {@inheritDoc}
     * @see \Rfls\Model\Dao\AbstractDao::pesquisarTodos()
     * @desc Método que retorna um array de objetos do tipo Pedido, dos registros da tabela pedido do banco de dados.
     */
    public function pesquisarTodos()
    {
        $pdo = $this->Sql();
        
        // SELECT * FROM `tb_pedido` ORDER BY `tb_pedido`.`pedido_data` DESC
        $stmt = $pdo->prepare("SELECT * FROM `tb_pedido` ORDER BY `tb_pedido`.`pedido_data` DESC");
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        
        $pedidos = array();
        foreach ($result as $res)
        {
            $pedido = new Pedido();
            
            $pedido->setPk( $res["pedido_pk"] );
            $pedido->setPedido_client_fk( $res["pedido_client_fk"] );
            $pedido->setPedido_data( $res["pedido_data"] );
            $pedido->setPedido_estado( $res["pedido_estado"] );
            $pedido->setPedido_saldo_total( $res["pedido_saldo_total"] );
            
            array_push($pedidos, $pedido);
        }        
        return $pedidos;   
    }   
    
    
}


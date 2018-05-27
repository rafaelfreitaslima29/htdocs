<?php
namespace Rfls\Model\Dao;




use Rfls\Model\Entidades\Recebimento;

class RecebimentoDao extends AbstractDao
{
    
    
    /**
     * {@inheritDoc}
     * @see \Rfls\Model\Dao\AbstractDao::incluir()
     * @desc Método que recebe um objeto do tipo Recebimento com os atributoscliente_fk, valor e observação preenchidos.
     */
    public function incluir($recebimento)
    {        
        $receb = new Recebimento();
        $receb->setPk( $recebimento->getPk() );
        $receb->setCliente_fk( $recebimento->getCliente_fk() );
        $receb->setValor( $recebimento->getValor() );
        $receb->setObs( $recebimento->getObs() );
        $receb->setData( $recebimento->getData() );
        
        $sql = "INSERT INTO 
                `tb_recebimento` (
                    `recebimento_pk`, 
                    `recebimento_cliente_fk`, 
                    `recebimento_valor`, 
                    `recebimento_obs`, 
                    `recebimento_data`) 
                VALUES (
                    NULL, 
                    :idcliente, 
                    :valor, 
                    UPPER(:observacao), 
                    CURRENT_TIMESTAMP)";
        
        $pdo = $this->Sql();
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue( ":idcliente", $receb->getCliente_fk() );
        $stmt->bindValue( ":valor", $receb->getValor() );
        $stmt->bindValue( ":observacao", $receb->getObs() );
        $stmt->execute();
    }
    
    
    
    
    
    
    
    
    
    
    /**
     * {@inheritDoc}
     * @see \Rfls\Model\Dao\AbstractDao::alterar()
     * @desc Método que recebe um objeto do tipo ListaPedido completo e que necessita de um objeto Produto como um de seus atributos para seu preenchimento, para realizar a alteração de seus registros.
     */
    public function alterar($item)
    {
        $listaPedido = new ListaPedido();
        $listaPedido->setLista_pedido_pedido_fk( $item->getLista_pedido_pedido_fk() );
        $listaPedido->setLista_pedido_pk( $item->getLista_pedido_pk() );
        $listaPedido->setLista_pedido_produto( $item->getLista_pedido_produto() );
        $listaPedido->setLista_pedido_quantidade( $item->getLista_pedido_quantidade() );
        $listaPedido->setLista_pedido_subtotal( $item->getLista_pedido_subtotal() );
        
        $produto = new Produto();
        $produto = $listaPedido->getLista_pedido_produto();
        
        //UPDATE `tb_lista_pedido` SET `lista_pedido_pedido_fk` = '3', `lista_pedido_produto_id` = '6', `lista_pedido_produto_nome` = 'Tijolo2', `lista_pedido_produto_valor` = '15.30', `lista_pedido_quantidade` = '4', `lista_pedido_subtotal` = '45.85' WHERE `tb_lista_pedido`.`lista_pedido_pk` = 16;
        $sql = "UPDATE
                `tb_lista_pedido`
                SET
                `lista_pedido_pedido_fk` = :listpedidofk,
                `lista_pedido_produto_id` = :prodpk,
                `lista_pedido_produto_nome` = :produtonome,
                `lista_pedido_produto_valor` = :produtovalor,
                `lista_pedido_quantidade` = :produtoqualtidade,
                `lista_pedido_subtotal` = :produtosutotal
                WHERE
                `tb_lista_pedido`.`lista_pedido_pk` = :listpedidopk";
        
        $pdo = $this->Sql();
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue( ":listpedidofk", $listaPedido->getLista_pedido_pedido_fk() );
        $stmt->bindValue( ":listpedidopk", $listaPedido->getLista_pedido_pk() );
        $stmt->bindValue( ":prodpk", $produto->getPk() );
        $stmt->bindValue( ":produtonome", $produto->getNome() );
        $stmt->bindValue( ":produtovalor", $produto->getValor() );
        $stmt->bindValue( ":produtoqualtidade", $listaPedido->getLista_pedido_quantidade() );
        $stmt->bindValue( ":produtosutotal", $listaPedido->getLista_pedido_subtotal() );
        $stmt->execute();
    }
    
    
    /**
     * {@inheritDoc}
     * @see \Rfls\Model\Dao\AbstractDao::deletar()
     * @desc Método que recebe o ID PK de um objeto do tipo ListaPedido preenchido, que apaga o registro no banco de dados.
     */
    public function deletar($item)
    {
        $listaPedido = new ListaPedido();
        $listaPedido->setLista_pedido_pk( $item->getLista_pedido_pk() );
        
        //DELETE FROM `tb_lista_pedido` WHERE `tb_lista_pedido`.`lista_pedido_pk` = 16
        $sql = "DELETE FROM
                `tb_lista_pedido`
                WHERE
                `tb_lista_pedido`.`lista_pedido_pk` = :listpedidopk";
        
        $pdo = $this->Sql();
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue( ":listpedidopk", $listaPedido->getLista_pedido_pk() );
        $stmt->execute();
    }
    
    
    /**
     * {@inheritDoc}
     * @see \Rfls\Model\Dao\AbstractDao::pesquisar()
     * @desc Método que recebe o ID PK de um objeto do tipo ListaPedido preenchido, que retorna os registro da linha no banco de dados em forma de um objeto ListaPedido.
     */
    public function pesquisar($item)
    {
        $listaPedido = new ListaPedido();
        $produto =new Produto();
        
        $listaPedido->setLista_pedido_pk( $item->getLista_pedido_pk() );
        
        //SELECT * FROM `tb_lista_pedido` WHERE `lista_pedido_pk` = 1
        $sql = "SELECT
                 *
                FROM
                `tb_lista_pedido`
                WHERE
                `lista_pedido_pk` = :listpedidopk";
        
        $pdo = $this->Sql();
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue( ":listpedidopk", $listaPedido->getLista_pedido_pk() );
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        
        $listaPedido->setLista_pedido_pk( $result[0]["lista_pedido_pk"] );
        $listaPedido->setLista_pedido_pedido_fk( $result[0]["lista_pedido_pedido_fk"] );
        
        $produto->setPk( $result[0]["lista_pedido_produto_id"] );
        $produto->setNome( $result[0]["lista_pedido_produto_nome"] );
        $produto->setValor( $result[0]["lista_pedido_produto_valor"] );
        $listaPedido->setLista_pedido_produto( $produto );
        
        $listaPedido->setLista_pedido_quantidade( $result[0]["lista_pedido_quantidade"] );
        $listaPedido->setLista_pedido_subtotal( $result[0]["lista_pedido_subtotal"] );
        
        return $listaPedido;
    }
    
    
    
    
    /**
     * {@inheritDoc}
     * @see \Rfls\Model\Dao\AbstractDao::pesquisarTodos()
     * @desc Método que retorna um array de objetos do tipo ListaPedido, dos registros da tabela ListaPedido do banco de dados.
     */
    public function pesquisarTodos()
    {
        // SELECT * FROM `tb_lista_pedido`
        $sql = "SELECT
                 *
                FROM
                `tb_lista_pedido`";
        
        $pdo = $this->Sql();
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        
        
        $listaPedidos = array();
        foreach ($result as $res)
        {
            $listaPedido = new ListaPedido();
            $produto = new Produto();
            
            $listaPedido->setLista_pedido_pk( $res["lista_pedido_pk"] );
            $listaPedido->setLista_pedido_pedido_fk( $res["lista_pedido_pedido_fk"] );
            
            $produto->setPk( $res["lista_pedido_produto_id"] );
            $produto->setNome( $res["lista_pedido_produto_nome"] );
            $produto->setValor( $res["lista_pedido_produto_valor"] );
            $listaPedido->setLista_pedido_produto( $produto );
            
            $listaPedido->setLista_pedido_quantidade( $res["lista_pedido_quantidade"] );
            $listaPedido->setLista_pedido_subtotal( $res["lista_pedido_subtotal"] );
            
            array_push($listaPedidos, $listaPedido);
        }
        return $listaPedidos;
        
    }
    
    
    /**
     * {@inheritDoc}
     * @see \Rfls\Model\Dao\AbstractDao::pesquisarTodos()
     * @desc Método que retorna um array de objetos do tipo ListaPedido ele recebe como parametro um objeto do tipo pedido com seu ID preenchido, dos registros da tabela ListaPedido do banco de dados.
     */
    public function pesquisarPorPedido($pedido)
    {
        //
        $pedid = new Pedido();
        $pedid->setPk( $pedido->getPk() );
        
        
        //SELECT * FROM `tb_lista_pedido` WHERE `lista_pedido_pedido_fk` = 2
        $sql = "SELECT
                 *
                FROM
                `tb_lista_pedido`
                WHERE
                `lista_pedido_pedido_fk` = :numeropedido";
        
        $pdo = $this->Sql();
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue( ":numeropedido", $pedid->getPk() );
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        
        $listaPedidos = array();
        foreach ($result as $res)
        {
            $listaPedido = new ListaPedido();
            $produto = new Produto();
            
            $listaPedido->setLista_pedido_pk( $res["lista_pedido_pk"] );
            $listaPedido->setLista_pedido_pedido_fk( $res["lista_pedido_pedido_fk"] );
            
            $produto->setPk( $res["lista_pedido_produto_id"] );
            $produto->setNome( $res["lista_pedido_produto_nome"] );
            $produto->setValor( $res["lista_pedido_produto_valor"] );
            $listaPedido->setLista_pedido_produto( $produto );
            
            $listaPedido->setLista_pedido_quantidade( $res["lista_pedido_quantidade"] );
            $listaPedido->setLista_pedido_subtotal( $res["lista_pedido_subtotal"] );
            
            array_push($listaPedidos, $listaPedido);
        }
        return $listaPedidos;
        
    }
    
    
    
    
    
}


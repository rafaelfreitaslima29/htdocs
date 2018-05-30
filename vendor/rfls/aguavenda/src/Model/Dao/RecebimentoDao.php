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
     * @desc Método que recebe um objeto do tipo Recebimento completo e que necessita de um objeto Produto como um de seus atributos para seu preenchimento, para realizar a alteração de seus registros.
     */
    public function alterar($recebimento)
    {
        $receb = new Recebimento();
        $receb = $this->obsRecebimento($recebimento);
        
        $sql = "UPDATE 
                `tb_recebimento` 
                SET 
                `recebimento_valor` = :valor, 
                `recebimento_obs` = UPPER(:observacao) 
                WHERE 
                `tb_recebimento`.`recebimento_pk` = :idrecebimento";
        
        $pdo = $this->Sql();
        $stmt = $pdo->prepare($sql);        
        $stmt->bindValue( ":valor", $receb->getValor() );
        $stmt->bindValue( ":observacao", $receb->getObs() );
        $stmt->bindValue( ":idrecebimento", $receb->getPk() );
        $stmt->execute();        
    }
    
    
    /**
     * {@inheritDoc}
     * @see \Rfls\Model\Dao\AbstractDao::deletar()
     * @desc Método que recebe o ID PK de um objeto do tipo Recebimento preenchido, que apaga o registro no banco de dados.
     */
    public function deletar($item)
    {
        $receb = new Recebimento();
        $receb = $this->obsRecebimento($item);
        
        $sql = "DELETE FROM 
                `tb_recebimento` 
                WHERE 
                `tb_recebimento`.`recebimento_pk` = :idrecebimento";
        
        $pdo = $this->Sql();
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue( ":idrecebimento", $receb->getPk() );
        $stmt->execute();        
    }
    
    
    /**
     * {@inheritDoc}
     * @see \Rfls\Model\Dao\AbstractDao::pesquisar()
     * @desc Método que recebe o ID PK de um objeto do tipo Recebimentos preenchido, que retorna os registro da linha no banco de dados em forma de um objeto ListaPedido.
     */
    public function pesquisar($item)
    {
        $receb = new Recebimento();
        $receb = $this->obsRecebimento($item);
        
        $sql = "SELECT
                * 
                FROM 
                `tb_recebimento` 
                WHERE 
                `recebimento_pk` = :idrecebimento";
        
        $pdo = $this->Sql();
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue( ":idrecebimento", $receb->getPk() );
        $stmt->execute(); 
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        
        return $this->arrayObjRecebimento($result);        
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
    
    
    
    private function obsRecebimento($objeto)
    {
        $obj = new Recebimento();
        $obj->setPk( $objeto->getPk() );
        $obj->setCliente_fk( $objeto->getCliente_fk() );
        $obj->setData( $objeto->getData() );
        $obj->setObs( $objeto->getObs() );
        $obj->setValor( $objeto->getValor() );        
        return $obj;
    }
    
    
    private function arrayObjRecebimento($result)
    {
                
        $recebimentos = array();
        foreach ($result as $res)
        {
            $recebimento = new Recebimento();
                        
            $recebimento->setPk( $res["recebimento_pk"] );
            $recebimento->setCliente_fk( $res["recebimento_cliente_fk"] );
            $recebimento->setData( $res["recebimento_data"] );
            $recebimento->setObs( $res["recebimento_obs"] );
            $recebimento->setValor( $res["recebimento_valor"] );
            
            array_push($recebimentos, $recebimento);
        }
        return $recebimentos;
        
    }
    
    
    
    
    
    
    
    
    
    
    
    
}


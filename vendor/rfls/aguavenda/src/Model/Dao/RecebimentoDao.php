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
        
        $sql = "CALL
                sp_recebimento_registrar 
                (
                :valor,
                :idcliente,
                :observacao
                )";
        
        $pdo = $this->Sql();
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue( ":idcliente", $receb->getCliente_fk() );
        $stmt->bindValue( ":valor", $receb->getValor() );
        $stmt->bindValue( ":observacao", $receb->getObs() );
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $receb->setPk( $result[0]["last_insert_id()"]);
        return $receb;
        
        
    }
    
/*    
    private  function recuperarUltimoGeristro($stmt)
    {
        $receb = new Recebimento();
        $receb->setPk( $recebimento->getPk() );
        $receb->setCliente_fk( $recebimento->getCliente_fk() );
        $receb->setValor( $recebimento->getValor() );
        $receb->setObs( $recebimento->getObs() );
        $receb->setData( $recebimento->getData() );
        
        $sql = "SINSERT INTO
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
  */
    
    
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
     * @desc Método que retorna um array de objetos do tipo Recebimento, dos registros da tabela Recebimento do banco de dados.
     */
    public function pesquisarTodos()
    {
        $sql = "SELECT 
                * 
                FROM 
                `tb_recebimento` 
                ORDER BY 
                `tb_recebimento`.`recebimento_pk` 
                DESC";
        
        $pdo = $this->Sql();
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        
        return $this->arrayObjRecebimento($result);
    }
    
    
    /**
     * {@inheritDoc}
     * @see \Rfls\Model\Dao\AbstractDao::pesquisarTodos()
     * @desc Método que retorna um array de objetos do tipo Recebimentoo ele recebe como parametro um objeto do tipo Recebimento com com seu FK preenchido, dos registros da tabela ListaPedido do banco de dados.
     */
    public function pesquisarTodosPorCliente($recebimento)
    {
        $receb = new Recebimento();
        $receb = $this->obsRecebimento($recebimento);
        
        $sql = "SELECT
                * 
                FROM 
                `tb_recebimento` 
                WHERE 
                `recebimento_cliente_fk` = :fkcliente 
                ORDER BY 
                `recebimento_pk` 
                DESC";
        
        $pdo = $this->Sql();
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue( ":fkcliente", $receb->getCliente_fk() );
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        
        return $this->arrayObjRecebimento($result);
    }
    
    public function pesquisarSaldoRecebimentosDoCliente($recebimento)
    {
        
        $sql = "SELECT 
                SUM(recebimento_valor) 
                as 'saldo_total_recebido' 
                FROM 
                tb_recebimento 
                WHERE 
                recebimento_cliente_fk = :clienteid";
        
        $pdo = $this->Sql();
        
        // SELECT * FROM `tb_pedido` ORDER BY `tb_pedido`.`pedido_data` DESC
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue( ":clienteid", $recebimento->getCliente_fk() );
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $saldo = $result[0]["saldo_total_recebido"];
        
        return $saldo;
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


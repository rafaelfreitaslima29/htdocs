<?php
namespace Rfls\Model\Dao;


use Rfls\Model\Entidades\Produto;

class ProdutoDao extends AbstractDao
{
    
    /**
     * {@inheritDoc}
     * @see \Rfls\Model\Dao\AbstractDao::pesquisar()
     * @desc Altera um registro usando um objeto do tipo Produto com seu preenchimento completo.
     */
    public function alterar($objeto)
    {   
        $produto = $objeto;
        $pdo = $this->Sql();
        
        // UPDATE `tb_produto` SET `produto_nome` = ?, `produto_valor` = ? WHERE `tb_produto`.`produto_pk` = ?;
        $stmt = $pdo->prepare("UPDATE `tb_produto` SET `produto_nome` = ?, `produto_valor` = ? WHERE `tb_produto`.`produto_pk` = ?");
        $stmt->bindValue( 1 ,utf8_encode($produto->getNome()) );
        $stmt->bindValue( 2 ,$produto->getValor() );
        $stmt->bindValue( 3 ,utf8_encode($produto->getPk()) );
        $stmt->execute();        
    }

    /**
     * {@inheritDoc}
     * @see \Rfls\Model\Dao\AbstractDao::pesquisar()
     * @desc Apaga um registro usando um objeto do tipo Produto pelo su ID "PK".
     */
    public function deletar($objeto)
    {
        $produto = $objeto;
        $pdo = $this->Sql();
        
        // "DELETE FROM `tb_produto` WHERE `tb_produto`.`produto_pk` = 3"
        $stmt = $pdo->prepare("DELETE FROM `tb_produto` WHERE `tb_produto`.`produto_pk` = ?");
        $stmt->bindValue( 1,utf8_encode($produto->getPk()) );
        $stmt->execute(); 
        
    }

    /**
     * {@inheritDoc}
     * @see \Rfls\Model\Dao\AbstractDao::pesquisar()
     * @desc Inclui um registro na tabela Produto, recebendo um objeto do tipo Produto.
     */
    public function incluir($objeto)
    {
        $produto = $objeto;         
        $pdo = $this->Sql();
        
        // INSERT INTO `tb_produto` (`produto_pk`, `produto_nome`, `produto_valor`) VALUES (NULL, UPPER('gás'), '70.00');
        $stmt = $pdo->prepare("INSERT INTO `tb_produto` (`produto_pk`, `produto_nome`, `produto_valor`) VALUES (NULL, UPPER(?), ?)");        
        $stmt->bindValue(1,utf8_encode($produto->getNome()));
        $stmt->bindValue(2,$produto->getValor());
        $stmt->execute(); 
    }
    
    /**
     * {@inheritDoc}
     * @see \Rfls\Model\Dao\AbstractDao::pesquisar()
     * @desc Recebe um objeto Produto com o seu id "PK" preenchido.
     */
    public function pesquisar($objeto)
    {        
        $produto = $objeto;
        $pdo = $this->Sql();
    
        try 
        {
            // SELECT * FROM `tb_produto` WHERE `produto_pk` LIKE '%1%'
            $stmt = $pdo->prepare("SELECT * FROM `tb_produto` WHERE `produto_pk` = ?");
            $stmt->bindValue( 1,utf8_encode($produto->getPk()) );
            $stmt->execute();
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            //var_dump($result);
            $produto->setPk( $result[0]["produto_pk"] );
            $produto->setNome( $result[0]["produto_nome"] );
            $produto->setValor( $result[0]["produto_valor"] );
            return $produto;            
        } 
        catch (Exception $e) 
        {
            echo "Probema no Banco de Dados";
        }        
    }
    
    
    /**
     * {@inheritDoc}
     * @see \Rfls\Model\Dao\AbstractDao::pesquisar()
     * @desc Retorna um array com Todos os Produtos
     */    
    public function pesquisarTodos()
    {   
        $pdo = $this->Sql();
                
        // SELECT * FROM `tb_produto` ORDER BY `tb_produto`.`produto_nome` ASC
        $stmt = $pdo->prepare("SELECT * FROM `tb_produto` ORDER BY `tb_produto`.`produto_nome` ASC");
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                
        $produtos = array();
        foreach ($result as $res)
        {        
            $produto = new Produto();
            $produto->setPk( $res["produto_pk"] );
            $produto->setNome( $res["produto_nome"] );
            $produto->setValor( $res["produto_valor"] );
            
            array_push($produtos, $produto);
        }
        
        return $produtos;   
    }

    
    
    
}


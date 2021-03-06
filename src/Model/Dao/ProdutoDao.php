<?php
namespace Model\Dao;

use Model\Entidades\Produto;


class ProdutoDao extends AbstractDao
{
    
    /**
     * {@inheritDoc}
     
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
     
     * @desc Apaga um registro usando um objeto do tipo Produto pelo su ID "PK".
     */
    public function deletar($objeto)
    {
        
        $produto = $this->ojbProduto($objeto);
        $pdo = $this->Sql();
        
        // "DELETE FROM `tb_produto` WHERE `tb_produto`.`produto_pk` = 3"
        $stmt = $pdo->prepare("DELETE FROM `tb_produto` WHERE `tb_produto`.`produto_pk` = ?");
        $stmt->bindValue( 1,$produto->getPk() );
        $stmt->execute(); 
        
    }

    /**
     * {@inheritDoc}
     
     * @desc Inclui um registro na tabela Produto, recebendo um objeto do tipo Produto.
     */
    public function incluir($objeto)
    {
        $produto = $objeto;         
        $pdo = $this->Sql();
        
        // INSERT INTO `tb_produto` (`produto_pk`, `produto_nome`, `produto_valor`) VALUES (NULL, UPPER('g�s'), '70.00');
        $stmt = $pdo->prepare("INSERT INTO `tb_produto` (`produto_pk`, `produto_nome`, `produto_valor`) VALUES (NULL, UPPER(?), ?)");        
        $stmt->bindValue( 1,$produto->getNome() );
        $stmt->bindValue( 2,$produto->getValor() );
        $stmt->execute(); 
    }
    
    /**
     * {@inheritDoc}
     
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
        catch (\Exception $e) 
        {
            echo "Probema no Banco de Dados";
        }        
    }
    
    
    
    public function pesquisarTodos()
    {   
        $pdo = $this->Sql();
                
        // SELECT * FROM `tb_produto` ORDER BY `tb_produto`.`produto_nome` ASC
        $stmt = $pdo->prepare("SELECT * FROM `tb_produto` ORDER BY `tb_produto`.`produto_nome` ASC");
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $this->arrayProdutos($result);   
    }
    
    public function pesquisarTodosJSON()
    {
        $pdo = $this->Sql();
        
        // SELECT * FROM `tb_produto` ORDER BY `tb_produto`.`produto_nome` ASC
        $stmt = $pdo->prepare("SELECT * FROM `tb_produto` ORDER BY `tb_produto`.`produto_nome` ASC");
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }
    
    
    
    private function ojbProduto($prod)
    {
        $produto = new Produto();
        $produto->setPk( $prod->getPk() );
        $produto->setNome( $prod->getNome() );
        $produto->setValor( $prod->getValor() );
        
        return $produto;
    }
    
    
    
    private function arrayProdutos($result)
    {
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


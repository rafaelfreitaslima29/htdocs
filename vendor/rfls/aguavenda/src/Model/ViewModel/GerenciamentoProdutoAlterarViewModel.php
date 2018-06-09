<?php
namespace Rfls\Model\ViewModel;

use Rfls\Model\Dao\ProdutoDao;
use Rfls\Model\Entidades\Produto;

class GerenciamentoProdutoAlterarViewModel extends ProdutoDao
{
    
    public function Teste()
    {
        echo "GerenciamentoProdutoViewModel";
    }
    
    
    /**
     * @desc M�todo que liga a View "gerenciamento_produto" com a fun��o de incluir um produto. Necessita de um objeto do tipo rainTpl como par�metro, o mesmos que gerencia a View.  
     */
    public function recuperarProduto($pagina)
    {
        
        
        $idProd  =  isset( $_GET['id_prod'] ) ? $_GET['id_prod'] : false ;
            
        if($idProd != false)
        {
            $produto = new Produto();
            $produto->setPk($idProd);
            
            $produto = $this->pesquisar($produto);
            
            $pagina->tplAssign("id", $produto->getPk() );
            $pagina->tplAssign("nome", $produto->getNome() );
            $pagina->tplAssign("valor", $produto->getValor() );
        }else 
        {            
            $pagina->tplAssign("nome", "Nome do Produto" );
            $pagina->tplAssign("valor", "Valor" );            
        }
    }
    
    
    
    /**
     * @desc M�todo que liga a View "gerenciamento_produto" com a fun��o de listar todos os produtos. 
     * Necessita de um objeto do tipo rainTpl como par�metro, o mesmos que gerencia a View.
     */
    public function alterarProduto($pagina)
    {   
        $idProduto   =  isset( $_GET['id_prod'] ) ? $_GET['id_prod'] : false ;
        $nomeProduto =  isset( $_GET['prod_name'] ) ? $_GET['prod_name'] : false ;
        $valorProduto =  isset( $_GET['prod_vlr'] ) ? $_GET['prod_vlr'] : false ;
        
        if( ($idProduto != false) && ($nomeProduto != false) && ($valorProduto != false) )
        {
            $produto = new Produto();
            $produto->setPk($idProduto);
            $produto->setNome($nomeProduto);
            $produto->setValor
            (
                str_replace( ","  ,  "."  , $valorProduto )
             );
            $this->alterar($produto);
            header('location:index.php');
        }       
    }
    
    
    
    
    public function deletarProduto($pagina)
    {
        $pagina->tplAssign("aviso", "" );
        $idProduto   =  isset( $_GET['deletar'] ) ? $_GET['deletar'] : false ;        
                
        if( ($idProduto != false) )
        {            
            $produto = new Produto();
            $produto->setPk($idProduto);
            
            $this->deletar($produto); 
            $pagina->tplAssign("aviso", "Produto Deletado" );
            
        }        
    }
    
    
    
    
    
    
    
    
    
    
    
}


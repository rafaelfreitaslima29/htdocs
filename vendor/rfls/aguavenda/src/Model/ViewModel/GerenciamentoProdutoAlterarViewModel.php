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
     * @desc Método que liga a View "gerenciamento_produto" com a função de incluir um produto. Necessita de um objeto do tipo rainTpl como parâmetro, o mesmos que gerencia a View.  
     */
    public function recuperarProduto($pagina)
    {
        $pagina->tplAssign("alerta", "" );
        $pagina->tplAssign("nome", "Nome do Produto" );
        $pagina->tplAssign("valor", "Valor" );
        
        $idProd  =  isset( $_GET['id_prod'] ) ? $_GET['id_prod'] : false ;
        
        $produto = new Produto();
        $produto->setPk($idProd);
        
        
        
        
        $produto = $this->pesquisar($produto);
        
        
        
        $pagina->tplAssign("nome", $produto->getNome() );
        $pagina->tplAssign("valor", $produto->getValor() );
        
        /*
        if( $validacao == true )
        {
            if($nomeProd == "")
            {
                $msgAlerta = utf8_encode("Nome do Produto está vázio!");
                $pagina->tplAssign("alerta", $msgAlerta);
            }
            else
            {
                if( $valorProd == "" )
                {
                    $msgAlerta = utf8_encode("Valor do Produto está vázio!");
                    $pagina->tplAssign("alerta", $msgAlerta);
                }
                else
                {                    
                    $msgAlerta = utf8_encode("Produto Registrado com Sucesso!");
                    $pagina->tplAssign("alerta", $msgAlerta);
                    
                    $this->incluir($produto);
                }
            }
        } 
        */
        
        
        
    }
    
    
    
    /**
     * @desc Método que liga a View "gerenciamento_produto" com a função de listar todos os produtos. 
     * Necessita de um objeto do tipo rainTpl como parâmetro, o mesmos que gerencia a View.
     */
    public function listaTodosOsProdutos($pagina)
    {
        $pagina->tplAssign("alerta", "" );
        
       
        $produtosArray = $this->pesquisarTodos();
        
       // var_dump($produtosArray);
        
        $pagina->tplAssign( "listprodutos", $produtosArray );
        
        /*
        
        
        $produto = new Produto();
        $produto->setNome( $nomeProd );
        $produto->setValor(
            str_replace(
                "," ,
                "." ,
                $valorProd
                )
            );
        
        if( $validacao == true )
        {
            if($nomeProd == "")
            {
                $msgAlerta = utf8_encode("Nome do Produto está vázio!");
                $pagina->tplAssign("alerta", $msgAlerta);
            }
            else
            {
                if( $valorProd == "" )
                {
                    $msgAlerta = utf8_encode("Valor do Produto está vázio!");
                    $pagina->tplAssign("alerta", $msgAlerta);
                }
                else
                {
                    $msgAlerta = utf8_encode("Produto Registrado com Sucesso!");
                    $pagina->tplAssign("alerta", $msgAlerta);
                    
                    $this->incluir($produto);
                }
            }
        }
        */
        
        
        
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
}


<?php
namespace Rfls\Model\ViewModel;

use Rfls\Model\Dao\ProdutoDao;
use Rfls\Model\Entidades\Produto;

class GerenciamentoProdutoViewModel extends ProdutoDao
{
    
    public function Teste()
    {
        echo "GerenciamentoProdutoViewModel";
    }
    
    
    /**
     * @desc Método que liga a View "gerenciamento_produto" com a função de incluir um produto. Necessita de um objeto do tipo rainTpl como parâmetro, o mesmos que gerencia a View.  
     */
    public function cadastrarProduto($pagina)
    {
        $pagina->tplAssign("alerta", "" );        
        
        $nomeProd  =  isset( $_GET['prod_name'] ) ? $_GET['prod_name'] : false ;
        $valorProd =  isset( $_GET['prod_vlr'] ) ? $_GET['prod_vlr'] : false ;
        $validacao =  isset( $_GET['botao_ok'] ) ? true : false ;
        
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


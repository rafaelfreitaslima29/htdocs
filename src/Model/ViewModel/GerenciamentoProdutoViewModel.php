<?php
namespace Model\ViewModel;

use Model\Dao\ProdutoDao;
use Model\Entidades\Produto;

class GerenciamentoProdutoViewModel extends ProdutoDao
{
    
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
                $msgAlerta = utf8_encode("Nome do Produto est� v�zio!");
                $pagina->tplAssign("alerta", $msgAlerta);
            }
            else
            {
                if( $valorProd == "" )
                {
                    $msgAlerta = utf8_encode("Valor do Produto est� v�zio!");
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
    
    
    
    public function listaTodosOsProdutos($pagina)
    {
        $pagina->tplAssign("alerta", "" );
       
        $produtosArray = $this->pesquisarTodos();
          
        $pagina->tplAssign( "listprodutos", $produtosArray );
        
    }
    
    
    
}


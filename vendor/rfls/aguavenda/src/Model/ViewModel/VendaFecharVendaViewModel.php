<?php
namespace Rfls\Model\ViewModel;

use Rfls\Model\Dao\ClienteDao;
use Rfls\Model\Entidades\Client;
use Rfls\Model\Dao\ProdutoDao;

class VendaFecharVendaViewModel extends ClienteDao
{   
    
    public function retornarCliente($pagina)
    {   
        $pagina->tplAssign("cliid", "" );
        $pagina->tplAssign("clinome", "" );
        $pagina->tplAssign("cliobs", "");
        
        $cliId  =  isset( $_GET['id_cli'] ) ? $_GET['id_cli'] : false ; 
        
        $cliente = new Client();
        $cliente->setCli_pk_int( $cliId );
        $cliente = $this->pesquisar( $cliente );
        //var_dump($cliente);
        
        
        if( $cliente == null )
        {
            echo "<br><br>Array Null!!!!!";
        }
        else 
        {
            $pagina->tplAssign("cliid", $cliente[0]->getCli_pk_int() );
            $pagina->tplAssign("clinome", $cliente[0]->getCli_name_text() );
            $pagina->tplAssign("cliobs", $cliente[0]->getCli_obs_text() );            
        }
        
        
    }
    
    
    
    public function retornarListaProdutos($pagina)
    {
        $pagina->tplAssign("produtoslist", "" );
        
        $produtoDao = new ProdutoDao();
        
        $produtoLista = $produtoDao->pesquisarTodos();
                
        $pagina->tplAssign("produtoslist", $produtoLista );        
    }
    
    
    
    
    public function testeJONretornarListaProdutos($pagina)
    {
        $pagina->tplAssign("produtoslist", "" );
        
        $produtoDao = new ProdutoDao();
        
        $produtoLista = $produtoDao->pesquisarTodosJSON();
        //var_dump( $produtoLista ) ;
        
        $JSONprodutoLista = json_encode($produtoLista);
        //var_dump($JSONprodutoLista);
        $pagina->tplAssign("jsonprodutoslist", $JSONprodutoLista );
        
        
        //$pagina->tplAssign("produtoslist", $produtoLista );
    }
    
    
    
    
    /*
    public function pesquisarCliente($pagina)
    {
        $pagina->tplAssign("alerta", "" );
        $pagina->tplAssign("arrayclientes", "");
        
        $nomeCli  =  isset( $_GET['pesq_cli_name'] ) ? $_GET['pesq_cli_name'] : false ;        
    
        $cliente = new Client();
        $cliente->setCli_name_text(  $nomeCli );
        
        if($nomeCli == null)
        {
            //echo "campo vázio";
        }
        else
        {            
            $clientes = array();
            $quantidadeDeRetornos = 5;
            $clientes = $this->pesquisarNome($cliente, $quantidadeDeRetornos);            
            $pagina->tplAssign( "arrayclientes", $clientes );
        }
    }
   */
    
    
}


<?php
namespace Model\ViewModel;

use Model\Dao\ClienteDao;
use Model\Entidades\Client;
use Model\Dao\ProdutoDao;

class VendaVenderViewModel extends ClienteDao
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
    
    
   
    
    
}


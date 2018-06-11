<?php
namespace Rfls\Model\ViewModel;

use Rfls\Model\Dao\ClienteDao;
use Rfls\Model\Entidades\Client;
use Rfls\Model\Dao\ProdutoDao;
use Rfls\Model\Entidades\Pedido;
use Rfls\Model\Dao\PedidoDao;
use Rfls\Model\Entidades\ListaPedido;
use Rfls\Model\Dao\ListaPedidoDao;
use Rfls\Model\Entidades\Produto;

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
    
    
   
    public function retornarListaProdutosDoPedido($pagina)
    {
        $pagina->tplAssign("cliid", "" );
        $pagina->tplAssign("jsonquantidades", "" );
        $pagina->tplAssign("jsonindices", "" );
        
        $cliId  =  isset( $_GET['id_cli'] ) ? $_GET['id_cli'] : false ;
        $jsonQuantidades  =  isset( $_GET['json_quantidades'] ) ? $_GET['json_quantidades'] : false ;
        $jsonIndices     =  isset( $_GET['json_indices'] ) ? $_GET['json_indices'] : false ;
        
        
        
        var_dump( $cliId );
        var_dump( $jsonQuantidades );
        var_dump( $jsonIndices );
        
        $jsonQuantidades = json_decode( $jsonQuantidades );
        $jsonIndices = json_decode( $jsonIndices );
        
        
        
        // Criação de um pedido
         // ############### ARRUMAR ESSA LÓGICA
         $pedido = new Pedido();
         $pedido->setPedido_client_fk( $cliId );
         
         $pedidoDao = new PedidoDao();
         $pedido = $pedidoDao->crirPedido( $pedido );
         
         
         $listaProdutoDao = new ListaPedidoDao();
         $produtoDao = new ProdutoDao();
         
         foreach ($jsonIndices as $idProdutos)
         {
             $listaProduto = new ListaPedido();
             $listaProduto->setLista_pedido_pedido_fk( $pedido->getPk() );
             
             $prduto = new Produto();
             
             $prduto->setPk( $idProdutos );
             $prduto = $produtoDao->pesquisar( $prduto );
             $subtotalProduto = ($prduto->getValor() * $jsonQuantidades);
             
             $listaProduto->setLista_pedido_produto( $prduto );
             $listaProduto->setLista_pedido_quantidade( $jsonQuantidades );
             $listaProduto->setLista_pedido_subtotal( $subtotalProduto );
             $listaProdutoDao->incluir( $listaProduto );
             
             
         }
         
        
        
        /*
        foreach ( $jsonQuantidades as $x )
        {
            
            echo $x;
            echo "<br>";
        }
        */
        
       
       
       
       /*
        if( $jsonQuantidades == "" || $jsonIndices == "" )
        {
            echo "lista de Produtos vazia";
        }
        else
        {
            $pagina->tplAssign("jsonquantidades", $jsonQuantidades );
            $pagina->tplAssign("jsonindices", $jsonIndices );
        }
        */               
    }
       
    
    
    public function JONretornarListaProdutos($pagina)
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


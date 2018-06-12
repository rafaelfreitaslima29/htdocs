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
       // $pagina->tplAssign("listapedido", "" );
        
        
        $cliId  =  isset( $_GET['id_cli'] ) ? $_GET['id_cli'] : false ;
        $jsonQuantidades  =  isset( $_GET['json_quantidades'] ) ? $_GET['json_quantidades'] : false ;
        $jsonIndices     =  isset( $_GET['json_indices'] ) ? $_GET['json_indices'] : false ;
        
        
        // Transformação objetos PHP
        $jsonQuantidades = json_decode( $jsonQuantidades );
        $jsonIndices = json_decode( $jsonIndices );
        
        
        // Array com os produtos do pedido
        $produtosItens = array();
        foreach ($jsonIndices as $idProduto)
        {
            $produtoDao = new ProdutoDao();
            $produto = new Produto();
            $produto->setPk( $idProduto );
            $produto = $produtoDao->pesquisar( $produto );
            //var_dump($produto);
           // echo "--------------------";
            array_push($produtosItens, $produto);
        }
        
        
        
        
        // Criação de um pedido
         $pedido = new Pedido();
         $pedido->setPedido_client_fk( $cliId );
         $pedidoDao = new PedidoDao();
         //  Retorna o objeto pedido com seu id registrado
         $pedido = $pedidoDao->crirPedido( $pedido );
         $idPedido = $pedido->getPk();
        
        
         
         // Preenchendo a lista do pedido
         $listaPedidoDao = new ListaPedidoDao();
         $listaPedido = new ListaPedido();
         $i = 0;
         $totalPedido = 0;
         foreach ($produtosItens as $prod)
         {
             // cascula o sub total dos itens
             $subTotalItem = $prod->getValor() * $jsonQuantidades[$i];
             // Capta o total do pedido
             $totalPedido += $subTotalItem;
             $listaPedido->setLista_pedido_pedido_fk( $idPedido );
             $listaPedido->setLista_pedido_produto( $prod );
             $listaPedido->setLista_pedido_quantidade( $jsonQuantidades[$i] );
             $listaPedido->setLista_pedido_subtotal( $subTotalItem );
             
             $listaPedidoDao->incluir( $listaPedido );             
             
             $i = $i + 1;                          
         }
         
        
         // Recupera os itens registrados
         $listaPedidoArray = $listaPedidoDao->pesquisarPorPedido($pedido);
        
         
         // Preencher a lista da view
         $pagina->tplAssign("listaprodutos", $listaPedidoArray );
         $pagina->tplAssign("totalpedido", $totalPedido );
                       
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


<?php
namespace Rfls\Model\ViewModel;

use Rfls\Model\Dao\ClienteDao;
use Rfls\Model\Entidades\Client;
use Rfls\Model\Dao\PedidoDao;
use Rfls\Model\Entidades\Pedido;
use Rfls\Model\Entidades\Recebimento;
use Rfls\Model\Dao\RecebimentoDao;

class RelatorioSaldoClientesViewModel extends ClienteDao
{   
    
    
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
    
    
    public function saldoPedidosCliente($pagina)
    {
        $clienteDao =  new ClienteDao();
        
        $clietesTodos = $clienteDao->pesquisarTodos();
        //var_dump($clietesTodos);
        
        // Preenchimento de um array associativo com os dados dos saldos dos cliente
        $pedido = new Pedido();
        $pedidoDao = new PedidoDao();
        
        $recebimento = new Recebimento();
        $recebimentoDao = new RecebimentoDao();
        
        
        $clientesSaldos = array();
        foreach ($clietesTodos as $clientes)
        {
            $pedido->setPedido_client_fk( $clientes->getCli_pk_int() );
            $recebimento->setCliente_fk( $clientes->getCli_pk_int() );
            
            echo "<br><hr>";
            echo $clientes->getCli_name_text()."  |  ".$clientes->getCli_obs_text();
            $clienteSaldo = array(
                "id"            => $clientes->getCli_pk_int(),
                "nome"          => $clientes->getCli_name_text(),
                "obs"           => $clientes->getCli_obs_text(),
                "saldo_devedor" => ( $pedidoDao->pesquisarSaldoPedidosDoCliente($pedido) * (-1) ),
                "saldo_credor" =>  $recebimentoDao->pesquisarSaldoRecebimentosDoCliente($recebimento) 
            );
            array_push($clientesSaldos, $clienteSaldo);
        }
        var_dump($clientesSaldos);
        
        // para visualizar p array
        foreach ($clientesSaldos as $cli)
        {
                        
            echo "<br><hr>";
            echo $cli["id"]."  |  ".$cli["nome"]."  |  ".$cli["obs"]."  |  ".$cli["saldo_devedor"]."  |  ".$cli["saldo_credor"]."  |  ".( $cli["saldo_credor"] + $cli["saldo_devedor"] );
            
        }
        
        
        
        
        
        
        
        
        
        // 333333333  FAZER A LÓGICA DE CÁLCULO E DO LOOP DOS CLIENTES
        
        // ID de teste
        $CliId  =  20;
        
        $pedido = new Pedido();
        $pedido->setPedido_client_fk( $CliId );
        
        $pedidoDao = new PedidoDao();
        $saldo = $pedidoDao->pesquisarSaldoPedidosDoCliente($pedido);
        //var_dump( number_format ( ($saldo * (-1)), 2) );
        
        $recebimentoDao = new RecebimentoDao();
        
        $recebimento = new Recebimento();
        $recebimento->setCliente_fk( $CliId );
        $saldoRecebimento = $recebimentoDao->pesquisarSaldoRecebimentosDoCliente($recebimento);
       // var_dump( number_format ( $saldoRecebimento, 2) );
        //var_dump( ($saldoRecebimento - $saldo) );
        
        
    }
   
    
    
   
    
    
}


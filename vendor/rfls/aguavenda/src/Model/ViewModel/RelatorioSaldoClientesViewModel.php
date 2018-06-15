<?php
namespace Rfls\Model\ViewModel;

use Rfls\Model\Dao\ClienteDao;
use Rfls\Model\Entidades\Client;
use Rfls\Model\Dao\PedidoDao;
use Rfls\Model\Entidades\Pedido;
use Rfls\Model\Entidades\Recebimento;
use Rfls\Model\Dao\RecebimentoDao;
use Rfls\View\Utilidades;

class RelatorioSaldoClientesViewModel extends ClienteDao
{   
   
    
    public function saldoPedidosCliente($pagina)
    {
        $clienteDao =  new ClienteDao();
        
        $clientesTodos = $clienteDao->pesquisarTodos();
        
        
        // Preenchimento de um array associativo com os dados dos saldos dos cliente
        $pedido = new Pedido();
        $pedidoDao = new PedidoDao();
        
        $recebimento = new Recebimento();
        $recebimentoDao = new RecebimentoDao();
        
        
        $clientesSaldos = array();
        foreach ($clientesTodos as $clientes)
        {
            $pedido->setPedido_client_fk( $clientes->getCli_pk_int() );
            $recebimento->setCliente_fk( $clientes->getCli_pk_int() );
            
            $idCliente = $clientes->getCli_pk_int();
            $nomeCliente = $clientes->getCli_name_text();
            $obsCliente = $clientes->getCli_obs_text();
            $saldoDevedor = Utilidades::valorBrToInter( $pedidoDao->pesquisarSaldoPedidosDoCliente($pedido) * (-1) );
            $saldoCredor = Utilidades::valorBrToInter( $recebimentoDao->pesquisarSaldoRecebimentosDoCliente($recebimento) );
            $saldoAtual = Utilidades::valorBrToInter( $saldoDevedor + $saldoCredor );
            
            $clienteSaldo = array(
                "id"            => $idCliente,
                "nome"          => $nomeCliente,
                "obs"           => $obsCliente,
                "saldo_devedor" => $saldoDevedor,
                "saldo_credor"  => $saldoCredor,
                "saldo_atual"   => $saldoAtual
            );
            array_push($clientesSaldos, $clienteSaldo);
        }
        //var_dump($clientesSaldos);
        
        // para visualizar p array
        foreach ($clientesSaldos as $cli)
        {
                        
            //echo "<br><hr>";
           // echo $cli["id"]."  |  ".$cli["nome"]."  |  ".$cli["obs"]."  |  ".$cli["saldo_devedor"]."  |  ".$cli["saldo_credor"]."  |  ".$cli["saldo_atual"];
            
        }
        
        $pagina->tplAssign( "clientessaldos", $clientesSaldos );
        
    }
   
    
    
   
    
    
}


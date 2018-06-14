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
        // 333333333  FAZER A LÓGICA DE CÁLCULO E DO LOOP DOS CLIENTES
        
        // ID de teste
        $CliId  =  20;
        
        $pedido = new Pedido();
        $pedido->setPedido_client_fk( $CliId );
        
        $pedidoDao = new PedidoDao();
        $saldo = $pedidoDao->pesquisarSaldoPedidosDoCliente($pedido);
        var_dump( number_format ( ($saldo * (-1)), 2) );
        
        $recebimentoDao = new RecebimentoDao();
        
        $recebimento = new Recebimento();
        $recebimento->setCliente_fk( $CliId );
        $saldoRecebimento = $recebimentoDao->pesquisarSaldoRecebimentosDoCliente($recebimento);
        var_dump( number_format ( $saldoRecebimento, 2) );
        var_dump( ($saldoRecebimento - $saldo) );
        
        
    }
   
    
    
   
    
    
}


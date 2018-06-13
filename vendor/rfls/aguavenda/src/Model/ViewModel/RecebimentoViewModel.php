<?php
namespace Rfls\Model\ViewModel;

use Rfls\Model\Dao\ClienteDao;
use Rfls\Model\Entidades\Client;

class RecebimentoViewModel extends ClienteDao
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
   
    
    
   
    
    
}


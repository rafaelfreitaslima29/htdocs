<?php
namespace Rfls\Model\ViewModel;

use Rfls\Model\Dao\ClienteDao;
use Rfls\Model\Entidades\Client;
use Rfls\Model\Dao\ProdutoDao;

class RecebimentoReceberRecebidoViewModel extends ClienteDao
{   
    
    public function retornarCliente($pagina)
    {   
        $pagina->tplAssign("cliid", "" );
        $pagina->tplAssign("receberclivalor", "" );
        $pagina->tplAssign("recebercliobs", "");
        
        $cliId            =  isset( $_GET['id_cli'] ) ? $_GET['id_cli'] : false ;
        $receberCliValor  =  isset( $_GET['receber_cli_valor'] ) ? $_GET['receber_cli_valor'] : false ;
        $receberCliObs    =  isset( $_GET['receber_cli_obs'] ) ? $_GET['receber_cli_obs'] : false ;
        
        var_dump($cliId);
        var_dump($receberCliValor);
        var_dump($receberCliObs);
        
        /*
        $cliente = new Client();
        $cliente->setCli_pk_int( $cliId );
        $cliente = $this->pesquisar( $cliente );
       */
       
       // var_dump($cliente);
        
        /*
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
        
        */
        
    }
    
    
   
   
    
    
}


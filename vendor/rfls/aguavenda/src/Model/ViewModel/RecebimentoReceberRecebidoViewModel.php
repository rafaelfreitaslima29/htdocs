<?php
namespace Rfls\Model\ViewModel;

use Rfls\Model\Dao\ClienteDao;
use Rfls\Model\Entidades\Client;
use Rfls\Model\Dao\ProdutoDao;
use Rfls\Model\Entidades\Recebimento;
use Rfls\Model\Dao\RecebimentoDao;
use DateTime;
use Rfls\View\Utilidades;

class RecebimentoReceberRecebidoViewModel extends ClienteDao
{   
    
    public function retornarCliente($pagina)
    {   
        //$pagina->tplAssign("cliid", "" );
        //$pagina->tplAssign("receberclivalor", "" );
        //$pagina->tplAssign("recebercliobs", "");
        
        $cliId            =  isset( $_GET['id_cli'] ) ? $_GET['id_cli'] : false ;
        $receberCliValor  =  isset( $_GET['receber_cli_valor'] ) ? $_GET['receber_cli_valor'] : false ;
        $receberCliObs    =  isset( $_GET['receber_cli_obs'] ) ? $_GET['receber_cli_obs'] : false ;
        
        //var_dump($cliId);
        //var_dump($receberCliValor);
        //var_dump($receberCliObs);
        
        
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
            $recebimento = new Recebimento();
            $recebimento->setCliente_fk( $cliente[0]->getCli_pk_int() );
            $recebimento->setObs( $receberCliObs );
            $recebimento->setValor( Utilidades::valorBrToInter($receberCliValor) );
            
            $recebimentoDao = new RecebimentoDao();
            $recebimento = $recebimentoDao->incluir($recebimento);
            
            $dataTime = new DateTime($recebimento->getData());
            $recebimento->setData( Utilidades::dataBR($dataTime) );
            
            $pagina->tplAssign("cliente", $cliente );
            $pagina->tplAssign("recebimento", $recebimento );
                        
        }
        
       
        
    }
    
    
   
   
    
    
}


<?php
namespace Model\ViewModel;

use Model\Dao\ClienteDao;
use Model\Entidades\Client;

class CadastroClienteConfirmadoViewModel extends ClienteDao
{
    
    
    
    public function cadastarCliente($pagina)
    {
        $cliNome  =  isset( $_GET['cli_nome'] ) ? $_GET['cli_nome'] : false ; 
        $cliObs   =  isset( $_GET['cli_obs'] ) ? $_GET['cli_obs'] : false ; 
                
        $clienteCadastrado = new Client();
        $clienteCadastrado->setCli_name_text( strtoupper($cliNome) );
        $clienteCadastrado->setCli_obs_text( $cliObs );
        
        $clienteCadastrado = $this->incluir( $clienteCadastrado );
        
        $pagina->tplAssign("clientecadastrado", $clienteCadastrado);
    }
    
    
    
    
}


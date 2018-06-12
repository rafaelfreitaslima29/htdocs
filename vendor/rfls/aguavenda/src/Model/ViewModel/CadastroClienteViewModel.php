<?php
namespace Rfls\Model\ViewModel;

use Rfls\Model\Dao\ClienteDao;
use Rfls\Model\Entidades\Client;

class CadastroClienteViewModel extends ClienteDao
{
    
    
    public function ClienteCadastradosRecentes($pagina)
    {
        $CliCadastradosRecentes = $this->pesquisar5Clientes();
        
        $pagina->tplAssign("arrayclientes", $CliCadastradosRecentes);        
    }
   
    
    
}


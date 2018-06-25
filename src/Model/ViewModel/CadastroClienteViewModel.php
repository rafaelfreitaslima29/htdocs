<?php
namespace Model\ViewModel;

use Model\Dao\ClienteDao;
use Model\Entidades\Client;

class CadastroClienteViewModel extends ClienteDao
{
    
    
    public function ClienteCadastradosRecentes($pagina)
    {
        $CliCadastradosRecentes = $this->pesquisar5Clientes();
        
        $pagina->tplAssign("arrayclientes", $CliCadastradosRecentes);        
    }
   
    
    
}


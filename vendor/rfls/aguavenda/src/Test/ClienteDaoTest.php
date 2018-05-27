<?php
namespace Rfls\Test;

use PHPUnit\Framework\TestCase;
use Rfls\Model\Dao\ClienteDao;
use Rfls\Model\Entidades\Client;

/**
 * ClienteDao test case.
 */
class ClienteDaoTest extends TestCase
{
    
    
    
    
    
    /**
     * Tests ClienteDao->pesquisar()
     */
    public function testPesquisar()
    {
        $clienteDao = new ClienteDao();
        $client = new Client();
        $client->setCli_pk_int("1");
        
        $nome = $clienteDao->pesquisar($client);
        
        $this->assertEquals("1", $nome[0]["cli_pk_int"]);
        $this->assertEquals("daniel", $nome[0]["cli_name_text"]);
        $this->assertEquals("amigo", $nome[0]["cli_obs_text"]);        
    }
    
    

    
}


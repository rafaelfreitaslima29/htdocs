<?php
namespace Model\Dao;


use Model\Entidades\Client;

class ClienteDao extends AbstractDao
{    
    
    public function incluir($client)
    {
        $cliente = new Client();
        
        $cliente->setCli_name_text($client->getCli_name_text());
        $cliente->setCli_obs_text($client->getCli_obs_text());
        
        $sql= "CALL
                sp_cliente_criar
                (
                :clinome,
                :cliobs
                )";        
        
        $pdo = $this->Sql();       
        $stmt = $pdo->prepare($sql);        
        $stmt->bindValue(":clinome",$cliente->getCli_name_text());
        $stmt->bindValue(":cliobs",$cliente->getCli_obs_text());
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);   
        $cliente->setCli_pk_int( $result[0]["last_insert_id()"] );
        return $cliente;
    }
    
    
    public function alterar($client)
    {
        $cliente = new Client();
        $cliente->setCli_pk_int($client->getCli_pk_int());
        $cliente->setCli_name_text($client->getCli_name_text());
        $cliente->setCli_obs_text($client->getCli_obs_text());
        
        $pdo = $this->Sql();
        // UPDATE `tb_client` SET `cli_name_text` = 'rafael2', `cli_obs_text` = 'freitas2' WHERE `tb_client`.`cli_pk_int` = 4;
        $stmt = $pdo->prepare("UPDATE `tb_client` SET `cli_name_text` = :clinome, `cli_obs_text` = :cliobs WHERE `tb_client`.`cli_pk_int` = :cliid");
        $stmt->bindValue(":cliid",$cliente->getCli_pk_int());
        $stmt->bindValue(":clinome",$cliente->getCli_name_text());
        $stmt->bindValue(":cliobs",$cliente->getCli_obs_text());
        $stmt->execute();        
    }
    

    // M�todo para deletar um registro pelo id, recebe um objeto $client
    public function deletar($client)
    {
        $cliente = new Client();
        $cliente->setCli_pk_int($client->getCli_pk_int());
        
        $pdo = $this->Sql();
                
        $stmt = $pdo->prepare("DELETE FROM `tb_client` WHERE `tb_client`.`cli_pk_int` = :cliid");
        $stmt->bindValue(":cliid",$cliente->getCli_pk_int());
        $stmt->execute();                 
    }

    
    // M�todo para retornar um registro pelo id 
    public function pesquisar($client)
    {
        $cliente = new Client();
        $cliente->setCli_pk_int($client->getCli_pk_int());
                
        $pdo = $this->Sql();
        
        $stmt = $pdo->prepare("SELECT * FROM `tb_client` WHERE `cli_pk_int` = :cliid ORDER BY `cli_pk_int` DESC");
        $stmt->bindValue(":cliid",$cliente->getCli_pk_int());
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);        
        return $this->arrayObjeClientes($result);        
    }
    
    
    // M�todo para retornar um registro peor parte do nome
    public function pesquisarNome($client, $limitInt)
    {
        $cliente = new Client();
        $cliente->setCli_name_text($client->getCli_name_text());
                
        $pdo = $this->Sql();
        
        //$stmt = $pdo->prepare("SELECT * FROM `tb_client` WHERE `cli_name_text` LIKE '%".":clinome"."%' ORDER BY `cli_pk_int` DESC LIMIT 10");
        $stmt = $pdo->prepare("SELECT * FROM `tb_client` WHERE `cli_name_text` LIKE :clinome ORDER BY `cli_pk_int` DESC LIMIT ".$limitInt);
        $stmt->bindValue(":clinome","%".$cliente->getCli_name_text()."%");
        
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);        
        return $this->arrayObjeClientes($result);
    }
    
    

    // M�todo para retornar tosdos os registros
    public function pesquisarTodos()
    {
        $pdo = $this->Sql();
        $sql = "SELECT
                 * 
                FROM 
                `tb_client` 
                ORDER BY 
                `tb_client`.`cli_name_text` 
                ASC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $this->arrayObjeClientes($result);         
    }
    
    
    // M�todo para retornar 10 registros
    public function pesquisar5Clientes()
    {
        $pdo = $this->Sql();
        $sql = "SELECT 
                * 
                FROM 
                `tb_client` 
                ORDER BY 
                `tb_client`.`cli_pk_int` 
                DESC 
                LIMIT 5";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $this->arrayObjeClientes($result);
    }
    
    
    
    private function objCliente($cliente)
    {
        $objCliente = new Client();
        $objCliente->setCli_pk_int( $cliente->getCli_pk_int() );
        $objCliente->setCli_name_text( $cliente->getCli_name_text() );
        $objCliente->setCli_obs_text( $cliente->getCli_obs_text() );
        return $objCliente;
    }


    
    private function arrayObjeClientes($result)
    {
        $clientes = array();
        foreach ($result as $res)
        {
            $cliente = new Client();
            $cliente->setCli_pk_int( $res["cli_pk_int"] );
            $cliente->setCli_name_text( $res["cli_name_text"] );
            $cliente->setCli_obs_text( $res["cli_obs_text"] );
            
            array_push($clientes, $cliente);
        }
        
        return $clientes;  
    }
    
   
    

}


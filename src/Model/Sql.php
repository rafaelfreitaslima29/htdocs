<?php
namespace Model;




// Definiçoes do Banco de Dados
define( 'MYSQL_HOST', 'localhost' );
define( 'MYSQL_USER', 'root' );
define( 'MYSQL_PASSWORD', '05051983' );
define( 'MYSQL_DB_NAME', 'db_agua_venda' );

class Sql extends \PDO{
    
    public function __construct() {
        parent::__construct("mysql:host=".MYSQL_HOST.";dbname=".MYSQL_DB_NAME."", MYSQL_USER, MYSQL_PASSWORD, array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    }

    



    private $conn;
    
    public function Sql() {
        
        $this->conn = new \PDO("mysql:host=".MYSQL_HOST.";dbname=".MYSQL_DB_NAME."", MYSQL_USER, MYSQL_PASSWORD, array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
       //$pdo = new \PDO("mysql:host=".MYSQL_HOST.";dbname=".MYSQL_DB_NAME."", MYSQL_USER, MYSQL_PASSWORD);
        
       return $this->conn;
    }
    
    
}





















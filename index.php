<?php
require_once 'vendor/autoload.php';

use Rfls\Model\Teste;
use Rfls\Model\Sql;
use Rfls\Model\Entidades\Client;
use Rfls\controller\Routes;



// Chamas as Rotas
$routes = new Routes();





// Ativas as Rotas
$routes->runApp();

?>
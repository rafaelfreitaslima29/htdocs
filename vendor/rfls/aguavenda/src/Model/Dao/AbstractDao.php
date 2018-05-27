<?php
namespace Rfls\Model\Dao;

use Rfls\model\Sql;

abstract class AbstractDao extends Sql
{
    public abstract function incluir($objeto);
    
    public abstract function pesquisar($objeto);
    
    public abstract function pesquisarTodos();
    
    public abstract function alterar($objeto);
    
    public abstract function deletar($objeto);
}


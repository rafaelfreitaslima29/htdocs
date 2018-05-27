<?php
namespace Rfls\View;



use Rain\Tpl;


/*
require_once 'Config.php';
$config = new \Config();
*/  
        
        
/**
 * Classe que faz a construção do templete da pagina. *
 * @author rafael
 */
class Pagina {
    
    private $tpl;
    private $opcoes = [];
    private $padroes = [
        "data"=>[]
    ];




    public function __construct($opcs = array()) {
        
        $this->opcoes = array_merge($this->padroes, $opcs);
        
        // config
        $config = array(
            "charset"       => 'UTF-8',
            "tpl_dir"       => "./views/templetes/",
            "cache_dir"     => "views/cache/",
            'auto_escape'   => false,
            "debug"         => false, // set to false to improve the speed
        );

        Tpl::configure( $config );
        
        $this->tpl = new Tpl();
                        
        $this->tpl->draw("head");

               
        $this->setDado($this->opcoes["data"]);
        
        //$this->tpl->draw("footer");
                
      
    }
    
    
    private function setDado($dado = array()){
    
        foreach ($dado as $key => $value) {
            $this->tpl->assign($key, $value);
            
        }
        
    }
    
    public function setTpl($nome, $dado = array(), $returnHTML = false ){
        
        $this->setDado($dado);
        return $this->tpl->draw($nome, $returnHTML);
        
    }

  
    
    
    

    public function tplAssign($key, $valuePodeSerArrayOuValor) {
        return $this->tpl->assign($key, $valuePodeSerArrayOuValor);
        
    }




    public function __destruct() {
      $this->tpl->draw("footer");
        
    }





}















<?php
namespace view;

use Rain\Tpl;


     
    
class Pagina {
        
        private $tpl;
        private $pagePartes = array();
        
        private $partHead;
        private $partBody;
        private $partFooter;
        
        
        private $opcoes = [];
        private $padroes = [
            "data"=>[]
        ];
        
        
        public function __construct()
        {
            // config
            $config = array(
                "tpl_dir"       => "views/templetes/",
                "cache_dir"     => "views/cache/",
                "debug"         => false, // set to false to improve the speed
            );
            
            Tpl::configure( $config );
            
            $this->tpl = new Tpl();
        }
        
        
        public function drawPagina($pagePartes = array())
        {
            if ($pagePartes["head"] == "" )
            {
                $this->drawHead( "head" );
            }
            else 
            {
                $this->drawHead( $pagePartes["head"] );
            }
            
            if ( $pagePartes["body"] == "" )
            {
                $this->drawHead( "main" );
            }
            else 
            {
                $this->drawHead( $pagePartes["body"] );
            }
            
            
            if ( $pagePartes["footer"] == "" )
            {
                $this->drawHead( "footer" );
            }
            else
            {
                $this->drawHead( $pagePartes["footer"] );
            }            
            
        }
        
        
       
        
        public function drawHead( $htmlPageHead )
        {
            $this->tpl->draw( $htmlPageHead );
        }
        
        
        public function drawBody( $htmlPageBody )
        {
            $this->tpl->draw( $htmlPageBody );
        }
        
        
        public function drawFooter( $htmlPageFooter )
        {
            $this->tpl->draw( $htmlPageFooter );
        }
        
        
        
        
        public function tplAssign($chave, $variavel)
        {
           return $this->tpl->assign($chave, $variavel);
        }
        
        
        
        public function getPartHead()
        {
            return $this->partHead;
        }
    
        
        
        public function getPartBody()
        {
            return $this->partBody;
        }
    
        
        
        public function getPartFooter()
        {
            return $this->partFooter;
        }
    
        
        
        public function setPartHead($partHead)
        {
            $this->partHead = $partHead;
        }
    
        
        
        public function setPartBody($partBody)
        {
            $this->partBody = $partBody;
        }
    
        
        
        public function setPartFooter($partFooter)
        {
            $this->partFooter = $partFooter;
        }
        
        
        public function getPagePartes()
        {
            return $this->pagePartes;
        }
    
        
        
        public function setPagePartes($pagePartes = array() )
        {
            $this->pagePartes = $pagePartes;
        }
    
    
        
        
        
        
        
        
        
        
}
    
    
    
    
    
    
    
    
    
    
    
    
    
    
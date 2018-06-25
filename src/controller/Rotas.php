<?php
namespace controller;




use Slim\App;

class Rotas
{
    private $app;
    private $nomeRota;

    
    public function __construct()
    {
        $this->app = new App();
       
        $this->home();    
       // $this->homeA();
       
        $this->rotaLista();
        
    }
    
    
    public function rotaLista()
    {
        
        
        switch ($this->nomeRota) {
            case 0:
                $this->home();
                echo "i equals 0";
                break;
            case 1:
                echo "i equals 1";
                break;
            case 2:
                echo "i equals 2";
                break;
        }
        
        
        
    }
    
    
    public function nomeRota($nome)
    {
        $this->nomeRota = $nome;
    }
    
    
    
    
    public function home()
    {
        $this->app->get('/hello/{name}', function ($request, $response, $args) {
            echo "Hello, " . $args['name'];
        })->setName('hello');
        
            
           // echo "home ssssssssssssssssssss";
            
            
        
        
    }
    
    
    
    public function homeA()
    {
        $this->app->any('/rafa', function($request, $response, $args ){
            
            echo "TTTTTTTTTTTTTTTT";
            
            
        } );
            
    }
    
    
    
    
    
    public function runApp()
    {
        $this->app->run();
    }
    
    
    
    
    
    
    
    
    
    
    public function teste()
    {
        echo "<br>teste da classe Rotas";
    }
    
    
    
}


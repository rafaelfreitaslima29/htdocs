<?php


define( 'ROOT_DO_SERVIDOR', '/' );

/**
 * Description of Config
 *
 * @author rafael
 */
class Config
{
    
    
    function __construct()
    {
        require_once 'vendor/autoload.php';
        
        spl_autoload_register(function ($nomeClass)
        {
            
            //echo $nomeClass;
            // Variável que converte a barra do nemespace da classe chamada quando for em um sistema Linux
            $nameClassLinux = str_replace("\\", "/",  $nomeClass);
            
            // Para Windows
            //C:\xampp\htdocs\Teichi\vendor\src\model\Pessoa.php
            if (file_exists("src".DIRECTORY_SEPARATOR.$nomeClass.".php") === TRUE){
                require_once "src".DIRECTORY_SEPARATOR.$nomeClass.".php";
                
                //echo "src".DIRECTORY_SEPARATOR.$nameClassLinux.".php";
            }
            
            // Para Linux
            if (file_exists("src".DIRECTORY_SEPARATOR.$nameClassLinux.".php") === TRUE){
                require_once "src".DIRECTORY_SEPARATOR.$nameClassLinux.".php";
                
                //echo "src".DIRECTORY_SEPARATOR.$nameClassLinux.".php";
            }
            
        });
        
    }
    
    
    //put your code here
}


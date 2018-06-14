<?php
namespace Rfls\View;


class Utilidades {
    




    
    
    
    public static function dataBR($dataInternacional)
    {
        $dataBR = $dataInternacional->format('d-m-Y H:i:s');        
        
        return $dataBR; 
    }
    
    
    public static function valorBrToInter($valorBR)
    {
        $valorBR = str_replace( ",",  "." ,  $valorBR );
        
        return $valorBR;
    }

    

    public function __destruct() {
    
        
    }





}















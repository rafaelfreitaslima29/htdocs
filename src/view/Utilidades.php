<?php
namespace view;


class Utilidades {
    




    
    
    
    public static function dataBR($dataInternacional)
    {
        $dataBR = $dataInternacional->format('d-m-Y H:i:s');        
        
        return $dataBR; 
    }
    
    
    public static function valorBrToInter($valorBR)
    {
        if($valorBR == "")
        {
            $valorBR = 0.00;
            number_format ( $valorBR , 2 );
        }
        else 
        {
            $valorBR = str_replace( ",",  "." ,  $valorBR );
            
            $valorBR = number_format ( $valorBR , 2 );
            
            $valorBR = str_replace(",", "", $valorBR);
        }
        return $valorBR;
    }

    

}















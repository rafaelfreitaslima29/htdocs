<?php
namespace Rfls\Model\Entidades;


/**
* 
*/
class Client
{

	private $cli_pk_int; //	int(11)
	private $cli_name_text; // text
	private $cli_obs_text; // text

    
    public function getCli_pk_int()
    {
        return $this->cli_pk_int;
    }

    public function getCli_name_text()
    {
        return $this->cli_name_text;
    }

    public function getCli_obs_text()
    {
        return $this->cli_obs_text;
    }

    public function setCli_pk_int($cli_pk_int)
    {
        $this->cli_pk_int = $cli_pk_int;
    }

    public function setCli_name_text($cli_name_text)
    {
        $this->cli_name_text = $cli_name_text;
    }

    public function setCli_obs_text($cli_obs_text)
    {
        $this->cli_obs_text = $cli_obs_text;
    }


    




}
















?>
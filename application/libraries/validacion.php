<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class validacion {
    public $CI;
    public function  __construct() {
        $this->CI =& get_instance();
    }

    public function validacion_login(){
        if(!$this->CI->session->userdata('usuSistemaTime'))
        {
            $url = base_url().'mainpanel/login';
            redirect($url);
        }
    }
	
}
?>

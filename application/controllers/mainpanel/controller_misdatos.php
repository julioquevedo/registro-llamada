<?php

class Controller_misdatos extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('validacion');
        $this->load->model('mainpanel/Model_misdatos');
    }

    public function index() {
        $this->validacion->validacion_login();
        // GENERAL *********************************************************
        $data['current_section'] = 'registros';
        $data['lista_menu'] = $this->load->view('mainpanel/includes/menu', $data, true);
        $data['cuerpo']="admin_inicio";
        // *****************************************************************
        

                
        // EDIT USUARIO
        $idUsuario = $this->session->userdata('id_admin');
        $usuario = $this->Model_misdatos->getUsuario($idUsuario);
        $data['usuario'] = $usuario;
        $this->load->view('mainpanel/misdatos/edit_view', $data, true);
        $data['cuerpo'] = 'misdatos/edit_view';
        $this->load->view("mainpanel/includes/template", $data);
    }


}

?>

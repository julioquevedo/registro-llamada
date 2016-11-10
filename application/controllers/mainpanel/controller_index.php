<?php
class Controller_index extends CI_Controller {
    function __construct()
    {
            parent::__construct();
            $this->load->library('validacion');
            $this->load->model('visitas/Model_login');            
    }
    
    
    public function index()
    {
        $this->validacion->validacion_login();
        // GENERAL
        $data['current_section'] = 'inicio';
        $menu['lista_menu'] = $this->load->view('mainpanel/includes/menu', $data, true);
        $this->load->view('mainpanel/includes/header_view', $menu, true);
        $data['modal'] = '';
        $this->load->view('mainpanel/includes/footer_view', $data, true); 
        $data['cuerpo']="admin_inicio";
        $this->load->view("mainpanel/includes/template", $data);
    }
 
    

   
}
?>

<?php
class Controller_login extends CI_Controller {
	function __construct()
	{
		parent::__construct();
                $this->load->library('validacion');
                $this->load->model('mainpanel/model_login');
	}
	public function index()
	{
            $this->validacion->validacion_login();
            // GENERAL *********************************************************
            $data['current_section'] = 'inicio';
            $data['lista_menu'] = $this->load->view('mainpanel/includes/menu', $data, true);
            $data['cuerpo']="admin_inicio";
            // *****************************************************************
            
            $this->load->view("mainpanel/includes/template", $data);
	}
        
        public function login(){        
            $this->load->view("mainpanel/login_view");
        }
        
        public function validar() {

            // PROCESAR LOGIN
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $result = $this->model_login->valida_usuario($username, $password);
            $result=explode("###",$result);
            $pr=$result[0];
            
            switch ($pr){
                case 'ok':
                    $this->session->set_userdata('usuSistemaTime', true);
                    $this->session->set_userdata('nombre_admin', $result[1]);
                    $this->session->set_userdata('id_admin', $result[2]);                    
                    break;
                case 'estado':
                    $this->session->set_userdata('error', 'Usuario Inactivo o eliminado');                    
                    break;
                case 'password':
                    $this->session->set_userdata('error', 'Password Incorrecto');                    
                    break;
                case 'usuario':
                    $this->session->set_userdata('error', 'Usuario Incorrecto');                    
                    break;                
            }
            //echo $this->session->flashdata('error');
            redirect('mainpanel');
        }
        
        public function logout() {
            $this->session->unset_userdata('usuSistemaTime');
            $this->session->unset_userdata('nombre_admin');
            $this->session->unset_userdata('id_admin');
            $url= base_url()."mainpanel";
            redirect($url);
        }
}
?>
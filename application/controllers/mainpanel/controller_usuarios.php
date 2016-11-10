<?php
class Usuarios extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->library('validacion');
        $this->load->model('mainpanel/Usuarios_model');
        $this->load->library('my_upload');
    }
    
    public function index() {
        $this->validacion->validacion_login();
    }
    

    
    public function edit() {
        $this->validacion->validacion_login();
        // GENERAL
        $theme = $this->config->item('admin_theme');
        $data['theme'] = $theme;
        $datos2 = array();
        $data['menu'] = $this->load->view('mainpanel/includes/menu', $datos2, true);
        $dataPrincipal['header'] = $this->load->view('mainpanel/includes/header_view', $data, true);
        $data['modal'] = '';
        $dataPrincipal['footer'] = $this->load->view('mainpanel/includes/footer_view', $data, true); 
        $dataPrincipal["cuerpo"]="configuracion/edit_view";
        // EDIT CLIENTE
        $id_configuracion = $this->uri->segment(4);
        $resultado = $this->uri->segment(5);
        $configuracion = $this->Usuarios_model->getConfiguracion($id_configuracion);
        $dataPrincipal['configuracion'] = $configuracion;
        $dataPrincipal["resultado"] = $resultado;
        $this->load->view("mainpanel/includes/template", $dataPrincipal);
    }
    
    public function actualizar() {
        $this->validacion->validacion_login();
        // EDITAR CLIENTE
        $id_configuracion = $this->input->post('id_configuracion');
        $llave = $this->input->post('llave');        
        $valor = $this->input->post('valor');        
        $descripcion= $this->input->post('descripcion');
        $data = array();
        $data['llave']=$llave;
        $data['valor']=$valor;
        $data['descripcion']=$descripcion;
        $this->Usuarios_model->updateConfiguracion($id_configuracion, $data);
        redirect('mainpanel/configuracion/edit/'.$id_configuracion.'/success');
    }
    
    
}
?>

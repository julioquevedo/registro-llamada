<?php
class Controller_config extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->library('validacion');
        $this->load->model('mainpanel/Model_config');
        $this->load->library('my_upload');
    }

    
    public function listado() {
        $this->validacion->validacion_login();
        // GENERAL *********************************************************
        $data['current_section'] = 'registros';
        $data['lista_menu'] = $this->load->view('mainpanel/includes/menu', $data, true);
        $data["cuerpo"]="configuracion/index_view";
        
        
        //+---  SUB MENU -------------+        
        $data['submenu_secciones']     = $this->load->view('mainpanel/includes/submenu_secciones', $data,true);        
        //+---  SUB MENU -------------+ 

        // LISTA PARAMETROS
        $aux = $this->Model_config->getListaParametros();
        $configuraciones = array();
        foreach($aux as $configuracion)
        {
            $aux2 = array();
            $aux2['id'] = $configuracion->id;
            $aux2['llave'] = $configuracion->llave;
            $aux2['valor'] = $configuracion->valor;
            $aux2['descripcion'] = $configuracion->descripcion;
            $configuraciones[] = $aux2;
        }
        $data['configuraciones'] = $configuraciones;
        $this->load->view("mainpanel/includes/template", $data);
    }
    
    
    public function edit($id_configuracion) {
        $this->validacion->validacion_login();
        // GENERAL *********************************************************
        $data['current_section'] = 'registros';
        $data['lista_menu'] = $this->load->view('mainpanel/includes/menu', $data, true);
        $data["cuerpo"]="configuracion/edit_view";

        //+---  SUB MENU -------------+        
        $data['submenu_secciones']     = $this->load->view('mainpanel/includes/submenu_secciones', $data,true);        
        //+---  SUB MENU -------------+ 
                
        // EDIT CLIENTE
        $configuracion = $this->Model_config->getConfiguracion($id_configuracion);
        $data['configuracion'] = $configuracion;
        $this->load->view("mainpanel/includes/template", $data);
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
        $resultado=$this->Model_config->updateConfiguracion($id_configuracion, $data);
        if($resultado==true){
            $this->session->set_userdata("success",'Se procesó correctamente la información');
        }else{
            $error='Ocurrió un error al procesar su información '.$error;
            $this->session->set_userdata("error",$error);            
        }         
        redirect('mainpanel/configuracion/edit/'.$id_configuracion);
    }
 }
?>

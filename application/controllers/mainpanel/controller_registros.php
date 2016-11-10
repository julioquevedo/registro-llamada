<?php
class Controller_registros extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->library('validacion');
        $this->load->model('mainpanel/Model_usuarios');
        $this->load->library('my_upload');
    }
    
    
    public function listado() {
        $this->validacion->validacion_login();
        // GENERAL *********************************************************
        $data['current_section'] = 'registros';
        $data['lista_menu'] = $this->load->view('mainpanel/includes/menu', $data, true);
        $data['cuerpo']="registros/index_view";
        

        // LISTA DE LOS registros
        $registros = $this->Model_usuarios->getListaUsuarios();
        $data["registros"] = $registros;
        $this->load->view("mainpanel/includes/template", $data);
    }
    
    
    public function edit($id) {
        $this->validacion->validacion_login();
        // GENERAL *********************************************************
        $data['current_section'] = 'registros';
        $data['lista_menu'] = $this->load->view('mainpanel/includes/menu', $data, true);
        $data['cuerpo']="registros/edit_view";


        // EDIT registros
        $registro = $this->Model_usuarios->getRegistro($id);
        $data['registro'] = $registro;
        $this->load->view("mainpanel/includes/template", $data);
    }
    
   
    
    public function actualizar() {
        $this->validacion->validacion_login();
        // EDITAR registros
        $data = array();


        $data['nombre']         = $this->input->post('nombre');
        $data['email']          = $this->input->post('email');         
        $data['estado']          = $this->input->post('estado');
        $data['telefono']    = $this->input->post('telefono');
        $data['usuario']    = $this->input->post('usuario');        
        $data['password']    = $this->input->post('password');
        $data['nivel']    = $this->input->post('nivel');        

        $id= $this->input->post('idRegistro');         

      

        $result=$this->Model_usuarios->updateRegistro($id, $data);
        if($result==true){
            $this->session->set_userdata("success",'Se procesó correctamente la información');
        }else{
            $error='Ocurrió un error al procesar su información '.$error;
            $this->session->set_userdata("error",$error);            
        }                       
        
        redirect('mainpanel/registros/edit/'.$id);
    }
    
    public function delete($id) {
        $this->validacion->validacion_login();
        

        $resultado=$this->Model_usuarios->deleteRegistro($id);
 
        if($resultado==true){
            $this->session->set_userdata("success",'Se procesó correctamente la información');
        }else{
            $error='Ocurrió un error al procesar su información '.$error;
            $this->session->set_userdata("error",$error);
        }         
        redirect('mainpanel/registros/listado');
    }
    
    public function nuevo() {
        $this->validacion->validacion_login();
        // GENERAL *********************************************************
        $data['current_section'] = 'registros';
        $data['lista_menu'] = $this->load->view('mainpanel/includes/menu', $data, true);
        $data["cuerpo"]="registros/nuevo_view";
        


        $this->load->view("mainpanel/includes/template", $data);        
    }
    
    public function grabar() {
        $this->validacion->validacion_login();
        // GRABAR registros
        $data = array();
        $data['nombre']         = $this->input->post('nombre');
        $data['email']          = $this->input->post('email');         
        $data['estado']          = $this->input->post('estado');
        $data['telefono']    = $this->input->post('telefono');
        $data['usuario']    = $this->input->post('usuario');  
        $data['password']    = $this->input->post('password');                  
        $data['nivel']    = $this->input->post('nivel');                
        $data['fecha_registro']    = gmdate("Y/m/d H:i:s",time()-18000);                  



        $resultado = $this->Model_usuarios->grabarRegistro($data);
        if($resultado==true){
            $this->session->set_userdata("success",'Se procesó correctamente la información');
            redirect('mainpanel/registros/listado');
        }else{
            $error='Ocurrió un error al procesar su información';
            $this->session->set_userdata("error",$error);
            redirect('mainpanel/registros/nuevo');
        }           
    }
}
?>

<?php
class Controller_cliente extends CI_Controller {

    private $current_section    ='clientes';
    private $section_catalogo   ='clientes';    

    function __construct() {
        parent::__construct();
        $this->load->library('validacion');
        $this->load->model('mainpanel/Model_cliente');
        $this->load->library('my_upload');
    }
    
    
    public function listado() {
        $this->validacion->validacion_login();
        // GENERAL *********************************************************
        $data['current_section']    = $this->current_section;
        $data['section_catalogo']   = "listado";        
        $data['lista_sub_menu']     = $this->load->view('mainpanel/includes/submenu_clientes', $data, true);        
        $data['lista_menu']         = $this->load->view('mainpanel/includes/menu', $data, true);


        $data['cuerpo']=$this->section_catalogo."/index_view";


        // LISTA CATEGORIAS
        $listado            = $this->Model_cliente->getLista();
        $data["listado"]    = $listado;

        $this->load->view("mainpanel/includes/template", $data);
    }
    
    public function listado_cartera() {
        $this->validacion->validacion_login();
        // GENERAL *********************************************************
        $data['current_section']    = $this->current_section;
        $data['section_catalogo']   = "listado_cartera";        
        $data['lista_sub_menu']     = $this->load->view('mainpanel/includes/submenu_clientes', $data, true);        
        $data['lista_menu']         = $this->load->view('mainpanel/includes/menu', $data, true);


        $data['cuerpo']="cartera/index_view";


        // LISTA CATEGORIAS
        $listado           = $this->Model_cliente->getListaCartera();
        $data["listado"]   = $listado;

        $this->load->view("mainpanel/includes/template", $data);
    }    
    
    public function edit($id) {
        $this->validacion->validacion_login();
        // GENERAL *********************************************************
        $data['current_section']    = $this->current_section;
        $data['section_catalogo']   = $this->section_catalogo;         
        $data['lista_sub_menu']     = $this->load->view('mainpanel/includes/submenu_clientes', $data, true);   
        $data['lista_menu']         = $this->load->view('mainpanel/includes/menu', $data, true);

        $data['cuerpo']=$this->section_catalogo."/edit_view";

        // EDIT CATEGORIA
        $cliente          = $this->Model_cliente->get($id);
        $data['cliente']  = $cliente;
        $this->load->view("mainpanel/includes/template", $data);
    }
    
   
    
    public function actualizar() {
        $this->validacion->validacion_login();
        // EDITAR CLIENTE
        $id_cliente       = $this->input->post('id_cliente');        
        $ruc       = $this->input->post('ruc');
        $razon_social                = $this->input->post('razon_social');
        $ciiu                  = $this->input->post('ciiu');
        $f_fundacion                 = $this->input->post('f_fundacion');
        $n_trabajadores                  = $this->input->post('n_trabajadores');
        $nombre_comercial                  = $this->input->post('nombre_comercial');    
        $direccion       = $this->input->post('direccion');
        $distrito                = $this->input->post('distrito');
        $provincia                  = $this->input->post('provincia');
        $departamento                 = $this->input->post('departamento');
        $telefono01                  = $this->input->post('telefono01');
        $telefono02                  = $this->input->post('telefono02'); 
        $telefono03                 = $this->input->post('telefono03');
        $celular01                 = $this->input->post('celular01');        
        $fax01                  = $this->input->post('fax01');
        $fax02                  = $this->input->post('fax02');                        
        $estado                 = $this->input->post('estado');  
        $email                 = $this->input->post('email');
        $direccion_web                 = $this->input->post('direccion_web');                
        
        $data = array(
            'ruc'=>$ruc, 
            'razon_social'=>$razon_social,
            'ciiu'=>$ciiu,
            'f_fundacion'=>$f_fundacion,
            'n_trabajadores'=>$n_trabajadores,
            'nombre_comercial'=>$nombre_comercial,           
            'direccion'=>$direccion,
            'distrito'=>$distrito,           
            'provincia'=>$provincia,
            'departamento'=>$departamento,           
            'telefono01'=>$telefono01,
            'telefono02'=>$telefono02,           
            'telefono03'=>$telefono03,
            'celular01'=>$celular01,           
            'fax01'=>$fax01,
            'fax02'=>$fax02,                                               
            'email'=>$email,
            'direccion_web'=>$direccion_web,
            'estado'=>$estado
        );
        
        

        $result=$this->Model_cliente->update($id_cliente, $data);

        if($result==true){
            $this->session->set_userdata("success",'Se procesó correctamente la información');
        }else{
            $error='Ocurrió un error al procesar su información '.$error;
            $this->session->set_userdata("error",$error);            
        }                       
    
        redirect('mainpanel/clientes/edit/'.$id_cliente);
    }
    
    public function delete($id_cliente) {
        $this->validacion->validacion_login();
        

        

        //+------ BORRAMOS CATEGORIA ---------+
        $resultado=$this->Model_cliente->delete($id_cliente); 
        //+------ BORRAMOS CATEGORIA ---------+


        if($resultado==true){
            $this->session->set_userdata("success",'Se procesó correctamente la información');
        }else{
            $error='Ocurrió un error al procesar su información '.$error;
            $this->session->set_userdata("error",$error);
        }

        redirect('mainpanel/clientes/listado');
    }
    
    public function nueva_cartera() {
        $this->validacion->validacion_login();

        //-- GENERAL -------------//
        $data['current_section']    = $this->current_section;
        $data['section_catalogo']   = "listado_cartera";      
        $data['lista_sub_menu']     = $this->load->view('mainpanel/includes/submenu_clientes', $data, true);        
        $data['lista_menu']         = $this->load->view('mainpanel/includes/menu', $data, true);
        $data["cuerpo"]="cartera/nuevo_view";
        //-- GENERAL -------------//

        //-- LISTA DE CLIENTES -------------//
        $data['listado_clientes']  = $this->Model_cliente->getLista();        
        //-- LISTA DE CLIENTES -------------//        

        //-- LISTA DE TELEOPERADORES -------------//
        $data['listado_operadores'] = $this->Model_cliente->getListaOperadores();
        //-- LISTA DE TELEOPERADORES -------------//

        
        $this->load->view("mainpanel/includes/template", $data);        
    }
    
    public function grabar() {
        $this->validacion->validacion_login();

        //+------- RECEPCIONA VARIABLES --------+
        $ruc       = $this->input->post('ruc');
        $razon_social                = $this->input->post('razon_social');
        $ciiu                  = $this->input->post('ciiu');
        $f_fundacion                 = $this->input->post('f_fundacion');
        $n_trabajadores                  = $this->input->post('n_trabajadores');
        $nombre_comercial                  = $this->input->post('nombre_comercial');    
        $direccion       = $this->input->post('direccion');
        $distrito                = $this->input->post('distrito');
        $provincia                  = $this->input->post('provincia');
        $departamento                 = $this->input->post('departamento');
        $telefono01                  = $this->input->post('telefono01');
        $telefono02                  = $this->input->post('telefono02'); 
        $telefono03                 = $this->input->post('telefono03');
        $celular01                 = $this->input->post('celular01');        
        $fax01                  = $this->input->post('fax01');
        $fax02                  = $this->input->post('fax02');                        
        $estado                 = $this->input->post('estado');
        $email                 = $this->input->post('email');
        $direccion_web                 = $this->input->post('direccion_web');        
        //+------- RECEPCIONA VARIABLES --------+
        
        $data = array(
            'ruc'=>$ruc, 
            'razon_social'=>$razon_social,
            'ciiu'=>$ciiu,
            'f_fundacion'=>$f_fundacion,
            'n_trabajadores'=>$n_trabajadores,
            'nombre_comercial'=>$nombre_comercial,           
            'direccion'=>$direccion,
            'distrito'=>$distrito,           
            'provincia'=>$provincia,
            'departamento'=>$departamento,           
            'telefono01'=>$telefono01,
            'telefono02'=>$telefono02,           
            'telefono03'=>$telefono03,
            'celular01'=>$celular01,           
            'fax01'=>$fax01,
            'fax02'=>$fax02,                                               
            'estado'=>$estado,
            'email'=>$email,
            'direccion_web'=>$direccion_web,            
            'fecha_registro'=>gmdate("Y/m/d H:i:s",time()-18000)
        );
        
        
        $resultado = $this->Model_cliente->grabar($data);
        
        if($resultado==true){
            $this->session->set_userdata("success",'Se procesó correctamente la información');
            redirect('mainpanel/clientes/listado');
        }else{
            $error='Ocurrió un error al procesar su información';
            $this->session->set_userdata("error",$error);
            redirect('mainpanel/clientes/nuevo');
        }                   

    }
	
    
 
}
?>

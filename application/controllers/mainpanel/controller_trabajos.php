<?php
class Controller_trabajos extends CI_Controller {

    private $current_section    ='trabajos';
    private $section_catalogo   ='trabajos';    

    function __construct() {
        parent::__construct();
        $this->load->library('validacion');
        $this->load->model('mainpanel/Model_trabajos');
        $this->load->model('mainpanel/Model_usuarios');
        $this->load->model('mainpanel/Model_cliente');        
        $this->load->library('my_upload');
    }
    
    
    public function listado() {
        $this->validacion->validacion_login();
        // GENERAL *********************************************************
        $data['current_section']    = $this->current_section;
        $data['section_catalogo']   = 'listado';        
        $data['lista_sub_menu']     = $this->load->view('mainpanel/includes/submenu_trabajos', $data, true);        
        $data['lista_menu']         = $this->load->view('mainpanel/includes/menu', $data, true);


        $data['cuerpo']=$this->section_catalogo."/index_view";


        // LISTA TRABAJOS
        $listado            = $this->Model_trabajos->getListaTrabajos();
        $data["listado"]    = $listado;

        $this->load->view("mainpanel/includes/template", $data);
    }
    
    
    public function edit($id) {
        $this->validacion->validacion_login();
        // GENERAL *********************************************************
        $data['current_section']    = $this->current_section;
        $data['section_catalogo']   = 'listado';         
        $data['lista_sub_menu']     = $this->load->view('mainpanel/includes/submenu_trabajos', $data, true);   
        $data['lista_menu']         = $this->load->view('mainpanel/includes/menu', $data, true);

        $data['cuerpo']=$this->section_catalogo."/edit_view";

        // EDIT TRABAJO
        $trabajo          = $this->Model_trabajos->getTrabajo($id);
        $data['trabajo']  = $trabajo;

        // BUSCAR LISTADO
        $data['listaDetalle']= $this->Model_trabajos->getListaDetalle($trabajo->id_lista);

        // LISTA DE USUARIOS
        $data['usuarios']= $this->Model_usuarios->getListaUsuarios();

        // LISTA DE CLIENTES
        $data['clientes']= $this->Model_cliente->getLista();           

        $this->load->view("mainpanel/includes/template", $data);
    }
    
   
    
    public function actualizar() {
        $this->validacion->validacion_login();
        // EDITAR CATEGORIA
        $id_trabajo       = $this->input->post('id_trabajo');
        $id_usuario         = $this->input->post('id_usuario');
        $f_inicio            = $this->input->post('f_inicio');
        $cliconca              = $this->input->post('cliconca');
        $estado             = $this->input->post('estado');
        $encuesta           = $this->input->post('encuesta');
       
        $data = array(
            'id_usuario'=>$id_usuario, 
            'f_inicio'=>dmY_2_Ymd($f_inicio),
            'encuesta'=>$encuesta,
            'estado'=>$estado
        );

        // LISTA *********
        $trabajo          = $this->Model_trabajos->getTrabajo($id_trabajo);
        $id_lista=$trabajo->id_lista;
        $this->Model_trabajos->delLista($id_lista);        
        $cliconca=explode(",",$cliconca);
        $data1=array();
        foreach ($cliconca as $key => $value) {
            $data1[]=array(
                'id_cliente'=>$value,
                'id_lista'=>$id_lista
            );
        }
        $this->Model_trabajos->grabaListaDetalle($data1);
        // LISTA *********

        $result=$this->Model_trabajos->updateTrabajo($id_trabajo, $data);


        if($result==true){
            $this->session->set_userdata("success",'Se procesó correctamente la información');
        }else{
            $error='Ocurrió un error al procesar su información '.$error;
            $this->session->set_userdata("error",$error);            
        }                       
    
        redirect('mainpanel/trabajos/edit/'.$id_trabajo);
    }
    
    public function delete($id_trabajo) {
        $this->validacion->validacion_login();
        
        $trabajo   = $this->Model_trabajos->getTrabajo($id_trabajo);
        $resultado = $this->Model_trabajos->deleteTrabajo($trabajo->id_trabajo); 

        if($resultado==true){
            $this->session->set_userdata("success",'Se procesó correctamente la información');
        }else{
            $error='Ocurrió un error al procesar su información '.$error;
            $this->session->set_userdata("error",$error);
        }

        redirect('mainpanel/trabajos/listado');
    }
    
    public function nuevo() {
        $this->validacion->validacion_login();
        // GENERAL *********************************************************
        $data['current_section']    = $this->current_section;
        $data['section_catalogo']   = 'nuevo';      
        $data['lista_sub_menu']     = $this->load->view('mainpanel/includes/submenu_trabajos', $data, true); 

        $menu['lista_menu'] = $this->load->view('mainpanel/includes/menu', $data, true);

        $this->load->view('mainpanel/includes/header_view', $menu, true);
        $this->load->view('mainpanel/includes/footer_view', $data, true);

        $data["cuerpo"]=$this->section_catalogo."/nuevo_view";
        
        // LISTA DE USUARIOS
        $data['usuarios']= $this->Model_usuarios->getListaUsuarios();

        // LISTA DE CLIENTES
        $data['clientes']= $this->Model_cliente->getLista();        
        
        // NUEVO CATEGORIA
        $this->load->view("mainpanel/includes/template", $data);        
    }
    
    public function grabar() {
        $this->validacion->validacion_login();

        //+------- RECEPCIONA VARIABLES --------+
        $id_usuario       = $this->input->post('id_usuario');
        $f_inicio         = $this->input->post('f_inicio');
        $cliconca         = $this->input->post('cliconca');
        $estado           = $this->input->post('estado');
        $encuesta           = $this->input->post('encuesta');
        
        //+------- RECEPCIONA VARIABLES --------+
        
        $data = array(
            'id_usuario'=>$id_usuario,
            'f_inicio'=>dmY_2_Ymd($f_inicio),
            'f_registro'=>fecha_hoy_Ymd(),
            'encuesta'=>$encuesta,        
            'estado'=>$estado
        );
        
        $lista=array('id_lista'=>'');
        $id_lista = $this->Model_trabajos->crearListaHead($lista);

        $cliconca=explode(",",$cliconca);
        $data1=array();
        foreach ($cliconca as $key => $value) {
            $data1[]=array(
                'id_cliente'=>$value,
                'id_lista'=>$id_lista
            );
        }
        $this->Model_trabajos->grabaListaDetalle($data1);

        $data['id_lista'] = $id_lista;

        $resultado = $this->Model_trabajos->grabarTrabajo($data);
             
        if($resultado){
            redirect('mainpanel/trabajos/listado');
        }
    }
	
    
 
}
?>

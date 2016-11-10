<?php
class Controller_encuesta extends CI_Controller {

    private $current_section    ='encuestas';
    private $section_catalogo   ='lista';    

    function __construct() {
        parent::__construct();
        $this->load->library('validacion');
        $this->load->model('mainpanel/Model_usuarios');
        $this->load->model('mainpanel/Model_cliente');        
        $this->load->model('mainpanel/Model_encuesta');
        $this->load->library('my_upload');

    }
    
    public function listado() {
        $this->validacion->validacion_login();
        // GENERAL *********************************************************
        $data['current_section']    = $this->current_section;
        $data['section_catalogo']   = 'listado';        
        $data['lista_sub_menu']     = $this->load->view('mainpanel/includes/submenu_encuesta', $data, true);        
        $data['lista_menu']         = $this->load->view('mainpanel/includes/menu', $data, true);

        $data['cuerpo']=$this->current_section."/index_view";

        // LISTA TRABAJOS
        $listados            = $this->Model_encuesta->getLista(5);
        $data["listados"]    = $listados;

        $this->load->view("mainpanel/includes/template", $data);
    }

    
    public function lista_cli($id) {
        $this->validacion->validacion_login();
        // GENERAL *********************************************************
        $data['current_section']    = $this->current_section;
        $data['section_catalogo']   = 'lista_cli';        
        //$data['lista_sub_menu']     = $this->load->view('mainpanel/includes/submenu_trabajos', $data, true);        
        $data['lista_menu']         = $this->load->view('mainpanel/includes/menu', $data, true);

        $data['cuerpo']=$this->current_section."/lista_cli";

        $trabajo          = $this->Model_trabajos->getTrabajo($id);
        // LISTA CLIENTES
        $listado            = $this->Model_xencuestar->lista_cli($trabajo->id_lista);
        $data["listado"]    = $listado;
        $data["trabajo"]    = $trabajo;        

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

    public function delete_enunciado($id,$encu){

        $this->validacion->validacion_login();
        
        $resultado = $this->Model_encuesta->deleteEnunciado($id); 

        if($resultado==true){
            
        }
        redirect('mainpanel/encuesta/edit/'.$encu);
        
    }    
    
    public function nuevo_paso1() {
        $this->validacion->validacion_login();
        // GENERAL *********************************************************
        $data['current_section']    = $this->current_section;
        $data['section_catalogo']   = 'paso1';      
        $data['lista_sub_menu']     = $this->load->view('mainpanel/includes/submenu_encuesta', $data, true); 

        $data['lista_menu'] = $this->load->view('mainpanel/includes/menu', $data, true);

        $data["cuerpo"]=$this->current_section."/nuevo_view_paso1";
        
        $this->load->view("mainpanel/includes/template", $data);        
    }
    
    public function graba_paso1() {
        $this->validacion->validacion_login();

        $siguiente=$this->input->post('siguiente');
        if($siguiente==true){

            //+------- RECEPCIONA VARIABLES --------+
            $tit_encu       = $this->input->post('tit_encu');
            $desc_encu      = $this->input->post('desc_encu');        
            //+------- RECEPCIONA VARIABLES --------+

            //'f_inicio'=>dmY_2_Ymd($f_inicio),
            $data = array(
                'tit_encu'=>$tit_encu,
                'desc_encu'=>$desc_encu,
                'fg'=>gmdate("Y/m/d H:i:s",time()-18000),
                'id_usu'=>$this->session->userdata('id_admin')
            );
            $id_encu = $this->Model_encuesta->saveEncu($data);
            

            redirect('mainpanel/encuesta/nuevo/paso2/'.$id_encu);

            $data['current_section']    = $this->current_section;
            $data['lista_sub_menu']     = $this->load->view('mainpanel/includes/submenu_encuesta', $data, true); 
            $data['lista_menu'] = $this->load->view('mainpanel/includes/menu', $data, true);
            $data['encuesta']    = $encuesta;
            $data["cuerpo"]=$this->current_section."/nuevo_view_paso2";
            $data['section_catalogo']   = 'paso2';      
            $this->load->view("mainpanel/includes/template", $data);        
        }else{
            redirect('mainpanel/encuesta');
        }
 
        
    }

    public function nuevo_paso2($id_encu) {
        $this->validacion->validacion_login();
        // GENERAL *********************************************************
        $data['current_section']    = $this->current_section;
        $data['section_catalogo']   = 'paso1';      
        $data['lista_sub_menu']     = $this->load->view('mainpanel/includes/submenu_encuesta', $data, true); 
        $data['lista_menu'] = $this->load->view('mainpanel/includes/menu', $data, true);
        $data["cuerpo"]=$this->current_section."/nuevo_view_paso2";
        $encuesta = $this->Model_encuesta->getEncu($id_encu);
        $anuncios = $this->Model_encuesta->getAnun($id_encu);        
        $data['encuesta']    = $encuesta;
        $data['anuncios']    = $anuncios;        
        
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
	

    public function editar_enunciado() {
        $this->validacion->validacion_login();

        //+------- RECEPCIONA VARIABLES --------+
        $opciones_concat       = $this->input->post('opciones_concat');
        $id_tip_enun         = $this->input->post('id_tip_enun');
        $id_encu         = $this->input->post('id_encu');        
        $id_enun         = $this->input->post('id_enun');
        $question_new           = $this->input->post('question_new');
        //+------- RECEPCIONA VARIABLES --------+

        $resultado = $this->Model_encuesta->deleteOpc($id_enun);

        $data=array('desc_enun'=>$question_new);
        $resultado = $this->Model_encuesta->update_encuesta($id_enun,$data);        

        if($id_tip_enun<>3){
            $opciones_concat=explode("##^^##",$opciones_concat);
            $data=array();
            foreach ($opciones_concat as $key => $value) {
                $data[]=array(
                    'desc_opc'=>$value,
                    'id_enun'=>$id_enun
                );
            }
            $resultado=$this->Model_encuesta->grabar_opciones($data);
        }
        
        if($resultado){
            redirect('mainpanel/encuesta/edit/'.$id_encu);
        }
    }    
    
 
}
?>

<?php
class Controller_asignaciones extends CI_Controller {

    private $current_section    ='asignaciones';
    private $section_catalogo   ='asignaciones';    

    function __construct() {
        parent::__construct();
        $this->load->library('validacion');
        $this->load->model('mainpanel/Model_cliente');
        $this->load->model('mainpanel/Model_cartera');        
        $this->load->model('mainpanel/Model_asignaciones');                
        $this->load->library('my_upload');
    }
    
    

    
    public function index() {
        $this->validacion->validacion_login();
        // GENERAL *********************************************************
        $data['current_section']    = $this->current_section;
        $data['section_catalogo']   = "listado_cartera";        
        $data['lista_sub_menu']     = $this->load->view('mainpanel/includes/submenu_asignaciones', $data, true);        
        $data['lista_menu']         = $this->load->view('mainpanel/includes/menu', $data, true);


        $data['cuerpo']="asignaciones/index_view";


        // LISTA CATEGORIAS
        $listado           = $this->Model_cartera->getListaCartera();
        $data["listado"]   = $listado;

        $this->load->view("mainpanel/includes/template", $data);
    }    
   
    
 
    public function nueva() {
        $this->validacion->validacion_login();

        //-- GENERAL -------------//
        $data['current_section']    = $this->current_section;
        $data['section_catalogo']   = "listado_asignaciones";      
        $data['lista_sub_menu']     = $this->load->view('mainpanel/includes/submenu_asignaciones', $data, true);        
        $data['lista_menu']         = $this->load->view('mainpanel/includes/menu', $data, true);
        $data["cuerpo"]="asignaciones/nuevo_view";
        //-- GENERAL -------------//

        //-- LISTA DE CLIENTES -------------//
        $data['listado_clientes']  = $this->Model_cliente->getLista();        
        //-- LISTA DE CLIENTES -------------//        

        //-- LISTA DE TELEOPERADORES -------------//
        $data['listado_operadores'] = $this->Model_cliente->getListaOperadores();
        //-- LISTA DE TELEOPERADORES -------------//

        //-- LISTA DE ENCUENSTAS -----------------//
        $data['listado_encuestas'] = $this->Model_asignaciones->getListaEncuestas();
        //-- LISTA DE ENCUENSTAS -----------------//
        
        $this->load->view("mainpanel/includes/template", $data);        
    }
    
    public function grabar_cartera() {
        $this->validacion->validacion_login();

        //+------- RECEPCIONA VARIABLES --------+
        $nombre                = $this->input->post('nombre');
        $usuarios_id           = $this->input->post('usuarios_id');
        $clientes              = $this->input->post('clientes');
        $std                   = $this->input->post('estado');
        $usureg                = $this->session->userdata('id_admin');
        $fg                    = gmdate("Y/m/d H:i:s",time()-18000);
        //+------- RECEPCIONA VARIABLES --------+
        

        //+------- GRABAR CABCERA --------+        
        $data = array(
            'nombre'=>$nombre, 
            'usuarios_id'=>$usuarios_id,
            'std'=>$std,
            'fg'=>$fg,
            'usureg'=>$usureg
        );
        $idCabCart = $this->Model_cartera->grabar_cabcar($data);
        //+------- GRABAR CABCERA --------+        


        //+------- GRABAR DETALLE --------+
        $data=Array();
        foreach ($clientes as $value) {
            $data[] = array(
                'idtcab_cartera'=>$idCabCart, 
                'id_cliente'=>$value,
                'fg'=>$fg
            );        
        } 
        $resultado = $this->Model_cartera->grabar_detcar($data);
        //+------- GRABAR DETALLE --------+  


        if($resultado==true){
            $this->session->set_userdata("success",'Se procesó correctamente la información');
            redirect('mainpanel/clientes/cartera');
        }else{
            $error='Ocurrió un error al procesar su información';
            $this->session->set_userdata("error",$error);
            redirect('mainpanel/clientes/cartera/nuevo');
        }                   

    }
	
    public function edit_cartera($id) {
        $this->validacion->validacion_login();
        // GENERAL *********************************************************
        $data['current_section']    = $this->current_section;
        $data['section_catalogo']   = $this->section_catalogo;         
        $data['lista_sub_menu']     = $this->load->view('mainpanel/includes/submenu_clientes', $data, true);   
        $data['lista_menu']         = $this->load->view('mainpanel/includes/menu', $data, true);

        $data['cuerpo']="cartera/edit_view";

        //-- LISTA DE CLIENTES -------------//
        $data['listado_clientes']  = $this->Model_cliente->getLista();        
        //-- LISTA DE CLIENTES -------------//        

        //-- LISTA DE TELEOPERADORES -------------//
        $data['listado_operadores'] = $this->Model_cliente->getListaOperadores();
        //-- LISTA DE TELEOPERADORES -------------//


        $data['cabcartera']        = $this->Model_cartera->getCab($id);
        $data['detcartera']        = $this->Model_cartera->getDetCartera($id);
        $this->load->view("mainpanel/includes/template", $data);
    }    
    
    
    public function delete_cartera($idtcab_cartera) {
        $this->validacion->validacion_login();
       
        //+------- DELETE CABECERA -------+        
        $resultado = $this->Model_cartera->del_cab($idtcab_cartera);
        //+------- DELETE CABECERA -------+        


        //+------- DELETE DETALLE --------+        
        $resultado = $this->Model_cartera->del_detcab($idtcab_cartera);
        //+------- DELETE DETALLE --------+  


        if($resultado==true){
            $this->session->set_userdata("success",'Se procesó correctamente la información');
        }else{
            $error='Ocurrió un error al procesar su información '.$error;
            $this->session->set_userdata("error",$error);
        }

        redirect('mainpanel/clientes/cartera');
    }


    public function actualizar_cartera() {
        $this->validacion->validacion_login();

        //+------- RECEPCIONA VARIABLES --------+
        $idtcab_cartera        = $this->input->post('idtcab_cartera');
        $nombre                = $this->input->post('nombre');        
        $usuarios_id           = $this->input->post('usuarios_id');
        $clientes              = $this->input->post('clientes');
        $estado                = $this->input->post('estado');
        $usumod                = $this->session->userdata('id_admin');
        $fgmod                 = gmdate("Y/m/d H:i:s",time()-18000);
        //+------- RECEPCIONA VARIABLES --------+
        

        //+------- GRABAR CABCERA --------+        
        $data = array(
            'nombre'=>$nombre, 
            'usuarios_id'=>$usuarios_id,
            'std'=>$estado,
            'fgmod'=>$fgmod,
            'usumod'=>$usumod
        );
        $resultado = $this->Model_cartera->update_cabcar($idtcab_cartera,$data);
        //+------- GRABAR CABCERA --------+        

        //+------- DELETE DETALLE --------+        
        $resultado = $this->Model_cartera->del_detcab($idtcab_cartera);
        //+------- DELETE DETALLE --------+        

        //+------- GRABAR DETALLE --------+
        $data=Array();
        foreach ($clientes as $value) {
            $data[] = array(
                'idtcab_cartera'=>$idtcab_cartera, 
                'id_cliente'=>$value,
                'fg'=>$fg
            );        
        } 
        $resultado = $this->Model_cartera->grabar_detcar($data);
        //+------- GRABAR DETALLE --------+  


        if($resultado==true){
            $this->session->set_userdata("success",'Se procesó correctamente la información');
            redirect('mainpanel/clientes/cartera/edit/'.$idtcab_cartera);
        }else{
            $error='Ocurrió un error al procesar su información';
            $this->session->set_userdata("error",$error);
            redirect('mainpanel/clientes/cartera/edit/'.$idtcab_cartera);
        }                   

    }    
 
}
?>

<?php
class Controller_banners extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->library('validacion');
        $this->load->model('mainpanel/model_banners');
        $this->load->library('my_upload');
    }
    
    public function index() {
        $this->validacion->validacion_login();
        // GENERAL *********************************************************
        $data['current_section'] = 'inicio';
        $data['lista_menu'] = $this->load->view('mainpanel/includes/menu', $data, true);
        $data['cuerpo']="banners/index_view";
        $data['banners']=$this->model_banners->getListaBanners();
        // *****************************************************************
        $this->load->view("mainpanel/includes/template", $data);
    }
    
    
    public function edit($idbanner) {
        $this->validacion->validacion_login();
        // GENERAL *********************************************************
        $data['current_section'] = 'inicio';
        $menu['lista_menu'] = $this->load->view('mainpanel/includes/menu', $data, true);
        $this->load->view('mainpanel/includes/header_view', $menu, true);

        $this->load->view('mainpanel/includes/footer_view', $data, true); 
        $data['cuerpo']="banners/edit_view";
        // *****************************************************************
        // 
        // EDIT BANNER
        $banner = $this->model_banners->getBanner($idbanner);
        $data['banner'] = $banner;
        $this->load->view("mainpanel/includes/template", $data);
    }
    
    public function actualizar() {
        $this->validacion->validacion_login();
        // EDITAR BANNER
        $idbanner = $this->input->post('idbanner');
        $frase_1 = $this->input->post('frase_1');
        $frase_2 = $this->input->post('frase_2');
        $frase_3 = $this->input->post('frase_3');  
        $orden = $this->input->post('orden');
        $estado = $this->input->post('estado');
        $imgatng = $this->input->post('imgatng');        
        $data = array(
            'orden'     =>$orden, 
            'estado'    =>$estado,
            'frase_1'    =>$frase_1,           
            'frase_2'    =>$frase_2,
            'frase_3'    =>$frase_3
        );
        
        $this->my_upload->upload($_FILES["banner"]);
        if ( $this->my_upload->uploaded == true  )
        {
            $this->my_upload->allowed          = array('image/*');
            $this->my_upload->image_resize     = true;
            $this->my_upload->image_ratio_crop = true;
            $this->my_upload->image_x          = 1889;
            $this->my_upload->image_y          = 600;
            $this->my_upload->process('./files/banners/');
            if ( $this->my_upload->processed == true ) {
                $data['imagen'] = $this->my_upload->file_dst_name;
                $this->my_upload->clean(); 
                @unlink('./files/banners/'.$imgatng);
                
            } else {
                $error = $this->my_upload->error;
            }
        }       
        
        if(isset($error)){
            $this->session->set_userdata("error",$error);             
        }else{
            $result=$this->model_banners->updateBanner($idbanner, $data);
            if($result==true){
                $this->session->set_userdata("success",'Se procesó correctamente la información');
            }else{
                $error='Ocurrió un error al procesar su información';
                $this->session->set_userdata("error",$error);            
            }            
        }
        redirect('mainpanel/banners/edit/'.$idbanner);
    }
    
    public function delete($idbanner) {
        $this->validacion->validacion_login();
        $banner = $this->model_banners->getBanner($idbanner);
        $imagen=$banner->imagen;
        @unlink('files/banners/'.$imagen);
        $result=$this->model_banners->deleteBanner($idbanner);
        if($result == true){
            $this->session->set_userdata("success","Su información se proceso con exito");
            redirect('mainpanel/banners');
        }else{
            $this->session->set_userdata("error","Ocurrio un problema al procesar su informacion");            
            redirect('mainpanel/banners');        
        }
    }
    
    public function nuevo() {
        $this->validacion->validacion_login();
        // GENERAL *********************************************************
        $data['current_section'] = 'inicio';
        $menu['lista_menu'] = $this->load->view('mainpanel/includes/menu', $data, true);
        $this->load->view('mainpanel/includes/header_view', $menu, true);
        $this->load->view('mainpanel/includes/footer_view', $data, true); 
        $data['cuerpo']="banners/nuevo_view";
        // ***************************************************************** 
        $ulti=$this->model_banners->ultBanner();
        $data['ultimo']=$ulti['orden'] + 1;
        $this->load->view("mainpanel/includes/template", $data);        
    }
    
    public function grabar() {
        $this->validacion->validacion_login();
        // GRABAR BANNER
        $frase_1 = $this->input->post('frase_1');
        $frase_2 = $this->input->post('frase_2');
        $frase_3 = $this->input->post('frase_3');                
        $orden = $this->input->post('orden');
        $estado = $this->input->post('estado');

        $data = array(
            'orden'     =>$orden, 
            'estado'    =>$estado,
            'frase_1'    =>$frase_1,
            'frase_2'    =>$frase_2,
            'frase_3'    =>$frase_3
        );
        
        $this->my_upload->upload($_FILES["banner"]);
        if ( $this->my_upload->uploaded == true  )
        {
            $this->my_upload->allowed          = array('image/*');
            $this->my_upload->image_resize     = true;
            $this->my_upload->image_ratio_crop = true;
            $this->my_upload->image_x          = 1889;
            $this->my_upload->image_y          = 600;
            $this->my_upload->process('./files/banners/');
            if ( $this->my_upload->processed == true )
            {
                $data['imagen'] = $this->my_upload->file_dst_name;
                $this->my_upload->clean();
                $result = $this->model_banners->grabarBanner($data);
                if($result==true){
                    $this->session->set_userdata("success",'Se procesó correctamente la información');
                    redirect('mainpanel/banners');
                }else{
                    $error='Ocurrió un error al procesar su información ';
                    $this->session->set_userdata("error",$error);            
                    redirect('mainpanel/banners/nuevo');
                }                    
            }else{
                $error = $this->my_upload->error;
                $this->session->set_userdata("error",$error);                
                redirect('mainpanel/banners/nuevo');
            }
        }
        else
        {
            $error = $this->my_upload->error;
            $this->session->set_userdata("error",$error);
            redirect('mainpanel/banners/nuevo');
        }
    }
}
?>

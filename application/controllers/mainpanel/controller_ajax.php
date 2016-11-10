<?php
class Controller_ajax extends CI_Controller {
    function __construct()
    {
        parent::__construct();
    
        $this->load->model('mainpanel/Model_ajax');
    }

    public function index()	{

    }

    public function addQuestion() {
        $json=array(); 

        $data=array(
            "desc_enun"=>$_POST['question_new'],
            "id_encu"=>$_POST['id_encu'],
            "obligatorio"=>$_POST['obligatorio'],
            "id_tip_enun"=>$_POST['id_tip_enun'],
            "fg"=>gmdate("Y/m/d H:i:s")
            ); 

        $opciones_concat = $_POST['opciones_concat'];        



        $result=$this->Model_ajax->addQuestion($data,$opciones_concat);                           
        $json['result'] = $result;
        echo json_encode($json);
    }   
    
    public function updateusuario() {
        $json=array();        
        $nombres = $_POST['nombres'];
        $password = $_POST['password'];        
        $newpasw = $_POST['newpasw'];
        $idusuario = $this->session->userdata('id_admin'); 
        $this->session->set_userdata('nombre_admin', $nombres);
        $result=$this->Model_ajax->updateusuario($nombres,$newpasw,$idusuario,$password);                           
        $json['result'] = $result;
        echo json_encode($json);
    }   
    
    public function get_anun() {
        $json=array();        
        $id_enun = $_POST['id_enun'];
        $id_encu = $_POST['id_encu'];        
        $result=$this->Model_ajax->get_anun($id_enun,$id_encu);
        $json['lista'] = $result;
        echo json_encode($json);
    } 

   public function ordProd() {
        $json=array();      
        $ordenes = $_POST['orden'];	
        $cad1=explode("&",$ordenes);
        $num=count($cad1);
        $orden=0;
	for($o=1;$o<=$num;$o++){
            $str=explode("=",$cad1[$o]);
            $id=$str[1];
            $orden +=1;
            $data=array();
            $data['ordestaca']=$orden;
            $this->Model_ajax->ordProd($id,$data);        
            //$aux = "update productos set orden='$pos' where id_producto='$id'";
            //$sql[] = $aux;
            //$query = mysql_query($aux);	
        }
        $json['result'] = 'Se ordeno correctamente!';
        echo json_encode($json);
    }  

    public function iniciarEncuesta() {
        $json=array();        

        $id_cliente = $_POST['id_cliente'];
        $id_trabajo = $_POST['id_trabajo'];
        $id_lista = $_POST['id_lista'];                

        $lista=$this->Model_subsubcategoria->getLista($padre);
        if(count($lista)>0){
            $json['result']=1;
        }else{
            $json['result']=0;
        }
        
        $json['lista'] = $lista;
        echo json_encode($json);
    }

    public function cotz_x_cli() {
        $json=array();        
        $id_cliente = $_POST['id_cliente'];
        $num=$this->Model_ajax->cotz_x_cli($id_cliente);
        $json['num'] = $num;
        echo json_encode($json);
    }

    public function consulta_anunciado() {
        $json=array();        
        $id_enun = $_POST['id_enun'];
        $id_encu = $_POST['id_encu'];        
        $num=$this->Model_ajax->consulta_anunciado($id_enun);
        $json['num'] = $num;
        echo json_encode($json);
    }

}
?>

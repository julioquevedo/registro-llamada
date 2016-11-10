<?php
class Model_ajax extends CI_Model {
    public function __construct()
    {
            parent::__construct();
    }
    
    public function updateusuario($nombres,$newpasw,$idusuario,$password) {
        $this->db->where('id', $idusuario);
        $this->db->where('password', $password);        
        $query =  $this->db->get('usuarios');
        $num=$query->num_rows();
        if($num>0){
            if(!empty($newpasw)):$ps=$newpasw; else :$ps=$password; endif;
            $data = array(
               'password' => $ps,
               'nombre' => $nombres        
            );
            $this->db->where('id', $idusuario);
            $result=$this->db->update('usuarios', $data);
        }else{
            $result='';
        }
        return $result;
    }  

    public function addQuestion($data,$opciones_concat) {

        $this->db->insert("enunciados", $data);
        $ultimo_id=$this->db->insert_id();

        $data=[];
        $opciones_concat=explode("##^^##", $opciones_concat);
        for ($i=0; $i < count($opciones_concat); $i++) { 
            $da=array(
                "desc_opc"=>$opciones_concat[$i],
                "id_enun"=>$ultimo_id
                );
            $data[]=$da;
        }

        $result=$this->db->insert_batch("opciones", $data);
        return $result;
    } 



    public function consulta_anunciado($id) {
        $this->db->where('id_enun', $id);
        $query =  $this->db->get('enunciados');
        return $query->result();

        $this->db->join('usuarios b','b.id=a.id_usuario','left');
        $this->db->from('trabajos a');
        $this->db->order_by('f_inicio','desc');        
        $query =  $this->db->get('');
        return $query->result_array();        
    } 

    public function cotz_x_cli($id_cliente) {
        $this->db->where('id_cliente', $id_cliente);
        $query =  $this->db->get('cotizaciones');
        return $query->num_rows();
    }  

    public function deleteCliente($id_cliente) {
        $this->db->where('id', $id_cliente);
        $this->db->delete('inscritos');
    } 

    public function getColor($id_color) {
        $this->db->where('id', $id_color);
        $query =  $this->db->get('colores');
        return $query->row();
    }  


    public function get_anun($idenun,$idencu) {
        $this->db->select('a.*,b.desc_opc,b.opc_ab');
        $this->db->join('opciones b','b.id_enun=a.id_enun','left');
        $this->db->from('enunciados a');
        $this->db->where('a.id_enun', $idenun);        
        $this->db->where('a.id_encu', $idencu);                
        $query =  $this->db->get('');
        return $query->result_array();
    }        

    public function getListaProductos($id_categoria) {
        $this->db->select('id_producto');
	$this->db->where('id_categoria_padre',$id_categoria);
        $query =  $this->db->get('productos');
        return $query->result();
    }
    public function updateStock($id_stock, $data) {
        $this->db->where('id', $id_stock);
        $this->db->update('stock_color', $data);
    }      
    public function ordProd($id,$data) {
        $this->db->where('id_producto', $id);
        $this->db->update('productos', $data);
    }       
}
?>
<?php
class Model_cartera extends CI_Model {

    private $tabla="cartera";

    public function __construct()
    {
            parent::__construct();
    }


    
    public function getListaCartera() {

        $this->db->select('a.*,b.nombre as nomusuario,b.usuario,b.usuario as ruc');                        
        $this->db->join('usuarios b','b.id=a.usuarios_id','left');                
        //$this->db->join('clientes c','c.id_cliente=a.clientes_id_cliente','left');                        
        $this->db->from('tcab_cartera a');
        $this->db->order_by('a.fg','desc');    
        $query =  $this->db->get('');
        return $query->result_array();
            
    }    

    
    public function getCab($id) {
        $this->db->where('idtcab_cartera', $id);
        $query =  $this->db->get('tcab_cartera');
        return $query->row_array();
    }

    public function getDetCartera($id) {
        $this->db->where('idtcab_cartera', $id);
        $query =  $this->db->get('cartera_clientes');
        return $query->result_array();
    }

    public function delete($id) {
        $this->db->where('id_cliente', $id);
        $resultado=$this->db->delete($this->tabla);
        return $resultado;
    }
	

    public function del_detcab($id) {
        $this->db->where('idtcab_cartera', $id);
        $resultado=$this->db->delete('cartera_clientes');
        return $resultado;
    }    
  
    public function del_cab($id) {
        $this->db->where('idtcab_cartera', $id);
        $resultado=$this->db->delete('tcab_cartera');
        return $resultado;
    }   
	
    public function update_cabcar($id, $data) {
        $this->db->where('idtcab_cartera', $id);
        $result=$this->db->update('tcab_cartera', $data);
        return $result;
    }
	

    public function grabar_cabcar($data) {
        $this->db->insert("tcab_cartera", $data);
        $ultimo_id=$this->db->insert_id();        
        return $ultimo_id;
    }

    public function grabar_detcar($data) {
        $result=$this->db->insert_batch("cartera_clientes", $data);
        return $result;
    } 

    public function ultimo($padre) {
        $this->db->select_max('orden');
        $this->db->where('padre', $padre);          
        $query =  $this->db->get($this->tabla);
        return $query->row_array();
    }  

}
?>

<?php
class Model_usuarios extends CI_Model {
    public function __construct()
    {
            parent::__construct();
    }

    public function getListaUsuarios() {
        $this->db->where_in('nivel',array('0','1','2'));
        $this->db->where('delete','0');        
        $this->db->order_by('fecha_registro','desc');
        $query =  $this->db->get('usuarios');
        return $query->result();
    }
    
    public function getRegistro($id) {
        $this->db->where('id', $id);
        $query =  $this->db->get('usuarios');
        return $query->row();
    }
	
    public function updateRegistro($id, $data) {
        $this->db->where('id', $id);
        $result=$this->db->update('usuarios', $data);
        return $result;
    }
	
 
    public function grabarRegistro($data) {
        $resultado = $this->db->insert('usuarios', $data);
        return $resultado;
    }

    
    public function deleteRegistrobk($id) {
        $this->db->where('id', $id);
        $result=$this->db->delete('usuarios');
        return $result;
    }   

    public function deleteRegistro($id){
        $data=array('delete'=>'1','estado'=>'I');
        $this->db->where('id', $id);
        $result=$this->db->update('usuarios', $data);
        return $result;
    }
     
}
?>

<?php
class Model_cliente extends CI_Model {

    private $tabla="clientes";

    public function __construct()
    {
            parent::__construct();
    }

    public function getLista() {
        $this->db->select('*');
        $this->db->where('estado', 'A');
        $this->db->order_by('id_cliente');
        $query =  $this->db->get($this->tabla);
        return $query->result_array();
    }
    
    public function getListaCartera() {

        $this->db->select('a.*,b.nombre,b.usuario');                        
        $this->db->join('usuarios b','b.id=a.usuarios_id','left');                
        //$this->db->join('clientes c','c.id_cliente=a.clientes_id_cliente','left');                        
        $this->db->from('tcab_cartera a');
        $this->db->order_by('a.fg','desc');    
        $query =  $this->db->get('');
        return $query->result();
            
    }    

    public function getListaOperadores() {
        $this->db->select('*');
        $this->db->where('nivel', '2');
        $this->db->where('estado', 'A');        
        $this->db->where('delete', '0');                
        $this->db->order_by('nombre','desc');
        $query =  $this->db->get('usuarios');
        return $query->result_array(); 
    }
    
    public function get($id) {
        $this->db->where('id_cliente', $id);
        $query =  $this->db->get($this->tabla);
        return $query->row();
    }
	
    public function delete($id) {
        $this->db->where('id_cliente', $id);
        $resultado=$this->db->delete($this->tabla);
        return $resultado;
    }
	
  
	
    public function update($id, $data) {
        $this->db->where('id_cliente', $id);
        $result=$this->db->update($this->tabla, $data);
        return $result;
    }
	
    public function grabar($data) {
        $resultado = $this->db->insert($this->tabla, $data);
        return $resultado;
    }

    public function ultimo($padre) {
        $this->db->select_max('orden');
        $this->db->where('padre', $padre);          
        $query =  $this->db->get($this->tabla);
        return $query->row_array();
    }  

}
?>

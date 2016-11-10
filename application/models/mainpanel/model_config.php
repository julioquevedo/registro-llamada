<?php
class Model_config extends CI_Model {
    public function __construct()
    {
            parent::__construct();
    }

    public function getListaParametros() {
        $this->db->where('visible',1);
        $query =  $this->db->get('configuracion');
        return $query->result();
    }
    
    public function updateConfiguracion($id_configuracion, $data) {
        $this->db->where('id', $id_configuracion);
        $result=$this->db->update('configuracion', $data);
        return $result;
    } 
    
    public function getConfiguracion($id_configuracion) {
        $this->db->where('id', $id_configuracion);
        $query =  $this->db->get('configuracion');
        return $query->row();
    }    
    
}
?>

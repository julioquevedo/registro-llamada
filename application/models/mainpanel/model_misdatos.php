<?php
class Model_misdatos extends CI_Model {
    public function __construct()
    {
            parent::__construct();
            //$default = $this->load->database('default',true);
           //$this->db_b = $this->load->database('default', true);
            //$cc= $
    }
    
    public function getUsuario($idUsario) {
        $this->db->where('id', $idUsario);
        $query =  $this->db->get('usuarios');
        return $query->row();
    }
    
    public function updateUsuario($idUsuario, $data) {
        $this->db->where('mmusuadid', $idUsuario);
        $resultado=$this->db->update('mmusua', $data);
        return $resultado;
    } 
    public function consultaPasw($idUsario,$pasw) {
        $this->db->where('mmusuadid', $idUsario);
        $this->db->where('mmusuapass', $pasw);        
        $query =  $this->db->get('mmusua');
        return $query->row();
    }    
}
<?php
class Model_encuesta extends CI_Model {
    public function __construct()
    {
            parent::__construct();
    }

    public function getLista($num=null) {
        $this->db->select('a.*,b.nombre,b.usuario');                        
        $this->db->join('usuarios b','b.id=a.id_usu','left');                
        $this->db->from('encuestas a');
        $this->db->order_by('fg','desc');    
        if($num) $this->db->limit($num);    
        $query =  $this->db->get('');
        return $query->result();
    }

    public function getAnun($id_encu) {
        $this->db->from('enunciados');
        $this->db->where('id_encu',$id_encu);        
        $query =  $this->db->get('');
        $resultado=$query->result_array();
        for ($i=0; $i < count($resultado) ; $i++) { 
            $id_enun=$resultado[$i]['id_enun'];

            $this->db->from('opciones');
            $this->db->where('id_enun',$id_enun);        
            $query =  $this->db->get('');
            $opciones=$query->result_array();            
            $resultado[$i]['opciones']=$opciones;
        }
        return $resultado;
    
    }    
    
    public function saveEncu($data) {
        $resultado = $this->db->insert('encuestas',$data);
        $id = $this->db->insert_id();
        return $id;
    }    
    
    public function crearListaHead($data) {
        $resultado = $this->db->insert('lista',$data);
        $id = $this->db->insert_id();
        return $id;
    }    
    public function grabaListaDetalle($data) {
        $resultado = $this->db->insert_batch('lista_detalle',$data);
        $id =  $this->db->insert_id();
        return $id;
    }       

    
    
    public function getEncu($id) {
        $this->db->where('id_encu', $id);
        $query =  $this->db->get('encuestas');
        return $query->row();
    }
	
    public function update_encuesta($id, $data) {
        $this->db->where('id_enun', $id);
        $result=$this->db->update('enunciados', $data);
        return $result;
    }
	
    public function grabar_opciones($data) {
        $result=$this->db->insert_batch("opciones", $data);
        return $result;
    }    
 
    public function grabarTrabajo($data) {
        $resultado = $this->db->insert('trabajos', $data);
        return $resultado;
    }

    
    public function deleteOpc($id) {
        $this->db->where('id_enun', $id);
        $result=$this->db->delete('opciones');
        return $result;
    }   

    public function deleteEnunciado($id) {
        $this->db->where('id_enun', $id);
        $result=$this->db->delete('enunciados');
        return $result;
    }     

    public function delLista($id) {
        $this->db->where('id_lista', $id);
        $result=$this->db->delete('lista_detalle');
        return $result;
    }
    public function deleteDetCotz($id_cotizacion) {
        $this->db->where('id_cotizacion', $id_cotizacion);
        $result=$this->db->delete('detalle_cotizacion');
        return $result;
    }  

    public function deleteCotz($id_cliente) {
        $this->db->where('id_cliente', $id_cliente);
        $result=$this->db->get('cotizaciones');
        $cotizaciones=$result->result_array();

        if($cotizaciones<>0){
            foreach ($cotizaciones as $key => $value) {
                $this->deleteDetCotz($value['id_cotizacion']);

                $this->db->where('id_cotizacion', $value['id_cotizacion']);
                $result=$this->db->delete('cotizaciones');                
            }
        }
        return $result;
    }  
     
}
?>

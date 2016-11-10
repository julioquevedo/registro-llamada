<?php
class Model_trabajos extends CI_Model {
    public function __construct()
    {
            parent::__construct();
    }

    public function getListaTrabajos() {
        $this->db->join('usuarios b','b.id=a.id_usuario','left');
        $this->db->from('trabajos a');
        $this->db->order_by('f_inicio','desc');        
        $query =  $this->db->get('');
        return $query->result_array();
    }

    public function getListaDetalle($id_lista) {
        $this->db->select('id_cliente');
        $this->db->from('lista_detalle');
        $this->db->where('id_lista',$id_lista);        
        $query =  $this->db->get('');
        return $query->result_array();
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

    
    
    public function getTrabajo($id) {
        $this->db->where('id_trabajo', $id);
        $query =  $this->db->get('trabajos');
        return $query->row();
    }
	
    public function updateTrabajo($id, $data) {
        $this->db->where('id_trabajo', $id);
        $result=$this->db->update('trabajos', $data);
        return $result;
    }
	
 
    public function grabarTrabajo($data) {
        $resultado = $this->db->insert('trabajos', $data);
        return $resultado;
    }

    
    public function deleteTrabajo($id) {
        $this->db->where('id_trabajo', $id);
        $result=$this->db->delete('trabajos');
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

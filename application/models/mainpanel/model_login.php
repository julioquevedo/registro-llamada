<?php
class Model_login extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}
	
	/*
	 * @Function que extrae la informacion de los cuadros que se muestran debajo del banner
	 */
        
        public function valida_usuario($username,$password) {
            $this->db->where('usuario', $username);
            $this->db->where('password', $password);
            $this->db->where('estado', 'A');            
            $query =  $this->db->get('usuarios');
            $hallados = $query->num_rows();
            if($hallados>0)
            {
                $result = $query->row();                
                $caso='ok###'.$result->nombre.'###'.$result->id;
                return $caso;
            }
            else
            {
                $this->db->where('usuario', $username);
                $this->db->where('password', $password);
                $query =  $this->db->get('usuarios');
                $hallados = $query->num_rows();
                if($hallados>0)                
                {
                    $caso='estado';
                    return $caso;
                }
                else
                {
                    $this->db->where('usuario', $username);
                    $query =  $this->db->get('usuarios');
                    $hallados = $query->num_rows();
                    if($hallados>0)
                    {
                        $caso='password';
                        return $caso;
                    }
                    else
                    {
                        $caso='usuario';
                        return $caso;
                    }                
                }               
            }
        }
}
?>
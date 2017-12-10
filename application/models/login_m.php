<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class Login_m extends CI_Model {
		
	public function _construct()
	{
		parent::_construct();
		//$this->load->helper('url');
		$this->load->database('default');
	}
	

	public function obt_perfil_usuario($usuario,$clave)
	{ if($query = $this->db->query("CALL SP_R_USU_OBT_PERFIL('".$usuario."','".$clave."','CLAVE_ENCRIPT_DECRIPT');"))
		{	if($query->num_rows() > 0 )
			{
				return $query->result();
			}
			
			else{
				//show_error('Error!');
			   return 0;
			}
	    }
	   
	}
	
	
	public function obt_nomcompleto_usuario($usuario,$clave)
	{ if($query = $this->db->query("CALL SP_R_USU_OBT_NOMCOMPLETO('".$usuario."','".$clave."','CLAVE_ENCRIPT_DECRIPT');"))
		{	if($query->num_rows() > 0 )
			{	return $query->result();}
			else{return 0;}
		}
	
	}
	
	
	public function obt_codigo_usuario($usuario,$clave)
	{ if($query = $this->db->query("CALL SP_R_USU_OBT_CODIGO('".$usuario."','".$clave."','CLAVE_ENCRIPT_DECRIPT');"))
		{	if($query->num_rows() > 0 )
			  {	return $query->result();}
			else{return 0;}
	    }
	}
	
	
	
	
	
	
	
}

<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class ConsContacto_m extends CI_Model {
		
	public function _construct()
	{
		parent::_construct();
		$this->load->database('default');
	}
	
	
	public function obt_totpaginas($Nombre)
	{	if($query = $this->db->query("CALL SP_R_CONTACTO_TOT_PAG('".$Nombre."');"))
		{	if($query->num_rows() > 0 )
				{	return $query->result();} 
			else{ return 0;}
		}
	
	}
	
	public function obt_lista($Numpagina,$Nombre)
	{	if($query = $this->db->query("CALL SP_R_CONTACTO_OBT_LISTA(".$Numpagina.",'".$Nombre."');"))
			{	if($query->num_rows() > 0 )
					{	return $query->result();}
				else{ return 0;}
			}
	
	}
	
	
	public function obt_contacto($codigo)
	{ if($query = $this->db->query("CALL SP_R_CONTACTO_OBT_X_CODIGO('".$codigo."');"))
			{	if($query->num_rows() > 0 )
					{return $query->result();}
					else{ return 0;}
			}
			
	}
	
	

	public function obt_ult_cod_contacto()
	{ if($query = $this->db->query("CALL SP_R_CONTACTO_OBT_ULT_COD();"))
		{	if($query->num_rows() > 0 )
			{return $query->result();}
			else{ return 0;}
			}
		
	}
	
	
	
	
		
}

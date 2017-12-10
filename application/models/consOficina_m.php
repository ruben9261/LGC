<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class ConsOficina_m extends CI_Model {
		
	public function _construct()
	{
		parent::_construct();
		$this->load->database('default');
	}
	
	
	public function obt_totpaginas($NombOfi,$Domi,$Tlfn)
	{	if($query = $this->db->query("CALL SP_R_OFICINA_TOT_PAG('".$NombOfi."','".$Domi."','".$Tlfn."');"))
		{	if($query->num_rows() > 0 )
				{	return $query->result();} 
			else{ return 0;}
		}
	
	}
	
	public function obt_lista($Numpagina,$NombOfi,$Domi,$Tlfn)
	{	if($query = $this->db->query("CALL SP_R_OFICINA_OBT_LISTA(".$Numpagina.",'".$NombOfi."','".$Domi."','".$Tlfn."');"))
			{	if($query->num_rows() > 0 )
					{	return $query->result();}
				else{ return 0;}
			}
	
	}
	
	
	public function obt_oficina($codofi)
	{ if($query = $this->db->query("CALL SP_R_OFICINA_OBT_X_CODIGO(".$codofi.");"))
			{	if($query->num_rows() > 0 )
					{return $query->result();}
					else{ return 0;}
			}
			
	}
	
	public function obt_empresas()
	{ if($query = $this->db->query("CALL SP_R_EMPRESA_OBT_EMPRESAS();"))
		{	if($query->num_rows() > 0 )
			{return $query->result();}
			else{ return 0;}
	}
	
	}
	
		
}

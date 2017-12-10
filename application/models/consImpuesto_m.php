<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class ConsImpuesto_m extends CI_Model {
		
	public function _construct()
	{
		parent::_construct();
		$this->load->database('default');
	}
	
	
	public function obt_totpaginas($Nombre,$Abrev)
	{	if($query = $this->db->query("CALL SP_R_IMPUESTO_TOT_PAG('".$Nombre."','".$Abrev."');"))
		{	if($query->num_rows() > 0 )
				{	return $query->result();} 
			else{ return 0;}
		}
	
	}
	
	public function obt_lista($Numpagina,$Nombre,$Abrev)
	{	if($query = $this->db->query("CALL SP_R_IMPUESTO_OBT_LISTA(".$Numpagina.",'".$Nombre."','".$Abrev."');"))
			{	if($query->num_rows() > 0 )
					{	return $query->result();}
				else{ return 0;}
			}
	
	}	
	
	public function obt_impuesto($codimp)
	{ if($query = $this->db->query("CALL SP_R_IMPUESTO_OBT_X_CODIGO(".$codimp.");"))
	{	if($query->num_rows() > 0 )
			{return $query->result();}
			else{ return 0;}
			}
			
	}
		
}

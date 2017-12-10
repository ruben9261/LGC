<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class ConsSerieCaja_m extends CI_Model {
		
	public function _construct()
	{	parent::_construct();
		$this->load->database('default');
	}
	
	
	public function obt_totpaginas($caja,$serie)
	{	if($query = $this->db->query("CALL SP_R_SERIE_CAJA_TOT_PAG('".$caja."','".$serie."');"))
		{	if($query->num_rows() > 0 )
				{	return $query->result();} 
			else{ return 0;}
		}
	
	}
	
	public function obt_lista($Numpagina,$caja,$serie)
	{	if($query = $this->db->query("CALL SP_R_SERIE_CAJA_OBT_LISTA(".$Numpagina.",'".$caja."','".$serie."');"))
			{	if($query->num_rows() > 0 )
					{	return $query->result();}
				else{ return 0;}
			}
	}
	
	
	public function obt_serie($codserie)
	{ if($query = $this->db->query("CALL SP_R_SERIE_CAJA_OBT_X_CODIGO(".$codserie.");"))
			{	if($query->num_rows() > 0 )
					{return $query->result();}
					else{ return 0;}
			}
			
	}
	
	
	public function obt_cajas()
	{ if($query = $this->db->query("CALL SP_R_CAJA_OBT_CAJAS();"))
		{   if($query->num_rows() > 0 )
			    {return $query->result();}
			else{ return 0;}
		}
		
	}
	
	
		
}

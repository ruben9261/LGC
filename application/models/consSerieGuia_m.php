<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class ConsSerieGuia_m extends CI_Model {
		
	public function _construct()
	{	parent::_construct();
		$this->load->database('default');
	}
	
	
	public function obt_totpaginas($oficina,$serie)
	{	if($query = $this->db->query("CALL SP_R_SERIE_GUIA_TOT_PAG('".$oficina."','".$serie."');"))
		{	if($query->num_rows() > 0 )
				{	return $query->result();} 
			else{ return 0;}
		}
	
	}
	
	public function obt_lista($Numpagina,$oficina,$serie)
	{	if($query = $this->db->query("CALL SP_R_SERIE_GUIA_OBT_LISTA(".$Numpagina.",'".$oficina."','".$serie."');"))
			{	if($query->num_rows() > 0 )
					{	return $query->result();}
				else{ return 0;}
			}
	}
	
	
	public function obt_serie($codserie)
	{ if($query = $this->db->query("CALL SP_R_SERIE_GUIA_OBT_X_CODIGO(".$codserie.");"))
			{	if($query->num_rows() > 0 )
					{return $query->result();}
					else{ return 0;}
			}
			
	}
	
	
	public function obt_oficinas()
	{ if($query = $this->db->query("CALL SP_R_OFICINA_OBT_OFICINAS();"))
	{   if($query->num_rows() > 0 )
	{return $query->result();}
	else{ return 0;}
	}
	
	}
	
	
	
	
	public function obt_tipos_serie()
	{ if($query = $this->db->query("CALL SP_R_TIPO_SERIE_OBT_TIPOS();"))
		{   if($query->num_rows() > 0 )
			    {return $query->result();}
			else{ return 0;}
		}
		
	}
	
	
		
}

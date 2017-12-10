<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class ConsConfigSerieGuia_m extends CI_Model {
		
	public function _construct()
	{
		parent::_construct();
		$this->load->database('default');
	}
	

	public function obt_totpaginas($Nombusu)
	{	if($query = $this->db->query("CALL SP_R_CONFIG_SERIE_GUIA_TOT_PAG('".$Nombusu."');"))
		{	if($query->num_rows() > 0 )
				{	return $query->result();} 
			else{ return 0;}
		}
	
	}
	
	public function obt_conf_serie_guia_x_usu($Numpagina,$Nombusu)
	{	if($query = $this->db->query("CALL SP_R_CONFIG_SERIE_GUIA_OBT_LISTA(".$Numpagina.",'".$Nombusu."');"))
			{	if($query->num_rows() > 0 )
					{	return $query->result();}
				else{ return 0;}
			}
	
	}
	
	public function obt_config_serie_guia_x_codigo($codigo)
	{	if($query = $this->db->query("CALL SP_R_CONFIG_SERIE_GUIA_OBT_X_CODIGO(".$codigo.");"))
		{	if($query->num_rows() > 0 )
			{	return $query->result();}
			else{ return 0;}
		}
	
	}
	

	
	public function obt_usuarios()
	{ if($query = $this->db->query("CALL SP_R_USU_OBT_USUARIOS();"))
		{	if($query->num_rows() > 0 )
			{	return $query->result();}
			else{ return 0;}
		}
	
	}
	
	public function obt_serie_guias()
	{ if($query = $this->db->query("CALL SP_R_SERIE_GUIA_OBT_LISTA_DATOS();"))
		{	if($query->num_rows() > 0 )
			{	return $query->result();}
			else{ return 0;}
		}
	
	}
	
	public function obt_codigos_conf_serie_guias($codigo)
	{	if($query = $this->db->query("CALL SP_R_CONFIG_SERIE_GUIA_OBT_CODIGOS(".$codigo.");"))
		{	if($query->num_rows() > 0 )
			{	return $query->result();}
			else{ return 0;}
			}
	
	}	


	public function obt_conf_acceso($Nombusu)
	{  if($query1 = $this->db->query("CALL SP_R_USU_OBT_CONF_SERIE_GUIAS('".$Nombusu."');"))
		{	if($query1->num_rows() > 0 )
			{	return $query1->result();}
			else{ return 0;}
			}
			
	}

	
		
}

<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class ConsConfigCaja_m extends CI_Model {
		
	public function _construct()
	{
		parent::_construct();
		$this->load->database('default');
	}
	

	public function obt_totpaginas($Nombusu)
	{	if($query = $this->db->query("CALL SP_R_CONFIG_CAJA_TOT_PAG('".$Nombusu."');"))
		{	if($query->num_rows() > 0 )
				{	return $query->result();} 
			else{ return 0;}
		}
	
	}
	
	public function obt_conf_Caja_x_usu($Numpagina,$Nombusu)
	{	if($query = $this->db->query("CALL SP_R_CONFIG_CAJA_OBT_LISTA(".$Numpagina.",'".$Nombusu."');"))
			{	if($query->num_rows() > 0 )
					{	return $query->result();}
				else{ return 0;}
			}
	
	}
	
	public function obt_configCaja_x_codigo($codigo)
	{	if($query = $this->db->query("CALL SP_R_CONFIG_CAJA_OBT_X_CODIGO(".$codigo.");"))
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
	
	public function obt_Cajas()
	{ if($query = $this->db->query("CALL SP_R_CAJA_OBT_DATOS_CAJAS();"))
		{	if($query->num_rows() > 0 )
			{	return $query->result();}
			else{ return 0;}
		}
	
	}
	
	public function obt_codigos_conf_Cajas($codigo)
	{	if($query = $this->db->query("CALL SP_R_CONFIG_CAJA_OBT_CODIGOS(".$codigo.");"))
		{	if($query->num_rows() > 0 )
			{	return $query->result();}
			else{ return 0;}
			}
	
	}
	
	


	public function obt_conf_acceso($Nombusu)
	{  if($query1 = $this->db->query("CALL SP_R_USU_OBT_CONF_CajaS('".$Nombusu."');"))
	{	if($query1->num_rows() > 0 )
	{	return $query1->result();}
	else{ return 0;}
	}
	
	}

	/*
	 public function obt_usuarios()
	 { if($query = $this->db->query("CALL SP_R_USU_OBT_USUARIOS();"))
	 {	if($query->num_rows() > 0 )
	 {	return $query->result();
	 } else{ return 0;}
	 }
	 	
	 }
	
	 public function obt_Cajas()
	 { if($query = $this->db->query("CALL SP_R_Caja_OBT_CajaS();"))
	 {	if($query->num_rows() > 0 )
	 {	return $query->result();
	 } else{ return 0;}
	 }
	
	 }
	
	 public function obt_codigos_Cajas($codperfil)
	 {	if($query = $this->db->query("CALL SP_R_PERFIL_USU_OBT_CODIGOS(".$codperfil.");"))
	 {	if($query->num_rows() > 0 )
	 {	return $query->result();
	 } else{ return 0;}
	 }
	
	 }*/
	
		
}

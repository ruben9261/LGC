<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class ConsConfigMenu_m extends CI_Model {
		
	public function _construct()
	{
		parent::_construct();
		$this->load->database('default');
	}
	

	public function obt_conf_acceso($Nombusu)
	{  if($query1 = $this->db->query("CALL SP_R_USU_OBT_CONF_MENUS('".$Nombusu."');"))
		  {	if($query1->num_rows() > 0 )
			   {	return $query1->result();}
			else{ return 0;}
	      }
    		
	}
	
		
	public function obt_items($COD_MENU)
	{ if($query = $this->db->query("CALL SP_R_MENU_OBT_ITEMS_X_COD_MENU('".$COD_MENU."');"))
		{	if($query->num_rows() > 0 )
			    {return $query->result();}
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
	
	public function obt_menus()
	{ if($query = $this->db->query("CALL SP_R_MENU_OBT_MENUS();"))
		{	if($query->num_rows() > 0 )
				{	return $query->result();}
		    else{ return 0;}
		}
	
	}
	
	public function obt_codigos_menus($codperfil)
	{	if($query = $this->db->query("CALL SP_R_PERFIL_USU_OBT_CODIGOS(".$codperfil.");"))
		{	if($query->num_rows() > 0 )
			  {	return $query->result();}
		    else{ return 0;}
		}
	
	}
	
	public function obt_totpaginas($Nombusu)
	{	if($query = $this->db->query("CALL SP_R_PERFIL_USU_TOT_PAG_X_USU('".$Nombusu."');"))
		{	if($query->num_rows() > 0 )
				{	return $query->result();} 
			else{ return 0;}
		}
	
	}
	
	public function obt_config_usu_x_usu($NUMPAGINA,$Nombusu)
	{	if($query = $this->db->query("CALL SP_R_PERFIL_USU_OBT_CONFIG_X_USU(".$NUMPAGINA.",'".$Nombusu."');"))
			{	if($query->num_rows() > 0 )
					{	return $query->result();}
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
	
	 public function obt_menus()
	 { if($query = $this->db->query("CALL SP_R_MENU_OBT_MENUS();"))
	 {	if($query->num_rows() > 0 )
	 {	return $query->result();
	 } else{ return 0;}
	 }
	
	 }
	
	 public function obt_codigos_menus($codperfil)
	 {	if($query = $this->db->query("CALL SP_R_PERFIL_USU_OBT_CODIGOS(".$codperfil.");"))
	 {	if($query->num_rows() > 0 )
	 {	return $query->result();
	 } else{ return 0;}
	 }
	
	 }*/
	
		
}

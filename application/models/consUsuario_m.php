<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class ConsUsuario_m extends CI_Model {
		
	public function _construct()
	{
		parent::_construct();
		$this->load->database('default');
	}
	
	
	public function obt_totpaginas($Nom_usu,$Ape_usu,$Cargo)
	{	if($query = $this->db->query("CALL SP_R_USUARIO_TOT_PAG('".$Nom_usu."','".$Ape_usu."','".$Cargo."');"))
		{	if($query->num_rows() > 0 )
				{	return $query->result();} 
			else{ return 0;}
		}
	
	}
	
	public function obt_lista($Numpagina,$Nom_usu,$Ape_usu,$Cargo)
	{	if($query = $this->db->query("CALL SP_R_USUARIO_OBT_LISTA(".$Numpagina.",'".$Nom_usu."','".$Ape_usu."','".$Cargo."');"))
			{	if($query->num_rows() > 0 )
					{	return $query->result();}
				else{ return 0;}
			}
	
	}
	
	public function obt_niveles()
	{ if($query = $this->db->query("CALL SP_R_NIVEL_OBT_NIVELES();"))
		{	if($query->num_rows() > 0 )
			   {return $query->result();}
			else{ return 0;}
		}
	
	}
	
	
	public function obt_Usuario($codusu)
	{ if($query = $this->db->query("CALL SP_R_USUARIO_OBT_X_CODIGO(".$codusu.");"))
			{	if($query->num_rows() > 0 )
				{return $query->result();}
				else{ return 0;}
			}
	
	}
	
	
	
		
}

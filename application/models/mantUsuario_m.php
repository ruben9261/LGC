<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class MantUsuario_m extends CI_Model {
		
	public function _construct()
	{
		parent::_construct();
		
		$this->load->database('default');
	}
	

	public function inserta(
	       			$P_cod_nivel,
					$P_usu,
					$P_clave,
					$P_nom_usu,
					$P_ape_usu,
					$P_cargo
			       )
	{
		if($this->db->query("CALL SP_W_USUARIO_INS(".$P_cod_nivel.",'".	 
													 $P_usu."','".	 
													 $P_clave."','".
													 $P_nom_usu."','".
													 $P_ape_usu."','".
													 $P_cargo."');"
													))
		    { return 1;}
		else{ return 0;}
	}
	

	
	public function editar(
					$P_codusu,
					$P_cod_nivel,
					$P_usu,
					$P_clave,
					$P_nom_usu,
					$P_ape_usu,
					$P_cargo)
	{ if($this->db->query("CALL SP_W_USUARIO_ACT(".$P_codusu.",".
												   $P_cod_nivel.",'".
												   $P_usu."','".
												   $P_clave."','".
												   $P_nom_usu."','".
												   $P_ape_usu."','".
												   $P_cargo."');"
				                                 ))
		{ return 1;}
		else{ return 0;}
	}
	
	
	public function eliminar($P_codusu)
	{	if($this->db->query("CALL SP_W_USUARIO_ELI(".$P_codusu.");"))
		    { return 1; }
		else{ return 0; }
	}
	
}

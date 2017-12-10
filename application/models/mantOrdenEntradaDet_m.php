<?php if( ! defined ('BASEPATH')) exit('error al entar acceder');


class MantOrdenEntradaDet_m extends CI_Model {
		
	public function _construct()
	{
		parent::_construct();
		
		$this->load->database('default');
	}
	

	public function inserta(
			$P_cod_orden_e,
			$P_cantidad,
			$P_cod_prod,
			$P_observacion,
			$P_precio,
			$P_usu_crea
			)
	{
		if($this->db->query("CALL SP_W_ORDEN_E_DET_INS(".$P_cod_orden_e.",".
														 $P_cantidad.",".
														 $P_cod_prod.",'".
														 $P_observacion."',".
														 $P_precio.",".
														 $P_usu_crea.");"
											           ))
		    { return 1;}
		else{ return 0;}
	}
	

	
	public function editar(
			 $P_codigo,
			 $P_cod_orden_e,
			 $P_cantidad,
			 $P_cod_prod,
			 $P_observacion,
			 $P_precio,
			 $P_usu_mod  
			)
	{
		if($this->db->query("CALL SP_W_ORDEN_E_DET_ACT(".$P_codigo.",".
														 $P_cod_orden_e.",".
														 $P_cantidad.",".
														 $P_cod_prod.",'".
														 $P_observacion."',".
														 $P_precio.",".
													     $P_usu_mod.");"
				                                       ))
		{ return 1;}
		 else{ return 0;}
	}
	
	
	
	
	
	public function eliminar($P_codigo)
	{	if($this->db->query("CALL SP_W_ORDEN_E_DET_ELI(".$P_codigo.");"))
		    { return 1; }
		else{ return 0; }
	}
	
}

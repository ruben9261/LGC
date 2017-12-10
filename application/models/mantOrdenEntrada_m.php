<?php if( ! defined ('BASEPATH')) exit('error al entar acceder');


class MantOrdenEntrada_m extends CI_Model {
		
	public function _construct()
	{
		parent::_construct();
		
		$this->load->database('default');
	}
	

	public function inserta(
			$P_cod_SerOrden,
			$P_serie,
			$P_numero,
			$P_fecha ,
			$P_cod_cliente,
			$P_total,
			$P_obs,
			$P_usuario
	)
			
	{
		if($this->db->query("CALL SP_W_ORDEN_E_INS(".$P_cod_SerOrden.",'".
													 $P_serie."','".
												     $P_numero."','".	 
												     $P_fecha."',".	
													 $P_cod_cliente.",".	
													 $P_total.",'".	
													 $P_obs."',".	
													 $P_usuario.");"
											   
			            	))
		    { return 1;}
		else{ return 0;}
	}
	

	
	public function editar(
			$P_codigo,
			$P_cod_SerOrden,
			$P_serie,
			$P_numero,
			$P_fecha ,
			$P_cod_cliente,
			$P_total,
			$P_obs,
			$P_usuario
		 )
	{
		if($this->db->query("CALL SP_W_ORDEN_E_ACT(".$P_codigo.",".
												     $P_cod_SerOrden.",'".
													 $P_serie."','".
												     $P_numero."','".	 
												     $P_fecha."',".	
													 $P_cod_cliente.",".	
													 $P_total.",'".	
													 $P_obs."',".	
													 $P_usuario.");"
				                                 ))
		{ return 1;}
	 else{ return 0;}
	}
	
	
	
	
	
	public function eliminar($P_codigo)
	{	if($this->db->query("CALL SP_W_ORDEN_E_ELI(".$P_codigo.");"))
		    { return 1; }
		else{ return 0; }
	}
	
}

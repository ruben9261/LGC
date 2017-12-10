<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class MantProducto_m extends CI_Model {
		
	public function _construct()
	{
		parent::_construct();
		
		$this->load->database('default');
	}
	

	public function inserta(
	    $P_tipo,
	    $P_desc,
	    $P_precio		
	   )
	{
		if($this->db->query("CALL SP_W_PRODUCTO_INS(".$P_tipo.",'".
													  $P_desc."',".	 
													  $P_precio.");"
													))
		    { return 1;}
		else{ return 0;}
	}
	

	
	public function editar(
			 $P_cod_prod,
			 $P_tipo,
	         $P_desc,
	         $P_precio	 	
	      )
	{
		if($this->db->query("CALL SP_W_PRODUCTO_ACT(".$P_cod_prod.",".
				                                      $P_tipo.",'".
													  $P_desc."',".	 
													  $P_precio.");"
				                                 ))
		{ return 1;}
		else{ return 0;}
	}
	
	
	
	
	public function eliminar($P_codprod)
	{	if($this->db->query("CALL SP_W_PRODUCTO_ELI(".$P_codprod.");"))
		    { return 1; }
		else{ return 0; }
	}
	
}

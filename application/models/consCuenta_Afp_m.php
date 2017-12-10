<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class ConsCuenta_Afp_m extends CI_Model {
		
  public function _construct()
	{	parent::_construct();
		$this->load->database('default');
	}
	
	
 public function obt_CuentaAfp($codigo)
  	  { if($query = $this->db->query("CALL SP_R_CUENTA_AFP_OBT_X_COD_CLI(".$codigo.");"))
			{	if($query->num_rows() > 0 )
					{return $query->result();}
					else{ return 0;}
			}
			
	  }
		
}

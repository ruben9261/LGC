<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class ConsDetActCli_m extends CI_Model {
		
	public function _construct()
	{
		parent::_construct();
		$this->load->database('default');
	}
	
	
	public function obt_Det_Actividades_x_Cliente($codigo)
	{ if($query = $this->db->query("CALL SP_R_DETACTCLI_OBT_X_COD_CLI(".$codigo.");"))
			{	if($query->num_rows() > 0 )
					{return $query->result();}
					else{ return 0;}
			}
			
	}
	
}

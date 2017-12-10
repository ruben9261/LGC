<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class ConsConfigSerieOrden_c extends CI_Controller{
	
	
	public function _construct()
	{   parent::_construct();
		$this->load->helper('url');
		$this->load->model('consConfigSerieOrden_m');
				
	}
	
	
	public function index() {
		$this->load->view("GestionConfigSerieOrden");
	 }

		
	public function obt_confSerieOrden_usu(){
		header('Content-Type: application/json');
		$Nombusu = addslashes(htmlspecialchars($_POST["nomb_usuario"]));
		$numpagina = addslashes(htmlspecialchars($_POST["pagina"]));
		$this->load->model('consConfigSerieOrden_m');
		$totalpaginas=$this->consConfigSerieOrden_m->obt_totpaginas($Nombusu);
		mysqli_next_result($this->db->conn_id);
		if($numpagina==-1)
		   {  $datos=$this->consConfigSerieOrden_m->obt_conf_serie_orden_x_usu(1,$Nombusu);
		   }
		else 
		   { $datos=$this->consConfigSerieOrden_m->obt_conf_serie_orden_x_usu($numpagina,$Nombusu);
		   }
			
		if($totalpaginas<>0 && $datos<>0)
		{   	$array = array( 'totalpaginas'=>$totalpaginas,
								'lista'=>$datos
	        				   );
		    $json_string =json_encode($array);
			echo $json_string;
		}
		else
		{  	echo "no existe";}
	   
	}
	
		
}
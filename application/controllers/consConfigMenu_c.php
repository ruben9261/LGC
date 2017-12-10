<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class ConsConfigMenu_c extends CI_Controller{
	
	
	public function _construct()
	{   parent::_construct();
		$this->load->helper('url');
		$this->load->model('consConfigMenu_m');
				
	}
	
	
	public function index() {
		$this->load->view("GestionConfigMenu");
	 }

		
	public function obt_conf_usu(){
		header('Content-Type: application/json');
		$Nombusu = addslashes(htmlspecialchars($_POST["nombusuario"]));
		//$opcion = addslashes(htmlspecialchars($_POST["opcion"]));
		$numpagina = addslashes(htmlspecialchars($_POST["pagina"]));
		//$p�gina=-1 primera p�gina por defecto
		$this->load->model('consConfigMenu_m');
		$totalpaginas=$this->consConfigMenu_m->obt_totpaginas($Nombusu);
		mysqli_next_result($this->db->conn_id);
		if($numpagina==-1)
		   {  $datos=$this->consConfigMenu_m->obt_config_usu_x_usu(1,$Nombusu);
		   }
		else 
		   { $datos=$this->consConfigMenu_m->obt_config_usu_x_usu($numpagina,$Nombusu);
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
	
	
	public function obt_conf_usu1(){
		//header('Content-Type: application/json');
		$Nombusu ="Per";
		$this->load->model('consConfigMenu_m');
		$totalpaginas=$this->consConfigMenu_m->obt_totpaginas($Nombusu);
		mysqli_next_result($this->db->conn_id);
		$datos=$this->consConfigMenu_m->obt_config_usu_x_usu(1,$Nombusu);
		
		var_dump($datos);
	
		/*if($datos1<>0)
		{   	$array = array(	"cantidad"=>$cantidad,
				"lista"=>$datos1
		);
	
		var_dump($array);
		
		
		foreach ($array as $valor) {
			echo"cantidad".$valor->cantidad;
			echo"NOMBCOMPLETO".$valor->NOMBCOMPLETO;
			echo"NOMBMENU".$valor->NOMBMENU;
			echo"NOMBITEM".$valor->NOMBITEM;
			
		}
		
	
	*/
	}
	
	
	
	
	
		
	
	public function obt_items_x_cod_menu(){
		header('Content-Type: application/json');
		$COD_MENU = addslashes(htmlspecialchars($_GET["codmenu"]));
		$this->load->model('consConfigMenu_m');
		$datos=$this->consConfigMenu_m->obt_items($COD_MENU);
		if($datos<>0)
		{    $json_string =json_encode($datos);
	     	 echo $json_string;
			
		}
		else
		{
			echo "no existe";
		}
	
	}
}
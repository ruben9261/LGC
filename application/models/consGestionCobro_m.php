<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class ConsGestionCobro_m extends CI_Model {
		
	public function _construct()
	{
		parent::_construct();
		$this->load->database('default');
	}
	
	
	public function obt_DatosCobro($CodUsu)
	{	
		if($query = $this->db->query("CALL SP_R_TESORERIA_COBRO_OBT_DATOSCOBRO('".$CodUsu."');"))
		{	if($query->num_rows() > 0 )
			{	return $query->result();} 
			else{ return 0;}
		}
	}

	public function obt_OrdenEntrada($P_COD_ORDENE)
	{	
		if($query = $this->db->query("CALL SP_R_TESORERIA_COBRO_OBT_ORDEN_E('".$P_COD_ORDENE."');"))
		{	if($query->num_rows() > 0 )
			{	return $query->result();} 
			else{ return 0;}
		}
	}

	public function obt_OrdenEntradaDet($P_COD_ORDENE)
	{	
		if($query = $this->db->query("CALL SP_R_TESORERIA_COBRO_OBT_ORDENE_DET('".$P_COD_ORDENE."');"))
		{	if($query->num_rows() > 0 )
			{	return $query->result();} 
			else{ return 0;}
		}
	}

	public function obt_DocCobro($COD_DOC_COBRO)
	{	
		$this->db->select('*');
		$this->db->from('doc_cobro dc');
		$this->db->join('cliente c', 'dc.COD_CLI = c.COD_CLI');
		$this->db->join('oficina o', 'dc.COD_OFI = o.COD_OFI');
		$this->db->where("COD_DOC_COBRO",$COD_DOC_COBRO);
		//$string = $this->db->get_compiled_select();
		$query  = $this->db->get();
		$result = $query->result();

		return $result;
	}

	public function obt_DocCobroDet($COD_DOC_COBRO)
	{	
		$this->db->select('dcd.COD_DOC_COBRO_DET ,oed.COD_DET_ORDEN_E ,oe.cod_orden_e as CodOrdenE,oe.cod_serie_orden as CodSerieOrden');
		$this->db->select('oe.serie as Serie,oe.numero as Numero');
		$this->db->select('p.DESCRIPCION as Producto,oed.PRECIO as Precio');
		$this->db->select('IFNULL(oed.OBS_PROD,"NINGUNA") as ObsProd');
		$this->db->select('p.DESCRIPCION as Producto,oed.CANTIDAD as Cantidad');
		$this->db->select('oed.Precio as Precio');
		$this->db->select('(oed.CANTIDAD * oed.PRECIO) as Importe');
		$this->db->select('tp.desc_tipo as TipoProducto');
		$this->db->from('doc_cobro_detalle dcd');
		$this->db->join('orden_e oe', 'dcd.COD_ORDEN_E = oe.COD_ORDEN_E');
		$this->db->join('orden_e_det oed', 'oe.COD_ORDEN_E = oed.COD_ORDEN_E');
		$this->db->join('producto p', 'oed.COD_PROD = p.COD_PROD');
		$this->db->join('Tipo_Producto tp', 'p.cod_tip_prod = tp.cod_tip_prod');
		$this->db->join('doc_cobro dc', 'dcd.COD_DOC_COBRO = dc.COD_DOC_COBRO');
		$this->db->join('tipo_cobro tc', 'dc.COD_TIPOCOBRO = tc.COD_TIPOCOBRO');
		$this->db->where("dcd.COD_DOC_COBRO",$COD_DOC_COBRO);
		//$string = $this->db->get_compiled_select();
		$query  = $this->db->get();
		$result = $query->result();
		return $result;
	}

	public function obt_OrdenEntraClientes()
	{	
		if($query = $this->db->query("CALL SP_R_TESORERIA_COBRO_OBT_CLIENTES();"))
		{	if($query->num_rows() > 0 )
			{	return $query->result();} 
			else{ return 0;}
		}
	}

	public function obt_TipoCobro()
	{	
		if($query = $this->db->query("CALL SP_R_TESORERIA_COBRO_OBT_TIPOCOBRO();"))
		{	if($query->num_rows() > 0 )
			{	return $query->result();} 
			else{ return 0;}
		}
	}


	public function obt_totpaginas($Filtros){
		$TotalPaginas = 0;
		$this->db->select('u.NOM_USU,of.NOMB_OFICINA,tc.NOM_TIPOCOBRO,dc.FECHA_OPERACION,dc.COD_DOC_COBRO');
		$this->db->from('doc_cobro dc');
		$this->db->join('cliente cli', 'dc.COD_CLI = cli.COD_CLI');
		$this->db->join('oficina of', 'dc.COD_OFI = of.COD_OFI');
		
		$this->db->join('usuario u', 'dc.COD_USU = u.COD_USU');
		$this->db->join('tipo_cobro tc', 'dc.COD_TIPOCOBRO = tc.COD_TIPOCOBRO');
		
		$this->db->where("(('".$Filtros["NOMB_OFICINA"]."'='') or(of.NOMB_OFICINA='".$Filtros["NOMB_OFICINA"]."'))");
        $this->db->where("(('".$Filtros["DOC_COBRO_FECHA"]."'='') or(date(dc.DOC_COBRO_FECHA)='".$Filtros["DOC_COBRO_FECHA"]."'))");
		$this->db->where("(('".$Filtros["NOM_TIPOCOBRO"]."'='') or(date(tc.NOM_TIPOCOBRO)='".$Filtros["NOM_TIPOCOBRO"]."'))");

		



		
		//$string = $this->db->get_compiled_select();
		$query  = $this->db->get();
		$result = $query->result();
		//$error = $this->db->error_message();
		$TotalRegistros = $this->db->count_all_results()+1;
		$TotalPaginas = round($TotalRegistros/10)+1;
		return $TotalPaginas;
	}

	
	public function obt_Usuarios()
	{	$query  = $this->db->get("usuario");
		$result = $query->result();
		return $result;
	}

	public function obt_Oficina()
	{	$query = $this->db->get("oficina");
		$result = $query->result();
		return $result;
	}

	public function obt_lista($Filtros){

		$P_numpagina = $Filtros["numpagina"] - 1;
		$filasxpagina = 10;
		$inicio = round($P_numpagina/$filasxpagina);

		$this->db->select('u.NOM_USU,of.NOMB_OFICINA,tc.NOM_TIPOCOBRO,dc.FECHA_OPERACION,dc.COD_DOC_COBRO');
		$this->db->from('doc_cobro dc');
		$this->db->join('cliente cli', 'dc.COD_CLI = cli.COD_CLI');
		$this->db->join('oficina of', 'dc.COD_OFI = of.COD_OFI');
		
		$this->db->join('usuario u', 'dc.COD_USU = u.COD_USU');
		$this->db->join('tipo_cobro tc', 'dc.COD_TIPOCOBRO = tc.COD_TIPOCOBRO');
		
		$this->db->where("(('".$Filtros["NOMB_OFICINA"]."'='') or(of.NOMB_OFICINA='".$Filtros["NOMB_OFICINA"]."'))");
        $this->db->where("(('".$Filtros["DOC_COBRO_FECHA"]."'='') or(date(dc.DOC_COBRO_FECHA)='".$Filtros["DOC_COBRO_FECHA"]."'))");
		$this->db->where("(('".$Filtros["NOM_TIPOCOBRO"]."'='') or(date(tc.NOM_TIPOCOBRO)='".$Filtros["NOM_TIPOCOBRO"]."'))");
				$this->db->limit($filasxpagina,$inicio);
				//$string = $this->db->get_compiled_select();
				$query  = $this->db->get();
				$result = $query->result();

		return $result;
	}

	public function insertDocCobro($DocCobro)
	{	
		$this->db->trans_start();
		//$DOC_PAGO_FECHA = "1900-10-10";
		$FECHA_OPERACION = date('Y/m/d', time());
		date_default_timezone_set('America/Lima');
		$DOC_COBRO_FECHA = date('Y/m/d h:i:s', time());
		$COD_DOC_COBRO = 0;

		$doc_cobro = array(
				'COD_OFI' => $DocCobro["COD_OFI"],
				'DOC_COBRO_FECHA' => $DOC_COBRO_FECHA,
				'COD_CAJA' => $DocCobro["COD_CAJA"],
				'COD_CLI' => $DocCobro["COD_CLI"],
				'NRO_DOCUMENTO' => $DocCobro["NRO_DOCUMENTO"],
				'NUMERO_CUENTA' => $DocCobro["NUMERO_CUENTA"],
				'COD_TIPO_DOC' => $DocCobro["COD_TIPO_DOC"],
				'FECHA_OPERACION' => $DocCobro["FECHA_OPERACION"] == "Invalid date"? $FECHA_OPERACION :$DocCobro["FECHA_OPERACION"],
				'NUMERO_OPERACION' => $DocCobro["NUMERO_OPERACION"],
				'OBSERVACION' => $DocCobro["OBSERVACION"],
				'COD_USU' => $DocCobro["COD_USU"],
				'IGV' => 0,
				'MONTO_TOTAL' => $DocCobro["MONTO_TOTAL"],
				'MONTO_NETO' => $DocCobro["MONTO_NETO"],
				'COD_TIPOCOBRO' => $DocCobro["COD_TIPOCOBRO"]
		);
		
		$this->db->insert('doc_cobro', $doc_cobro);
		$COD_DOC_COBRO = $this->db->insert_id();
		
		foreach($DocCobro["listDocCobroDet"] as $item){
			$doc_cobro_detalle = array(
				'COD_DOC_COBRO' => $COD_DOC_COBRO,
				'COD_ORDEN_E' => $item["COD_ORDEN_E"],
				'SUB_TOTAL' => $item["SUB_TOTAL"]
			);
			$this->db->insert('doc_cobro_detalle',$doc_cobro_detalle);
		}
		
		$respuesta = FALSE;
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			$respuesta =  FALSE;
		} 
		else {
			$this->db->trans_commit();
			$respuesta =  TRUE;
		}

		
		$response = array(
			'respuesta' => $respuesta,
			'COD_DOC_COBRO'=> $COD_DOC_COBRO
		);

		return $response;
	}

	public function updateDocCobro($DocCobro)
	{	
		$this->db->trans_start();

		date_default_timezone_set('America/Lima');
		$DOC_COBRO_FECHA = date('Y/m/d h:i:s', time());
		$FECHA_OPERACION = date('Y/m/d', time());
		$COD_DOC_COBRO = $DocCobro['COD_DOC_COBRO'];
		$doc_cobro = array(
				'COD_OFI' => $DocCobro["COD_OFI"],
				'DOC_COBRO_FECHA' => $DOC_COBRO_FECHA,
				'COD_CAJA' => $DocCobro["COD_CAJA"],
				'COD_CLI' => $DocCobro["COD_CLI"],
				'NRO_DOCUMENTO' => $DocCobro["NRO_DOCUMENTO"],
				'NUMERO_CUENTA' => $DocCobro["NUMERO_CUENTA"],
				'COD_TIPO_DOC' => $DocCobro["COD_TIPO_DOC"],
				'FECHA_OPERACION' => $DocCobro["FECHA_OPERACION"] == "Invalid date"? $FECHA_OPERACION :$DocCobro["FECHA_OPERACION"],
				'NUMERO_OPERACION' => $DocCobro["NUMERO_OPERACION"],
				'OBSERVACION' => $DocCobro["OBSERVACION"],
				'COD_USU' => $DocCobro["COD_USU"],
				'IGV' => 0,
				'MONTO_TOTAL' => $DocCobro["MONTO_TOTAL"],
				'MONTO_NETO' => $DocCobro["MONTO_NETO"],
				'COD_TIPOCOBRO' => $DocCobro["COD_TIPOCOBRO"]
		);

		$this->db->where('COD_DOC_COBRO', $COD_DOC_COBRO);
		$this->db->update('doc_cobro', $doc_cobro);
		$this->db->delete('doc_cobro_detalle', array('COD_DOC_COBRO' => $COD_DOC_COBRO));

		foreach($DocCobro["listDocCobroDet"] as $item){
			$doc_cobro_detalle = array(
				'COD_DOC_COBRO' => $COD_DOC_COBRO,
				'COD_ORDEN_E' => $item["COD_ORDEN_E"],
				'SUB_TOTAL' => $item["SUB_TOTAL"]
			);
			$this->db->insert('doc_cobro_detalle',$doc_cobro_detalle);
		}

		$this->db->trans_complete();

		$respuesta = false;
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			$respuesta = FALSE;
		} 
		else {
			$this->db->trans_commit();
			$respuesta = TRUE;
		}
		
		$response = array(
			'respuesta' => $respuesta,
			'COD_DOC_COBRO'=> $COD_DOC_COBRO,
			
		);

		return $response;
	}

	public function eliminar($COD_DOC_COBRO){
		$this->db->trans_start();
		
		$this->db->delete('doc_cobro', array('COD_DOC_COBRO' => $COD_DOC_COBRO));
		$this->db->delete('doc_cobro_detalle', array('COD_DOC_COBRO' => $COD_DOC_COBRO));

		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return FALSE;
		} 
		else {
			$this->db->trans_commit();
			return TRUE;
		}
	}
	
}

<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class ConsGestionPago_m extends CI_Model {
		
	public function _construct()
	{
		parent::_construct();
		$this->load->database('default');
	}
	
	public function obt_DatosPago($CodUsu)
	{	
		if($query = $this->db->query("CALL SP_R_TESORERIA_COBRO_OBT_DATOSCOBRO('".$CodUsu."');"))
		{	if($query->num_rows() > 0 )
			{	return $query->result();} 
			else{ return 0;}
		}
	}

	public function obt_OrdenSalida($P_COD_ORDENS)
	{	
		$this->db->select('os.COD_ORDEN_S');
		$this->db->select('os.SERIE');
		$this->db->select('os.NUMERO');
		$this->db->select('c.nombre as CLIENTE');
		$this->db->select('c.NRO_DOCUMENTO as DOCUMENTO');
		$this->db->from('orden_s os');
		$this->db->join('proveedor p', 'os.COD_PROVEEDOR = c.COD_PROV');
		$this->db->where("COD_ORDEN_S",$P_COD_ORDENS);
		//$string = $this->db->get_compiled_select();
		$query  = $this->db->get();
		$result = $query->result();

		return $result;
	}

	public function obt_OrdenSalidaDet($P_COD_ORDENS)
	{	
		$this->db->select('osd.COD_DET_ORDEN_S');
		$this->db->select('os.COD_ORDEN_S');
		$this->db->select('os.SERIE');
		$this->db->select('os.NUMERO');
		$this->db->select('p.DESCRIPCION');
		$this->db->select('osd.PRECIO');
		$this->db->select('(osd.CANTIDAD * osd.PRECIO) as IMPORTE');
		$this->db->select('tp.desc_tipo as TIPOPRODUCTO');
		$this->db->from('orden_s os');
		$this->db->join('orden_s_det osd', 'os.COD_ORDEN_S = osd.COD_ORDEN_S');
		$this->db->join('producto p', 'osd.COD_PROD = p.COD_PROD');
		$this->db->join('Tipo_Producto tp', 'p.cod_tip_prod = tp.cod_tip_prod');
		$this->db->where("COD_ORDEN_S",$P_COD_ORDENS);
		//$string = $this->db->get_compiled_select();
		$query  = $this->db->get();
		$result = $query->result();

		return $result;
	}

	public function obt_DocPago($COD_DOC_PAGO)
	{	
		$this->db->select('*');
		$this->db->from('doc_pago dp');
		$this->db->join('Proveedor p', 'dp.COD_PROV = p.COD_PROV');
		$this->db->where("COD_DOC_PAGO",$COD_DOC_PAGO);
		//$string = $this->db->get_compiled_select();
		$query  = $this->db->get();
		$result = $query->result();

		return $result;
	}

	public function obt_DocPagoDet($COD_DOC_PAGO)
	{	
		$this->db->select('dpd.COD_DOC_PAGO_DET');
		$this->db->select('osd.COD_DET_ORDEN_S');
		$this->db->select('os.COD_ORDEN_S');
		$this->db->select('os.SERIE,os.NUMERO');
		$this->db->select('p.DESCRIPCION as PRODUCTO,osd.PRECIO');
		$this->db->select('IFNULL(osd.DESCRIPCION,"NINGUNA") as DESCRIPCION');
		$this->db->select('osd.CANTIDAD');
		$this->db->select('(osd.CANTIDAD * osd.PRECIO) as IMPORTE');
		$this->db->select('tp.desc_tipo as TIPOPRODUCTO');
		$this->db->from('doc_pago_detalle dpd');
		$this->db->join('orden_s os', 'dpd.COD_ORDEN_S = os.COD_ORDEN_S');
		$this->db->join('orden_s_det osd', 'os.COD_ORDEN_S = osd.COD_ORDEN_S');
		$this->db->join('producto p', 'osd.COD_PROD = p.COD_PROD');
		$this->db->join('Tipo_Producto tp', 'p.cod_tip_prod = tp.cod_tip_prod');
		$this->db->join('doc_pago dp', 'dpd.COD_DOC_PAGO = dp.COD_DOC_PAGO');
		$this->db->join('tipo_cobro tc', 'dp.COD_TIPOPAGO = tc.COD_TIPOPAGO');
		$this->db->where("dpd.COD_DOC_PAGO",$COD_DOC_PAGO);
		//$string = $this->db->get_compiled_select();
		$query  = $this->db->get();
		$result = $query->result();
		return $result;
	}

	public function obt_OrdenSalidaProveedores()
	{	
		$this->db->select('*');
		$this->db->from('Proveedor');

		$query  = $this->db->get();
		$result = $query->result();

		return $result;
	}

	public function obt_TipoCobro()
	{	
		$this->db->select('*');
		$this->db->from('tipo_cobro');

		$query  = $this->db->get();
		$result = $query->result();

		return $result;
	}

	public function obt_totpaginas($Filtros){
		$TotalPaginas = 0;
		$this->db->select('dc.COD_DOC_COBRO,cli.NOMBRE, cli.NRO_DOCUMENTO, u.COD_USU, u.USU,c.DESC_CAJA,tc.NOM_TIPOCOBRO');
		$this->db->from('doc_cobro dc');
		$this->db->join('cliente cli', 'dc.COD_CLI = cli.COD_CLI');
		$this->db->join('usuario u', 'dc.COD_USU = u.COD_USU');
		$this->db->join('caja c', 'dc.COD_CAJA = c.COD_CAJA');
		$this->db->join('tipo_cobro tc', 'dc.COD_TIPOCOBRO = tc.COD_TIPOCOBRO');
		$this->db->where("((".$Filtros["COD_CLI"]."=0) or(dc.COD_CLI=".$Filtros["COD_CLI"]."))");
		$this->db->where("((".$Filtros["COD_USU"]."=0) or(u.COD_USU=".$Filtros["COD_USU"]."))");
		$this->db->where("((".$Filtros["COD_TIPOCOBRO"]."=0) or(dc.COD_TIPOCOBRO=".$Filtros["COD_TIPOCOBRO"]."))");
		$this->db->where("(('".$Filtros["COD_DOC_COBRO"]."'='') or(dc.COD_DOC_COBRO='".$Filtros["COD_DOC_COBRO"]."'))");
		$this->db->where("(('".$Filtros["DOC_COBRO_FECHA"]."'='') or(date(dc.DOC_COBRO_FECHA)='".$Filtros["DOC_COBRO_FECHA"]."'))");
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

				$this->db->select('dc.COD_DOC_COBRO,cli.NOMBRE, cli.NRO_DOCUMENTO, u.COD_USU, u.USU,c.DESC_CAJA,tc.NOM_TIPOCOBRO');
				$this->db->from('doc_cobro dc');
				$this->db->join('cliente cli', 'dc.COD_CLI = cli.COD_CLI');
				$this->db->join('usuario u', 'dc.COD_USU = u.COD_USU');
				$this->db->join('caja c', 'dc.COD_CAJA = c.COD_CAJA');
				$this->db->join('tipo_cobro tc', 'dc.COD_TIPOCOBRO = tc.COD_TIPOCOBRO');
				$this->db->where("((".$Filtros["COD_CLI"]."=0) or(dc.COD_CLI=".$Filtros["COD_CLI"]."))");
				$this->db->where("((".$Filtros["COD_USU"]."=0) or(u.COD_USU=".$Filtros["COD_USU"]."))");
				$this->db->where("((".$Filtros["COD_TIPOCOBRO"]."=0) or(dc.COD_TIPOCOBRO=".$Filtros["COD_TIPOCOBRO"]."))");
				$this->db->where("(('".$Filtros["COD_DOC_COBRO"]."'='') or(dc.COD_DOC_COBRO='".$Filtros["COD_DOC_COBRO"]."'))");
				$this->db->where("(('".$Filtros["DOC_COBRO_FECHA"]."'='') or(date(dc.DOC_COBRO_FECHA)='".$Filtros["DOC_COBRO_FECHA"]."'))");
				$this->db->limit($filasxpagina,$inicio);
				//$string = $this->db->get_compiled_select();
				$query  = $this->db->get();
				$result = $query->result();

		return $result;
	}

	public function insertDocCobro($DocCobro)
	{	
		$this->db->trans_start();
		$DOC_PAGO_FECHA = "1900-10-10";
		$FECHA_OPERACION = "1900-10-10";
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
				'FECHA_OPERACION' => $DocCobro["FECHA_OPERACION"] == ""?"1900-10-10":$DocCobro["FECHA_OPERACION"],
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
		$COD_DOC_COBRO = $DocCobro['COD_DOC_COBRO'];
		$doc_cobro = array(
				'COD_OFI' => $DocCobro["COD_OFI"],
				'DOC_COBRO_FECHA' => $DOC_COBRO_FECHA,
				'COD_CAJA' => $DocCobro["COD_CAJA"],
				'COD_CLI' => $DocCobro["COD_CLI"],
				'NRO_DOCUMENTO' => $DocCobro["NRO_DOCUMENTO"],
				'NUMERO_CUENTA' => $DocCobro["NUMERO_CUENTA"],
				'COD_TIPO_DOC' => $DocCobro["COD_TIPO_DOC"],
				'FECHA_OPERACION' => $DocCobro["FECHA_OPERACION"] == ""?"1900-10-10":$DocCobro["FECHA_OPERACION"],
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

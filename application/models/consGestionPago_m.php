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

	public function obt_OrdenSalida()
	{	
		$this->db->select('os.COD_ORDEN_S');
		$this->db->select('os.SERIE');
		$this->db->select('os.NUMERO');
		$this->db->select('p.nombre as PROVEEDOR');
		$this->db->select('p.NRO_DOCUMENTO as DOCUMENTO');
		$this->db->from('orden_s os');
		$this->db->join('proveedor p', 'os.COD_PROVEEDOR = p.COD_PROV');
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
		$this->db->select('osd.PRECIO');
		$this->db->select('osd.CANTIDAD');
		$this->db->select('tp.DESC_TIPO as TIPOPRODUCTO');
		$this->db->select('osd.DESCRIPCION');
		$this->db->select('p.DESCRIPCION as PRODUCTO');
		$this->db->select('(osd.CANTIDAD * osd.PRECIO) as IMPORTE');
		$this->db->from('orden_s os');
		$this->db->join('orden_s_det osd', 'os.COD_ORDEN_S = osd.COD_ORDEN_S');
		$this->db->join('producto p', 'osd.COD_PROD = p.COD_PROD');
		$this->db->join('Tipo_Producto tp', 'p.cod_tip_prod = tp.cod_tip_prod');
		$this->db->where("os.COD_ORDEN_S",$P_COD_ORDENS);
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
		$this->db->join('oficina o', 'dp.COD_OFI = o.COD_OFI');
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
		$this->db->join('tipo_pago tpa', 'dp.COD_TIPOPAGO = tpa.COD_TIPOPAGO');
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

	public function obt_TipoPago()
	{	
		$this->db->select('*');
		$this->db->from('tipo_pago');

		$query  = $this->db->get();
		$result = $query->result();

		return $result;
	}

	public function obt_totpaginas($Filtros){
		$TotalPaginas = 0;
		$this->db->select('dc.Fecha_OPERACION,dc.COD_DOC_PAGO, prov.NOMBRE,tp.NOM_TIPOPAGO');
		$this->db->from('doc_pago dc');
		$this->db->join('Proveedor prov', 'dc.COD_PROV = prov.COD_PROV');
		$this->db->join('usuario u', 'dc.COD_USU = u.COD_USU');
		$this->db->join('tipo_pago tp', 'dc.COD_TIPOPAGO = tp.COD_TIPOPAGO');
		$this->db->join('oficina of', 'dc.COD_OFI = of.COD_OFI');

		$this->db->where("(('".$Filtros["NOMB_OFICINA"]."'='') or(of.NOMB_OFICINA='".$Filtros["NOMB_OFICINA"]."'))");
		$this->db->where("(('".$Filtros["NOM_TIPOPAGO"]."'='') or(tp.NOM_TIPOPAGO='".$Filtros["NOM_TIPOPAGO"]."'))");
		$this->db->where("(('".$Filtros["COD_DOC_PAGO"]."'='') or(dc.COD_DOC_PAGO='".$Filtros["COD_DOC_PAGO"]."'))");
		$this->db->where("(('".$Filtros["DOC_PAGO_FECHA"]."'='') or(date(dc.DOC_PAGO_FECHA)='".$Filtros["DOC_PAGO_FECHA"]."'))");

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

		$this->db->select('dc.Fecha_OPERACION,dc.COD_DOC_PAGO, prov.NOMBRE,tp.NOM_TIPOPAGO');
		$this->db->from('doc_pago dc');
		$this->db->join('Proveedor prov', 'dc.COD_PROV = prov.COD_PROV');
		$this->db->join('usuario u', 'dc.COD_USU = u.COD_USU');
		$this->db->join('tipo_pago tp', 'dc.COD_TIPOPAGO = tp.COD_TIPOPAGO');
		$this->db->join('oficina of', 'dc.COD_OFI = of.COD_OFI');

		$this->db->where("(('".$Filtros["NOMB_OFICINA"]."'='') or(of.NOMB_OFICINA='".$Filtros["NOMB_OFICINA"]."'))");
		$this->db->where("(('".$Filtros["NOM_TIPOPAGO"]."'='') or(tp.NOM_TIPOPAGO='".$Filtros["NOM_TIPOPAGO"]."'))");
		$this->db->where("(('".$Filtros["COD_DOC_PAGO"]."'='') or(dc.COD_DOC_PAGO='".$Filtros["COD_DOC_PAGO"]."'))");
		$this->db->where("(('".$Filtros["DOC_PAGO_FECHA"]."'='') or(date(dc.DOC_PAGO_FECHA)='".$Filtros["DOC_PAGO_FECHA"]."'))");

				$this->db->limit($filasxpagina,$inicio);
				//$string = $this->db->get_compiled_select();
				$query  = $this->db->get();
				$result = $query->result();

		return $result;
	}

	public function GuardarDocPago($DocPago)
	{	
		$this->db->trans_start();
		//$FECHA_OPERACION = "1900-10-10";
		date_default_timezone_set('America/Lima');
		$DOC_PAGO_FECHA = date('Y/m/d', time());
		$FECHA_OPERACION = date('Y/m/d', time());
		$COD_DOC_PAGO = 0;

		$doc_pago = array(
				'COD_OFI' => $DocPago["COD_OFI"],
				'DOC_PAGO_FECHA' => $DOC_PAGO_FECHA,
				'COD_CAJA' => $DocPago["COD_CAJA"],
				'COD_PROV' => $DocPago["COD_PROV"],
				'NRO_DOCUMENTO' => $DocPago["NRO_DOCUMENTO"],
				'NUMERO_CUENTA' => $DocPago["NUMERO_CUENTA"],
				'COD_TIPO_DOC' => $DocPago["COD_TIPO_DOC"],
				'FECHA_OPERACION' => $DocPago["FECHA_OPERACION"] == "Invalid date"?$FECHA_OPERACION:$DocPago["FECHA_OPERACION"],
				'NUMERO_OPERACION' => $DocPago["NUMERO_OPERACION"],
				'OBSERVACION' => $DocPago["OBSERVACION"],
				'COD_USU' => $DocPago["COD_USU"],
				'IGV' => 0,
				'MONTO_TOTAL' => $DocPago["MONTO_TOTAL"],
				'MONTO_NETO' => $DocPago["MONTO_NETO"],
				'COD_TIPOPAGO' => $DocPago["COD_TIPOPAGO"]
		);
		
		$this->db->insert('doc_pago', $doc_pago);
		//$string = $this->db->get_compiled_select();
		$COD_DOC_PAGO = $this->db->insert_id();
		
		foreach($DocPago["listDocPagoDet"] as $item){
			$doc_pago_detalle = array(
				'COD_DOC_PAGO' => $COD_DOC_PAGO,
				'COD_ORDEN_S' => $item["COD_ORDEN_S"],
				'SUB_TOTAL' => $item["SUB_TOTAL"]
			);
			$this->db->insert('doc_pago_detalle',$doc_pago_detalle);
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
			'COD_DOC_PAGO'=> $COD_DOC_PAGO
		);

		return $response;
	}

	public function updateDocPago($DocPago)
	{	
		$this->db->trans_start();

		date_default_timezone_set('America/Lima');
		$doc_pago_FECHA = date('Y/m/d', time());
		$COD_DOC_PAGO = $DocPago['COD_DOC_PAGO'];
		$FECHA_OPERACION = date('Y/m/d', time());
		$doc_pago = array(
				'COD_OFI' => $DocPago["COD_OFI"],
				'doc_pago_FECHA' => $doc_pago_FECHA,
				'COD_CAJA' => $DocPago["COD_CAJA"],
				'COD_PROV' => $DocPago["COD_PROV"],
				'NRO_DOCUMENTO' => $DocPago["NRO_DOCUMENTO"],
				'NUMERO_CUENTA' => $DocPago["NUMERO_CUENTA"],
				'COD_TIPO_DOC' => $DocPago["COD_TIPO_DOC"],
				'FECHA_OPERACION' => $DocPago["FECHA_OPERACION"] == "Invalid date"?$FECHA_OPERACION:$DocPago["FECHA_OPERACION"],
				'NUMERO_OPERACION' => $DocPago["NUMERO_OPERACION"],
				'OBSERVACION' => $DocPago["OBSERVACION"],
				'COD_USU' => $DocPago["COD_USU"],
				'IGV' => 0,
				'MONTO_TOTAL' => $DocPago["MONTO_TOTAL"],
				'MONTO_NETO' => $DocPago["MONTO_NETO"],
				'COD_TIPOPAGO' => $DocPago["COD_TIPOPAGO"]
		);

		$this->db->where('COD_DOC_PAGO', $COD_DOC_PAGO);
		$this->db->update('doc_pago', $doc_pago);
		$this->db->delete('doc_pago_detalle', array('COD_DOC_PAGO' => $COD_DOC_PAGO));

		foreach($DocPago["listDocPagoDet"] as $item){
			$doc_pago_detalle = array(
				'COD_DOC_PAGO' => $COD_DOC_PAGO,
				'COD_ORDEN_S' => $item["COD_ORDEN_S"],
				'SUB_TOTAL' => $item["SUB_TOTAL"]
			);
			$this->db->insert('doc_pago_detalle',$doc_pago_detalle);
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
			'COD_DOC_PAGO'=> $COD_DOC_PAGO,
			
		);

		return $response;
	}

	public function eliminar($COD_DOC_PAGO){
		$this->db->trans_start();
		
		$this->db->delete('doc_pago', array('COD_DOC_PAGO' => $COD_DOC_PAGO));
		$this->db->delete('doc_pago_detalle', array('COD_DOC_PAGO' => $COD_DOC_PAGO));

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

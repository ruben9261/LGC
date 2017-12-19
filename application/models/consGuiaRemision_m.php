<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class ConsGuiaRemision_m extends CI_Model {
		
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

	public function obt_GuiaRemision($COD_DOC_PAGO)
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

	public function obt_GuiaRemisionDet($COD_DOC_PAGO)
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

	public function obt_MotivoTraslado()
	{	
		$this->db->select('*');
		$this->db->from('Motivo_Traslado');

		$query  = $this->db->get();
		$result = $query->result();

		return $result;
    }
    
    public function obt_UnidadMedida()
	{	
		$this->db->select('*');
		$this->db->from('UnidadMedida');

		$query  = $this->db->get();
		$result = $query->result();

		return $result;
    }
    
    public function obt_Producto()
	{	
		$this->db->select('*');
		$this->db->from('producto');

		$query  = $this->db->get();
		$result = $query->result();

		return $result;
	}

	public function obt_totpaginas($Filtros){
		$TotalPaginas = 0;
		$this->db->select('dc.COD_DOC_PAGO,prov.NOMBRE, prov.NRO_DOCUMENTO, u.COD_USU, u.USU,c.DESC_CAJA,tp.NOM_TIPOPAGO');
		$this->db->from('doc_pago dc');
		$this->db->join('Proveedor prov', 'dc.COD_PROV = prov.COD_PROV');
		$this->db->join('usuario u', 'dc.COD_USU = u.COD_USU');
		$this->db->join('caja c', 'dc.COD_CAJA = c.COD_CAJA');
		$this->db->join('tipo_pago tp', 'dc.COD_TIPOPAGO = tp.COD_TIPOPAGO');
		$this->db->where("((".$Filtros["COD_PROV"]."=0) or(dc.COD_PROV=".$Filtros["COD_PROV"]."))");
		$this->db->where("((".$Filtros["COD_USU"]."=0) or(u.COD_USU=".$Filtros["COD_USU"]."))");
		$this->db->where("((".$Filtros["COD_TIPOPAGO"]."=0) or(dc.COD_TIPOPAGO=".$Filtros["COD_TIPOPAGO"]."))");
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

				$this->db->select('dc.COD_DOC_PAGO,prov.NOMBRE, prov.NRO_DOCUMENTO, u.COD_USU, u.USU,c.DESC_CAJA,tp.NOM_TIPOPAGO');
				$this->db->from('doc_pago dc');
				$this->db->join('Proveedor prov', 'dc.COD_PROV = prov.COD_PROV');
				$this->db->join('usuario u', 'dc.COD_USU = u.COD_USU');
				$this->db->join('caja c', 'dc.COD_CAJA = c.COD_CAJA');
				$this->db->join('tipo_pago tp', 'dc.COD_TIPOPAGO = tp.COD_TIPOPAGO');
				$this->db->where("((".$Filtros["COD_PROV"]."=0) or(dc.COD_PROV=".$Filtros["COD_PROV"]."))");
				$this->db->where("((".$Filtros["COD_USU"]."=0) or(u.COD_USU=".$Filtros["COD_USU"]."))");
				$this->db->where("((".$Filtros["COD_TIPOPAGO"]."=0) or(dc.COD_TIPOPAGO=".$Filtros["COD_TIPOPAGO"]."))");
				$this->db->where("(('".$Filtros["COD_DOC_PAGO"]."'='') or(dc.COD_DOC_PAGO='".$Filtros["COD_DOC_PAGO"]."'))");
				$this->db->where("(('".$Filtros["DOC_PAGO_FECHA"]."'='') or(date(dc.DOC_PAGO_FECHA)='".$Filtros["DOC_PAGO_FECHA"]."'))");
				$this->db->limit($filasxpagina,$inicio);
				//$string = $this->db->get_compiled_select();
				$query  = $this->db->get();
				$result = $query->result();

		return $result;
	}

	public function insertGuiaRemision($GuiaRemision)
	{	
		$this->db->trans_start();
		$FECHA_OPERACION = "1900-10-10";
		date_default_timezone_set('America/Lima');
		$DOC_PAGO_FECHA = date('Y/m/d h:i:s', time());
		$COD_DOC_PAGO = 0;

		$GUIA_REMISION = array(
				'SERIE' => $GuiaRemision["SERIE"],
                'FECHA_EMISION' => $DOC_PAGO_FECHA,
                'FECHA_TRASLADO' => $FECHA_TRASLADO,
				'PUNTO_PARTIDA' => $GuiaRemision["PUNTO_PARTIDA"],
				'PUNTO_LLEGADA' => $GuiaRemision["PUNTO_LLEGADA"],
				'COD_PROV' => 0,
				'RAZON_SOCIAL' => $GuiaRemision["RAZON_SOCIAL"],
				'NRO_DOCUMENTO' => $GuiaRemision["NRO_DOCUMENTO"],
				'MARCA_PLACA' => $GuiaRemision["MARCA_PLACA"],
				'NROCONS_INSCRIPC' => $GuiaRemision["NROCONS_INSCRIPC"],
				'NROLIC_CONDUCIR' => $GuiaRemision["NROLIC_CONDUCIR"],
				'ORDEN_COMPRA' => $GuiaRemision["ORDEN_COMPRA"],
				'NRO_PEDIDO' => $GuiaRemision["NRO_PEDIDO"],
				'NRO_COMPROBANTE' => $GuiaRemision["NRO_COMPROBANTE"],
				'TIPO_COMPROBANTE' => $GuiaRemision["TIPO_COMPROBANTE"],
                'TRANSPORTISTA' => $GuiaRemision["TRANSPORTISTA"],
                'TRANSPORTISTA_RUC' => $GuiaRemision["TRANSPORTISTA_RUC"],
                'COSTO_MINIMO' => $GuiaRemision["COSTO_MINIMO"],
                'COD_MOT_TRAS' => $GuiaRemision["COD_MOT_TRAS"]
		);
		
		$this->db->insert('GuiaRemision', $GUIA_REMISION);
		//$string = $this->db->get_compiled_select();
		$COD_GUIAREM = $this->db->insert_id();
		
		foreach($GuiaRemision["listGuiaRemisionDet"] as $item){
			$GuiaRemision_Detalle = array(
				'COD_GUIAREM' => $COD_GUIAREM,
				'COD_PROD' => $item["COD_PROD"],
                'COD_UM' => $item["COD_UM"],
                'CANTIDAD' => $item["CANTIDAD"]
			);
			$this->db->insert('GuiaRemision_Detalle',$GuiaRemision_Detalle);
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
			'COD_GUIAREM'=> $COD_GUIAREM
		);

		return $response;
	}

	public function updateGuiaRemision($GuiaRemision)
	{	
		$this->db->trans_start();

		date_default_timezone_set('America/Lima');
		$doc_pago_FECHA = date('Y/m/d h:i:s', time());
        $COD_GUIAREM = $GuiaRemision['COD_GUIAREM'];
        
		$GUIA_REMISION = array(
            'SERIE' => $GuiaRemision["SERIE"],
            'FECHA_EMISION' => $DOC_PAGO_FECHA,
            'FECHA_TRASLADO' => $FECHA_TRASLADO,
            'PUNTO_PARTIDA' => $GuiaRemision["PUNTO_PARTIDA"],
            'PUNTO_LLEGADA' => $GuiaRemision["PUNTO_LLEGADA"],
            'COD_PROV' => 0,
            'RAZON_SOCIAL' => $GuiaRemision["RAZON_SOCIAL"],
            'NRO_DOCUMENTO' => $GuiaRemision["NRO_DOCUMENTO"],
            'MARCA_PLACA' => $GuiaRemision["MARCA_PLACA"],
            'NROCONS_INSCRIPC' => $GuiaRemision["NROCONS_INSCRIPC"],
            'NROLIC_CONDUCIR' => $GuiaRemision["NROLIC_CONDUCIR"],
            'ORDEN_COMPRA' => $GuiaRemision["ORDEN_COMPRA"],
            'NRO_PEDIDO' => $GuiaRemision["NRO_PEDIDO"],
            'NRO_COMPROBANTE' => $GuiaRemision["NRO_COMPROBANTE"],
            'TIPO_COMPROBANTE' => $GuiaRemision["TIPO_COMPROBANTE"],
            'TRANSPORTISTA' => $GuiaRemision["TRANSPORTISTA"],
            'TRANSPORTISTA_RUC' => $GuiaRemision["TRANSPORTISTA_RUC"],
            'COSTO_MINIMO' => $GuiaRemision["COSTO_MINIMO"],
            'COD_MOT_TRAS' => $GuiaRemision["COD_MOT_TRAS"]
    );

		$this->db->where('COD_GUIAREM', $COD_GUIAREM);
		$this->db->update('GuiaRemision', $GUIA_REMISION);
		$this->db->delete('GuiaRemision_Detalle', array('COD_GUIAREM' => $COD_GUIAREM));

		foreach($GuiaRemision["listGuiaRemisionDet"] as $item){
			$GuiaRemision_Detalle = array(
				'COD_GUIAREM' => $COD_GUIAREM,
				'COD_PROD' => $item["COD_PROD"],
                'COD_UM' => $item["COD_UM"],
                'CANTIDAD' => $item["CANTIDAD"]
			);
			$this->db->insert('GuiaRemision_Detalle',$GuiaRemision_Detalle);
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
			'COD_GUIAREM'=> $COD_GUIAREM,
			
		);

		return $response;
	}

	public function eliminar($COD_GUIAREM){
		$this->db->trans_start();
		
		$this->db->delete('GuiaRemision', array('COD_GUIAREM' => $COD_GUIAREM));
		$this->db->delete('GuiaRemision_Detalle', array('COD_GUIAREM' => $COD_GUIAREM));

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

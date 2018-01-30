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

	public function NUMERO_ACTUAL()
	{	
		$this->db->select('MAX(NUMERO_ACTUAL) AS NUMERO_ACTUAL,');
		$this->db->from('serie_guia');
		//$string = $this->db->get_compiled_select();
		$query  = $this->db->get();
		$result = $query->result();

		return $result;
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

	public function obt_GuiaRemision($COD_GUIAREM)
	{	
		$this->db->select('*');
		$this->db->from('GuiaRemision');
		$this->db->where("COD_GUIAREM",$COD_GUIAREM);
		//$string = $this->db->get_compiled_select();
		$query  = $this->db->get();
		$result = $query->result();

		return $result;
	}

	public function obt_GuiaRemisionDet($COD_GUIAREM)
	{	
		
		$this->db->select(' gd.COD_GUIAREM_DET,');
		$this->db->select(' gd.COD_ORDEN_S,');
		$this->db->select(' gd.COD_PROD,');
		$this->db->select(' gd.COD_UM,');
		$this->db->select(' gd.CANTIDAD,');
		$this->db->select(' gd.SUB_TOTAL,');
		$this->db->select(' gd.DESCRIPCION ,');
		$this->db->select(' p.COD_TIP_PROD,');
		$this->db->select(' p.COD_TIP_TARIFA,');
		$this->db->select(' p.COD_CATEGORIA,');
		$this->db->select(' p.PRECIO,');
		$this->db->select(' um.DESC_UM,');

		$this->db->select(' p.DESCRIPCION AS PRODUCTO');
        $this->db->from('GuiaRemision_Detalle gd');
        $this->db->join('producto p', 'gd.COD_PROD = p.COD_PROD');
        $this->db->join('UnidadMedida um', 'gd.COD_UM = um.COD_UM');
		$this->db->where("COD_GUIAREM",$COD_GUIAREM);
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
		$this->db->select('gr.COD_GUIAREM ,gr.FECHA_EMISION , gr.FECHA_TRASLADO , gr.NRO_DOCUMENTO ,gr.NRO_COMPROBANTE ,gr.TIPO_COMPROBANTE , gr.RUC_EMPRESA ');


	   $this->db->from('GuiaRemision gr');
	   
	   $this->db->where("(('".$Filtros["FECHA_EMISION"]."'='') or(date(gr.FECHA_EMISION)='".$Filtros["FECHA_EMISION"]."'))");
		$this->db->where("(('".$Filtros["FECHA_TRASLADO"]."'='') or(date(gr.FECHA_TRASLADO)='".$Filtros["FECHA_TRASLADO"]."'))");
		
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

		$this->db->select('gr.COD_GUIAREM ,gr.FECHA_EMISION , gr.FECHA_TRASLADO , gr.NRO_DOCUMENTO ,gr.NRO_COMPROBANTE ,gr.TIPO_COMPROBANTE , gr.RUC_EMPRESA ');
	   $this->db->from('GuiaRemision gr');
	   
	  $this->db->where("(('".$Filtros["FECHA_EMISION"]."'='') or(date(gr.FECHA_EMISION)='".$Filtros["FECHA_EMISION"]."'))");
	  $this->db->where("(('".$Filtros["FECHA_TRASLADO"]."'='') or(date(gr.FECHA_TRASLADO)='".$Filtros["FECHA_TRASLADO"]."'))");
	 
	  
	  
	  
	 // $this->db->where("((".$Filtros["COD_PROD"]."'='') or(dt_gr.COD_PROD=".$Filtros["COD_PROD"]."))");
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
                'FECHA_TRASLADO' => $DOC_PAGO_FECHA,
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
				'TIPO_COMPROBANTE' => null,
                'TRANSPORTISTA' => $GuiaRemision["TRANSPORTISTA"],
                'TRANSPORTISTA_RUC' => $GuiaRemision["TRANSPORTISTA_RUC"],
                'COSTO_MINIMO' => $GuiaRemision["COSTO_MINIMO"],
				'COD_MOT_TRAS' => $GuiaRemision["COD_MOT_TRAS"],
				'RUC_EMPRESA' => $GuiaRemision["RUC_EMPRESA"]
		);
		
		$this->db->insert('GuiaRemision', $GUIA_REMISION);

		
		//$string = $this->db->get_compiled_select();
		$COD_GUIAREM = $this->db->insert_id();
			
		foreach($GuiaRemision["listGuiaRemisionDet"] as $item){
			$GuiaRemision_Detalle = array(
				'COD_GUIAREM' => $COD_GUIAREM,
				'COD_PROD' => $item["COD_PROD"],
                'COD_UM' => $item["COD_UM"],
				'CANTIDAD' => $item["CANTIDAD"],
				'DESCRIPCION' => $item["DESCRIPCION"]
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
		$DOC_PAGO_FECHA = date('Y/m/d h:i:s', time());
        $COD_GUIAREM = $GuiaRemision['COD_GUIAREM'];
        
		$GUIA_REMISION = array(
            'SERIE' => $GuiaRemision["SERIE"],
            'FECHA_EMISION' => $DOC_PAGO_FECHA,
            'FECHA_TRASLADO' => $DOC_PAGO_FECHA,
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
            //'TIPO_COMPROBANTE' => $GuiaRemision["TIPO_COMPROBANTE"],
            'TRANSPORTISTA' => $GuiaRemision["TRANSPORTISTA"],
            'TRANSPORTISTA_RUC' => $GuiaRemision["TRANSPORTISTA_RUC"],
            'COSTO_MINIMO' => $GuiaRemision["COSTO_MINIMO"],
			'COD_MOT_TRAS' => $GuiaRemision["COD_MOT_TRAS"],
			'RUC_EMPRESA' => $GuiaRemision["RUC_EMPRESA"]
        );

		$this->db->where('COD_GUIAREM', $COD_GUIAREM);
		$this->db->update('GuiaRemision', $GUIA_REMISION);
		$this->db->delete('GuiaRemision_Detalle', array('COD_GUIAREM' => $COD_GUIAREM));

		foreach($GuiaRemision["listGuiaRemisionDet"] as $item){
			$GuiaRemision_Detalle = array(
				'COD_GUIAREM' => $COD_GUIAREM,
				'COD_PROD' => $item["COD_PROD"],
                'COD_UM' => $item["COD_UM"],
				'CANTIDAD' => $item["CANTIDAD"],
				'DESCRIPCION' => $item["DESCRIPCION"]
			//	'PRODUCTO' => $item["PRODUCTO"]
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

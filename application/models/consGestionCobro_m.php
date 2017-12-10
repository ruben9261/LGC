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

	public function insertDocCobro($DocCobro)
	{	
		$this->db->trans_start();
		$DOC_PAGO_FECHA = "1900-10-10";
		$FECHA_OPERACION = "1900-10-10";
		date_default_timezone_set('America/Lima');
		$DOC_COBRO_FECHA = date('Y/m/d h:i:s', time());

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
		$COD_DOC_COBRO = $this->db->insert_id();
		
		foreach($DocCobro["listDocCobroDet"] as $item){
			$COD_DOC_COBRO_DET = $item['COD_DOC_COBRO_DET'];
			$doc_cobro_detalle = array(
				'COD_DOC_COBRO' => $COD_DOC_COBRO,
				'COD_ORDEN_E' => $item["COD_ORDEN_E"],
				'SUB_TOTAL' => $item["SUB_TOTAL"]
			);
			$this->db->where('COD_DOC_COBRO_DET', $COD_DOC_COBRO_DET);
			$this->db->update('doc_cobro_detalle',$doc_cobro_detalle);
		}

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

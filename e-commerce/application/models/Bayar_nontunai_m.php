<?php
/**
 * 
 */
class Bayar_nontunai_m extends CI_Model
{
	
	function getAll(){ 
		$this->db->select('*'); 
		$this->db->from('tb_transaksi_midtrans');
		$query = $this->db->get();
		return $query;
	}

	function input_data($data, $table) { 
		$this->db->insert($table,$data);
		//untuk proses tambah data ke database
	}
}
?>
<?php
/**
 * 
 */
class Foto_produk_m extends CI_Model
{
	
	public function getAll($id_produk, $id_nama_usaha){ //membuat function getAll
		$this->db->select('*'); //memilih semua
		$this->db->from('tb_foto_produk');
		$this->db->where('produk_id = ', $id_produk);
		$this->db->where('id_nama_usaha = ', $id_nama_usaha);
		$query = $this->db->get();
		return $query;
		//untuk proses selecy data dari database
	}

	public function input_data($data, $table) { //membuat function input_data
		$this->db->insert($table,$data);
		//untuk proses tambah data ke database
	}

	public function tampil_data($id_produk, $id_nama_usaha, $limit, $start)
	{ 
		$this->db->where('produk_id = ', $id_produk);
		$this->db->where('id_nama_usaha = ', $id_nama_usaha);
		$query = $this->db->get('tb_foto_produk', $limit, $start);
		return $query;
	}

	public function total_foto($id_produk, $id_nama_usaha){ 
		$this->db->where('produk_id = ',$id_produk);
		$this->db->where('id_nama_usaha = ', $id_nama_usaha);
		$query = $this->db->get('tb_foto_produk');
		return $query->num_rows();
		
	}

	function hapus_data($where, $table) { //membuat function hapus_data
	    $this->db->where($where);
	    $this->db->delete($table); //untuk menghapus data pada database
	}

	public function get_id($id)
    {
    	$this->db->where('id', $id);
    	return $this->db->get('tb_foto_produk');
    }

   	public function delete($id){        
		$this->db->where_in('id', $id);  
		$this->db->delete('tb_foto_produk');  
	}
	
	public function tampil_foto($id_produk, $id_nama_usaha)
	{ 
		$this->db->where('produk_id = ', $id_produk);
		$this->db->where('id_nama_usaha = ', $id_nama_usaha);
		$query = $this->db->get('tb_foto_produk');
		return $query;
	}
}
?>
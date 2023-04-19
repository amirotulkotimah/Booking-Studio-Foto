<?php
/**
 * 
 */
class Pelanggan_m extends CI_Model
{
	
	public function getAll($id_data_usaha){ 
		$this->db->select('*');
		$this->db->from('tb_customer');
		$this->db->where('id_nama_usaha',$id_data_usaha);
		$query = $this->db->get();
		return $query;
	}

    public function input_data($data, $table) { 
		$this->db->insert($table,$data);
	}

    public function edit_data($where,$table) {
		return $this->db->get_where($table, $where); //memanggil tabel data anak
	}

	public function update_data($hp,$data) {
	    $this->db->where('hp',$hp);
	    return $this->db->update('tb_customer',$data);
  	}
    
    function hapus_data($where, $table) { //membuat function hapus_data
	    $this->db->where($where);
	    $this->db->delete($table); //untuk menghapus data pada database
	}

	public function get_id($hp)
    {
    	$this->db->where('hp',$hp);
    	return $this->db->get('tb_customer');
    }

   	public function delete($hp){        
		$this->db->where_in('hp', $hp);  
		$this->db->delete('tb_customer');  
	}

    public function tampil_data($id_nama_usaha, $limit, $start)
	{ 
		$this->db->where('id_nama_usaha = ', $id_nama_usaha);
		$query = $this->db->get('tb_customer', $limit, $start);
		return $query;
	}

	function total( $id_nama_usaha){ 
		$this->db->where('id_nama_usaha = ', $id_nama_usaha);
		$query = $this->db->get('tb_customer');
		return $query->num_rows();
		
	}
}
?>
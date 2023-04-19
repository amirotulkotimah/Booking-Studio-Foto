<?php
/**
 * 
 */
class Produk_m extends CI_Model
{
	
	public function getAll($id_data_usaha){ 
		$this->db->select('*');
		$this->db->from('tb_produk');
		$this->db->where('id_nama_usaha', $id_data_usaha);
		$query = $this->db->get();
		return $query;
	}

	function get_merk($id_kategori){
		$hasil=$this->db->query("SELECT * FROM tb_brand WHERE sub_merk='$id_kategori'");
		return $hasil->result();
	}

	function get_kategori(){
		$hasil=$this->db->query("SELECT * FROM tb_kategori");
		return $hasil;
	}

    public function input_data($data, $table) { 
		$this->db->insert($table,$data);
	}

	public function detail_data($where,$table) { 
    $this->db->select('*'); //memilih semua
        $this->db->from('tb_produk'); 
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_produk.kategori', 'LEFT');
		$this->db->where('id_produk', $where);
        $query = $this->db->get();
        return $query;
    }

    function edit_data($where,$table) {
    $this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_produk.kategori', 'LEFT'); 
		return $this->db->get_where($table, $where); //memanggil tabel data anak
	}

	public function update_data($id_produk,$data) {
	    $this->db->where('id_produk',$id_produk);
	    return $this->db->update('tb_produk',$data);
  	}
    
    function hapus_data($where, $table) { //membuat function hapus_data
	    $this->db->where($where);
	    $this->db->delete($table); //untuk menghapus data pada database
	}

	public function get_id($id_produk)
    {
    	$this->db->where('id_produk',$id_produk);
    	return $this->db->get('tb_produk');
    }

   	public function delete($id_produk){        
		$this->db->where_in('id_produk', $id_produk);  
		$this->db->delete('tb_produk');  
	}

    public function tampil_data($id_nama_usaha, $limit, $start)
	{ 
		$this->db->where('id_nama_usaha = ', $id_nama_usaha);
		$query = $this->db->get('tb_produk', $limit, $start);
		return $query;
	}

	function total( $id_nama_usaha){ 
		$this->db->where('id_nama_usaha = ', $id_nama_usaha);
		$query = $this->db->get('tb_produk');
		return $query->num_rows();
		
	}

	public function data_paket(){ 
		$this->db->select('*');
		$this->db->from('tb_produk');
		$this->db->where('id_nama_usaha = ', 1);
		$query = $this->db->get();
		return $query;
	}

	public function detail_produk($id_produk)
	{ 
		$this->db->where('id_produk = ', $id_produk);
		$query = $this->db->get('tb_produk');
		return $query;
	}

	public function getJadwal(){ 
		$this->db->select('*');
		$this->db->from('tb_jadwal_booking');
		$this->db->where('day(tanggal_booking)=',date('d')); 
		$query = $this->db->get();
		return $query;
	}

	public function update_jadwal($id,$data){
	    $this->db->where('id',$id);
	    return $this->db->update('tb_jadwal_booking',$data);
	}

	public function getFilterBooking($tanggal)
	{ //membuat function getAll
		$this->db->select('*'); //memilih semua
		$this->db->from('tb_jadwal_booking');
		$this->db->where('tanggal_booking = ', $tanggal);
		$query = $this->db->get();
		return $query;
	}
}
?>
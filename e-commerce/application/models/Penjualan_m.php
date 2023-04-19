<?php
/**
 * 
 */
class Penjualan_m extends CI_Model
{
	
	public function getAll($id_data_usaha){ 
		$this->db->select('*');
		$this->db->from('tb_order');
		$this->db->where('id_usaha',$id_data_usaha);
		$query = $this->db->get();
		return $query;
	}
    
    public function input_data($data, $table) { 
		$this->db->insert($table,$data);
	}

    public function hapus_data($id_order, $where, $table) {
	    $this->db->where('id_order', $id_order);
	    $this->db->where($where);
	    return $this->db->delete($table);
  	}

  	public function detail($where,$table) {
  		$this->db->join('tb_produk', 'tb_produk.id_produk= tb_order.produk', 'LEFT');
		return $this->db->get_where($table, $where); //memanggil tabel data anak
	}

	public function getKodeOrder($kode_order)
    {
    	$this->db->join('tb_produk', 'tb_produk.id_produk = tb_order.produk', 'LEFT');
    	$this->db->where('kode_order',$kode_order);
    	return $this->db->get('tb_order');
    }

    

   	public function delete($kode_order){        
		$this->db->where_in('kode_order', $kode_order);  
		$this->db->delete('tb_order');  
	}

	public function hapus_tunai($kode_order){        
		$this->db->where_in('id_bayar', $kode_order);  
		$this->db->delete('tb_transaksi_tunai');  
	}

	public function hapus_nontunai($kode_order, $payment_method){        
		$this->db->where_in('order_id', $kode_order);
		$this->db->where_in('payment_method', $payment_method); 
		$this->db->delete('tb_transaksi_midtrans');  
	}

    public function tampil_data($id_nama_usaha, $limit, $start)
	{  
		$this->db->where('id_usaha = ', $id_nama_usaha);
		//$this->db->where('day(tanggal_order)=',date('d'));
		$this->db->order_by('tanggal_order','DESC');
		$this->db->order_by('waktu_booking', 'ASC');
		$this->db->join('tb_produk', 'tb_produk.id_produk = tb_order.produk', 'LEFT');
		$query = $this->db->get('tb_order', $limit, $start);
		return $query;
	}

	function total( $id_nama_usaha){  
		$this->db->where('id_usaha = ', $id_nama_usaha);
		$query = $this->db->get('tb_order');
		return $query->num_rows();
		
	}

	public function tampil_data_pembayaran($id_nama_usaha, $limit, $start)
	{ 
		$this->db->where('id_usaha = ', $id_nama_usaha);
		$this->db->order_by('id_payment','DESC');
		$query = $this->db->get('tb_transaksi_midtrans', $limit, $start);
		return $query;
	}

	function total_pembayaran( $id_nama_usaha){ 
		$this->db->where('id_usaha = ', $id_nama_usaha);
		$query = $this->db->get('tb_transaksi_midtrans');
		return $query->num_rows();
		
	}

	public function tampil_data_tunai($id_nama_usaha, $limit, $start)
	{ 
		$this->db->where('id_usaha = ', $id_nama_usaha);
		$this->db->order_by('waktu_bayar','DESC');
		$query = $this->db->get('tb_transaksi_tunai', $limit, $start);
		return $query;
	}

	function total_tunai( $id_nama_usaha){ 
		$this->db->where('id_usaha = ', $id_nama_usaha);
		$query = $this->db->get('tb_transaksi_tunai');
		return $query->num_rows();
		
	}

	public function update_status($kode_order,$data){
	    $this->db->where('kode_order',$kode_order);
	    return $this->db->update('tb_order',$data);
	}

	public function update_gross_amount($kode_order,$data){
	    $this->db->where('order_id',$kode_order);
	    return $this->db->update('tb_transaksi_midtrans',$data);
	}

	function total_filter($id_data_usaha, $tanggal){ //function buat filter by date and id jenis
		$this->db->select('*'); //memilih semua
		$this->db->from('tb_order');
		$this->db->where('id_usaha',$id_data_usaha);
		$this->db->where('tanggal_order',$tanggal);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function Date($id_data_usaha, $tanggal)
	{ //membuat function getAll
		$this->db->select('*'); //memilih semua
		$this->db->from('tb_order');
		$this->db->where('id_usaha',$id_data_usaha);
		$this->db->where('tanggal_order',$tanggal);
		$query = $this->db->get();
		return $query;
	}

	public function getByDate($id_data_usaha, $tanggal, $limit, $start)
	{ 
		$this->db->where('id_usaha', $id_data_usaha);
		$this->db->where('tanggal_order',$tanggal);
		$this->db->order_by('waktu_booking','ASC');
		$this->db->join('tb_produk', 'tb_produk.id_produk = tb_order.produk', 'LEFT');
		$query = $this->db->get('tb_order', $limit, $start);
		return $query;
	}

	public function delete_filter($kode_order){        
		$this->db->where_in('kode_order', $kode_order);  
		$this->db->delete('tb_order');  
	}

	public function getOrder($kode_order)
    {
    	$this->db->join('tb_produk', 'tb_produk.id_produk = tb_order.produk', 'LEFT');
    	$this->db->where('kode_order',$kode_order);
    	return $this->db->get('tb_order');
    }

	public function getBayar($kode_order)
    {
    	$this->db->where('order_id',$kode_order);
    	return $this->db->get('tb_transaksi_midtrans');
    }

    public function delete_pembayaran($id_payment){        
		$this->db->where_in('id_payment', $id_payment);  
		$this->db->delete('tb_transaksi_midtrans');  
	}

	public function delete_tunai($id_bayar){        
		$this->db->where_in('id_bayar', $id_bayar);  
		$this->db->delete('tb_transaksi_tunai');  
	}

	public function update_data($kode_order,$data) {
	    $this->db->where('kode_order',$kode_order);
	    return $this->db->update('tb_order',$data);
  	}

  	public function getOrderId($order_id, $id_nama_usaha)
    {
    	$this->db->select('*'); //memilih semua
		$this->db->from('tb_transaksi_midtrans');
		$this->db->where('order_id = ', $order_id);
		$this->db->where('id_usaha ', $id_nama_usaha);
		$query = $this->db->get();
		return $query;
    }

    public function getIdBayar($id_bayar, $id_nama_usaha)
    {
    	$this->db->select('*'); //memilih semua
		$this->db->from('tb_transaksi_tunai');
		$this->db->where('id_bayar = ', $id_bayar);
		$this->db->where('id_usaha ', $id_nama_usaha);
		$query = $this->db->get();
		return $query;
    }

    function get_harga($id_produk){
		
		//$hsl=$this->db->query("SELECT * FROM tb_stok WHERE kode_barang='$kode_barang'");
		$this->db->select('*'); //memilih semua
		$this->db->from('tb_produk');
		$this->db->where('id_produk', $id_produk);
		$hsl = $this->db->get();

		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$hasil=array(
					'harga' => $data->harga,
					'harga_tambah_perorang'=> $data->harga_tambah_perorang,
					'harga_tambah_cetak' => $data->harga_tambah_cetak,
					'harga_tambah_waktu' => $data->harga_tambah_waktu,
					'jumlah_orang' => $data->jumlah_orang
				);
			}
		}
		return $hasil;
	}

	function get_produk(){
		$hasil=$this->db->query("SELECT * FROM tb_produk WHERE id_nama_usaha ='1'");
		return $hasil;
	}

	function input_payment(){
		$this->db->insert('tb_transaksi_midtrans');
	}

	function total_payment($id_data_usaha, $payment_method){ //function buat filter by date and id jenis
		$this->db->select('*'); //memilih semua
		$this->db->from('tb_transaksi_midtrans');
		$this->db->where('id_usaha',$id_data_usaha);
		$this->db->where('payment_method', $payment_method);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function getPayment($id_data_usaha, $payment_method, $limit, $start)
	{ 
		$this->db->where('id_usaha', $id_data_usaha);
		$this->db->where('payment_method',$payment_method);
		$query = $this->db->get('tb_transaksi_midtrans', $limit, $start);
		return $query;
	}

}
?>
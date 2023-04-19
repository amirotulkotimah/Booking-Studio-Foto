<?php
/**
 * 
 */
class Booking_m extends CI_Model
{
	
	//function get_harga($id_produk){
		//$hasil=$this->db->query("SELECT * FROM tb_produk WHERE id_produk ='$id_produk'");
		//return $hasil->result();
	//}
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

	function getFilterBooking($tanggal)
	{ //membuat function getAll
		$this->db->select('*'); //memilih semua
		$this->db->from('tb_jadwal_booking');
		$this->db->where('tanggal_booking = ', $tanggal);
		$query = $this->db->get();
		return $query;
	}

	public function kode(){
        $this->db->select('RIGHT(tb_order.kode_order,2) as kode_order', FALSE);
        $this->db->order_by('kode_order','DESC');    
        $this->db->limit(1);    
        $query = $this->db->get('tb_order');  //cek dulu apakah ada sudah ada kode di tabel.    
        if($query->num_rows() <> 0){      
            //cek kode jika telah tersedia    
            $data = $query->row();      
        $kode = intval($data->kode_order) + 1; 
        }
        else{      
            $kode = 1;  //cek jika kode belum terdapat pada table
        }
            //$tgl=date('dmY'); 
            $batas = str_pad($kode, 4, "0", STR_PAD_LEFT);    
            $kodetampil = "BR"."5".$batas;  //format kode
            return $kodetampil;  
    }

    public function detail_jadwal_booking($id) { 
    	$this->db->where('id = ', $id);
		$query = $this->db->get('tb_jadwal_booking');
		return $query;
    }

    public function detail_produk($id_produk)
	{ 
		$this->db->where('id_produk = ', $id_produk);
		$query = $this->db->get('tb_produk');
		return $query;
	}

	public function getKodeOrder($order_id)
    {
    	$this->db->where('order_id',$order_id);
    	return $this->db->get('tb_transaksi_midtrans');
    }

    public function getCekTanggal($tanggal)
	{ //membuat function getAll
		$this->db->select('*'); //memilih semua
		$this->db->from('tb_order');
		$this->db->where('tanggal_order = ', $tanggal);
		$query = $this->db->get();
		return $query;
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
}
?>
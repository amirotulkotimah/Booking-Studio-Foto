<?php
 defined ('BASEPATH') OR exit ('No direct script access allowed');
class Penjualan_c extends CI_Controller{ 
	function __construct(){
		parent:: __construct();
		$this->load->model('Penjualan_m');
        $this->load->helper('string');
	}

	public function data_order(){
        $getUser = $this->session->userdata('session_user');
        if (!isset($getUser) || empty ($getUser)) {
            redirect ('login_c');
            // code...
        } 
        $id_nama_usaha = $this->input->get('id_nama_usaha');

        $config['base_url'] = site_url('Penjualan_c/data_order');
        //$config['total_rows'] = $this->db->where("tanggal BETWEEN '" . $mulai_tanggal . "'AND'" . $sampai_tanggal . "'")->get('tb_metal_genix')->num_rows();
        $config['total_rows'] = $this->Penjualan_m->total($id_nama_usaha);
        $config['per_page'] = 10;  //show record per halaman
        $config['uri_segment'] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
 
        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
        $config['reuse_query_string'] = TRUE;
 
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0 ;
        $data['order'] = $this->Penjualan_m->tampil_data($id_nama_usaha, $config["per_page"], $data['page']);
        $data['pagination'] = $this->pagination->create_links();

        $this->load->model('Data_usaha_m');
        $data['role_usaha'] = $this->Data_usaha_m->getAll()->result();
        $data['user'] = $this->Penjualan_m->getAll($id_nama_usaha)->result();
        $data['id_nama_usaha'] = $id_nama_usaha;
        $data['lihat'] = $this->Data_usaha_m->tampil_nama($data['id_nama_usaha'])->row_array();

        $this->load->view('template/header');
        $this->load->view('template/sidebar', $data);
        $this->load->view('pages/penjualan', $data);
        $this->load->view('template/footer');
    }

    public function data_pembayaran(){
        $getUser = $this->session->userdata('session_user');
        if (!isset($getUser) || empty ($getUser)) {
            redirect ('login_c');
            // code...
        } 
        $id_nama_usaha = $this->input->get('id_nama_usaha');

        $config['base_url'] = site_url('penjualan_c/data_pembayaran');
        //$config['total_rows'] = $this->db->where("tanggal BETWEEN '" . $mulai_tanggal . "'AND'" . $sampai_tanggal . "'")->get('tb_metal_genix')->num_rows();
        $config['total_rows'] = $this->Penjualan_m->total_pembayaran($id_nama_usaha);
        $config['per_page'] = 10;  //show record per halaman
        $config['uri_segment'] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
 
        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
        $config['reuse_query_string'] = TRUE;
 
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0 ;
        $data['pay'] = $this->Penjualan_m->tampil_data_pembayaran($id_nama_usaha, $config["per_page"], $data['page']);
        $data['pagination'] = $this->pagination->create_links();

        $this->load->model('Data_usaha_m');
        $data['role_usaha'] = $this->Data_usaha_m->getAll()->result();
        //$data['user'] = $this->Penjualan_m->getAll($id_nama_usaha)->result();
        $data['id_nama_usaha'] = $id_nama_usaha;
        $data['lihat'] = $this->Data_usaha_m->tampil_nama($data['id_nama_usaha'])->row_array();

        $this->load->view('template/header');
        $this->load->view('template/sidebar', $data);
        $this->load->view('pages/data_pembayaran', $data);
        $this->load->view('template/footer');
    }

    public function data_tunai(){
        $getUser = $this->session->userdata('session_user');
        if (!isset($getUser) || empty ($getUser)) {
            redirect ('login_c');
            // code...
        } 
        $id_nama_usaha = $this->input->get('id_nama_usaha');

        $config['base_url'] = site_url('penjualan_c/data_tunai');
        //$config['total_rows'] = $this->db->where("tanggal BETWEEN '" . $mulai_tanggal . "'AND'" . $sampai_tanggal . "'")->get('tb_metal_genix')->num_rows();
        $config['total_rows'] = $this->Penjualan_m->total_tunai($id_nama_usaha);
        $config['per_page'] = 10;  //show record per halaman
        $config['uri_segment'] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
 
        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
        $config['reuse_query_string'] = TRUE;
 
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0 ;
        $data['pay'] = $this->Penjualan_m->tampil_data_tunai($id_nama_usaha, $config["per_page"], $data['page']);
        $data['pagination'] = $this->pagination->create_links();

        $this->load->model('Data_usaha_m');
        $data['role_usaha'] = $this->Data_usaha_m->getAll()->result();
        //$data['user'] = $this->Penjualan_m->getAll($id_nama_usaha)->result();
        $data['id_nama_usaha'] = $id_nama_usaha;
        $data['lihat'] = $this->Data_usaha_m->tampil_nama($data['id_nama_usaha'])->row_array();

        $this->load->view('template/header');
        $this->load->view('template/sidebar', $data);
        $this->load->view('pages/data_tunai', $data);
        $this->load->view('template/footer');
    }


    public function lihat_data_order(){
        $getUser = $this->session->userdata('session_user');
        if (!isset($getUser) || empty ($getUser)) {
            redirect ('login_c');
            // code...
        } 
        $this->load->model('Data_usaha_m');

        $id_nama_usaha = $this->input->get('id_nama_usaha');
        $kode_order = $this->input->get('kode_order');

        $q = $this->db->select('*')
                  ->join('tb_produk', 'tb_produk.id_produk = tb_order.produk', 'LEFT')
                  ->join('tb_transaksi_midtrans', 'tb_transaksi_midtrans.order_id = tb_order.kode_order', 'LEFT')
                  ->where('kode_order', $kode_order)
                  ->get('tb_order')
                  ->result();

        $data['role_usaha'] = $this->Data_usaha_m->getAll()->result();
        $data['id_nama_usaha'] = $id_nama_usaha;
        $data['lihat'] = $this->Data_usaha_m->tampil_nama($data['id_nama_usaha'])->row_array();
        $where = array('kode_order' => $kode_order); 
        $data['user'] = $this->Penjualan_m->detail($where, 'tb_order')->row_array();
        $data['kode_order'] = $kode_order;
        $data['ket'] = $q[0]->ket;
        $data['total_harga_awal'] = $q[0]->total_harga ;

        $data['created_at'] = new DateTime($q[0]->tanggal_order);
        $data['status_order'] = $q[0]->status_order;
        $data['gross_amount'] = $q[0]->gross_amount - 0;
        $data['pembayaran'] = $q[0]->pembayaran;
        $data['tambahan_waktu'] = $q[0]->tambahan_waktu;
        $bayar_non_tunai = $q[0]->gross_amount - 0;
        $data['bayar_tunai'] = $q[0]->total_harga - $bayar_non_tunai;
        $this->load->model('Data_bank_m');
        $data['role_bank'] = $this->Data_bank_m->getAll()->result();

        $this->load->view('template/header');
        $this->load->view('template/sidebar', $data);
        $this->load->view('pages/lihat_order', $data);
        $this->load->view('template/footer');
    }

    public function forward()
    {
        $kode_order = $this->input->post('kode_order');
        $id_nama_usaha = $this->input->post('id_nama_usaha');
        $nama = $this->input->post('nama');
        $no_hp = $this->input->post('no_hp');
        $email = $this->input->post('email');
        $bank = $this->input->post('bank');
        $pembayaran = $this->input->post('pembayaran');
        $tanggal_bayar = $this->input->post('tanggal_bayar');

        $q = $this->db->select('*')
                      ->join('tb_produk', 'tb_produk.id_produk = tb_order.produk', 'LEFT')
                      ->join('tb_transaksi_midtrans', 'tb_transaksi_midtrans.order_id = tb_order.kode_order', 'LEFT')
                      ->where('kode_order', $kode_order)
                      ->get('tb_order')
                      ->result();

        $catatan = $q[0]->catatan;
        $data = [
            'status_order' => 'selesai'
        ];
        $this->Penjualan_m->update_status($kode_order, $data);

        // if ($q[0]->pembayaran == 1 && $q[0]->catatan == '') {
        if ($q[0]->pembayaran == 1) {
            $kode_order = $this->input->post('kode_order');
            $id_nama_usaha = $this->input->post('id_nama_usaha');
            $nama = $this->input->post('nama');
            $no_hp = $this->input->post('no_hp');
            $email = $this->input->post('email');
            $bank = $this->input->post('bank');
            $pembayaran = 1;
            $tanggal_bayar = $this->input->post('tanggal_bayar');
            $status_code = 200;

            $q = $this->db->select('*')
                      ->join('tb_produk', 'tb_produk.id_produk = tb_order.produk', 'LEFT')
                      ->join('tb_transaksi_midtrans', 'tb_transaksi_midtrans.order_id = tb_order.kode_order', 'LEFT')
                      ->where('kode_order', $kode_order)
                      ->get('tb_order')
                      ->result();

            $gross_amount = $q[0]->gross_amount - 0;
            // $total = $q[0]->tambahan_orang * $q[0]->harga_tambah_perorang + $q[0]->tambahan_cetak * $q[0]->harga_tambah_cetak + $q[0]->tambahan_waktu * $q[0]->harga_tambah_waktu + $q[0]->harga - $gross_amount;

            $total = $q[0]->total_harga - $gross_amount;

                $data = array(
                 'id_usaha' =>$id_nama_usaha,
                 'order_id' =>$kode_order,
                 'nama' =>$nama,
                 'no_hp' =>$no_hp,
                 'email' =>$email,
                 'gross_amount' => $total,
                 'transaction_time' =>$tanggal_bayar,
                 'bank' =>$bank,
                 'status_code' =>$status_code,
                 'payment_method'=>$pembayaran
        );
        $this->load->model('Bayar_nontunai_m');
        $this->Bayar_nontunai_m->input_data($data, 'tb_transaksi_midtrans');
        redirect('penjualan_c/data_order/'. '?id_nama_usaha=' . $id_nama_usaha);

        }elseif($q[0]->pembayaran == 2){
            $kode_order = $this->input->post('kode_order');
            $id_nama_usaha = $this->input->post('id_nama_usaha');
            $nama = $this->input->post('nama');
            $no_hp = $this->input->post('no_hp');
            $email = $this->input->post('email');
            $bank = $this->input->post('bank');
            $pembayaran = 2;
            $tanggal_bayar = $this->input->post('tanggal_bayar');
            $status_code = 200;

            $q = $this->db->select('*')
                      ->join('tb_produk', 'tb_produk.id_produk = tb_order.produk', 'LEFT')
                      ->join('tb_transaksi_midtrans', 'tb_transaksi_midtrans.order_id = tb_order.kode_order', 'LEFT')
                      ->where('kode_order', $kode_order)
                      ->get('tb_order')
                      ->result();
            
            // $total = $q[0]->tambahan_orang * $q[0]->harga_tambah_perorang + $q[0]->tambahan_cetak * $q[0]->harga_tambah_cetak + $q[0]->tambahan_waktu * $q[0]->harga_tambah_waktu + $q[0]->harga - $gross_amount;

            $gross_amount = $q[0]->gross_amount - 0;
            $total = $q[0]->total_harga - $gross_amount;

        //         $data = array(
        //          'id_usaha' =>$id_nama_usaha,
        //          'id_bayar' =>$kode_order,
        //          'nama_pay' =>$nama,
        //          'no_hp' =>$no_hp,
        //          'email' =>$email,
        //          'jumlah_bayar' => $total,
        //          'waktu_bayar' =>$tanggal_bayar,
        //          'type_bayar'=>$pembayaran
        // );

            $data = array(
                 'id_usaha' =>$id_nama_usaha,
                 'order_id' =>$kode_order,
                 'nama' =>$nama,
                 'no_hp' =>$no_hp,
                 'email' =>$email,
                 'gross_amount' => $total,
                 'transaction_time' =>$tanggal_bayar,
                 'bank' => '0',
                 'status_code' =>'200',
                 'payment_method'=>$pembayaran
        );
        $this->load->model('Bayar_nontunai_m');
        $this->Bayar_nontunai_m->input_data($data, 'tb_transaksi_midtrans');
        redirect('penjualan_c/data_order/'. '?id_nama_usaha=' . $id_nama_usaha);

        }
        // elseif($q[0]->pembayaran == 1 && $q[0]->catatan = $catatan ){
        //     $kode_order = $this->input->post('kode_order');
        //     $id_nama_usaha = $this->input->post('id_nama_usaha');

        //     $q = $this->db->select('*')
        //               ->join('tb_produk', 'tb_produk.id_produk = tb_order.produk', 'LEFT')
        //               ->join('tb_transaksi_midtrans', 'tb_transaksi_midtrans.order_id = tb_order.kode_order', 'LEFT')
        //               ->where('kode_order', $kode_order)
        //               ->get('tb_order')
        //               ->result();

        //     $total = $q[0]->tambahan_orang * $q[0]->harga_tambah_perorang + $q[0]->tambahan_cetak * $q[0]->harga_tambah_cetak + $q[0]->tambahan_waktu * $q[0]->harga_tambah_waktu + $q[0]->harga;

        //     $data = [
        //         'gross_amount' => $total
        //     ];
        //     $this->Penjualan_m->update_gross_amount($kode_order, $data);
        //     redirect('penjualan_c/data_order/'. '?id_nama_usaha=' . $id_nama_usaha);

        // }
        elseif($q[0]->pembayaran == 0){
            $data = [
            'status_order' => 'selesai'
        ];
        $this->Penjualan_m->update_status($kode_order, $data);
        redirect('penjualan_c/data_order/'. '?id_nama_usaha=' . $id_nama_usaha);
        }
    }

    public function change()
    {
        $kode_order = $this->input->post('kode_order');
        $id_nama_usaha = $this->input->post('id_nama_usaha');
        $q = $this->db->select('*')
                      ->join('tb_transaksi_midtrans', 'tb_transaksi_midtrans.order_id = tb_order.kode_order', 'LEFT')
                      ->where('kode_order', $kode_order)
                      ->get('tb_order')
                      ->result();

        $payment_method = $q[0]->pembayaran;
        $name_bank = $q[0]->name_bank;
        $catatan = $q[0]->catatan;
        $data = [
            'status_order' => ''
        ];
        $this->Penjualan_m->update_status($kode_order, $data);

        if ($q[0]->pembayaran == 1 && $q[0]->name_bank = $name_bank) {
            $del = $this->Penjualan_m->hapus_nontunai($kode_order, $payment_method); 
            redirect('penjualan_c/data_order/'. '?id_nama_usaha='. $id_nama_usaha);
        }elseif ($q[0]->pembayaran == 2 ) {
            $del = $this->Penjualan_m->hapus_nontunai($kode_order, $payment_method); 
            redirect('penjualan_c/data_order/'. '?id_nama_usaha='. $id_nama_usaha);
        }elseif($q[0]->pembayaran == 1 && $q[0]->catatan = $catatan ){
            redirect('penjualan_c/data_order/'. '?id_nama_usaha='. $id_nama_usaha);
        }elseif ($q[0]->pembayaran == 0) {
            redirect('penjualan_c/data_order/'. '?id_nama_usaha='. $id_nama_usaha);
        }
        
        redirect('penjualan_c/data_order/'. '?id_nama_usaha='. $id_nama_usaha);
    }

    public function forward_cancel($kode_order)
    {
        $q = $this->db->select('*')
                      ->where('order_id', $kode_order)
                      ->get('tb_transaksi_midtrans')
                      ->result();

        $data = [
            'status_order' => 'cancel'
        ];
        $this->Penjualan_m->update_status($kode_order, $data);

        if($q[0]->order_id = $kode_order){
            $data = [
            'status_code' => 'refund'
        ];
        $this->Penjualan_m->update_gross_amount($kode_order, $data);
        }
        redirect('penjualan_c/data_order/'. '?id_nama_usaha=' . $this->input->get('id_nama_usaha'));
    }

    public function change_cancel($kode_order)
    {
        $q = $this->db->select('*')
                      ->where('order_id', $kode_order)
                      ->get('tb_transaksi_midtrans')
                      ->result();

        $data = [
            'status_order' => ''
        ];
        $this->Penjualan_m->update_status($kode_order, $data);
        if($q[0]->order_id = $kode_order){
            $data = [
            'status_code' => '200',
            'status_refund' => '0'
        ];
        $this->Penjualan_m->update_gross_amount($kode_order, $data);
        }
        redirect('penjualan_c/data_order/'. '?id_nama_usaha=' . $this->input->get('id_nama_usaha'));
    }

    public function forward_filter()
    {
        $kode_order = $this->input->post('kode_order');
        $id_nama_usaha = $this->input->post('id_nama_usaha');
        $nama = $this->input->post('nama');
        $no_hp = $this->input->post('no_hp');
        $email = $this->input->post('email');
        $bank = $this->input->post('bank');
        $pembayaran = $this->input->post('pembayaran');
        $tanggal_bayar = $this->input->post('tanggal_bayar');
        $tanggal = $this->input->post('tanggal');

        $q = $this->db->select('*')
                      ->join('tb_produk', 'tb_produk.id_produk = tb_order.produk', 'LEFT')
                      ->join('tb_transaksi_midtrans', 'tb_transaksi_midtrans.order_id = tb_order.kode_order', 'LEFT')
                      ->where('kode_order', $kode_order)
                      ->get('tb_order')
                      ->result();

        $catatan = $q[0]->catatan;
        $data = [
            'status_order' => 'selesai'
        ];
        $this->Penjualan_m->update_status($kode_order, $data);

        if ($q[0]->pembayaran == 1) {
            $kode_order = $this->input->post('kode_order');
            $id_nama_usaha = $this->input->post('id_nama_usaha');
            $nama = $this->input->post('nama');
            $no_hp = $this->input->post('no_hp');
            $email = $this->input->post('email');
            $bank = $this->input->post('bank');
            $pembayaran = 1;
            $tanggal_bayar = $this->input->post('tanggal_bayar');
            $status_code = 200;
            $tanggal = $this->input->post('tanggal');

            $q = $this->db->select('*')
                      ->join('tb_produk', 'tb_produk.id_produk = tb_order.produk', 'LEFT')
                      ->join('tb_transaksi_midtrans', 'tb_transaksi_midtrans.order_id = tb_order.kode_order', 'LEFT')
                      ->where('kode_order', $kode_order)
                      ->get('tb_order')
                      ->result();
            
            $gross_amount = $q[0]->gross_amount - 0;
            $total = $q[0]->total_harga - $gross_amount;

            // $total = $q[0]->tambahan_orang * $q[0]->harga_tambah_perorang + $q[0]->tambahan_cetak * $q[0]->harga_tambah_cetak + $q[0]->tambahan_waktu * $q[0]->harga_tambah_waktu + $q[0]->harga - $gross_amount;

                $data = array(
                 'id_usaha' =>$id_nama_usaha,
                 'order_id' =>$kode_order,
                 'nama' =>$nama,
                 'no_hp' =>$no_hp,
                 'email' =>$email,
                 'gross_amount' => $total,
                 'transaction_time' =>$tanggal_bayar,
                 'bank' =>$bank,
                 'status_code' =>$status_code,
                 'payment_method'=>$pembayaran
        );
        $this->load->model('Bayar_nontunai_m');
        $this->Bayar_nontunai_m->input_data($data, 'tb_transaksi_midtrans');
        redirect('penjualan_c/filter_tanggal/'. '?id_nama_usaha=' . $id_nama_usaha. '&tanggal=' . $tanggal);
        
        }elseif($q[0]->pembayaran == 2){
            $kode_order = $this->input->post('kode_order');
            $id_nama_usaha = $this->input->post('id_nama_usaha');
            $nama = $this->input->post('nama');
            $no_hp = $this->input->post('no_hp');
            $email = $this->input->post('email');
            $bank = $this->input->post('bank');
            $pembayaran = 2;
            $tanggal_bayar = $this->input->post('tanggal_bayar');
            $status_code = 200;
            $tanggal = $this->input->post('tanggal');

            $q = $this->db->select('*')
                      ->join('tb_produk', 'tb_produk.id_produk = tb_order.produk', 'LEFT')
                      ->join('tb_transaksi_midtrans', 'tb_transaksi_midtrans.order_id = tb_order.kode_order', 'LEFT')
                      ->where('kode_order', $kode_order)
                      ->get('tb_order')
                      ->result();
            
            $gross_amount = $q[0]->gross_amount - 0;
            $total = $q[0]->total_harga - $gross_amount;
            // $total = $q[0]->tambahan_orang * $q[0]->harga_tambah_perorang + $q[0]->tambahan_cetak * $q[0]->harga_tambah_cetak + $q[0]->tambahan_waktu * $q[0]->harga_tambah_waktu + $q[0]->harga - $gross_amount;

             $data = array(
                 'id_usaha' =>$id_nama_usaha,
                 'order_id' =>$kode_order,
                 'nama' =>$nama,
                 'no_hp' =>$no_hp,
                 'email' =>$email,
                 'gross_amount' => $total,
                 'transaction_time' =>$tanggal_bayar,
                 'bank' => '0',
                 'status_code' =>'200',
                 'payment_method'=>$pembayaran
        );
        $this->load->model('Bayar_nontunai_m');
        $this->Bayar_nontunai_m->input_data($data, 'tb_transaksi_midtrans');
        redirect('penjualan_c/filter_tanggal/'. '?id_nama_usaha=' . $id_nama_usaha. '&tanggal=' . $tanggal);

        }
        // elseif($q[0]->pembayaran == 1 && $q[0]->catatan = $catatan ){
        //     $kode_order = $this->input->post('kode_order');
        //     $id_nama_usaha = $this->input->post('id_nama_usaha');
        //     $tanggal = $this->input->post('tanggal');

        //     $q = $this->db->select('*')
        //               ->join('tb_produk', 'tb_produk.id_produk = tb_order.produk', 'LEFT')
        //               ->join('tb_transaksi_midtrans', 'tb_transaksi_midtrans.order_id = tb_order.kode_order', 'LEFT')
        //               ->where('kode_order', $kode_order)
        //               ->get('tb_order')
        //               ->result();

        //     $total = $q[0]->tambahan_orang * $q[0]->harga_tambah_perorang + $q[0]->tambahan_cetak * $q[0]->harga_tambah_cetak + $q[0]->tambahan_waktu * $q[0]->harga_tambah_waktu + $q[0]->harga;

        //     $data = [
        //         'gross_amount' => $total
        //     ];
        //     $this->Penjualan_m->update_gross_amount($kode_order, $data);
        //     redirect('penjualan_c/filter_tanggal/'. '?id_nama_usaha=' . $id_nama_usaha. '&tanggal=' . $tanggal);

        // }
        elseif($q[0]->pembayaran == 0){
            $data = [
            'status_order' => 'selesai'
        ];
        $this->Penjualan_m->update_status($kode_order, $data);
        redirect('penjualan_c/filter_tanggal/'. '?id_nama_usaha=' . $id_nama_usaha. '&tanggal=' . $tanggal);
        }
        // $data = [
        //     'status_order' => 'selesai'
        // ];
        // $this->Penjualan_m->update_status($kode_order, $data);
        // redirect('penjualan_c/filter_tanggal/'. '?id_nama_usaha=' . $this->input->get('id_nama_usaha'). '&tanggal=' . $this->input->get('tanggal'));
    }

    public function change_filter()
    {
        $kode_order = $this->input->post('kode_order');
        $id_nama_usaha = $this->input->post('id_nama_usaha');
        $tanggal = $this->input->post('tanggal');
        $q = $this->db->select('*')
                      ->join('tb_transaksi_midtrans', 'tb_transaksi_midtrans.order_id = tb_order.kode_order', 'LEFT')
                      ->where('kode_order', $kode_order)
                      ->get('tb_order')
                      ->result();
        
        $payment_method = $q[0]->pembayaran;
        $name_bank = $q[0]->name_bank;
        $catatan = $q[0]->catatan;
        $data = [
            'status_order' => ''
        ];
        $this->Penjualan_m->update_status($kode_order, $data);

        if ($q[0]->pembayaran == 1 && $q[0]->name_bank = $name_bank) {
            $del = $this->Penjualan_m->hapus_nontunai($kode_order, $payment_method); 
            redirect('penjualan_c/filter_tanggal/'. '?id_nama_usaha='. $id_nama_usaha. '&tanggal=' . $tanggal);
        }elseif ($q[0]->pembayaran == 2) {
            $del = $this->Penjualan_m->hapus_nontunai($kode_order, $payment_method); 
            redirect('penjualan_c/filter_tanggal/'. '?id_nama_usaha='. $id_nama_usaha. '&tanggal=' . $tanggal);
        }elseif($q[0]->pembayaran == 1 && $q[0]->catatan = $catatan ){
             $data = [
            'status_order' => ''
        ];
            redirect('penjualan_c/data_order/'. '?id_nama_usaha='. $id_nama_usaha. '&tanggal=' . $tanggal);
        }
        redirect('penjualan_c/data_order/'. '?id_nama_usaha='. $id_nama_usaha. '&tanggal=' . $tanggal);
    }

    public function forward_filter_cancel($kode_order)
    {
        $q = $this->db->select('*')
                      ->where('order_id', $kode_order)
                      ->get('tb_transaksi_midtrans')
                      ->result();

        $data = [
            'status_order' => 'cancel'
        ];
        $this->Penjualan_m->update_status($kode_order, $data);
        if($q[0]->order_id = $kode_order){
            $data = [
            'status_code' => 'refund'
        ];
        $this->Penjualan_m->update_gross_amount($kode_order, $data);
        }
        redirect('penjualan_c/filter_tanggal/'. '?id_nama_usaha=' . $this->input->get('id_nama_usaha'). '&tanggal=' . $this->input->get('tanggal'));
    }

    public function change_filter_cancel($kode_order)
    {
        $q = $this->db->select('*')
                      ->where('order_id', $kode_order)
                      ->get('tb_transaksi_midtrans')
                      ->result();
        $data = [
            'status_order' => ''
        ];
        $this->Penjualan_m->update_status($kode_order, $data);

        if($q[0]->order_id = $kode_order){
            $data = [
            'status_code' => '200',
            'status_refund' => '0'
        ];
        $this->Penjualan_m->update_gross_amount($kode_order, $data);
        }

        redirect('penjualan_c/filter_tanggal/'. '?id_nama_usaha=' . $this->input->get('id_nama_usaha'). '&tanggal=' . $this->input->get('tanggal'));
    }

    public function delete(){        
        $kode_order = $_POST['kode_order'];

        $del = $this->Penjualan_m->delete($kode_order);  
        redirect('penjualan_c/data_order/'. '?id_nama_usaha=' . $this->input->get('id_nama_usaha'));  
    }

    public function delete_filter(){        
        $kode_order = $_POST['kode_order'];

        $del = $this->Penjualan_m->delete_filter($kode_order);  
        redirect('penjualan_c/filter_tanggal/'. '?id_nama_usaha=' . $this->input->get('id_nama_usaha'). '&tanggal=' . $this->input->get('tanggal'));  
    }

    public function delete_pembayaran(){        
        $id_payment = $_POST['id_payment'];

        $del = $this->Penjualan_m->delete_pembayaran($id_payment);  
        redirect('penjualan_c/data_pembayaran/'. '?id_nama_usaha=' . $this->input->get('id_nama_usaha'));  
    }

    public function delete_tunai(){        
        $id_bayar = $_POST['id_bayar'];

        $del = $this->Penjualan_m->delete_tunai($id_bayar);  
        redirect('penjualan_c/data_tunai/'. '?id_nama_usaha=' . $this->input->get('id_nama_usaha'));  
    }

    public function filter_tanggal(){ 
        $getUser = $this->session->userdata('session_user');
        if (!isset($getUser) || empty ($getUser)) {
            redirect ('login_c');
            // code...
        } 
        $id_nama_usaha = $this->input->get('id_nama_usaha');
        $tanggal = $this->input->get('tanggal');

        $config['base_url'] = site_url('penjualan_c/filter_tanggal');
        $config['total_rows'] = $this->Penjualan_m->total_filter($id_nama_usaha, $tanggal);
        $config['per_page'] = 10;  //show record per halaman
        $config['uri_segment'] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
 
        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
        $config['reuse_query_string'] = TRUE;
 
        $data = [
            'date'=>$this->input->get('tanggal')
        ];
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0 ;
        $data['order'] = $this->Penjualan_m->getByDate($id_nama_usaha, $data['date'], $config["per_page"], $data['page']);
        $data['pagination'] = $this->pagination->create_links();

        $this->load->model('Data_usaha_m');
        $data['id_nama_usaha'] = $id_nama_usaha;
        $date = $this->input->get('tanggal');

        $this->load->model('Data_usaha_m');
        $data['role_usaha'] = $this->Data_usaha_m->getAll()->result();
        $data['user'] = $this->Penjualan_m->Date($id_nama_usaha, $data['date'])->result();
        $data['id_nama_usaha'] = $id_nama_usaha;
        $data['lihat'] = $this->Data_usaha_m->tampil_nama($data['id_nama_usaha'])->row_array();
        $data['created_at'] = new DateTime($date);
        $data['tanggal'] = $date;

        $this->load->view('template/header');
        $this->load->view('template/sidebar', $data);
        $this->load->view('pages/filter_data_order', $data);
        $this->load->view('template/footer');
    }

    public function update(){
        $id_nama_usaha = $this->input->get('id_nama_usaha');
        $kode_order = $this->input->post('kode_order');
        
        $data = array(
            'tambahan_orang' =>$this->input->post('total_orang'),
            'total_harga' =>$this->input->post('total'),
            'tambahan_cetak' =>$this->input->post('total_cetak'),
            'tambahan_waktu' =>$this->input->post('total_waktu'),
            'total_harga_orang' =>$this->input->post('total_harga_orang'),
            'total_harga_cetak' =>$this->input->post('total_harga_cetak'),
            'total_harga_waktu' =>$this->input->post('total_harga_waktu'),
            'pembayaran' =>$this->input->post('metode_bayar'),
            'name_bank' =>$this->input->post('name_bank')
            );
        $this->Penjualan_m->update_data($kode_order,$data);
        redirect('penjualan_c/lihat_data_order/'.'?kode_order='. $kode_order.'&id_nama_usaha=' . $id_nama_usaha);
    }

    public function update_ket(){
        $id_nama_usaha = $this->input->get('id_nama_usaha');
        $kode_order = $this->input->post('kode_order');
        
        $data = array(
            'ket' =>$this->input->post('ket'),
            'pembayaran'=>$this->input->post('metode_bayar')
            );
        $this->Penjualan_m->update_data($kode_order,$data);
        redirect('penjualan_c/lihat_data_order/'.'?kode_order='. $kode_order.'&id_nama_usaha=' . $id_nama_usaha);
    }

    public function search(){
        $order_id = $this->input->get('order_id');
        $id_nama_usaha = $this->input->get('id_nama_usaha');
        $data['id_nama_usaha'] = $id_nama_usaha;
        $this->load->model('Data_usaha_m');
        $data['lihat'] = $this->Data_usaha_m->tampil_nama($data['id_nama_usaha'])->row_array();

        $this->load->model('Data_usaha_m');
        $data['role_usaha'] = $this->Data_usaha_m->getAll()->result();
        $data['user'] = $this->Penjualan_m->getOrderId($order_id, $id_nama_usaha)->result();

        $q = $this->db->select('*')
                  ->where('order_id', $order_id)
                  ->get('tb_transaksi_midtrans')
                  ->result();
        $data['created_at'] = new DateTime($q[0]->transaction_time);

        $this->load->view('template/header');
        $this->load->view('template/sidebar', $data);
        $this->load->view('pages/search_midtrans', $data);
        $this->load->view('template/footer');
        
    }

    public function search_tunai(){
        $id_bayar = $this->input->get('id_bayar');
        $id_nama_usaha = $this->input->get('id_nama_usaha');
        $data['id_nama_usaha'] = $id_nama_usaha;
        $this->load->model('Data_usaha_m');
        $data['lihat'] = $this->Data_usaha_m->tampil_nama($data['id_nama_usaha'])->row_array();

        $this->load->model('Data_usaha_m');
        $data['role_usaha'] = $this->Data_usaha_m->getAll()->result();
        $data['user'] = $this->Penjualan_m->getIdBayar($id_bayar, $id_nama_usaha)->result();

        $q = $this->db->select('*')
                  ->where('id_bayar', $id_bayar)
                  ->get('tb_transaksi_tunai')
                  ->result();
        $data['created_at'] = new DateTime($q[0]->waktu_bayar);

        $this->load->view('template/header');
        $this->load->view('template/sidebar', $data);
        $this->load->view('pages/search_tunai', $data);
        $this->load->view('template/footer');
        
    }

    public function tambah_data(){
        $getUser = $this->session->userdata('session_user');
        if (!isset($getUser) || empty ($getUser)) {
            redirect ('login_c');
            // code...
        } 
        $this->load->model('Data_usaha_m');
        $this->load->model('Data_bank_m');
        $id_nama_usaha = $this->input->get('id_nama_usaha');
        $tanggal = $this->input->get('tanggal');
        $waktu = $this->input->get('waktu');

        $data['role_usaha'] = $this->Data_usaha_m->getAll()->result();
        $data['role_bank'] = $this->Data_bank_m->getAll()->result();
        $data['data']=$this->Penjualan_m->get_produk();
        $data['kode'] = random_string('alnum', 10);
        $data['id_nama_usaha'] = $id_nama_usaha;
        $data['tanggal'] = $tanggal;
        $data['waktu'] = $waktu;
        $data['id_nama_usaha'] = $id_nama_usaha;

        $this->load->view('template/header');
        $this->load->view('template/sidebar', $data);
        $this->load->view('pages/tambah_order', $data);
        $this->load->view('template/footer');
    }

    public function get_harga(){
        $id_produk = $this->input->post('id_produk');
        $data = $this->Penjualan_m->get_harga($id_produk);
        echo json_encode($data);
    }

    public function cek_tanggal(){
        $getUser = $this->session->userdata('session_user');
        if (!isset($getUser) || empty ($getUser)) {
            redirect ('login_c');
            // code...
        } 
        $this->load->model('Data_usaha_m');
        $this->load->model('Booking_m');
        $id_nama_usaha = $this->input->get('id_nama_usaha');
        $tanggal = $this->input->get('tanggal');

        $data['created_at'] = new DateTime($tanggal);
        $data['role_usaha'] = $this->Data_usaha_m->getAll()->result();
        $data['user'] = $this->Booking_m->getCekTanggal($tanggal)->result();
        $data['tampil_tanggal'] = $tanggal;
        $data['tanggal'] = $tanggal;
        $data['id_nama_usaha'] = $id_nama_usaha;

        $this->load->view('template/header');
        $this->load->view('template/sidebar', $data);
        $this->load->view('pages/jadwal_booking', $data);
        $this->load->view('template/footer');
        
    }

    public function input(){
        $id_usaha = $this->input->get('id_nama_usaha');
        $kode_order = $this->input->post('kode_order');
        $produk = $this->input->post('produk');
        $nama_customer = $this->input->post('nama_booking');
        $no_hp = $this->input->post('no_hp');
        $email = $this->input->post('email');
        $jumlah_orang = $this->input->post('jumlah_orang');
        $tambah_orang = $this->input->post('tambah_orang');
        $tambah_cetak = $this->input->post('tambah_cetak');
        $tambah_waktu =$this->input->post('tambah_waktu');
        $tanggal_order = $this->input->post('tanggal_order');
        $waktu_booking = $this->input->post('waktu_booking');
        $total_harga = $this->input->post('total');
        $pembayaran = $this->input->post('metode_bayar');
        $name_bank = $this->input->post('name_bank');

        $data = array(
         'id_usaha' =>$id_usaha,
         'kode_order' =>$kode_order,
         'produk' =>$produk,
         'nama_customer' =>$nama_customer,
         'no_hp' =>$no_hp,
         'email' =>$email,
         'jumlah_orang' =>$jumlah_orang,
         'tambahan_orang' =>$tambah_orang,
         'tambahan_cetak' =>$tambah_cetak,
         'tambahan_waktu' =>$tambah_waktu,
         'tanggal_order' =>$tanggal_order,
         'waktu_booking' =>$waktu_booking,
         'total_harga' =>$total_harga,
         'pembayaran' =>$pembayaran,
         'name_bank' =>$name_bank
        );
        $this->Penjualan_m->input_data($data, 'tb_order');
        redirect('penjualan_c/data_order/'. '?id_nama_usaha=' . $this->input->get('id_nama_usaha'));
    }

    public function update_status_refund(){
        $id_nama_usaha = $this->input->get('id_nama_usaha');
        $kode_order = $this->input->get('kode_order');
        
        $data = array(
            'status_refund' =>$this->input->get('status_refund')
        );
        $this->Penjualan_m->update_gross_amount($kode_order,$data);
        redirect('penjualan_c/data_pembayaran/'.'?id_nama_usaha=' . $id_nama_usaha);
    }
    
    public function filter_payment(){ 
        $getUser = $this->session->userdata('session_user');
        if (!isset($getUser) || empty ($getUser)) {
            redirect ('login_c');
            // code...
        } 
        $id_nama_usaha = $this->input->get('id_nama_usaha');
        $payment_method = $this->input->get('payment_method');

        $config['base_url'] = site_url('penjualan_c/filter_payment');
        $config['total_rows'] = $this->Penjualan_m->total_payment($id_nama_usaha, $payment_method);
        $config['per_page'] = 10;  //show record per halaman
        $config['uri_segment'] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
 
        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
        $config['reuse_query_string'] = TRUE;
 
        $data = [
            'payment_method'=>$this->input->get('payment_method')
        ];
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0 ;
        $data['pay'] = $this->Penjualan_m->getPayment($id_nama_usaha, $data['payment_method'], $config["per_page"], $data['page']);
        $data['pagination'] = $this->pagination->create_links();

        $this->load->model('Data_usaha_m');
        $data['id_nama_usaha'] = $id_nama_usaha;
        $payment_method = $this->input->get('payment_method');

        $this->load->model('Data_usaha_m');
        $data['role_usaha'] = $this->Data_usaha_m->getAll()->result();
        //$data['user'] = $this->Penjualan_m->getAll($id_nama_usaha)->result();
        $data['id_nama_usaha'] = $id_nama_usaha;
        $data['lihat'] = $this->Data_usaha_m->tampil_nama($data['id_nama_usaha'])->row_array();

        $this->load->view('template/header');
        $this->load->view('template/sidebar', $data);
        $this->load->view('pages/data_pembayaran', $data);
        $this->load->view('template/footer');
    }

}
?>
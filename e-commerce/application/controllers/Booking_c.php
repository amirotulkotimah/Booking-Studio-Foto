<?php
 defined ('BASEPATH') OR exit ('No direct script access allowed');
class Booking_c extends CI_Controller{ //membuat controller Mahasiswa
    function __construct(){
        parent:: __construct();
        $this->load->model('Booking_m');
        $this->load->model('Produk_m');
        $this->load->model('Foto_produk_m');
        $this->load->model('Penjualan_m');

        $params = array('server_key' => 'your_server_key', 'production' => false);
        $this->load->library('midtrans');
        $this->midtrans->config($params);
        $this->load->helper('url'); 
        $this->load->helper('string');
    }
    
    public function index(){
        $config['base_url'] = site_url('booking_c');
        $data['role_paket'] = $this->Produk_m->data_paket()->result();
        $data['data']=$this->Booking_m->get_produk();
        $data['kode'] = $this->Booking_m->kode();

        //$data['role_usaha'] = $this->Data_usaha_m->getAll()->result(); 

        $this->load->view('template/header');
        $this->load->view('template/overview', $data);
        $this->load->view('customer/studio/booking', $data);
        $this->load->view('template/footer');
    }

    public function get_harga(){
        $id_produk = $this->input->post('id_produk');
        $data = $this->Booking_m->get_harga($id_produk);
        echo json_encode($data);
    }

    public function data_paket(){
        $id_produk = $this->input->get('id_produk');
        $id_nama_usaha = $this->input->get('id_nama_usaha');

        $config['base_url'] = site_url('booking_c/data_paket');

        $data['role_paket'] = $this->Produk_m->data_paket()->result();
        $data['foto'] = $this->Foto_produk_m->tampil_foto($id_produk, $id_nama_usaha)->result();
        $data['user'] = $this->Produk_m->detail_produk($id_produk, $id_nama_usaha)->row_array();
        $data['id_produk'] = $id_produk;
        $data['id_nama_usaha'] = $id_nama_usaha;

        $this->load->view('template/header');
        $this->load->view('template/overview', $data);
        $this->load->view('customer/studio/data_paket', $data);
        $this->load->view('template/footer');
    }

    public function jadwal_booking(){
        $config['base_url'] = site_url('booking_c/data_paket');

        $data['role_paket'] = $this->Produk_m->data_paket()->result();
        //$data['user'] = $this->Produk_m->getJadwal()->result();

        $this->load->view('template/header');
        $this->load->view('template/overview', $data);
        $this->load->view('customer/studio/jadwal_booking', $data);
        $this->load->view('template/footer');
    }

    public function jadwal_paket_booking(){
        $id_nama_usaha = $this->input->get('id_nama_usaha');
        $id_produk = $this->input->get('id_produk');

        $config['base_url'] = site_url('booking_c/data_paket');

        $data['role_paket'] = $this->Produk_m->data_paket()->result();
        $data['id_nama_usaha'] = $id_nama_usaha;
        $data['id_produk'] = $id_produk;

        $this->load->view('template/header');
        $this->load->view('template/overview', $data);
        $this->load->view('customer/studio/paket_jadwal_booking', $data);
        $this->load->view('template/footer');
    }

    public function filter_tanggal(){
        $tanggal = $this->input->get('tanggal');

        $data['role_paket'] = $this->Produk_m->data_paket()->result();
        $data['user'] = $this->Produk_m->getFilterBooking($tanggal)->result();
        $data['tampil_tanggal'] = $tanggal;

        $this->load->view('template/header');
        $this->load->view('template/overview', $data);
        $this->load->view('customer/studio/filter_jadwal_booking', $data);
        $this->load->view('template/footer');
        
    }

    public function filter_tanggal_paket(){
        $tanggal = $this->input->get('tanggal');
        $id_produk = $this->input->get('id_produk');

        $data['created_at'] = new DateTime($tanggal);

        $data['role_paket'] = $this->Produk_m->data_paket()->result();
        $data['user'] = $this->Booking_m->getCekTanggal($tanggal)->result();
        $data['tampil_tanggal'] = $tanggal;
        $data['id_produk'] = $id_produk;
        $data['tanggal'] = $tanggal;

        $this->load->view('template/header');
        $this->load->view('template/overview', $data);
        $this->load->view('customer/studio/filter_tanggal_paket_booking', $data);
        $this->load->view('template/footer');
        
    }

    public function pilih_paket(){
        $id_nama_usaha = $this->input->get('id_nama_usaha');
        $id_produk = $this->input->get('id_produk');

        $data['role_paket'] = $this->Produk_m->data_paket()->result();
        $data['data']=$this->Booking_m->get_produk();
        $data['kode'] = $this->Booking_m->kode();
        $data['user'] = $this->Produk_m->detail_produk($id_produk, $id_nama_usaha)->row_array();

        //$data['role_usaha'] = $this->Data_usaha_m->getAll()->result(); 

        $this->load->view('template/header');
        $this->load->view('template/overview', $data);
        $this->load->view('customer/studio/booking_pilih_paket', $data);
        $this->load->view('template/footer');
    }

    public function pilih_tanggal_paket(){
        $tanggal = $this->input->get('tanggal');
        $waktu = $this->input->get('waktu');
        $id_produk = $this->input->get('id_produk');

        $data['role_paket'] = $this->Produk_m->data_paket()->result();
        $data['data']=$this->Booking_m->get_produk();
        $data['kode'] = random_string('alnum', 10);
        //$data['id'] = $id;
        //$data['user'] = $this->Booking_m->detail_jadwal_booking($id)->row_array();
        $data['produk'] = $this->Booking_m->detail_produk($id_produk)->row_array();
        $data['id_produk'] = $id_produk;
        $data['tanggal'] = $tanggal;
        $data['waktu'] = $waktu;

        //$data['role_usaha'] = $this->Data_usaha_m->getAll()->result(); 

        $this->load->view('template/header');
        $this->load->view('template/overview', $data);
        $this->load->view('customer/studio/booking_pilih_tgl_paket', $data);
        $this->load->view('template/footer');
    }

    public function pilih_tanggal(){
        $id = $this->input->get('id');

        $data['role_paket'] = $this->Produk_m->data_paket()->result();
        $data['data']=$this->Booking_m->get_produk();
        $data['kode'] = $this->Booking_m->kode();
        $data['id'] = $id;
        $data['user'] = $this->Booking_m->detail_jadwal_booking($id, 'tb_jadwal_booking')->row_array();

        //$data['role_usaha'] = $this->Data_usaha_m->getAll()->result(); 

        $this->load->view('template/header');
        $this->load->view('template/overview', $data);
        $this->load->view('customer/studio/booking_pilih_tgl', $data);
        $this->load->view('template/footer');
    }


    public function input(){
        $id_usaha = $this->input->post('id_usaha');
        $kode_order = $this->input->post('kode_order');
        $produk = $this->input->post('produk');
        $nama_customer = $this->input->post('nama_booking');
        $no_hp = $this->input->post('no_hp');
        $email = $this->input->post('email');
        $jumlah_orang = $this->input->post('jumlah_orang');
        $tambah_orang = $this->input->post('jumlah_tambah_orang');
        $tanggal_order = $this->input->post('tanggal_order');
        $waktu_booking = $this->input->post('waktu_booking');
        $catatan = $this->input->post('catatan');
        $total_harga = $this->input->post('total');
        //$tanggal_id = $this->input->post('tanggal_id');

        $data = array(
         'id_usaha' =>$id_usaha,
         'kode_order' =>$kode_order,
         'produk' =>$produk,
         'nama_customer' =>$nama_customer,
         'no_hp' =>$no_hp,
         'email' =>$email,
         'jumlah_orang' =>$jumlah_orang,
         'tambahan_orang' =>$tambah_orang,
         'tanggal_order' =>$tanggal_order,
         'waktu_booking' =>$waktu_booking,
         'catatan' =>$catatan,
         'total_harga' =>$total_harga,
         //'tanggal_id' =>$tanggal_id
        );
        $this->Penjualan_m->input_data($data, 'tb_order');
        redirect('booking_c/invoice/'. '?kode_order=' . $this->input->get('kode_order'));
    }

    public function invoice(){
        $kode_order = $this->input->get('kode_order');
        $data['kode'] = $this->Booking_m->kode();

        $q = $this->db->select('*')
                  ->where('kode_order', $kode_order)
                  ->get('tb_order')
                  ->result();
        $data['created_at'] = new DateTime($q[0]->tanggal_order);
        $data['role_paket'] = $this->Produk_m->data_paket()->result();
        $data['user'] = $this->Penjualan_m->getKodeOrder($kode_order)->row_array();

        $this->load->view('template/header');
        $this->load->view('template/overview', $data);
        $this->load->view('customer/studio/invoice', $data);
        $this->load->view('template/footer');
    }

    public function token()
    {
        $kode_order =  $this->input->post('kode_order');
        $produk = $this->input->post('produk');
        $nama_customer = $this->input->post('nama_customer');
        $no_hp = $this->input->post('no_hp');
        $email = $this->input->post('email');
        $total_harga = $this->input->post('total');
        $tanggal_id = $this->input->post('tanggal_id');
         //echo $total_harga;
        // Required
        $transaction_details = array(
          'order_id' => $kode_order,
          'gross_amount' => $total_harga, // no decimal allowed for creditcard
        );

        // Optional
        $item1_details = array(
          'id' => $kode_order,
          'price' => $total_harga,
          'quantity' => 1,
          'name' => $produk. " - ". $nama_customer
        );

        // Optional
        // $item2_details = array(
        //   'id' => 'a2',
        //   'price' => 20000,
        //   'quantity' => 2,
        //   'name' => "Orange"
        // );

        // Optional
        $item_details = array($item1_details);

        // Optional
        // $billing_address = array(
        //   'first_name'    => "Andri",
        //   'last_name'     => "Litani",
        //   'address'       => "Mangga 20",
        //   'city'          => "Jakarta",
        //   'postal_code'   => "16602",
        //   'phone'         => "081122334455",
        //   'country_code'  => 'IDN'
        // );

        // Optional
        // $shipping_address = array(
        //   'first_name'    => "Obet",
        //   'last_name'     => "Supriadi",
        //   'address'       => "Manggis 90",
        //   'city'          => "Jakarta",
        //   'postal_code'   => "16601",
        //   'phone'         => "08113366345",
        //   'country_code'  => 'IDN'
        // );

        // Optional
        // $customer_details = array(
        //   'first_name'    => "Andri",
        //   'last_name'     => "Litani",
        //   'email'         => "andri@litani.com",
        //   'phone'         => "081122334455",
        //   'billing_address'  => $billing_address,
        //   'shipping_address' => $shipping_address
        // );

        // Data yang akan dikirim untuk request redirect_url.
        $credit_card['secure'] = true;
        //ser save_card true to enable oneclick or 2click
        //$credit_card['save_card'] = true;

        $time = time();
        $custom_expiry = array(
            'start_time' => date("Y-m-d H:i:s O",$time),
            'unit' => 'hours', 
            'duration'  => 1
        );
        
        $transaction_data = array(
            'transaction_details'=> $transaction_details,
            'item_details'       => $item_details,
            //'customer_details'   => $customer_details,
            'credit_card'        => $credit_card,
            'expiry'             => $custom_expiry
        );

        error_log(json_encode($transaction_data));
        $snapToken = $this->midtrans->getSnapToken($transaction_data);
        error_log($snapToken);
        echo $snapToken;
    }

    public function finish()
    {   
        $data['role_paket'] = $this->Produk_m->data_paket()->result();
        $result = json_decode($this->input->post('result_data'), TRUE);
        $nama = $this->input->post('nama_customer');
        $no_hp = $this->input->post('no_hp');
        $email = $this->input->post('email');
        $data = [
            'order_id' => $result['order_id'],
            'nama' => $nama,
            'no_hp' => $no_hp,
            'email' => $email,
            'gross_amount' => $result['gross_amount'],
            'payment_type' => $result['payment_type'],
            'transaction_time' => $result['transaction_time'],
            'bank' => $result['va_numbers'][0]['bank'],
            'va_number' => $result['va_numbers'][0]['va_number'],
            'pdf_url' => $result['pdf_url'],
            'status_code' => $result['status_code'],
            'id_usaha' => '1',
            'payment_method' =>'0',
            'status_refund' =>'0'
        ];

        $simpan = $this->db->insert('tb_transaksi_midtrans', $data);
        if ($simpan) {
            
            $kode_order = $result['order_id'];
            $q = $this->db->select('*')
                  ->where('kode_order', $kode_order)
                  ->get('tb_order')
                  ->result();
            $data['created_at'] = new DateTime($q[0]->tanggal_order);
            $data['user'] = $this->Booking_m->getOrder($kode_order)->row_array();
            $data['role_paket'] = $this->Produk_m->data_paket()->result();
            //echo "sukses";
            $this->load->view('template/header');
            $this->load->view('template/overview', $data);
            $this->load->view('customer/studio/checkout', $data);
            $this->load->view('template/footer');
        }else{
            echo "gagal";
        }

    }

    public function checkout(){
        $kode_order = $this->input->post('order_id');

        $data['role_paket'] = $this->Produk_m->data_paket()->result();
        $data['user'] = $this->Penjualan_m->getKodeOrder($kode_order)->row_array();

        $this->load->view('template/header');
        $this->load->view('template/overview', $data);
        $this->load->view('customer/studio/checkout', $data);
        $this->load->view('template/footer');

    }

    public function cek_tanggal(){
        $tanggal = $this->input->get('tanggal');

        $data['created_at'] = new DateTime($tanggal);
        $data['role_paket'] = $this->Produk_m->data_paket()->result();
        $data['user'] = $this->Booking_m->getCekTanggal($tanggal)->result();
        $data['tampil_tanggal'] = $tanggal;
        $data['tanggal'] = $tanggal;

        $this->load->view('template/header');
        $this->load->view('template/overview', $data);
        $this->load->view('customer/studio/cek_tanggal', $data);
        $this->load->view('template/footer');
        
    }

    public function getTanggal(){
        $tanggal = $this->input->get('tanggal');
        $waktu = $this->input->get('waktu');

        $data['role_paket'] = $this->Produk_m->data_paket()->result();
        $data['data']=$this->Booking_m->get_produk();
        $data['kode'] = random_string('alnum', 10);
        $data['tanggal'] = $tanggal;
        $data['waktu'] = $waktu;

        //$data['role_usaha'] = $this->Data_usaha_m->getAll()->result(); 

        $this->load->view('template/header');
        $this->load->view('template/overview', $data);
        $this->load->view('customer/studio/booking_tanggal', $data);
        $this->load->view('template/footer');
    }
}
?>
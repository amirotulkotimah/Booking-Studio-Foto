<?php
 defined ('BASEPATH') OR exit ('No direct script access allowed');
class Home_studio_c extends CI_Controller{ //membuat controller Mahasiswa
    function __construct(){
        parent:: __construct();
        $this->load->model('Home_m');
        //$this->load->model('Data_usaha_m');
    }
    
    public function index(){
        $config['base_url'] = site_url('home_c');

        $this->load->model('Produk_m');
        $data['role_paket'] = $this->Produk_m->data_paket()->result();

        //$data['role_usaha'] = $this->Data_usaha_m->getAll()->result(); 

        $this->load->view('template/header');
        $this->load->view('template/overview', $data);
        $this->load->view('customer/studio/home');
        $this->load->view('template/footer');
    }
}
?>
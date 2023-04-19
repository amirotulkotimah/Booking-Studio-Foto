<?php
 defined ('BASEPATH') OR exit ('No direct script access allowed');
class Home_c extends CI_Controller{ //membuat controller Mahasiswa
    function __construct(){
        parent:: __construct();
        $this->load->model('Home_m');
        $this->load->model('Data_usaha_m');
    }
    
    public function index(){
        $getUser = $this->session->userdata('session_user');
        if (!isset($getUser) || empty ($getUser)) {
            redirect ('login_c');
            // code...
        } 
        $config['base_url'] = site_url('home_c');

        $data['role_usaha'] = $this->Home_m->data_usaha()->result();
        $data['total_income'] = $this->Home_m->count_all_order();
        $data['baru'] = $this->Home_m->orderbaru()->result(); 
        $data['bayar'] = $this->Home_m->bayarbaru()->result();

        $this->load->view('template/header');
        $this->load->view('template/sidebar', $data);
        $this->load->view('pages/home', $data);
        $this->load->view('template/footer');
    }
}
?>
<?php
 defined ('BASEPATH') OR exit ('No direct script access allowed');
class Statistik_c extends CI_Controller{ 
	function __construct(){
		parent:: __construct();
		$this->load->model('Statistik_m');
	}

	public function lihat_grafik($id_nama_usaha){
		$getUser = $this->session->userdata('session_user');
        if (!isset($getUser) || empty ($getUser)) {
            redirect ('login_c');
            // code...
        }
		$this->load->model('Data_usaha_m');
		$data['role_usaha'] = $this->Data_usaha_m->getAll()->result();
		$data['total_data_order'] = $this->Statistik_m->count_all_order($id_nama_usaha);
		$data['total_data_midtrans'] = $this->Statistik_m->count_all_midtrans($id_nama_usaha);
		$data['total_perhari'] = $this->Statistik_m->total_perhari($id_nama_usaha);
		$data['total_income'] = $this->Statistik_m->total_income($id_nama_usaha);

		$this->load->view('template/header');
        $this->load->view('template/sidebar', $data);
        $this->load->view('pages/statistik', $data);
        $this->load->view('template/footer');
	}
}
?>
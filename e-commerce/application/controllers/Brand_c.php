<?php
 defined ('BASEPATH') OR exit ('No direct script access allowed');
class Brand_c extends CI_Controller{ //membuat controller Mahasiswa
    function __construct(){
        parent:: __construct();
        $this->load->model('Brand_m');
    }
    
    public function index(){
        $getUser = $this->session->userdata('session_user');
        if (!isset($getUser) || empty ($getUser)) {
            redirect ('login_c');
            // code...
        } 
        $config['base_url'] = site_url('brand_c/index');
        $config['total_rows'] = $this->db->count_all('tb_brand'); //total row
        $config['per_page'] = 10;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
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
 
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
  
        $data['data'] = $this->Brand_m->get_brand_list($config["per_page"], $data['page']);           
 
        $data['pagination'] = $this->pagination->create_links();
        
        $this->load->model('Data_usaha_m');
        $this->load->model('Kategori_m');
        $data['role'] = $this->Kategori_m->getAll()->result();
        $data['role_usaha'] = $this->Data_usaha_m->getAll()->result();
        $data['user'] = $this->Brand_m->getAll()->result();

        $this->load->view('template/header');
        $this->load->view('template/sidebar', $data);
        $this->load->view('pages/data_brand', $data);
        $this->load->view('template/footer');
    }

    public function input(){
        $merk_barang = $_POST['merk_barang'];
        $sub_merk = $_POST['id_kategori'];

        $data = array(
            'merk_barang' => $merk_barang,
            'sub_merk' => $sub_merk,
        );

        $this->Brand_m->input_data($data, 'tb_brand');
        redirect('brand_c');
    }

    public function edit(){
        $id_merk = $_POST['id_merk'];
        $merk_barang = $_POST['merk_barang'];
        $sub_merk = $_POST['id_kategori'];

        $data = array(
            'merk_barang' => $merk_barang,
            'sub_merk' => $sub_merk
        );

        $where = array(
            'id_merk' => $id_merk
        );

        $this->Brand_m->update_data($where, $data, 'tb_brand');
        redirect('brand_c');
    }

    public function hapus_data($id_merk){
        $id_merk = $_POST['id_merk'];
        $where = array(
            'id_merk' => $id_merk
        );

        $this->Brand_m->hapus_data($where, 'tb_brand');
        redirect('brand_c');
    }

    public function delete(){
        $id_merk = $_POST['id_merk'];
        $this->Brand_m->delete($id_merk);
        redirect('brand_c');
    }
}
?>
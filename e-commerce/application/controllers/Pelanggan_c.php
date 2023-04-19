<?php
 defined ('BASEPATH') OR exit ('No direct script access allowed');
class Pelanggan_c extends CI_Controller{ 
	function __construct(){
		parent:: __construct();
		$this->load->model('Pelanggan_m');
	}

	public function data_pelanggan(){
        $getUser = $this->session->userdata('session_user');
        if (!isset($getUser) || empty ($getUser)) {
            redirect ('login_c');
            // code...
        } 
        $id_nama_usaha = $this->input->get('id_nama_usaha');

        $config['base_url'] = site_url('pelanggan_c/data_pelanggan');
        //$config['total_rows'] = $this->db->where("tanggal BETWEEN '" . $mulai_tanggal . "'AND'" . $sampai_tanggal . "'")->get('tb_metal_genix')->num_rows();
        $config['total_rows'] = $this->Pelanggan_m->total($id_nama_usaha);
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
        $data['customer'] = $this->Pelanggan_m->tampil_data($id_nama_usaha, $config["per_page"], $data['page']);
        $data['pagination'] = $this->pagination->create_links();

        $this->load->model('Data_usaha_m');
        $data['role_usaha'] = $this->Data_usaha_m->getAll()->result();
        $data['user'] = $this->Pelanggan_m->getAll($id_nama_usaha)->result();
        $data['id_nama_usaha'] = $id_nama_usaha;
        $data['lihat'] = $this->Data_usaha_m->tampil_nama($data['id_nama_usaha'])->row_array();

        $this->load->view('template/header');
        $this->load->view('template/sidebar', $data);
        $this->load->view('pages/pelanggan', $data);
        $this->load->view('template/footer');

    }

    public function tambah_data(){
        $getUser = $this->session->userdata('session_user');
        if (!isset($getUser) || empty ($getUser)) {
            redirect ('login_c');
            // code...
        } 
    	$this->load->model('Data_usaha_m');

    	$id_nama_usaha = $this->input->get('id_nama_usaha');
        $data['role_usaha'] = $this->Data_usaha_m->getAll()->result();
        $data['user'] = $this->Pelanggan_m->getAll($id_nama_usaha)->result();
        $data['id_nama_usaha'] = $id_nama_usaha;
        $data['lihat'] = $this->Data_usaha_m->tampil_nama($data['id_nama_usaha'])->row_array();

        $this->load->view('template/header');
        $this->load->view('template/sidebar', $data);
        $this->load->view('pages/tambah_pelanggan', $data);
        $this->load->view('template/footer');
    }

    public function input(){
        $id_nama_usaha = $this->input->get('id_nama_usaha');
        $id_nama_usaha = $this->input->post('id_nama_usaha');
        $nama_customer = $this->input->post('nama_customer');
        $alamat = $this->input->post('alamat');
        $hp = $this->input->post('hp');

        //$nmfile = "file_".time(); //nama file + fungsi time
        $nmfile = time().'-'.$_FILES["filefoto"]['name'];
        $config['upload_path'] = './assets/upload/foto_pelanggan'; //Folder untuk menyimpan hasil upload
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '0'; //maksimum besar file 3M
        $config['max_width']  = '0'; //lebar maksimum 5000 px
        $config['max_height']  = '0'; //tinggi maksimu 5000 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya

        $this->upload->initialize($config);
        
        if($_FILES['filefoto']['name'])
        {
            if ($this->upload->do_upload('filefoto'))
            {
                $gbr = $this->upload->data();
                $data = array(
                  'foto' =>$gbr['file_name'],
                  'nama_customer' =>$this->input->post('nama_customer'),
                  'alamat' =>$this->input->post('alamat'),
                  'hp' =>$this->input->post('hp'),
                  'id_nama_usaha' =>$this->input->post('id_nama_usaha')
                  
                );

                $this->Pelanggan_m->input_data($data, 'tb_customer'); //akses model untuk menyimpan ke database
                //dibawah ini merupakan code untuk resize
                $config['image_library'] = 'gd2'; 
                $config['source_image'] = $this->upload->upload_path.$this->upload->file_name;
                $config['new_image'] = './assets/upload/foto_pelanggan'; // folder tempat menyimpan hasil resize
                $config['maintain_ratio'] = TRUE;
                $config['width'] = 400; //lebar setelah resize menjadi 100 px
                $config['height'] = 600; //lebar setelah resize menjadi 100 px
                $this->load->library('image_lib',$config); 

                //pesan yang muncul jika resize error dimasukkan pada session flashdata
                if ( !$this->image_lib->resize()){   
              }
                //helper_log("tambah", "Tambah data laporan : $nama_usaha");
                redirect('pelanggan_c/data_pelanggan/'.'?id_nama_usaha='. $id_nama_usaha); //jika berhasil maka akan ditampilkan view upload
            }else{
                redirect('pelanggan_c/tambah_data/'. '?id_nama_usaha='. $id_nama_usaha); //jika gagal maka akan ditampilkan form upload
            }
        }else{
            $data = [
                'nama_customer' =>$nama_customer,
                'alamat' =>$alamat,
                'hp' =>$hp,
                'id_nama_usaha' =>$id_nama_usaha,
            ];
            $input = $this->Pelanggan_m->input_data($data, 'tb_customer');
            if ($input) {
                //helper_log("tambah", "Tambah data laporan : $nama_usaha");
                redirect('pelanggan_c/data_pelanggan/'. '?id_nama_usaha=' . $id_nama_usaha);
            } else {
                //helper_log("tambah", "Tambah data laporan : $nama_usaha");
                redirect('pelanggan_c/data_pelanggan/'. '?id_nama_usaha=' . $id_nama_usaha);
            }
        }
    }

    public function edit($hp){
        $getUser = $this->session->userdata('session_user');
        if (!isset($getUser) || empty ($getUser)) {
            redirect ('login_c');
            // code...
        } 
        $this->load->model('Data_usaha_m');

    	$id_nama_usaha = $this->input->get('id_nama_usaha');
        $data['role_usaha'] = $this->Data_usaha_m->getAll()->result();
        $data['id_nama_usaha'] = $id_nama_usaha;
        $data['lihat'] = $this->Data_usaha_m->tampil_nama($data['id_nama_usaha'])->row_array();
        $where = array('hp' => $hp); 
        $data['user'] = $this->Pelanggan_m->edit_data($where, 'tb_customer')->row_array(); 

        $this->load->view('template/header');
        $this->load->view('template/sidebar', $data);
        $this->load->view('pages/edit_pelanggan', $data);
        $this->load->view('template/footer');
    }


    public function update(){
    	$id_nama_usaha = $this->input->get('id_nama_usaha');
        $id_nama_usaha = $this->input->post('id_nama_usaha');
        $hp = $this->input->post('hp');
        $nama_customer = $this->input->post('nama_customer');
        $alamat = $this->input->post('alamat');
        // tampung data gambar dari id
        $idFile = $this->Pelanggan_m->get_id($hp)->row();
        $data = './assets/upload/foto_pelanggan/'. $idFile->foto;

        if(is_readable($data)){
            $nmfile = time().'-'.$_FILES["filefoto"]['name'];
            $config['upload_path'] = './assets/upload/foto_pelanggan'; //Folder untuk menyimpan hasil upload
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config['max_size'] = '0'; //maksimum besar file 3M
            $config['max_width']  = '0'; //lebar maksimum 5000 px
            $config['max_height']  = '0'; //tinggi maksimu 5000 px
            $config['file_name'] = $nmfile; //nama yang terupload nantinya

            $this->upload->initialize($config);

            if($_FILES['filefoto']['name']){
            if ($this->upload->do_upload('filefoto'))
            {
                $gbr = $this->upload->data();
                $data = array(
                  'foto' =>$gbr['file_name'],
                  'nama_customer' =>$this->input->post('nama_customer'),
                  'alamat' =>$this->input->post('alamat'),
                  'id_nama_usaha' =>$this->input->post('id_nama_usaha')
                  
                );
                unlink('./assets/upload/foto_pelanggan/'.$this->input->post('fotolama',true));

                //$this->stok_m->update_data($kode_barang, $data); //akses model untuk menyimpan ke database
                //dibawah ini merupakan code untuk resize
                $config['image_library'] = 'gd2'; 
                $config['source_image'] = $this->upload->upload_path.$this->upload->file_name;
                $config['new_image'] = './assets/upload/foto_pelanggan'; // folder tempat menyimpan hasil resize
                $config['maintain_ratio'] = TRUE;
                $config['width'] = 400; //lebar setelah resize menjadi 100 px
                $config['height'] = 600; //lebar setelah resize menjadi 100 px
                $this->load->library('image_lib',$config); 


                $update = $this->Pelanggan_m->update_data($hp,$data);
                if ($update) {
                    //$this->session->set_flashdata('pesan','Data berhasil di update');
                    //helper_log("edit", "Edit profil ID : $id_user");
                    redirect('pelanggan_c/data_pelanggan/'.'?id_nama_usaha=' . $id_nama_usaha);
                } else {
                    echo "gagal";
                }        
            }
        }else{

                $data = [
                	'nama_customer' =>$nama_customer,
	                'alamat' =>$alamat,
	                'id_nama_usaha' =>$id_nama_usaha,
                ];

                // update file di database
                $update = $this->Pelanggan_m->update_data($hp,$data);
                if ($update) {
                    //$this->session->set_flashdata('pesan','Data berhasil di update');
                    //helper_log("edit", "Edit profil ID : $id_user");
                    redirect('pelanggan_c/data_pelanggan/'.'?id_nama_usaha=' . $id_nama_usaha);
                } else {
                    echo "gagal";
                }        
            }    
        }else{
            echo "gagal";
        }
    }

    public function hapus_data($hp) {
        $getUser = $this->session->userdata('session_user');
        if (!isset($getUser) || empty ($getUser)) {
            redirect ('login_c');
            // code...
        } 
    	$id_nama_usaha = $this->input->get('id_nama_usaha');
        $id_nama_usaha = $this->input->post('id_nama_usaha');
        $hp = $this->input->post('hp');
        $where = array('hp' => $hp); 
        $idFile = $this->Pelanggan_m->get_id($hp)->row();
        $data = './assets/upload/foto_pelanggan/'. $idFile->foto;
        // hapus file dulu di dalam folder, jika berhasil hapus di databasenya
        if(is_readable($data) && unlink($data)){
        }
        $del = $this->Pelanggan_m->hapus_data($where, 'tb_customer');
         if ($del) {
            //helper_log("hapus", "Hapus data laporan $nama_usaha" );
            redirect('pelanggan_c/data_pelanggan/'. '?id_nama_usaha=' .$id_nama_usaha);
        } else {
            //helper_log("hapus", "Hapus data laporan $nama_usaha" );
            redirect('pelanggan_c/data_pelanggan/'. '?id_nama_usaha=' .$id_nama_usaha);
        } 
    }

    public function delete(){       
        $hp = $_POST['hp'];

         foreach ($hp as $us)
         {
            $idFile = $this->Pelanggan_m->get_id($us)->row();
            //print_r($idFile);
            $data = './assets/upload/foto_pelanggan/'. $idFile->foto;
            if(file_exists($data)){
                if(is_readable($data) && unlink($data)){
                  
                }
            }
            
         }  
         $del = $this->Pelanggan_m->delete($hp);
         if ($del) {
            //helper_log("hapus", "Hapus data laporan $nama_usaha " );
            redirect('pelanggan_c/data_pelanggan/'. '?id_nama_usaha=' . $this->input->get('id_nama_usaha'));
        } else {
            //helper_log("hapus", "Hapus data laporan $nama_usaha" );
            redirect('pelanggan_c/data_pelanggan/'. '?id_nama_usaha=' . $this->input->get('id_nama_usaha'));
        }    
    }

}
?>
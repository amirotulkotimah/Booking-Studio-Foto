<?php
 defined ('BASEPATH') OR exit ('No direct script access allowed');
class Produk_c extends CI_Controller{ 
	function __construct(){
		parent:: __construct();
		$this->load->model('Produk_m');
        $this->load->model('Foto_produk_m');
        $this->load->model('Data_usaha_m');
	}

	public function data_produk(){
        $getUser = $this->session->userdata('session_user');
        if (!isset($getUser) || empty ($getUser)) {
            redirect ('login_c');
            // code...
        } 
        $id_nama_usaha = $this->input->get('id_nama_usaha');

        $config['base_url'] = site_url('produk_c/data_produk');
        //$config['total_rows'] = $this->db->where("tanggal BETWEEN '" . $mulai_tanggal . "'AND'" . $sampai_tanggal . "'")->get('tb_metal_genix')->num_rows();
        $config['total_rows'] = $this->Produk_m->total($id_nama_usaha);
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
        $data['produk'] = $this->Produk_m->tampil_data($id_nama_usaha, $config["per_page"], $data['page']);
        $data['pagination'] = $this->pagination->create_links();

        $this->load->model('Data_usaha_m');
        $data['role_usaha'] = $this->Data_usaha_m->getAll()->result();
        $data['user'] = $this->Produk_m->getAll($id_nama_usaha)->result();
        $data['id_nama_usaha'] = $id_nama_usaha;
        $data['lihat'] = $this->Data_usaha_m->tampil_nama($data['id_nama_usaha'])->row_array();

        $this->load->view('template/header');
        $this->load->view('template/sidebar', $data);
        $this->load->view('pages/produk', $data);
        $this->load->view('template/footer');

    }

    public function tambah_data(){
        $getUser = $this->session->userdata('session_user');
        if (!isset($getUser) || empty ($getUser)) {
            redirect ('login_c');
            // code...
        } 

    	$id_nama_usaha = $this->input->get('id_nama_usaha');
        $data['role_usaha'] = $this->Data_usaha_m->getAll()->result();
        $data['user'] = $this->Produk_m->getAll($id_nama_usaha)->result();
        $data['id_nama_usaha'] = $id_nama_usaha;
        $data['lihat'] = $this->Data_usaha_m->tampil_nama($data['id_nama_usaha'])->row_array();
        $data['brand']=$this->Produk_m->get_kategori();

        $this->load->view('template/header');
        $this->load->view('template/sidebar', $data);
        $this->load->view('pages/tambah_produk', $data);
        $this->load->view('template/footer');
    }

    public function get_brand(){
        $id_kategori = $this->input->post('id_kategori');
        $data = $this->Produk_m->get_merk($id_kategori);
        echo json_encode($data);
    }

    public function input(){
        //$this->load->model('Foto_produk_m');
        //$this->load->library('upload');
        $id_nama_usaha = $this->input->get('id_nama_usaha');
        $id_nama_usaha = $this->input->post('id_nama_usaha');
        $kode_produk = $this->input->post('kode_produk');
        $nama_produk = $this->input->post('nama_produk');
        $brand = $this->input->post('merk_barang');
        $kategori = $this->input->post('id_kategori');
        $harga = $this->input->post('harga');
        $jumlah = $this->input->post('jumlah');
        $deskripsi = $this->input->post('deskripsi');
        $tanggal = $this->input->post('tanggal');
        $harga_tambah = $this->input->post('harga_tambah');
        $jumlah_orang = $this->input->post('jumlah_orang');
        $harga_tambah_cetak = $this->input->post('harga_tambah_cetak');
        $harga_tambah_waktu = $this->input->post('harga_tambah_waktu');

        //$nmfile = "file_".time(); //nama file + fungsi time
        //$nmfile = time().'-'.$_FILES["filefoto"]['name'];
        //$config['upload_path'] = './assets/upload/foto_produk'; //Folder untuk menyimpan hasil upload
        //$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        //$config['max_size'] = '0'; //maksimum besar file 3M
        //$config['max_width']  = '0'; //lebar maksimum 5000 px
        //$config['max_height']  = '0'; //tinggi maksimu 5000 px
        //$config['file_name'] = $nmfile; //nama yang terupload nantinya

        //$this->upload->initialize($config);
        
        //if($_FILES['filefoto']['name'])
        //{
            //if ($this->upload->do_upload('filefoto'))
            //{
                //$gbr = $this->upload->data();
                //$data = array(
                  //'foto' =>$gbr['file_name'],
                  //'kode_produk' =>$this->input->post('kode_produk'),
                  //'nama_produk' =>$this->input->post('nama_produk'),
                  //'brand' =>$this->input->post('merk_barang'),
                  //'kategori' =>$this->input->post('id_kategori'),
                  //'harga' =>$this->input->post('harga'),
                  //'jumlah' =>$this->input->post('jumlah'),
                  //'deskripsi' =>$this->input->post('deskripsi'),
                  //'tanggal' =>$this->input->post('tanggal'),
                  //'id_nama_usaha' =>$this->input->post('id_nama_usaha')
                  
                //);

                //$this->Produk_m->input_data($data, 'tb_produk'); //akses model untuk menyimpan ke database

                //$data = array(
                  //'foto_produk' =>$gbr['file_name'],
                  //'id_nama_usaha' =>$this->input->post('id_nama_usaha')
                  
               //);

                //$this->Foto_produk_m->input_data($data, 'tb_foto_produk');

                //dibawah ini merupakan code untuk resize
                //$config['image_library'] = 'gd2'; 
                //$config['source_image'] = $this->upload->upload_path.$this->upload->file_name;
                //$config['new_image'] = './assets/upload/foto_produk'; // folder tempat menyimpan hasil resize
                //$config['maintain_ratio'] = TRUE;
                //$config['width'] = 400; //lebar setelah resize menjadi 100 px
                //$config['height'] = 600; //lebar setelah resize menjadi 100 px
                //$this->load->library('image_lib',$config); 

                //pesan yang muncul jika resize error dimasukkan pada session flashdata
                //if ( !$this->image_lib->resize()){   
              //}
                ////helper_log("tambah", "Tambah data laporan : $nama_usaha");
                //redirect('produk_c/data_produk/'.'?id_nama_usaha='. $id_nama_usaha); //jika berhasil maka akan ditampilkan view upload
            //}else{
                //redirect('produk_c/tambah_data/'. '?id_nama_usaha='. $id_nama_usaha); //jika gagal maka akan //ditampilkan form upload
            //}
        //}else{
        //$input = $this->Produk_m->input_data($data, 'tb_produk');
            //if ($input) {
                //helper_log("tambah", "Tambah data laporan : $nama_usaha");
                //redirect('produk_c/data_produk/'. '?id_nama_usaha=' . $id_nama_usaha);
            //} else {
                //helper_log("tambah", "Tambah data laporan : $nama_usaha");
                //redirect('produk_c/data_produk/'. '?id_nama_usaha=' . $id_nama_usaha);
            //}
        //}
            $data = array(
                'kode_produk' =>$kode_produk,
                'nama_produk' =>$nama_produk,
                'brand' =>$brand,
                'kategori' =>$kategori,
                'harga' =>$harga,
                'jumlah' =>$jumlah,
                'deskripsi' =>$deskripsi,
                'tanggal' =>$tanggal,
                'harga_tambah_perorang' =>$harga_tambah,
                'harga_tambah_cetak' =>$harga_tambah_cetak,
                'harga_tambah_waktu' =>$harga_tambah_waktu,
                'jumlah_orang' =>$jumlah_orang,
                'id_nama_usaha' =>$id_nama_usaha
            );
            $this->Produk_m->input_data($data, 'tb_produk');
            redirect('produk_c/data_produk/'. '?id_nama_usaha=' . $id_nama_usaha);
    }

    public function detail($id_produk){
        $getUser = $this->session->userdata('session_user');
        if (!isset($getUser) || empty ($getUser)) {
            redirect ('login_c');
            // code...
        } 
    	$id_nama_usaha = $this->input->get('id_nama_usaha');
    	$this->load->model('Data_usaha_m');
        $data['role_usaha'] = $this->Data_usaha_m->getAll()->result();
        $data['user'] = $this->Produk_m->detail_data($id_produk, 'tb_produk')->row_array();
        $data['id_nama_usaha'] = $id_nama_usaha;
        $data['lihat'] = $this->Data_usaha_m->tampil_nama($data['id_nama_usaha'])->row_array();

        $this->load->view('template/header');
        $this->load->view('template/sidebar', $data);
        $this->load->view('pages/detail_produk', $data);
        $this->load->view('template/footer');
    }

    public function edit($id_produk){
        $getUser = $this->session->userdata('session_user');
        if (!isset($getUser) || empty ($getUser)) {
            redirect ('login_c');
            // code...
        } 
        //$this->load->model('Data_usaha_m');

    	$id_nama_usaha = $this->input->get('id_nama_usaha');
        $data['role_usaha'] = $this->Data_usaha_m->getAll()->result();
        $data['id_nama_usaha'] = $id_nama_usaha;
        $data['lihat'] = $this->Data_usaha_m->tampil_nama($data['id_nama_usaha'])->row_array();
        $where = array('id_produk' => $id_produk); 
        $data['user'] = $this->Produk_m->edit_data($where, 'tb_produk')->row_array(); 
        $data['brand']=$this->Produk_m->get_kategori();

        $this->load->view('template/header');
        $this->load->view('template/sidebar', $data);
        $this->load->view('pages/edit_produk', $data);
        $this->load->view('template/footer');
    }

    public function update(){
    	$id_nama_usaha = $this->input->get('id_nama_usaha');
        $id_nama_usaha = $this->input->post('id_nama_usaha');
        $id_produk = $this->input->post('id_produk');
        $kode_produk = $this->input->post('kode_produk');
        $nama_produk = $this->input->post('nama_produk');
        $brand = $this->input->post('merk_barang');
        $kategori = $this->input->post('id_kategori');
        $harga = $this->input->post('harga');
        $jumlah = $this->input->post('jumlah');
        $deskripsi = $this->input->post('deskripsi');
        $harga_tambah = $this->input->post('harga_tambah');
        $jumlah_orang = $this->input->post('jumlah_orang');
        $harga_tambah_cetak = $this->input->post('harga_tambah_cetak');
        $harga_tambah_waktu = $this->input->post('harga_tambah_waktu');
        // tampung data gambar dari id
        //$idFile = $this->Produk_m->get_id($id_produk)->row();
        //$data = './assets/upload/foto_produk/'. $idFile->foto;

        //if(is_readable($data)){
            //$nmfile = time().'-'.$_FILES["filefoto"]['name'];
            //$config['upload_path'] = './assets/upload/foto_produk'; //Folder untuk menyimpan hasil upload
            //$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            //$config['max_size'] = '0'; //maksimum besar file 3M
            //$config['max_width']  = '0'; //lebar maksimum 5000 px
            //$config['max_height']  = '0'; //tinggi maksimu 5000 px
            //$config['file_name'] = $nmfile; //nama yang terupload nantinya

            //$this->upload->initialize($config);

            //if($_FILES['filefoto']['name']){
            //if ($this->upload->do_upload('filefoto'))
            //{
                //$gbr = $this->upload->data();
                $data = array(
                  //'foto' =>$gbr['file_name'],
                  'kode_produk' =>$this->input->post('kode_produk'),
                  'nama_produk' =>$this->input->post('nama_produk'),
                  'brand' =>$this->input->post('merk_barang'),
                  'kategori' =>$this->input->post('id_kategori'),
                  'harga' =>$this->input->post('harga'),
                  'jumlah' =>$this->input->post('jumlah'),
                  'deskripsi' =>$this->input->post('deskripsi'),
                  'harga_tambah_perorang' =>$this->input->post('harga_tambah'),
                  'harga_tambah_cetak' =>$this->input->post('harga_tambah_cetak'),
                  'harga_tambah_waktu' =>$this->input->post('harga_tambah_waktu'),
                  'jumlah_orang' =>$this->input->post('jumlah_orang'),
                  'id_nama_usaha' =>$this->input->post('id_nama_usaha')
                );
                $this->Produk_m->update_data($id_produk,$data);
                redirect('produk_c/data_produk/'.'?id_nama_usaha=' . $id_nama_usaha);
                //unlink('./assets/upload/foto_produk/'.$this->input->post('fotolama',true));

                //$this->stok_m->update_data($kode_barang, $data); //akses model untuk menyimpan ke database
                //dibawah ini merupakan code untuk resize
                //$config['image_library'] = 'gd2'; 
                //$config['source_image'] = $this->upload->upload_path.$this->upload->file_name;
                //$config['new_image'] = './assets/upload/foto_produk'; // folder tempat menyimpan hasil resize
                //$config['maintain_ratio'] = TRUE;
                //$config['width'] = 400; //lebar setelah resize menjadi 100 px
                //$config['height'] = 600; //lebar setelah resize menjadi 100 px
                //$this->load->library('image_lib',$config); 


                //$update = $this->Produk_m->update_data($id_produk,$data);
                //if ($update) {
                    //$this->session->set_flashdata('pesan','Data berhasil di update');
                    //helper_log("edit", "Edit profil ID : $id_user");
                    //redirect('produk_c/data_produk/'.'?id_nama_usaha=' . $id_nama_usaha);
                //} else {
                    //echo "gagal";
                //}        
            //}
        //}else{

                //$data = [
                	//'kode_produk' =>$kode_produk,
	                //'nama_produk' =>$nama_produk,
                    //'brand' =>$brand,
                    //'kategori' =>$kategori,
	                //'harga' =>$harga,
	                //'jumlah' =>$jumlah,
	                //'deskripsi' =>$deskripsi,
	                //'id_nama_usaha' =>$id_nama_usaha,
                //];

                // update file di database
                //$update = $this->Produk_m->update_data($id_produk,$data);
                //if ($update) {
                    //$this->session->set_flashdata('pesan','Data berhasil di update');
                    //helper_log("edit", "Edit profil ID : $id_user");
                    //redirect('produk_c/data_produk/'.'?id_nama_usaha=' . $id_nama_usaha);
                //} else {
                    //echo "gagal";
               // }        
            //}    
        //}else{
            //echo "gagal";
        //}
    }

    public function hapus_data() {
    	$id_nama_usaha = $this->input->get('id_nama_usaha');
        $id_nama_usaha = $this->input->post('id_nama_usaha');
        $id_produk = $this->input->post('id_produk');
        $where = array('id_produk' => $id_produk); 
        $this->Produk_m->hapus_data($where, 'tb_produk');
        redirect('produk_c/data_produk/'. '?id_nama_usaha=' .$id_nama_usaha);
        //$idFile = $this->Produk_m->get_id($id_produk)->row();
        //$data = './assets/upload/foto_produk/'. $idFile->foto;
        // hapus file dulu di dalam folder, jika berhasil hapus di databasenya
        //if(is_readable($data) && unlink($data)){
        //}
        //$del = $this->Produk_m->hapus_data($where, 'tb_produk');
         //if ($del) {
            //helper_log("hapus", "Hapus data laporan $nama_usaha" );
            //redirect('produk_c/data_produk/'. '?id_nama_usaha=' .$id_nama_usaha);
        //} else {
            //helper_log("hapus", "Hapus data laporan $nama_usaha" );
            //redirect('produk_c/data_produk/'. '?id_nama_usaha=' .$id_nama_usaha);
        //} 
    }

    public function delete(){       
        $id_produk = $_POST['id_produk'];

         //foreach ($id_produk as $us)
         //{
            //$idFile = $this->Produk_m->get_id($us)->row();
            //print_r($idFile);
            //$data = './assets/upload/foto_produk/'. $idFile->foto;
            //if(file_exists($data)){
                //if(is_readable($data) && unlink($data)){
                  
                //}
            //}
            
         //}  
         $del = $this->Produk_m->delete($id_produk);
         if ($del) {
            //helper_log("hapus", "Hapus data laporan $nama_usaha " );
            redirect('produk_c/data_produk/'. '?id_nama_usaha=' . $this->input->get('id_nama_usaha'));
        } else {
            //helper_log("hapus", "Hapus data laporan $nama_usaha" );
            redirect('produk_c/data_produk/'. '?id_nama_usaha=' . $this->input->get('id_nama_usaha'));
        }    
    }


    public function input_foto(){
        //$this->load->model('Foto_produk_m');
        //$this->load->library('upload');
        $id_nama_usaha = $this->input->get('id_nama_usaha');
        $id_produk = $this->input->get('id_produk');

        //$nmfile = "file_".time(); //nama file + fungsi time
        $nmfile = time().'-'.$_FILES["filefoto"]['name'];
        $config['upload_path'] = './assets/upload/foto_produk/'; //Folder untuk menyimpan hasil upload
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
                  'foto_produk' =>$gbr['file_name'],
                  'produk_id' =>$id_produk,
                  'id_nama_usaha' =>$id_nama_usaha
                  
                );

                $this->Foto_produk_m->input_data($data, 'tb_foto_produk');

                //dibawah ini merupakan code untuk resize
                $config['image_library'] = 'gd2'; 
                $config['source_image'] = $this->upload->upload_path.$this->upload->file_name;
                $config['new_image'] = './assets/upload/foto_produk/'; // folder tempat menyimpan hasil resize
                $config['maintain_ratio'] = TRUE;
                $config['width'] = 400; //lebar setelah resize menjadi 100 px
                $config['height'] = 600; //lebar setelah resize menjadi 100 px
                $this->load->library('image_lib',$config); 

                //pesan yang muncul jika resize error dimasukkan pada session flashdata
                if ( !$this->image_lib->resize()){   
                }
                    //helper_log("tambah", "Tambah data laporan : $nama_usaha");
                    redirect('produk_c/data_foto/'.'?produk_id='. $id_produk.'&id_nama_usaha='. $id_nama_usaha); //jika berhasil maka akan ditampilkan view upload
                }else{
                    echo "gagal";
                }
            }
        }

    public function data_foto(){
        $getUser = $this->session->userdata('session_user');
        if (!isset($getUser) || empty ($getUser)) {
            redirect ('login_c');
            // code...
        } 
        $id_produk = $this->input->get('produk_id');
        $id_nama_usaha = $this->input->get('id_nama_usaha');

        $config['base_url'] = site_url('produk_c/data_foto');
        //$config['total_rows'] = $this->db->where("tanggal BETWEEN '" . $mulai_tanggal . "'AND'" . $sampai_tanggal . "'")->get('tb_metal_genix')->num_rows();
        $config['total_rows'] = $this->Foto_produk_m->total_foto($id_produk, $id_nama_usaha);
        $config['per_page'] = 5;  //show record per halaman
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
        $data['foto_produk'] = $this->Foto_produk_m->tampil_data($id_produk, $id_nama_usaha, $config["per_page"], $data['page']);
        $data['pagination'] = $this->pagination->create_links();

        $this->load->model('Data_usaha_m');
        $data['role_usaha'] = $this->Data_usaha_m->getAll()->result();
        $data['user'] = $this->Foto_produk_m->getAll($id_produk, $id_nama_usaha)->result();
        $data['id_produk'] = $id_produk;
        $data['id_nama_usaha'] = $id_nama_usaha;
        $data['lihat'] = $this->Data_usaha_m->tampil_nama($data['id_nama_usaha'])->row_array();

        $this->load->view('template/header');
        $this->load->view('template/sidebar', $data);
        $this->load->view('pages/data_foto_produk', $data);
        $this->load->view('template/footer');

    }

    public function hapus_foto() {

        $id_produk = $this->input->post('produk_id');
        $id_nama_usaha = $this->input->post('id_nama_usaha');
        $id = $this->input->post('id');

        $where = array('id' => $id); 
        $idFile = $this->Foto_produk_m->get_id($id)->row();
        $data = './assets/upload/foto_produk/'. $idFile->foto_produk;
        // hapus file dulu di dalam folder, jika berhasil hapus di databasenya
        if(is_readable($data) && unlink($data)){
        }
        $del = $this->Foto_produk_m->hapus_data($where, 'tb_foto_produk');
         if ($del) {
            //helper_log("hapus", "Hapus data laporan $nama_usaha" );
            redirect('produk_c/data_foto/'. '?produk_id=' . $this->input->get('produk_id'). '?&&id_nama_usaha=' . $this->input->get('id_nama_usaha'));
        } else {
            redirect('produk_c/data_foto/'. '?produk_id=' . $this->input->get('produk_id'). '?&&id_nama_usaha=' . $this->input->get('id_nama_usaha'));
        } 
    }

    public function delete_foto(){       
        $id_produk = $this->input->post('produk_id');
        $id_nama_usaha = $this->input->post('id_nama_usaha');
        $id = $this->input->post('id');

        foreach ($id as $us)
        {
            $idFile = $this->Foto_produk_m->get_id($us)->row();
            //print_r($idFile);
            $data = './assets/upload/foto_produk/'. $idFile->foto_produk;
            if(file_exists($data)){
                if(is_readable($data) && unlink($data)){
                  
                }
            }
            
         }  
         $del = $this->Foto_produk_m->delete($id);
         if ($del) {
            //helper_log("hapus", "Hapus data laporan $nama_usaha " );
            redirect('produk_c/data_foto/'. '?produk_id=' . $this->input->get('produk_id'). '?&&id_nama_usaha=' . $this->input->get('id_nama_usaha'));
        } else {
            //helper_log("hapus", "Hapus data laporan $nama_usaha" );
           redirect('produk_c/data_foto/'. '?produk_id=' . $this->input->get('produk_id'). '?&&id_nama_usaha=' . $this->input->get('id_nama_usaha'));
        }    
    }

     public function jadwal_booking(){
        $id_nama_usaha = $this->input->get('id_nama_usaha');
        $data['role_usaha'] = $this->Data_usaha_m->getAll()->result();
        $data['jadwal'] = $this->Produk_m->getJadwal()->result();
        $data['id_nama_usaha'] = $id_nama_usaha;

        $this->load->view('template/header');
        $this->load->view('template/sidebar', $data);
        $this->load->view('pages/jadwal_booking', $data);
        $this->load->view('template/footer');
    }

    public function forward($id)
    {
        $data = [
            'status_booking' => 'Sudah Dibooking'
        ];
        $this->Produk_m->update_jadwal($id, $data);
        redirect('produk_c/jadwal_booking/'. '?id_nama_usaha=' . $this->input->get('id_nama_usaha'));
    }

    public function change($id)
    {
        $data = [
            'status_booking' => 'Free'
        ];
        $this->Produk_m->update_jadwal($id, $data);
        redirect('produk_c/jadwal_booking/'. '?id_nama_usaha=' . $this->input->get('id_nama_usaha'));
    }

    public function filter_tanggal_booking(){
        $getUser = $this->session->userdata('session_user');
        if (!isset($getUser) || empty ($getUser)) {
            redirect ('login_c');
            // code...
        } 
        $id_nama_usaha = $this->input->get('id_nama_usaha');
        $tanggal = $this->input->get('tanggal');

        $data['role_usaha'] = $this->Data_usaha_m->getAll()->result();
        $data['jadwal'] = $this->Produk_m->getFilterBooking($tanggal)->result();
        $data['id_nama_usaha'] = $id_nama_usaha;
        $data['tampil_tanggal'] = $tanggal;

        $this->load->view('template/header');
        $this->load->view('template/sidebar', $data);
        $this->load->view('pages/jadwal_booking', $data);
        $this->load->view('template/footer');
        
    }
}
?>
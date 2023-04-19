<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak_pdf_c extends CI_Controller {

    public function index()
    {
        $config['base_url'] = site_url('cetak_pdf_c');
        $this->load->library('mypdf');
        $this->load->model('Booking_m');
        $kode_order =  $this->input->post('kode_order');
        $gross_amount = $this->input->post('gross_amount');

        $q = $this->db->select('*')
                  ->where('kode_order', $kode_order)
                  ->get('tb_order')
                  ->result();

        $data['created_at'] = new DateTime($q[0]->tanggal_order);
        $data['user'] = $this->Booking_m->getOrder($kode_order)->row_array();
        $data['bayar'] = $this->Booking_m->getBayar($kode_order)->row_array();
        $data['gross_amount'] = $gross_amount;
        $this->mypdf->generate('customer/studio/cetak_pdf', $data);
    }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pdf_c extends CI_Controller {

    public function index()
    {
        $this->load->model('Penjualan_m');
        $config['base_url'] = site_url('pdf_c');
        $this->load->library('mypdf');
        $kode_order =  $this->input->get('kode_order');
        //$gross_amount = $this->input->get('gross_amount');

        $q = $this->db->select('*')
                  ->join('tb_produk', 'tb_produk.id_produk = tb_order.produk', 'LEFT')
                  ->join('tb_transaksi_midtrans', 'tb_transaksi_midtrans.order_id = tb_order.kode_order', 'LEFT')
                  ->join('tb_transaksi_tunai', 'tb_transaksi_tunai.id_bayar = tb_order.kode_order', 'LEFT')
                  ->where('kode_order', $kode_order)
                  ->get('tb_order')
                  ->result();

        $p = $this->db->select('*')
                  ->where('order_id', $kode_order)
                  ->where('payment_method', 0)
                  ->get('tb_transaksi_midtrans')
                  ->result();

        $x = $this->db->select('*')
                  ->where('order_id', $kode_order)
                  ->where('payment_method', 1)
                  ->get('tb_transaksi_midtrans')
                  ->result();

        $data['created_at'] = new DateTime($q[0]->tanggal_order);
        $data['user'] = $this->Penjualan_m->getOrder($kode_order)->row_array();
        $data['bayar'] = $this->Penjualan_m->getBayar($kode_order)->row_array();
        $data['gross_amount'] = $q[0]->gross_amount - 0;
        $data['total_tambah_orang'] = $q[0]->total_harga_orang;
        $data['total_tambah_cetak'] = $q[0]->tambahan_cetak * $q[0]->harga_tambah_cetak;
        $data['total_tambah_waktu'] = $q[0]->tambahan_waktu * $q[0]->harga_tambah_waktu;
        $gross_amount = $q[0]->gross_amount - 0;
        $data['total_harga'] = $q[0]->total_harga;
        $data['tambahan_waktu'] = $q[0]->tambahan_waktu;
        $data['tambahan_orang'] = $q[0]->tambahan_orang;
        $data['total_bayar_tunai'] = $q[0]->total_harga - $gross_amount;
        $total_tambah_perorang = $q[0]->tambahan_orang * $q[0]->harga_tambah_perorang;
        $total_tambah_cetak= $q[0]->tambahan_cetak * $q[0]->harga_tambah_cetak;
        $total_tambah_waktu = $q[0]->tambahan_waktu * $q[0]->harga_tambah_waktu;
        $data['harga_paket'] = $q[0]->total_harga - $total_tambah_perorang - $total_tambah_cetak - $total_tambah_waktu ;
        $data['status'] = $q[0]->status_order;
        $data['kode_order'] = $kode_order;
        $data['type_bayar'] = $q[0]->type_bayar;
        $data['id_bayar'] = $kode_order;
        $data['order_id'] = $kode_order;
        $data['harga1'] = $q[0]->harga_tambah_perorang;
        $data['harga2'] = $q[0]->harga_tambah_perorang * 2;
        $data['harga3'] = $q[0]->harga_tambah_perorang * 3;
        $data['harga4'] = $q[0]->harga_tambah_perorang * 4;
        $data['harga5'] = $q[0]->harga_tambah_perorang * 5;
        $data['harga6'] = $q[0]->harga_tambah_perorang * 6;
        $data['harga7'] = $q[0]->harga_tambah_perorang * 7;
        $data['harga8'] = $q[0]->harga_tambah_perorang * 8;
        $data['harga9'] = $q[0]->harga_tambah_perorang * 9;
        $data['harga10'] = $q[0]->harga_tambah_perorang * 10;

        $this->mypdf->generate('pages/cetak_pdf', $data);
    }
}

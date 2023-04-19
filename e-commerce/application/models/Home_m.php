<?php
/**
 * 
 */
class Home_m extends CI_Model
{
   
    function count_all_order(){
        $this->db->select('sum(total_harga) as total');
        $this->db->from('tb_order');
        $this->db->where('status_order', 'selesai');
        $total = $this->db->get()->result();
        foreach ($total as $row) {
            $total = $row->total;
        }
        $hitung = $total-0;

        return $hitung;
    }

    function orderbaru(){
        $this->db->select('*');
        $this->db->from('tb_order');
        $this->db->order_by('id_orders', 'DESC');
        $this->db->limit(5);
        $this->db->join('tb_produk', 'tb_produk.id_produk = tb_order.produk', 'LEFT');
        $this->db->join('tb_data_usaha', 'tb_data_usaha.id_data_usaha = tb_order.id_usaha', 'LEFT');
        $query = $this->db->get();
        return $query;

    }

    function bayarbaru(){
        $this->db->select('*');
        $this->db->from('tb_transaksi_midtrans');
        $this->db->order_by('transaction_time', 'DESC');
        $this->db->limit(5);
        $this->db->join('tb_data_usaha', 'tb_data_usaha.id_data_usaha = tb_transaksi_midtrans.id_usaha', 'LEFT');
        $query = $this->db->get();
        return $query;
    }

    function data_usaha(){
        $this->db->select('*');
        $this->db->from('tb_data_usaha');
        $query = $this->db->get();
        return $query;
    }
}
?>
<?php
/**
 * 
 */
class Statistik_m extends CI_Model
{
   
    function count_all_order($id_data_usaha){
        $this->db->where('id_usaha',$id_data_usaha);
        $this->db->where('MONTH(tanggal_order)', date('m'));
        return $this->db->get('tb_order')->num_rows(); 
    }

     function count_all_midtrans($id_data_usaha){
        $this->db->where('id_usaha',$id_data_usaha);
        $this->db->where('MONTH(transaction_time)', date('m'));
        return $this->db->get('tb_transaksi_midtrans')->num_rows(); 
    }
     function total_perhari($id_data_usaha){
        $this->db->where('day(tanggal_order)=',date('d'));
        $this->db->where('id_usaha',$id_data_usaha);
        return $this->db->get('tb_order')->num_rows();

    }

    public function total_income($id_data_usaha){
        $this->db->select('sum(total_harga) as total');
        $this->db->from('tb_order');
        $this->db->where('MONTH(tanggal_order)', date('m'));
        $this->db->where('id_usaha',$id_data_usaha);
        $this->db->where('status_order', 'selesai');
        $total = $this->db->get()->result();
        foreach ($total as $row) {
            $total = $row->total;
        }
        $hitung = $total-0;

        return $hitung;
    }
}
?>
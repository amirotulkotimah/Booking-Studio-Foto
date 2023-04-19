<?php
/**
 * 
 */
class Data_bank_m extends CI_Model
{
	
	function getAll(){ 
		$this->db->select('*'); 
		$this->db->from('tb_bank');
		$query = $this->db->get();
		return $query;
	}

	function input_data($data, $table) { 
		$this->db->insert($table,$data);
		//untuk proses tambah data ke database
	}

	function edit_data($where,$table) { 
		return $this->db->get_where($table, $where); 
	}

	function update_data($where,$data,$table) { 
		$this->db->where($where);
		$this->db->update($table, $data); 
	}

	function hapus_data($where, $table) { 
	    $this->db->where($where);
	    $this->db->delete($table); 
	}

	public function delete($id_bank){        
		$this->db->where_in('id_bank', $id_bank);    
		$this->db->delete('tb_bank');  
	}

	function get_bank_list($limit, $start){
        $query = $this->db->get('tb_bank', $limit, $start);
        return $query;
    }

    

}
?>
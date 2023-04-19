<?php
/**
 * 
 */
class Brand_m extends CI_Model
{
	
	function getAll(){ 
		$this->db->select('*'); 
		$this->db->from('tb_brand');
		$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_brand.sub_merk', 'LEFT');
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
		$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_brand.sub_merk', 'LEFT'); 
		$this->db->where($where);
		$this->db->update($table, $data); 
	}

	function hapus_data($where, $table) { 
	    $this->db->where($where);
	    $this->db->delete($table); 
	}

	public function delete($id_merk){        
		$this->db->where_in('id_merk', $id_merk);    
		$this->db->delete('tb_brand');  
	}

	function get_brand_list($limit, $start){
		$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_brand.sub_merk', 'LEFT');
        $query = $this->db->get('tb_brand', $limit, $start);
        return $query;
    }

    

}
?>
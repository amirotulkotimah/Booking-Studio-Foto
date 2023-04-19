<?php
/**
 * 
 */
class Data_pengguna_m extends CI_Model
{
	
	function getAll(){ 
		$this->db->select('*');
		$this->db->from('tb_data_pengguna');
		$this->db->join('tb_master_user', 'tb_master_user.id_master_user = tb_data_pengguna.role', 'LEFT');
		$query = $this->db->get();
		return $query;
	}
	function input_data($data, $table) { 
		$this->db->insert($table,$data);
	}

	public function update_data($id_user,$data)
  	{
    $this->db->where('id_user',$id_user);
    return $this->db->update('tb_data_pengguna',$data);
  	}
    
    function hapus_data($where, $table) { 
	    $this->db->where($where);
	    $this->db->delete($table); 
	}

	public function get_id($id_user)
    {
    	$this->db->where('id_user',$id_user);
    	return $this->db->get('tb_data_pengguna');
    }

    public function delete($id_user){        
		$this->db->where_in('id_user', $id_user);  
		$this->db->delete('tb_data_pengguna');  
	}

	function get_pengguna_list($limit, $start){
		$this->db->join('tb_master_user', 'tb_master_user.id_master_user = tb_data_pengguna.role', 'LEFT');
        $query = $this->db->get('tb_data_pengguna', $limit, $start);
        return $query;
    }

    function login($user, $pass, $table){
		$this->db->select('*');
		$this->db->from('tb_data_pengguna');
		$this->db->where('username', $user);
		$this->db->where('password', $pass);
		$query = $this->db->get();
		return $query;
	}
 
}
?>
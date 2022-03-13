<?php
class Users_model extends CI_Model
{
	public function User_Registration($insert =array()) {
        if (!is_array($insert) || empty($insert)) {
            return array();
        }
        $result = $this->db->insert('users', $insert);
        if ($this->db->affected_rows() > 0) {
            $insert_id = $this->db->insert_id();
            return $insert_id;
        }
         return NULL;
        
    }
	public function users_list(){
		$query = $this->db->get('users');
		if ($query->num_rows() >= 1) {
            return $query->result();
        }
        return null;
	}
	public function user_data($id){
		$this->db->where('id', $id);
		$query = $this->db->get('users');
		if($query->num_rows() > 0)
			{
			return $query->row();
			}
		return null;
		
	}

	public function Update_user_data($update, $id){
		$this->db->where('id', $id);
		$this->db->update('users', $update);
		if ($this->db->affected_rows() > 0) {
            return true;
        }
         return NULL;
	}

	public function Delete_user_data($id){
		$this->db->where('id', $id);
		$this->db->delete('users');
		if ($this->db->affected_rows() > 0) {
	        return true;
	    }
     return NULL;
	}
	public function qualification_list(){
		$query = $this->db->get('qualification');
		if ($query->num_rows() >= 1) {
            return $query->result();
        }
        return null;
	}
	public function getQualification($id){
		$this->db->where('qualification_id', $id);
		$query = $this->db->get('qualification_sub');
		if ($query->num_rows() >= 1) {
            return $query->result();
        }
        return null;
	}

}
?>

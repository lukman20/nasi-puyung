<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class User_model extends CI_Model
{
	protected $table = 'users';
	protected $primary_key = 'user_id';

	function __construct(){}

	public function all_record()
	{
			$this->db->select('user_id, fullname, username, email, password, status, avatar, group_name,users.group_id');
			$this->db->from($this->table);
			$this->db->join('group', 'group.group_id = users.group_id','left');
			$this->db->where('users.group_id !=', 1);

			$query = $this->db->get();
			
			if ($query->num_rows() > 0) {
            	return $query->result();
        	}
	}

	public function cater_record()
	{		//silahkan sesuaikan sendiri
			$group_id_for_cater = 3;
			$this->db->select('user_id, fullname, username, email, password, status, avatar, group_name,users.group_id');
			$this->db->from($this->table);
			$this->db->join('group', 'group.group_id = users.group_id','left');
			$this->db->where('users.group_id',$group_id_for_cater);
			$query = $this->db->get();
			
			if ($query->num_rows() > 0) {
            	return $query->result();
        	}
	}

	public function cater_join_rbm()
	{		$group_id_for_cater = 3;
			$this->db->select('users.user_id, fullname, username, email, password, status, avatar,rbm_id,rbm_name');
			$this->db->from($this->table);
			$this->db->join('rbm', 'rbm.user_id = users.user_id','left');
			$this->db->join('group', 'group.group_id = users.group_id','left');
			$this->db->where('users.group_id',$group_id_for_cater);
			$this->db->where('rbm.user_id !=','');
			$query = $this->db->get();
			
			if ($query->num_rows() > 0) {
            	return $query->result();
        	}
	}

	public function manager_record()
	{		//silahkan sesuaikan sendiri
			$group_id_for_manager = 3;
			$this->db->select('user_id, fullname, username, email, password, status, avatar, group_name,users.group_id');
			$this->db->from($this->table);
			$this->db->join('group', 'group.group_id = users.group_id','left');
			$this->db->where('users.group_id',$group_id_for_manager);
			$query = $this->db->get();
			
			if ($query->num_rows() > 0) {
            	return $query->result();
        	}
	}
	
	public function one_record($id) 
	{
			$this->db->select('user_id, fullname, username, email, password, status, avatar, group_name,users.group_id');
			$this->db->from($this->table);
			$this->db->join('group', 'group.group_id = users.group_id','left');
			$this->db->where($this->primary_key,$id);
			$query = $this->db->get();
			
			if ($query->num_rows() > 0) {
            	return $query->row();
        	}
	}

	public function insert_record($data) 
	{
			$this->db->insert($this->table, $data);
			return;
	}

	public function update_record($data,$id)
	{
		$this->db->where($this->primary_key, $id);
        $this->db->update($this->table, $data);
	}

	public	function delete_record($id) {
        $this->db->where($this->primary_key, $id);
        $this->db->delete($this->table);
        if ($this->db->affected_rows() == 1) {
            return TRUE;
        }
        return FALSE;
    }

    public function cek_user($data) {
			$query = $this->db->get_where($this->table, $data);
			return $query;
		}
}
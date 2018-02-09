<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Tim_model extends CI_Model
{
	protected $table = 'pemohon';
	protected $primary_key = 'id';

	function __construct(){}

	public function all_record()
	{
			$this->db->select('*');
			$this->db->from($this->table);
			$query = $this->db->get();
			
			if ($query->num_rows() > 0) {
            	return $query->result();
        	}
	}

	public function one_record($id) 
	{
			$this->db->select('*');
			$this->db->from($this->table);
	
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

}
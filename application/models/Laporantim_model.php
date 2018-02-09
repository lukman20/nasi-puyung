<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Laporantim_model extends CI_Model
{

	protected $table = 'data_laporan_tim';
	protected $primary_key = 'id_laporan_tim';

	function __construct(){}

	public function all_record()
	{
			$this->db->select('data_laporan_tim.*,data_tim.nama_tim,data_tim.id');
			$this->db->from($this->table);
			$this->db->join('data_tim', 'data_tim.id = data_laporan_tim.id_tim','left');
			$query = $this->db->get();
			
			if ($query->num_rows() > 0) {
            	return $query->result();
        	}
	}

	// public function one_record($id) 
	// {
	// 		$this->db->select('*');
	// 		$this->db->from($this->table);
	
	// 		$this->db->where($this->primary_key,$id);
	// 		$query = $this->db->get();
			
	// 		if ($query->num_rows() > 0) {
 //            	return $query->row();
 //        	}
	// }

	public function insert_record($data) 
	{
			$this->db->insert($this->table, $data);
			return;
	}

	// public function update_record($data,$id)
	// {
	// 	$this->db->where($this->primary_key, $id);
 //        $this->db->update($this->table, $data);
	// }

	// public	function delete_record($id) {
 //        $this->db->where($this->primary_key, $id);
 //        $this->db->delete($this->table);
 //        if ($this->db->affected_rows() == 1) {
 //            return TRUE;
 //        }
 //        return FALSE;
 //    }

}
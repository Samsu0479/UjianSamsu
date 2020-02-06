<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wilayah_model extends CI_Model {
	public $table	= 'wilayah';
	public $id 		= 'idwilayah';
	public $order 	= 'ASC';
	 
	// fungsi untuk mengambil semua yang ada di dalam tabel
	public function get_all()
	{
		$this->db->order_by($this->id, $this->order);
		return $this->db->get($this->table)->result();
	}
	// insert data
	function insert($data)
	{
		$this->db->insert($this->table, $data);
	}
	// delete data
	function delete($id)
	{
		 $this->db->where($this->id, $id);
		 $this->db->delete($this->table);
	}
}

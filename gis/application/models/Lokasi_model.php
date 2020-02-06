<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lokasi_model extends CI_model
{
    public $tabel = 'lokasi';
    public $id = 'idlokasi';
    public $order = 'ASC';

    public function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->tabel)->result();
    }
    public function insert($data)
    {
        $this->db->insert($this->tabel, $data);
    }
	public function delete($idlokasi)
    {
        $this->db->where($this->id, $idlokasi);
        $this->db->delete($this->tabel);
    }

    public function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->tabel, $data);
    }

    public function getById($id)
    {
        return $this->db->get_where($this->tabel, ["idlokasi" => $id])->row();
    }
}

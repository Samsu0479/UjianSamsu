<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lokasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Lokasi_model', 'lokasi');
    }
    public function index()
    {
        $data['lokasi'] = $this->db->query("SELECT a.idkategori, a.nama_kategori, 
        	b.* FROM kategori a, lokasi b WHERE a.idkategori = b.idkategori")->result();
        $this->load->view('lokasi/index', $data);
    }

function add(){
    $data = array(
        'button'	=> 'Tambah',
        'judul'		=> 'Lokasi',
        'action'	=> site_url('lokasi/addsave'),
        'datakategori' => $this->db->query("SELECT * FROM kategori")-> result(),
        'idlokasi'	=> set_value('idlokasi'),
        'nama_lokasi'	=> set_value('nama_lokasi'),
        'idkategori' => set_value('idkategori'),
        'nama_kategori' => set_value('kategori'),
        'latitude'		=> set_value('latitude'),
        'longitude'		=> set_value('longitude'),
        'idalbum'       => set_value('idalbum'),
        'keterangan'	=> set_value('keterangan')
        );
    $this->load->view('lokasi/form' ,$data);
}
function addsave(){
    //$this->_rules();
    //if ($this->form_validation->run() == FALSE) {
        //$this->add();
    //} else {
        $data = array(
        'idlokasi'	=> $this->input->post('idlokasi'),
        'nama_lokasi'	=> $this->input->post('nama_lokasi'),
        'nama_kategori'	=> $this->input->post('kategori'),
        'latitude'	=> $this->input->post('latitude'),
        'longitude'	=> $this->input->post('longitude'),
        'keterangan'	=> $this->input->post('keterangan')
        );

            $this->lokasi->insert($data);
            redirect(site_url('lokasi'));	
    //}
}

public function delete($id)
{
$this->lokasi->delete($id);
redirect("lokasi");
}

public function update($id)
{
	$row = $this->lokasi->getById($id);

	if ($row) {
		$data = array(
		    'button' => 'Ubah',
		    'action' => site_url('lokasi/updatesave'),
		    'datakategori' => $this->db->query("SELECT * FROM kategori") ->result(),
		    'idlokasi' => set_value('idlokasi', $row->idlokasi),
		    'nama_lokasi'	=> set_value('nama_lokasi', $row->idlokasi),
        	'idkategori' => set_value('idkategori', $row->idkategori),
      		'nama_kategori' => set_value('kategori', $row->nama_kategori),
        	'latitude'		=> set_value('latitude', $row->latitude),
        	'longitude'		=> set_value('longitude', $row->longitude),
        	'idalbum'       => set_value('idalbum', $row->idalbum),
        	'keterangan'	=> set_value('keterangan', $row->keterangan)
        	 );
	$this ->load->view('lokasi/form', $data);
	}
}
}
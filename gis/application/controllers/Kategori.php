<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Kategori_model', 'kategori');
	}

	public function index()
	{
		$data['kategori'] = $this->kategori->get_all();
		$this->load->view('Kategori/index',$data);
		// print_r($data)
	}
	function add(){
		$data = array(
			'button'	=> 'Tambah',
			'judul'		=> 'Kategori',
			'action'	=> site_url('kategori/addsave'),
			'idkategori'	=> set_value('idkategori'),
			'nama_kategori'	=> set_value('kategori'),
			'icon'		=> set_value('icon'),
			'keterangan'	=> set_value('keterangan')
			);
		$this->load->view('kategori/form' ,$data);
	}
	function addsave(){
		//$this->_rules();
		//if ($this->form_validation->run() == FALSE) {
			//$this->add();
		//} else {
			$data = array(
			'idkategori'	=> $this->input->post('idkategori'),
			'nama_kategori'	=> $this->input->post('kategori'),
			'icon'	=> $this->_uploadImage(),
			'keterangan'	=> $this->input->post('keterangan')
			);

				$this->kategori->insert($data);
				redirect(site_url('kategori'));	
		//}
	}

	private function _uploadImage(){
		$config['upload_path']		= './assets/upload/';
		$config['allowed_types']		= 'gif|jpg|png';
		$config['overwrite']		= true;
		$config['max_size']		= 1024;
		$this->load->library('upload' , $config);
		if ($this->upload->do_upload('icon')) {
			return $this->upload->data('file_name');
		}
		return "icon.png";
	}
public function delete($id)
{
	$this->kategori->delete($id);
	redirect("kategori");
}
}


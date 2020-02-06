<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wilayah extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Wilayah_model', 'wilayah');
	}

	public function index()
	{
		$data['wilayah'] = $this->wilayah->get_all();
		$this->load->view('Wilayah/index',$data);
		// print_r($data)
	}
	function add(){
		$data = array(
			'button'	=> 'Tambah',
			'judul'		=> 'Wilayah',
			'action'	=> site_url('wilayah/addsave'),
			'idwilayah'	=> set_value('idwilayah'),
			'namawilayah'	=> set_value('namawilayah'),
			'wilayah' => set_value('wilayah'),
			'datawilayah'		=> set_value('js'),
			'keterangan'	=> set_value('keterangan')
			);
		$this->load->view('Wilayah/form' ,$data);
	}
	function addsave(){
		//$this->_rules();
		//if ($this->form_validation->run() == FALSE) {
			//$this->add();
		//} else {
			$data = array(
			'idwilayah'	=> $this->input->post('idwilayah'),
			'Nama Wilayah'	=> $this->input->post('namawilayah'),
			'Wilayah' => $this->input->post('wilayah'),
			'Data Wilayah'	=> $this->is_upload_file(),
			'Keterangan'	=> $this->input->post('keterangan')
			);

				$this->wilayah->insert($data);
				redirect(site_url('wilayah'));	
		//}
	}

	private function is_upload_file(){
		$config['upload_path']		= './assets/upload/';
		$config['allowed_types']		= 'json|js';
		$config['overwrite']		= true;
		$this->load->library('upload' , $config);
		if ($this->upload->do_upload('js')) {
			return $this->upload->data('file_name');
		}
		return "json/kecpraya.js";
	}
public function delete($id)
{
	$this->wilayah->delete($id);
	redirect("wilayah");
}
}


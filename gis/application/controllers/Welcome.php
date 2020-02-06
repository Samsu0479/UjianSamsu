<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	
	public function index()
	{
		$data['map'] = $this->db->query('SELECT a.*, b.idwilayah, b.namawilayah, b.wilayah FROM lokasi a, lokasi b where a.idwilayah= b.idwilayah')->result();
		$this->load->view('welcome_message',$data);
	}
}

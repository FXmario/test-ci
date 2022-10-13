<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['title'] = 'Handling Form';
		$this->load->view('example_form', $data);
	}

	public function process()
	{
		$this->form_validation->set_rules('txtNip','NIP','required|numeric');
		$this->form_validation->set_rules('txtNama','Nama','required');
		if ($this->form_validation->run() === TRUE) {
			$info['success'] = TRUE;
			$info['message'] = 'Berhasil';
		}else{
			$info['success'] = FALSE;
			$info['errors'] = validation_errors();
		}
		$this->output->set_content_type('applicaton/json')->set_output(json_encode($info));
	}
}

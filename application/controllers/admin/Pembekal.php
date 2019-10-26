<?php
defined ('BASEPATH') OR exit('No direct script access allowed');

Class Pembekal extends CI_Controller {

	public function __construct()
	{	
	   parent::__construct();
	   $this->load->model("pembekal_model");
	   $this->load->library('form_validation');
	}

	public function index()
	{
		$pembekals = new Pembekal_model;
		$data['data'] = $pembekals->get_pembekals();
		$this->load->view('admin/pembekal/list', $data);
	}

	public function pembekalid($pembekal_id) 
	{
		$pembekal = $this->db->get_where('pembekal', array('pembekal_id' => $pembekal_id))->row();
		$this->load->view('admin/pembekal/pembekalid',array('pembekal'=>$pembekal));
	}

	public function add()
	{
		$pembekal = $this->pembekal_model;
		$validation = $this->form_validation;
		//$validation->set_rules($pembekal->rules());

		if ($validation->run()) {
			$pembekal->save();
			$this->session->set_flashdata('success', 'Rekod disimpan');
		}

		$this->load->view("admin/pembekal/add");
	}

	public function simpan()
	{
		$pembekals = new Dagang_model;
		$pembekals->insert_pembekal();
		redirect(base_url('pembekal'));
	}

	public function edit($pembekal_id) 
	{
		$pembekal = $this->db->get_where('pembekal', array('pembekal_id' => $pembekal_id))->row();
		$this->load->view('admin/pembekal/edit',array('pembekal'=>$pembekal));
	}


	public function delete($id = null)
	{
		if (!isset($id)) show_404();

		if ($this->pembekal_model->delete($id)) {
			redirect(site_url('admin/pembekal'));
		}
	}
}



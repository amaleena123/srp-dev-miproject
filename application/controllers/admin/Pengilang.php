<?php
defined ('BASEPATH') OR exit('No direct script access allowed');

Class Pengilang extends CI_Controller {

	public function __construct()
	{	
	   parent::__construct();
	   $this->load->model("pengilang_model");
	   $this->load->library('form_validation');
	}

	public function index()
	{
		$pengilangs = new Pengilang_model;
		$data['data'] = $pengilangs->get_pengilangs();
		$this->load->view('admin/pengilang/list', $data);
	}

	public function pengilangid($pengilang_id) 
	{
		$pengilang = $this->db->get_where('pengilang', array('pengilang_id' => $pengilang_id))->row();
		$this->load->view('admin/pengilang/pengilangid',array('pengilang'=>$pengilang));
	}

	public function add()
	{
		$pengilang = $this->pengilang_model;
		$validation = $this->form_validation;
		//$validation->set_rules($pengilang->rules());

		if ($validation->run()) {
			$pengilang->save();
			$this->session->set_flashdata('success', 'Rekod disimpan');
		}

		$this->load->view("admin/pengilang/add");
	}

	public function simpan()
	{
		$pengilangs = new Dagang_model;
		$pengilangs->insert_pengilang();
		redirect(base_url('pengilang'));
	}

	public function edit($pengilang_id) 
	{
		$pengilang = $this->db->get_where('pengilang', array('pengilang_id' => $pengilang_id))->row();
		$this->load->view('admin/pengilang/edit',array('pengilang'=>$pengilang));
	}


	public function delete($id = null)
	{
		if (!isset($id)) show_404();

		if ($this->pengilang_model->delete($id)) {
			redirect(site_url('admin/pengilang'));
		}
	}
}



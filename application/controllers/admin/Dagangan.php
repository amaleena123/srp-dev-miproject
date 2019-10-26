<?php
defined ('BASEPATH') OR exit('No direct script access allowed');

Class Dagangan extends CI_Controller {

	public function __construct()
	{	
	   parent::__construct();
	   $this->load->model("dagangan_model");
	   $this->load->library('form_validation');
	}

	public function index()
	{
		$dagangans = new Dagangan_model;
		$data['data'] = $dagangans->get_dagangans();
		$this->load->view('admin/dagangan/list', $data);
	}

	public function daganganid($dagangan_id) 
	{
		$dagangan = $this->db->get_where('dagangan', array('dagangan_id' => $dagangan_id))->row();
		$this->load->view('admin/dagangan/daganganid',array('dagangan'=>$dagangan));
	}

	public function add()
	{
		$dagangan = $this->dagangan_model;
		$validation = $this->form_validation;
		//$validation->set_rules($dagangan->rules());

		if ($validation->run()) {
			$dagangan->save();
			$this->session->set_flashdata('success', 'Rekod disimpan');
		}

		$this->load->view("admin/dagangan/add");
	}

	public function simpan()
	{
		$dagangans = new Dagang_model;
		$dagangans->insert_dagangan();
		redirect(base_url('dagangan'));
	}

	public function edit($dagangan_id) 
	{
		$dagangan = $this->db->get_where('dagangan', array('dagangan_id' => $dagangan_id))->row();
		$this->load->view('admin/dagangan/edit',array('dagangan'=>$dagangan));
	}


	public function delete($id = null)
	{
		if (!isset($id)) show_404();

		if ($this->dagangan_model->delete($id)) {
			redirect(site_url('admin/dagangan'));
		}
	}
}



<?php
defined ('BASEPATH') OR exit('No direct script access allowed');

Class Perawis extends CI_Controller {

	public function __construct()
	{	
	   parent::__construct();
	   $this->load->model("perawis_model");
	   $this->load->library('form_validation');
	}

	public function index()
	{
		$perawiss = new perawis_model;
		$data['data'] = $perawiss->get_perawis();
		$this->load->view('admin/perawis/list', $data);
	}

	public function perawisid($perawis_id) 
	{
		$perawis = $this->db->get_where('perawis', array('perawis_id' => $perawisaktif_id))->row();
		$this->load->view('admin/perawis/perawisid',array('perawis'=>$perawis));
	}

	public function add()
	{
		$perawis = $this->perawis_model;
		$validation = $this->form_validation;
		//$validation->set_rules($perawis->rules());

		if ($validation->run()) {
			$perawis->save();
			$this->session->set_flashdata('success', 'Rekod disimpan');
		}

		$this->load->view("admin/perawis/add");
	}

	public function simpan()
	{
		$perawiss = new Dagang_model;
		$perawiss->insert_perawis();
		redirect(base_url('perawis'));
	}

	public function edit($perawis_id) 
	{
		$perawis = $this->db->get_where('perawis', array('perawis_id' => $perawis_id))->row();
		$this->load->view('admin/perawis/edit',array('perawis'=>$perawis));
	}


	public function delete($id = null)
	{
		if (!isset($id)) show_404();

		if ($this->perawis_model->delete($id)) {
			redirect(site_url('admin/perawis'));
		}
	}
}



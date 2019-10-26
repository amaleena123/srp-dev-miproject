<?php
defined ('BASEPATH') OR exit('No direct script access allowed');

Class Syarikat extends CI_Controller {

	public function __construct()
	{	
	   parent::__construct();
	   $this->load->model('syarikat_model');
	   $this->load->library('form_validation');
	}

	public function index()
	{
		$syarikats = new Syarikat_model;
		$data['data'] = $syarikats->get_syarikat();
		$this->load->view('admin/syarikat/list', $data);
        }

	public function maklumatsyarikat($syarikat_id) 
	{
		$syarikat = $this->db->get_where('ma_syarikat', array('syarikat_id' => $syarikat_id))->row();
		$this->load->view('admin/syarikat/maklumatsyarikat',array('syarikat'=>$syarikat));
	}

	public function add()
	{
		$syarikat = $this->syarikat_model;
		$validation = $this->form_validation;
		//$validation->set_rules($syarikat->rules());

		if ($validation->run()) {
			$syarikat->save();
			$this->session->set_flashdata('success', 'Rekod disimpan');
		}

		$this->load->view("admin/syarikat/add");
	}

	public function create()
	{	
		$this->load->helper('form');
		$this->load->library('form_validation');

		//$data['title'] = 'Create a news item';

		//$this->form_validation->set_rules('syarikat_mypestid', 'syarikat_mypestid', 'required');
		//$this->form_validation->set_rules('text', 'Text', 'required');
		$this->syarikat_model->store();
		redirect(site_url('admin/syarikat'));
	}

	public function edit($syarikat_id) 
	{
		$syarikat = $this->db->get_where('syarikat', array('syarikat_id' => $syarikat_id))->row();
		$this->load->view('admin/syarikat/edit',array('syarikat'=>$syarikat));
	}


	public function delete($id = null)
	{
		if (!isset($id)) show_404();

		if ($this->syarikat_model->delete($id)) {
			redirect(site_url('admin/syarikat'));
		}
	}
}



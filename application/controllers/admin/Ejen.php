<?php
defined ('BASEPATH') OR exit('No direct script access allowed');

class Ejen extends CI_Controller {

	public function __construct()
	{	
	   parent::__construct();
	   $this->load->model('Ejen_model');
	   $this->load->helper('url');
	   $this->load->library('form_validation');
	}

	public function index()
	{
		$data['ejens']=$this->Ejen_model->get_all_Ejens(); //plural
		$this->load->view('admin/ejen/index', $data);
        }

	public function get_ejen_by_id() {
        
        $id = $this->input->post('ejen_id'); // value id belum dapat lg
        $data = $this->Ejen_model->get_by_id($id); 
          
        $arr = array('success' => false, 'data' => '');
        if($data){
        $arr = array('success' => true, 'data' => $data);
        }
        echo json_encode($arr);
    }

    public function store()
    {
        $data = array(
                // 'title' => $this->input->post('title'),
                // 'product_code' => $this->input->post('product_code'),
                // 'description' => $this->input->post('description'),
                // 'created_at' => date('Y-m-d H:i:s'),
            );
         
        $status = false;
 
        $id = $this->input->post('ejen_id');
 
        if($id){
           $update = $this->Ejen_model->update($data);
           $status = true;
        }else{
           $id = $this->Ejen_model->create($data);
           $status = true;
        }
 
        $data = $this->Ejen_model->get_by_id($id);
 
        echo json_encode(array("status" => $status , 'data' => $data));
    }
 
    public function delete()
    {
        $this->Ejen_model->delete();
        echo json_encode(array("status" => TRUE));
    }
}



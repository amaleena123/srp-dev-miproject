<?php
/*
 * Progtech System - Oro vast for SRP(DOA) 
 * CRUD Ajax by NoorAmalina 
 * QC by Mohd Hilmi Jamaluddin
 * S.Analyst by Richard Yukun
 */

defined ('BASEPATH') OR exit('No direct script access allowed');

class Ejen extends CI_Controller {
    public function __construct() {   
       parent::__construct();
       $this->load->model('Ejen_model');
       $this->load->helper('url');
       $this->load->library('form_validation');
       $this->prefix_fieldname = 'ejen_';
    }

    public function index() {
        $data['ejens']=$this->Ejen_model->get_all_Ejens();
        $this->load->view('admin/ejen/index', $data);
    }

    public function get_ejen_by_id() {
        $id = $this->input->post('id');
        $data = $this->Ejen_model->get_by_id($id); 

        $arr = array ('success' => false, 'data' => '');
        if($data) {
           $arr = array ('success' => true, 'data' => $this->remove_prefix_field($data));
        }
       echo json_encode($arr);
    }

    public function store() {
        $data = array (
        'mypestid'      => $this->input->post('mypestid'),
        'firstnama'     => $this->input->post('firstnama'),
        'lastnama'      => $this->input->post('lastnama'),
        'mykad'         => $this->input->post('mykad'),
        'jantina'       => $this->input->post('jantina'),
        'telefon'       => $this->input->post('telefon'),
        'emel'          => $this->input->post('emel'),
        'emel2'         => $this->input->post('emel2'),
        'alamat1'       => $this->input->post('alamat1'),
        'alamat2'       => $this->input->post('alamat2'),
        'bandar'        => $this->input->post('bandar'),
        'poskod'        => $this->input->post('poskod'),
        'negeri'        => $this->input->post('negeri'),
        'negara'        => $this->input->post('negara'),
        'syarikat'      => $this->input->post('syarikat'),
        'noroc'         => $this->input->post('noroc'),
        'status'         => $this->input->post('status'),
        'tarikhdaftar'  => date('Y-m-d H:i:s'),
    );

    $status = false;

    $id = $this->input->post('ejen_id');
    if ($id) {
       $update = $this->Ejen_model->update($data);
       $status = true;
    } else {
       $id = $this->Ejen_model->create($data);
       $status = true;
    }

    $data = $this->Ejen_model->get_by_id($id);
    $data = $this->remove_prefix_field($data);
    echo json_encode(array ("status" => $status , 'data' => $data));
    }

    public function delete() {
        /* working but for delete record purpose
         * $this->Ejen_model->delete();
         */

        $id = $this->input->post('id');
        $status = $this->input->post('status'); //value at 3 only

        if ($status == 3) {
          $this->Ejen_model->delete();
        }
          echo json_encode(array ("status" => TRUE));

    }

    public function remove_prefix_field($data) {
        $data_form = array ();
        foreach($data as $key => $val) {
            $prefix = 'ejen_';
            $str = $key;
            if (substr($str, 0, strlen($prefix)) == $prefix) {
                $str = substr($str, strlen($prefix));
                } 
            $data_form[$str] = $val;
            }    
        return $data_form;
    }
}

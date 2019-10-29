<?php 
defined('BASEPATH') OR exit('no direct script access allowed');

class Ejen_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->prefix_field = "ejen_";
    }

    public function get_all_ejens() { //where not in status = 3
        $status = 3;

        $this->db->where_not_in('ejen_status', $status);
        $this->db->from('ma_ejen');
        $query=$this->db->get();
        return $query->result();
    }

    public function get_by_id($id) {
        $this->db->from('ma_ejen');
        $this->db->where('ejen_id',$id);
        $query = $this->db->get();
        return $query->row();
    }
    
    public function create($data) {
        $this->db->insert('ma_ejen', $this->add_prefix_fieldname($data));
        return $this->db->insert_id();
    }

    public function update($data) {
        $where = array('ejen_id' => $this->input->post('ejen_id'));
        $this->db->update('ma_ejen', $this->add_prefix_fieldname($data), $where);
        return $this->db->affected_rows();
    }

    public function delete($status) {
        $id = $this->input->post('ejen_id');
        $status = $this->input->post('ejen_status');

        $this->db->where('ejen_id', $id);
        $this->db->update('ma_ejen', $this->add_prefix_fieldname($status));
    }

    public function add_prefix_fieldname($data) {
        $data_db = array();
        foreach($data as $key => $val){
            $data_db[$this->prefix_field.$key] = $val;
        }

        return $data_db;
    }
}

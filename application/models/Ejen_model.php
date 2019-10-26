<?php 
defined('BASEPATH') OR exit('no direct script access allowed');

class Ejen_model extends CI_Model 
{

	public function __construct() {

		parent::__construct();
		$this->load->database();
	}

	public function get_all_ejens() {
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
         
       $this->db->insert('ma_ejen', $data);
       return $this->db->insert_id();
       }
 
    public function update($data) {
        $where = array('ejen_id' => $this->input->post('ejen_id'));
         $this->db->update('ma_ejen', $data, $where);
         return $this->db->affected_rows();
    }
  
    public function delete() {
        $id = $this->input->post('ejen_id');
        $this->db->where('ejen_id', $id);
        $this->db->delete('ma_ejen');
    }
}

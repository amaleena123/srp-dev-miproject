<?php 
defined('BASEPATH') OR exit('no direct script access allowed');

class Syarikat_model extends CI_Model {
	
	public function get_syarikat()	{
		if(!empty($this->input->get("search"))){
			$this->db->like('title', $this->input->get("search"));
			$this->db->or_like('description', $this->input->get("search"));
		}
		$query = $this->db->get("ma_syarikat"); // nama table on Db
		return $query->result();
	}

	public function getById($id)
	{
		return $this->db->get_where($this->table,["syarikat_id" => $id])->row();
	}

	public function save()
	{
		$post = $this->input->post();
		$this->syarikat_id = uniqid();
		$this->syarikat_id = uniqid();
		$this->syarikat_id = uniqid();
		$this->syarikat_id = uniqid();
		$this->db->insert($this->_table, $this);
	}

	public function update()
    	{
        	$post = $this->input->post();
        	$this->syarikat_id = $post["id"];
        	$this->name = $post["name"];
        	$this->price = $post["price"];
        	$this->description = $post["description"];
        	$this->db->update($this->_table, $this, array('syarikat_id' => $post['id']));
    	}

    	public function delete($id)
    	{
        	return $this->db->delete($this->_table, array("syarikat_id" => $id));
    	}
}

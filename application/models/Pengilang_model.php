<?php 
defined('BASEPATH') OR exit('no direct script access allowed');

class Pengilang_model extends CI_Model {
	
	public function get_pengilangs()	{
		if(!empty($this->input->get("search"))){
			$this->db->like('title', $this->input->get("search"));
			$this->db->or_like('description', $this->input->get("search"));
		}
		$query = $this->db->get("ma_pengilang");
		return $query->result();
	}

	public function getById($id)
	{
		return $this->db->get_where($this->table,["pengilang_id" => $id])->row();
	}

	public function save()
	{
		$post = $this->input->post();
		$this->pengilangan_id = uniqid();
		$this->pengilangan_id = uniqid();
		$this->pengilangan_id = uniqid();
		$this->pengilangan_id = uniqid();
		$this->db->insert($this->_table, $this);
	}

	public function update()
    	{
        	$post = $this->input->post();
        	$this->product_id = $post["id"];
        	$this->name = $post["name"];
        	$this->price = $post["price"];
        	$this->description = $post["description"];
        	$this->db->update($this->_table, $this, array('pengilang_id' => $post['id']));
    	}

    	public function delete($id)
    	{
        	return $this->db->delete($this->_table, array("pengilang_id" => $id));
    	}
}

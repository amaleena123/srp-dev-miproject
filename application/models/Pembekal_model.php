<?php 
defined('BASEPATH') OR exit('no direct script access allowed');

class Pembekal_model extends CI_Model {
	
	public function get_pembekals()	{
		if(!empty($this->input->get("search"))){
			$this->db->like('title', $this->input->get("search"));
			$this->db->or_like('description', $this->input->get("search"));
		}
		$query = $this->db->get("ma_pembekal");
		return $query->result();
	}

	public function getById($id)
	{
		return $this->db->get_where($this->table,["pembekal_id" => $id])->row();
	}

	public function save()
	{
		$post = $this->input->post();
		$this->pembekalan_id = uniqid();
		$this->pembekalan_id = uniqid();
		$this->pembekalan_id = uniqid();
		$this->pembekalan_id = uniqid();
		$this->db->insert($this->_table, $this);
	}

	public function update()
    	{
        	$post = $this->input->post();
        	$this->product_id = $post["id"];
        	$this->name = $post["name"];
        	$this->price = $post["price"];
        	$this->description = $post["description"];
        	$this->db->update($this->_table, $this, array('pembekal_id' => $post['id']));
    	}

    	public function delete($id)
    	{
        	return $this->db->delete($this->_table, array("pembekal_id" => $id));
    	}
}

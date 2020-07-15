<?php
class Product_Model extends CI_Model {
  
    public function __construct()
    {
        $this->load->database();
    }
     
    public function products_list()
    {
        $query = $this->db->get('notes');
        return $query->result();
    }
     
    public function get_products_by_id($id)
    {
        $query = $this->db->get_where('notes', array('id' => $id));
        return $query->row();
    }
     
    public function createOrUpdate()
    {
        $this->load->helper('url');
        $id = $this->input->post('id');
 
        $data = array(
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description')
        );
        if (empty($id)) {
            return $this->db->insert('notes', $data);
        } else {
            $this->db->where('id', $id);
            return $this->db->update('notes', $data);
        }
    }
     
    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('notes');
    }
}
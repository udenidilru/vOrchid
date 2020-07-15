<?php
class Product_Model extends CI_Model {
  
    public function __construct()
    {
        $this->load->database();
    }
     
    public function products_list()
    {
        $query = $this->db->get('product');
        return $query->result();
    }
     
    public function get_products_by_id($id)
    {
        $query = $this->db->get_where('product', array('id' => $id));
        return $query->row();
    }
     
    public function createOrUpdate()
    {
        $this->load->helper('url');
        $id = $this->input->post('id');
 
        $data = array(
            'name' => $this->input->post('name'),
            'category' => $this->input->post('category'),
            'description' => $this->input->post('description'),
            'unit_price' => $this->input->post('unit_price'),
        );
        if (empty($id)) {
            return $this->db->insert('product', $data);
        } else {
            $this->db->where('id', $id);
            return $this->db->update('product', $data);
        }
    }
     
    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('product');
    }
}
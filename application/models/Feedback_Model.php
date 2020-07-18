<?php
class Feedback_Model extends CI_Model {
  
    public function __construct()
    {
        $this->load->database();
    }
     
    public function products_list()
    {
        $query = $this->db->get('feedback');
        return $query->result();
    }
     
    public function get_products_by_id($id)
    {
        $query = $this->db->get_where('feedback', array('id' => $id));
        return $query->row();
    }
     
    public function createOrUpdate()
    {
        $this->load->helper('url');
        $id = $this->input->post('id');
 
        $data = array(
            'title' => $this->input->post('title'),
            'message' => $this->input->post('message'),
        );
        if (empty($id)) {
            return $this->db->insert('feedback', $data);
        } else {
            $this->db->where('id', $id);
            return $this->db->update('feedback', $data);
        }
    }
     
    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('feedback');
    }
}
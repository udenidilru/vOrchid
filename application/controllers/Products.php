<?php
class Products extends CI_Controller {
  
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
		$this->load->model('Message_Model');
        $this->load->model('Product_Model');
        $this->load->helper('url_helper');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
    }
  
    public function index()
    {
        $data['notes'] = $this->Product_Model->products_list();
        $data['title'] = 'Products List';
        if($this->session->userdata('id') != null){

            $data['page_title'] = 'Dashboard';
            $data['admins'] = $this->admin_model->getAdminProfiles();

            // Getting the Data From the Session
            $data['currUser'] = array(
                'id' => $this->session->userdata('id'),
                'firstname' => $this->session->userdata('firstname'),
                'lastname' => $this->session->userdata('lastname'),
                'role' => $this->session->userdata('role'),
                'email' => $this->session->userdata('email'),
                'imgurl' =>$this->session->userdata('imgurl')
            );

            // Getting the unread message count
            $data['msgCount'] = $this->Message_Model->getUnreadMessageCount();
            $data['messages'] = $this->Message_Model->getUnreadMessage();
 
        $this -> load -> view('Templates/Dashboard_Header', $data);
        $this->load->view('products/list', $data);
        $this -> load -> view('Templates/Dashboard_Footer');
    }
}
  
    public function create()
    {
        $data['title'] = 'Create Products';
        if($this->session->userdata('id') != null){

            $data['page_title'] = 'Dashboard';
            $data['admins'] = $this->admin_model->getAdminProfiles();

            // Getting the Data From the Session
            $data['currUser'] = array(
                'id' => $this->session->userdata('id'),
                'firstname' => $this->session->userdata('firstname'),
                'lastname' => $this->session->userdata('lastname'),
                'role' => $this->session->userdata('role'),
                'email' => $this->session->userdata('email'),
                'imgurl' =>$this->session->userdata('imgurl')
            );

            // Getting the unread message count
            $data['msgCount'] = $this->Message_Model->getUnreadMessageCount();
            $data['messages'] = $this->Message_Model->getUnreadMessage();
 
        $this -> load -> view('Templates/Dashboard_Header', $data);
        $this->load->view('products/create', $data);
        $this -> load -> view('Templates/Dashboard_Footer');
    }
}
      
    public function edit($id)
    {
        $id = $this->uri->segment(3);
        $data = array();
 
        if (empty($id))
        { 
         show_404();
        }else{
          $data['note'] = $this->Product_Model->get_products_by_id($id);
          if($this->session->userdata('id') != null){

            $data['page_title'] = 'Dashboard';
            $data['admins'] = $this->admin_model->getAdminProfiles();

            // Getting the Data From the Session
            $data['currUser'] = array(
                'id' => $this->session->userdata('id'),
                'firstname' => $this->session->userdata('firstname'),
                'lastname' => $this->session->userdata('lastname'),
                'role' => $this->session->userdata('role'),
                'email' => $this->session->userdata('email'),
                'imgurl' =>$this->session->userdata('imgurl')
            );

            // Getting the unread message count
            $data['msgCount'] = $this->Message_Model->getUnreadMessageCount();
            $data['messages'] = $this->Message_Model->getUnreadMessage();
 
        $this -> load -> view('Templates/Dashboard_Header', $data);
          $this->load->view('products/edit', $data);
          $this -> load -> view('Templates/Dashboard_Footer');
        }
    }
    }
    public function store()
    {
 
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('category', 'Category', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('unit_price', 'Unit_Price', 'required');
 
        $id = $this->input->post('id');
 
        if ($this->form_validation->run() === FALSE)
        {  
            if(empty($id)){
              redirect( base_url('index.php/Products/create') ); 
            }else{
             redirect( base_url('index.php/Products/edit/'.$id) ); 
            }
        }
        else
        {
            $data['note'] = $this->Product_Model->createOrUpdate();
            redirect( base_url('index.php/Products') ); 
        }
         
    }
     
     
    public function delete()
    {
        $id = $this->uri->segment(3);
         
        if (empty($id))
        {
            show_404();
        }
                 
        $notes = $this->Product_Model->delete($id);
         
        redirect( base_url('index.php/Products') );        
    }
}
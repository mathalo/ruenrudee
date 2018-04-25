<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends My_controller {

	public function __construct() {
        parent::__construct();
        $this->load->helper('captcha');
    }
    
    public function index() {
    
        // $this->form_validation->set_rules('username', 'Username', 'trim|required');
       $this->form_validation->set_rules('password', 'Password', 'callback_validate_user');
    
        if ($this->form_validation->run() == FALSE) {
            // $this->load->view('template/head');
            // $this->load->view('template/header');

            $this->load->view('login');

            // $this->load->view('template/footer');
    
        } else {

            redirect('Artifact');
        }
    }
    
    public function validate_user() {

        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        
        $result = $this->login($username, $password);

        
        if ($result) {
            
            $query = $this->db->get_where('member', array('username' => $username, 'password' => $password, 'status' => 'open'));

            $data = $query->result_array();

            if($data[0]['permission']==1){ $permission = 'superadmin'; }else{ $permission = 'admin'; }
            $data_session = array(
                'is_logged' => true,
                'member_id' => $data[0]['member_id'],
                'name' => $data[0]['name'],
                'username' => $data[0]['username'],
                'permission' => $permission
            );  
            
            $this->session->set_userdata('logged_in', $data_session);

    
        } else {
    
            $this->form_validation->set_message('validate_user', 'รหัสผ่านไม่ถูกต้อง!!!!');
            return false;
        }
    }

    public function login($username, $password) {

        $query = $this->db->get_where('member', array('username' => $username, 'password' => $password, 'status' => 'open'));
    
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
	
}

<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends My_controller {

	public function __construct() {
        parent::__construct();
        $this->load->helper('captcha');
    }
    
    public function index() {
    
        $vals = array(
            'word'          => 'Random word',
            'img_path'      => './captcha/',
            'img_url'       => 'http://example.com/captcha/',
            'font_path'     => './path/to/fonts/texb.ttf',
            'img_width'     => '150',
            'img_height'    => 30,
            'expiration'    => 7200,
            'word_length'   => 8,
            'font_size'     => 16,
            'img_id'        => 'Imageid',
            'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
    
            // White background and border, black text and red grid
            'colors'        => array(
                    'background' => array(255, 255, 255),
                    'border' => array(255, 255, 255),
                    'text' => array(0, 0, 0),
                    'grid' => array(255, 40, 40)
            )
        );
        
        $cap = create_captcha($vals);
        echo $cap['image'];
        exit;
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

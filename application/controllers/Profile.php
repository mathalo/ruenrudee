<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends My_controller {

	
	public function __construct()
	{
		parent::__construct();
 
		$this->check_login();

	}

	public function index()
	{
		
		$id = $this->session->logged_in['member_id'] ;

		$this->form_validation->set_rules('name', 'ชื่อสมาชิก', 'required');
		// $this->form_validation->set_rules('username', 'Username', 'required|callback_validate_username');
		$this->form_validation->set_rules('email', 'อีเมล์', 'required|valid_email');


		if ($this->input->server('REQUEST_METHOD') === 'POST')
		{
			if($this->form_validation->run()==true){

				$status = $this->input->post('status');
				
				if($status==NULL or $status==''){ $status="closed";}

				$posts = $this->input->post();

                $posts['filename'] = $this->do_upload();
                
				if($posts['name'] != ''){
					if($posts['filename']!=''){
                        $data = array(
                            'image' => $posts['filename'],
                            'username' => $posts['username'],
                            'name' => $posts['name'],
                            'address' => $posts['address'],
                            'telephone' => $posts['telephone'],
                            'email' => $posts['email'],
                        );

                    }else{
                        $data = array(
                            'username' => $posts['username'],
                            'name' => $posts['name'],
                            'address' => $posts['address'],
                            'telephone' => $posts['telephone'],
                            'email' => $posts['email'],
                            'status' => $status
                        );
                    }
					
					$this->db->where('member_id', $id);
                    $this->db->update('member', $data);
                
                    
                    if($posts['old_filename']!='default.png'){
                        $path = $posts['fullpathimage'];
                        delete_files($path);
					}

					redirect('Profile');
				}
			}
		}

		$query = $this->db->get_where('member', array('member_id' => $id));
		$data['data'] = $query->result_array();

		$this->load->view('template/head');
		$this->load->view('template/header');
		
		$this->menu();

		$this->load->view('profileEdit', $data);

		$this->load->view('template/footer');
	}


	public function validate_username(){
		
		$username = $this->input->post('username');	
		$id = $this->session->logged_in['member_id'] ;
		$query = $this->db->get_where('member', array('username' => $username, 'member_id !=' => $id));
		
		if ($query->num_rows() > 0) {
			$this->form_validation->set_message('validate_username', 'This Username is already exist !!!!');
			return false;
		} else {
			return true;
		}
		
	}
	
	public function do_upload()
	{
		$config['upload_path']          = './uploads/member';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['encrypt_name']			= true;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('filename'))
		{
			$error = array('error' => $this->upload->display_errors());
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			return $data['upload_data']['file_name'];
		}
	}

	public function cpassword($id){	
		
		$this->check_getvalue($id, 'profile');

		$this->form_validation->set_rules('old_password', 'รหัสผ่าน', 'required');
		$this->form_validation->set_rules('password', 'รหัสผ่านใหม่', 'required');
		$this->form_validation->set_rules('confirm_password', 'ยืนยันรหัสผ่าน', 'required|matches[password]');

		if ($this->input->server('REQUEST_METHOD') === 'POST')
		{		
			if($this->form_validation->run()==true){

				$posts = $this->input->post();
				
				$query = $this->db->get_where('member', array('member_id' => $id, 'password' => md5($posts['old_password'])));

				if ($query->num_rows() > 0) {
					if($this->form_validation->run()==true){
						
						$data = array(
							'password' => md5($posts['password'])
						);
											
						$this->db->where('member_id', $id);
						$this->db->update('member', $data);
						redirect('Profile');
						
					}
					return true;
				} 
			}
			
		}

		$query = $this->db->get_where('member', array('member_id' => $id));
		$data['data'] = $query->result_array();

		$this->load->view('template/head');
		$this->load->view('template/header', $data);
		
		$this->menu();

		$this->load->view('memberPass');

		$this->load->view('template/footer');
	}
}

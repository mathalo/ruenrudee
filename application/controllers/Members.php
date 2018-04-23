<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Members extends My_controller {

	public function __construct()
	{
		parent::__construct();
		$this->check_login();
		$this->check_permission();
	}

	public function gallery($id){
		//echo  $this->uri->segment(3); exit;
		$query = $this->db->get_where('member', array('member_id' => $id));
		$data['data'] = $query->result_array();
		$data['id'] = (int)$id;

		// if ($this->input->server('REQUEST_METHOD') === 'POST')
		// {}
		$this->load->view('gallery', $data);
	}

	function folder_exist($folder)
	{
		// Get canonicalized absolute pathname
		$path = realpath($folder);
	
		// If it exist, check if it's a directory
		return ($path !== false AND is_dir($path)) ? $path : false;
	}

	public function server($id =0)
	{
		error_reporting(E_ALL | E_STRICT);
		require( BASEPATH.'../server/php/UploadHandler.php');

		if ( ! $this->folder_exist( BASEPATH .'../uploads/'.$id.'/' ) ) {
			mkdir( BASEPATH .'../uploads/'.$id.'/', 0777 ,true );
		}

		$options = array( 
			'upload_dir' => BASEPATH .'../uploads/'.$id.'/',
			'upload_url' => site_url().'uploads/'.$id.'/',
			'script_url' => site_url().'members/server/'.$id,
			
		);

		$upload_handler = new UploadHandler( $options );
	}

	public function index()
	{
		$query = $this->db->get('member');
		$data['data'] = $query->result_array();

		$this->load->view('template/head.php');
		$this->load->view('template/header.php');
		
		$this->menu();

		$this->load->view('member', $data);

		$this->load->view('template/footer.php');
	}

	public function validate_username(){

		$username = $this->input->post('username');
		
		$query = $this->db->get_where('member', array('username' => $username));
		if ($query->num_rows() > 0) {
			$this->form_validation->set_message('validate_username', 'ชื่อผู้ใช้นี้มีผู้ใช้แล้ว !!!!');
            return false;
        } else {
            return true;
        }

	}

	public function add()
	{
		$this->form_validation->set_rules('name', 'ชื่อสมาชิก', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|callback_validate_username');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('confirm_password', 'ยืนยันรหัสผ่าน', 'required|matches[รหัสผ่าน]');
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
                            'password' => md5($posts['password']),
                            'name' => $posts['name'],
                            'address' => $posts['address'],
                            'telephone' => $posts['telephone'],
                            'email' => $posts['email'],
                            'status' => $status
                        );

                    }else{
                        $data = array(
                            'username' => $posts['username'],
                            'password' => md5($posts['password']),
                            'name' => $posts['name'],
                            'address' => $posts['address'],
                            'telephone' => $posts['telephone'],
                            'email' => $posts['email'],
                            'status' => $status
                        );
                    }
					$this->db->insert('member', $data); 
					redirect('Members');
				}
				unset ($_POST);
				unset($posts['name']);

			}
			
		}
		// var_dump(base_url());
		$this->load->view('template/head');
		$this->load->view('template/header');
		
		$this->menu();

		$this->load->view('memberAdd');

		$this->load->view('template/footer');
	}

	public function edit($id = 0)
	{
		$this->check_getvalue($id, 'members');

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
                            'status' => $status
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
						unlink($posts['fullpathimage']);
					}

					redirect('Members');
				}
			}
		}

		$query = $this->db->get_where('member', array('member_id' => $id));
		$data['data'] = $query->result_array();

		$this->load->view('template/head');
		$this->load->view('template/header');
		
		$this->menu();

		$this->load->view('memberEdit', $data);

		$this->load->view('template/footer');
	}

	public function delete($id = 0)
	{
		$this->check_getvalue($id, 'members');

		$this->db->where('member_id', $id);
		$this->db->delete('member'); 
		redirect('Members');
	}

	public function do_upload()
	{
		$config['upload_path']          = './uploads/member/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['encrypt_name']			= true;
		// $config['max_size']             = 100;
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('filename'))
		{
			$error = array('error' => $this->upload->display_errors());
			// $this->load->view('upload_form', $error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			// $this->load->view('upload_success', $data);
			// var_dump($data['upload_data']['file_name']); 
			return $data['upload_data']['file_name'];
		}
	}

	public function cpassword($id){
		
		$this->check_getvalue($id, 'members');
		
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
							'password' => md5($posts['password']),
						);
											
						$this->db->where('member_id', $id);
						$this->db->update('member', $data);
						redirect('Members');
						
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

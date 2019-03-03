<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

	}

	public function check_login(){
		if($this->session->logged_in['member_id']=='' or $this->session->logged_in['name']=='' or $this->session->logged_in['username']=='' or $this->session->logged_in['permission']==''){
			redirect('Login');
		}
		return true;
	}

	public function check_getvalue($id, $redirect){
		if(!isset($id) or filter_var($id, FILTER_VALIDATE_INT) === false or $id == 0){
			echo "Your variable is not an integer";
			redirect($redirect);
		}
		return true;
	}

	public function check_permission(){
		$segment = explode('/', $_SERVER['REQUEST_URI']); 
		$segment1 = strtolower($segment[1]);

		if($this->session->logged_in['permission']=='admin' ){
			if($segment1 == 'members'){
				redirect('search'); 
			}
		}else if($this->session->logged_in['permission']=='content' ){
			if($segment1 != 'search' || $segment1 != 'artifact'){
				redirect('search'); 
			}
		}
		// else if($this->session->logged_in['permission']=='guess' ){
		// 	if($segment1 != 'search'){
		// 		redirect('search'); 
		// 	}
		// }
		return true;
	}

	public function menu(){

		$query_menu = $this->db->get_where('category', array('parent_id' => 0, 'status' => 'open'));
		$data['menu'] = $query_menu->result_array();

		$query_menu2 = $this->db->get_where('artifact_type', array('parent_id' => 0, 'status' => 'open'));
		$data['menu2'] = $query_menu2->result_array();

		$query_menu3 = $this->db->get_where('location', array('parent_id' => 0, 'status' => 'open'));
		$data['menu3'] = $query_menu3->result_array();

		$this->load->view('template/menu.php', $data);
	}

	

	
}

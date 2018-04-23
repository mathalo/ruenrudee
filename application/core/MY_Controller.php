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
		if(!isset($id) or filter_var($id, FILTER_VALIDATE_INT) === false){
			echo "Your variable is not an integer";
			redirect($redirect);
		}
	}

	public function check_permission(){
		if($this->session->logged_in['permission']!='superadmin'){
			redirect('Categories');
		}
		return true;
	}

	public function menu(){

		$query_menu = $this->db->get_where('category', array('parent_id' => 0));
		$data['menu'] = $query_menu->result_array();

		$query_menu2 = $this->db->get_where('artifact_type', array('parent_id' => 0));
		$data['menu2'] = $query_menu2->result_array();

		$query_menu3 = $this->db->get_where('location', array('parent_id' => 0));
		$data['menu3'] = $query_menu3->result_array();

		$this->load->view('template/menu.php', $data);
	}

	

	
}

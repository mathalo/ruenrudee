<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends MY_Controller {

	public function __construct()
	{
			parent::__construct();
			$this->check_login();
			$this->check_permission();
	}
	
	public function type($id)
	{
		$this->check_getvalue($id, 'categories');

		$this->load->view('template/head.php');
		$this->load->view('template/header.php');

		$this->menu();

		$query = $this->db->get_where('category', array('parent_id' => $id));
		$data['category'] = $query->result_array();

		$this->load->view('category2', $data);

		$this->load->view('template/footer.php');
	}

	public function index()
	{
		$query = $this->db->get_where('category', array('status' => 'open'));
		$data['data'] = $query->result_array();

		$this->load->view('template/head.php');
		$this->load->view('template/header.php');
		
		$this->menu();

		$this->load->view('category', $data);

		$this->load->view('template/footer.php');
	}

	public function add()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('cat_name', 'แบบศิลปะ', 'required');

		if ($this->input->server('REQUEST_METHOD') === 'POST')
		{	

			if($this->form_validation->run()==true){

			
				$posts = $this->input->post();

				if($posts['cat_name'] != ''){
					
					$data = array(
						'cat_name' => $posts['cat_name'],
						'parent_id' => $posts['parent_id'],
					);
					$this->db->insert('category', $data); 
					redirect('Categories');
				}
				unset ($_POST);
				unset($posts['cat_name']);

			}
			
		}
		// var_dump(base_url());
		$query = $this->db->get_where('category', array('parent_id' => 0));
		$data['data'] = $query->result_array();

		$this->load->view('template/head');
		$this->load->view('template/header');
		
		$this->menu();

		$this->load->view('categoryAdd', $data);

		$this->load->view('template/footer');
	}

	public function edit($id)
	{
		$this->check_getvalue($id, 'categories');

		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('cat_name', 'แบบศิลปะ', 'required');

		if ($this->input->server('REQUEST_METHOD') === 'POST')
		{
			if($this->form_validation->run()==true){

				$posts = $this->input->post();

				if($posts['cat_name'] != ''){
					$data = array(
						'cat_name' => $posts['cat_name'],
						'parent_id' => $posts['parent_id'],
					);
					$this->db->where('cat_id', $id);
					$this->db->update('category', $data);
					redirect('Categories');
				}
				unset ($_POST);
				unset($posts['cat_name']);
			}
		}

		$query = $this->db->get_where('category', array('cat_id' => $id));
		$data['data'] = $query->result_array();

		$this->load->view('template/head');
		$this->load->view('template/header');

		$this->menu();

		$query_scate = $this->db->get_where('category', array('parent_id' => 0, 'cat_id !=' => $id));
		$data['data_scate'] = $query_scate->result_array();

		$this->load->view('categoryEdit', $data);

		$this->load->view('template/footer');
	}

	public function delete($id)
	{
		$this->check_getvalue($id, 'categories');
		
		$data = array(
			'status' => 'closed',
		);
		
		$this->db->where('cat_id', $id);
		$this->db->update('category', $data); 
		redirect('Categories');
	}
}

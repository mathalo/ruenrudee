<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Material extends My_controller {

	public function __construct()
	{
			parent::__construct();
			$this->check_login();
	}

	public function index()
	{
		$query = $this->db->get_where('material', array('status' => 'open'));
		$data['data'] = $query->result_array();

		$this->load->view('template/head.php');
		$this->load->view('template/header.php');
		
		$this->menu();

		$this->load->view('material', $data);

		$this->load->view('template/footer.php');
	}

	public function add()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('material_name', 'ชื่อวัสดุ', 'required');

		if ($this->input->server('REQUEST_METHOD') === 'POST')
		{	

			if($this->form_validation->run()==true){

			
				$posts = $this->input->post();

				if($posts['material_name'] != ''){
					$data = array(
						'material_name' => $posts['material_name'],
					);
					$this->db->insert('material', $data); 
					redirect('material');
				}
				unset ($_POST);
				unset($posts['material_name']);

			}
			
		}
		// var_dump(base_url());
		$this->load->view('template/head');
		$this->load->view('template/header');
		
		$this->menu();

		$this->load->view('materialAdd');

		$this->load->view('template/footer');
	}

	public function edit($id)
	{
		$this->form_validation->set_rules('material_name', 'ชื่อวัสดุ', 'required');

		if ($this->input->server('REQUEST_METHOD') === 'POST')
		{
			if($this->form_validation->run()==true){

				$posts = $this->input->post();

				if($posts['material_name'] != ''){
					$data = array(
						'material_name' => $posts['material_name'],
					);
					$this->db->where('material_id', $id);
					$this->db->update('material', $data);
					redirect('material');
				}
				unset ($_POST);
				unset($posts['material_name']);
			}
		}

		$query = $this->db->get_where('material', array('material_id' => $id));
		$data['data'] = $query->result_array();

		$this->load->view('template/head');
		$this->load->view('template/header');
		
		$this->menu();

		$this->load->view('materialEdit', $data);

		$this->load->view('template/footer');
	}

	public function delete($id)
	{
		$data = array(
			'status' => 'closed',
		);
		$this->db->where('material_id', $id);
		$this->db->update('material', $data); 
		redirect('material');
	}
}

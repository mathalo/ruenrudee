<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Building extends My_controller {

	public function __construct() {
        parent::__construct();
        $this->check_login();
        $this->check_permission();
	}
	
	public function type($id)
	{
		$this->check_getvalue($id, 'building');

		$this->load->view('template/head.php');
		$this->load->view('template/header.php');

		$this->menu();

		$query = $this->db->get_where('location', array('parent_id' => $id));
		$data['data'] = $query->result_array();

		$this->load->view('building2', $data);

		$this->load->view('template/footer.php');
	}

	public function index()
	{
		$query = $this->db->get_where('location', array('status' => 'open', 'parent_id' => '0'));
		$data['data'] = $query->result_array();

		$this->load->view('template/head.php');
		$this->load->view('template/header.php');
		
		$this->menu(); 

		$this->load->view('building', $data);

		$this->load->view('template/footer.php');
	}

	public function add()
	{
		$this->form_validation->set_rules('location_name', 'ชื่ออาคาร', 'required');

		if ($this->input->server('REQUEST_METHOD') === 'POST')
		{	

			if($this->form_validation->run()==true){

				$posts = $this->input->post();

				if($posts['location_name'] != ''){
					$data = array(
						'location_name' => $posts['location_name'],
						'parent_id' =>  '0',
					);
					$this->db->insert('location', $data); 
					redirect('building');
				}
				unset ($_POST);
				unset($posts['location_name']);

			}
			
		}
		// var_dump(base_url());
		$this->load->view('template/head');
		$this->load->view('template/header');
		
		$this->menu();

		$query_menu = $this->db->get_where('location', array('parent_id' => 0));
		$data['data'] = $query_menu->result_array();

		$this->load->view('buildingAdd', $data);

		$this->load->view('template/footer');
	}

	public function edit($id)
	{
		$this->check_getvalue($id, 'building');

		$this->form_validation->set_rules('location_name', 'ชื่ออาคาร', 'required');

		if ($this->input->server('REQUEST_METHOD') === 'POST')
		{
			if($this->form_validation->run()==true){

				$posts = $this->input->post();

				if($posts['location_name'] != ''){
					$data = array(
						'location_name' => $posts['location_name'],
						'parent_id' => '0',
					);
					$this->db->where('location_id', $id);
					$this->db->update('location', $data);
					redirect('building');
				}
				unset ($_POST);
				unset($posts['location_name']);
			}
		}

		$query = $this->db->get_where('location', array('location_id' => $id));
		$data['data'] = $query->result_array();

		$query_menu = $this->db->get_where('location', array('parent_id' => 0));
		$data['data_location'] = $query_menu->result_array();

		$this->load->view('template/head');
		$this->load->view('template/header');
		
		$this->menu();

		$this->load->view('buildingEdit', $data);

		$this->load->view('template/footer');
	}

	public function delete($id)
	{
		$this->check_getvalue($id, 'building');
		
		$data = array(
			'status' => 'closed',
		);

		$this->db->where('location_id', $id);
		$this->db->update('location', $data); 
		redirect('building');
	}
}

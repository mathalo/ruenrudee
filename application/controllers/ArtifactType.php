<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ArtifactType extends My_controller {

	public function __construct() {
        parent::__construct();
        $this->check_login();
        
    }

	public function type($id)
	{

		$this->load->view('template/head.php');
		$this->load->view('template/header.php');

		$this->menu();

		$query = $this->db->get_where('artifact_type', array('parent_id' => $id));
		$data['artifact'] = $query->result_array();

		$this->load->view('artifact_type2', $data);

		$this->load->view('template/footer.php');
	}

	public function index()
	{
		$query = $this->db->get_where('artifact_type', array('status' => 'open'));
		$data['data'] = $query->result_array();

		$this->load->view('template/head.php');
		$this->load->view('template/header.php');

		$this->menu();

		$this->load->view('artifact_type', $data);

		$this->load->view('template/footer.php');
	}

	public function add()
	{
		$this->form_validation->set_rules('artifact_type_name', 'หมวดหมู่วัตถุ', 'required');

		if ($this->input->server('REQUEST_METHOD') === 'POST')
		{	

			if($this->form_validation->run()==true){

			
				$posts = $this->input->post();

				if($posts['artifact_type_name'] != ''){
					$data = array(
						'artifact_type_name' => $posts['artifact_type_name'],
						'parent_id' => $posts['parent_id'],
					);
					$this->db->insert('artifact_type', $data); 
					redirect('ArtifactType');
				}
				unset ($_POST);
				unset($posts['artifact_type_name']);

			}
			
		}
		// var_dump(base_url());
		$query = $this->db->get_where('artifact_type', array('parent_id' => 0));
		$data['data'] = $query->result_array();

		$this->load->view('template/head');
		$this->load->view('template/header');
		
		$this->menu();

		$this->load->view('artifact_typeAdd', $data);

		$this->load->view('template/footer');
	}

	public function edit($id)
	{
		$this->form_validation->set_rules('artifact_type_name', 'หมวดหมู่วัตถุ', 'required');

		if ($this->input->server('REQUEST_METHOD') === 'POST')
		{
			if($this->form_validation->run()==true){

				$posts = $this->input->post();

				if($posts['artifact_type_name'] != ''){
					$data = array(
						'artifact_type_name' => $posts['artifact_type_name'],
						'parent_id' => $posts['parent_id'],
					);
					$this->db->where('artifact_type_id', $id);
					$this->db->update('artifact_type', $data);
					redirect('ArtifactType');
				}
				unset ($_POST);
				unset($posts['artifact_type_name']);
			}
		}

		$query = $this->db->get_where('artifact_type', array('artifact_type_id' => $id));
		$data['data'] = $query->result_array();

		$this->load->view('template/head');
		$this->load->view('template/header');
		
		$this->menu();

		$query_scate = $this->db->get_where('artifact_type', array('parent_id' => 0, 'artifact_type_id !=' => $id));
		$data['data_scate'] = $query_scate->result_array();

		$this->load->view('artifact_typeEdit', $data);

		$this->load->view('template/footer');
	}

	public function delete($id)
	{
		$data = array(
			'status' => 'closed',
		);
		$this->db->where('artifact_type_id', $id);
		$this->db->update('artifact_type', $data); 
		redirect('ArtifactType');
	}
}

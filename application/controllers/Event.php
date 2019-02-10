<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends My_controller {

	public function __construct()
	{
			parent::__construct();
			$this->check_login();
	}

	public function index()
	{
		$query = $this->db->get_where('event', array('status' => 'open'));
		$data['data'] = $query->result_array();

		$this->load->view('template/head.php');
		$this->load->view('template/header.php');
		
		$this->menu();

		$this->load->view('event', $data);

		$this->load->view('template/footer.php');
	}

	public function add()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('event_name', 'ชื่อวัสดุ', 'required');

		if ($this->input->server('REQUEST_METHOD') === 'POST')
		{	

			if($this->form_validation->run()==true){

			
				$posts = $this->input->post();

				if($posts['event_name'] != ''){
					$data = array(
						'event_name' => $posts['event_name'],
					);
					$this->db->insert('event', $data); 
					redirect('event');
				}
				unset ($_POST);
				unset($posts['event_name']);

			}
			
		}
		// var_dump(base_url());
		$this->load->view('template/head');
		$this->load->view('template/header');
		
		$this->menu();

		$this->load->view('eventAdd');

		$this->load->view('template/footer');
	}

	public function edit($id)
	{
		$this->check_getvalue($id, 'event');

		$this->form_validation->set_rules('event_name', 'ชื่อวัสดุ', 'required');

		if ($this->input->server('REQUEST_METHOD') === 'POST')
		{
			if($this->form_validation->run()==true){

				$posts = $this->input->post();

				if($posts['event_name'] != ''){
					$data = array(
						'event_name' => $posts['event_name'],
					);
					$this->db->where('event_id', $id);
					$this->db->update('event', $data);
					redirect('event');
				}
				unset ($_POST);
				unset($posts['event_name']);
			}
		}

		$query = $this->db->get_where('event', array('event_id' => $id));
		$data['data'] = $query->result_array();

		$this->load->view('template/head');
		$this->load->view('template/header');
		
		$this->menu();

		$this->load->view('eventEdit', $data);

		$this->load->view('template/footer');
	}

	public function delete($id)
	{
		$this->check_getvalue($id, 'event');
		
		$data = array(
			'status' => 'closed',
		);
		$this->db->where('event_id', $id);
		$this->db->update('event', $data); 
		redirect('event');
	}
}

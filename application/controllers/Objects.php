<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Objects extends My_controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
 
		$this->check_login();
		
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
		$this->load->helper("file");
		$this->load->helper('cookie');

	}

	public function index()
	{
		$query = $this->db->get('artifact');
		$data['data'] = $query->result_array();

		$this->load->view('template/head.php');
		$this->load->view('template/header.php');
		$this->load->view('template/menu.php');

		$this->load->view('objects', $data);

		$this->load->view('template/footer.php');
	}

	public function add()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('artifact_name', 'Artifact name', 'required');

		if ($this->input->server('REQUEST_METHOD') === 'POST')
		{	

			if($this->form_validation->run()==true){

			
				$posts = $this->input->post();

				if($posts['artifact_name'] != ''){
					if($posts['status']==NULL){$posts['status']='closed';}
					$data = array(
						'artifact_name' => $posts['artifact_name'],
						'status' => $posts['status']
					);
					$this->db->insert('artifact', $data); 
					redirect('artifact');
				}
				unset ($_POST);
				unset($posts['artifact_name']);

			}
			
		}
		// var_dump(base_url());
		$this->load->view('template/head');
		$this->load->view('template/header');
		$this->load->view('template/menu');

		$this->load->view('artifactAdd');

		$this->load->view('template/footer');
	}

	public function edit($id)
	{
		$this->check_getvalue($id, 'objects');

		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('cat_name', 'Category name', 'required');

		if ($this->input->server('REQUEST_METHOD') === 'POST')
		{
			if($this->form_validation->run()==true){

				$posts = $this->input->post();

				if($posts['cat_name'] != ''){
					if($posts['status']==NULL){$posts['status']='closed';}
					$data = array(
						'cat_name' => $posts['cat_name'],
						'status' => $posts['status']
					);
					$this->db->where('cat_id', $id);
					$this->db->update('category', $data);
					redirect('category');
				}
				unset ($_POST);
				unset($posts['cat_name']);
			}
		}

		$query = $this->db->get_where('category', array('cat_id' => $id));
		$data['data'] = $query->result_array();

		$this->load->view('template/head');
		$this->load->view('template/header');
		$this->load->view('template/menu');

		$this->load->view('categoryEdit', $data);

		$this->load->view('template/footer');
	}

	public function delete($id)
	{
		$this->check_getvalue($id, 'objects');
		
		$data = array(
			'status' => 'closed'
		);
		
		$this->db->where('cat_id', $id);
		$this->db->update('category', $data); 
		redirect('category');
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artifact extends My_controller {

	public function __construct() {
        parent::__construct();
		$this->check_login();
		$this->load->helper('date');
        
    }

	public function gallery($id){
		//echo  $this->uri->segment(3); exit;
		$this->check_getvalue($id, 'artifact');

		$query = $this->db->get_where('artifact', array('artifact_id' => $id));
		$data['data'] = $query->result_array();
		$data['id'] = (int)$id;

		// if ($this->input->server('REQUEST_METHOD') === 'POST')
		// {}
		$this->load->view('template/head_gallery.php');
		$this->load->view('template/header.php');
	
		$this->menu();
	
		// $this->load->view('artifact', $data);	
		$this->load->view('gallery', $data);

		$this->load->view('template/footer_gallery.php');
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

		if ( ! $this->folder_exist( BASEPATH .'../uploads/artifact/gallery/'.$id.'/' ) ) {
			mkdir( BASEPATH .'../uploads/artifact/gallery/'.$id.'/', 0777 ,true );
		}

		$options = array( 
			'upload_dir' => BASEPATH .'../uploads/artifact/gallery/'.$id.'/',
			'upload_url' => site_url().'uploads/artifact/gallery/'.$id.'/',
			'script_url' => site_url().'artifact/server/'.$id,
			
		);

		$upload_handler = new UploadHandler( $options );
	}

	public function index()
	{
		// $query = $this->db->get_where('artifact', array('status' => 'deleted'));
		$this->db->order_by("artifact_no", "asc");
		$query = $this->db->get_where('artifact', array('status !=' => 'deleted'));
		// $query = $this->db->get('artifact');
		$data['data'] = $query->result_array();

		$this->load->view('template/head.php');
		$this->load->view('template/header.php');

		$this->menu();

		$this->load->view('artifact', $data);

		$this->load->view('template/footer.php');
	}

	public function add()
	{
		$this->form_validation->set_rules('artifact_no', 'เลขลำดับ', 'required');
		$this->form_validation->set_rules('artifact_code', 'เลขวัตถุ', 'required');
		$this->form_validation->set_rules('artifact_name', 'ชื่อวัตถุ', 'required');

		$format = 'DATE_RFC822';
		$time = time()+(3600*7);
		$datecreate = standard_date($format, $time);

			if ($this->input->server('REQUEST_METHOD') === 'POST')
			{
				if($this->form_validation->run()==true){
				
					$status = $this->input->post('status');
					
					if($status==NULL or $status==''){ $status="closed";}
	
					$posts = $this->input->post();
	
					$posts['filename'] = $this->do_upload();

					$num_mat = 0;
					$material='';
					if(!isset($posts['material'])){ 
						$material = ''; 
						$posts['material'] = '';
					}else{
						foreach ($posts['material'] as $materialOption){
							$num_mat++;
							$material .= $materialOption;
							if($num_mat != count($posts['material'])){
								$material .= ",";
							}
						}
					}
					//echo $material."<br>";

					$num_art = 0;
					$art_type='';
					if(!isset($posts['artifact_type'])){ 
						$material = ''; 
						$posts['artifact_type'] = '';
					}else{
						foreach ($posts['artifact_type'] as $artOption){
							$num_art++;
							$art_type .= $artOption;
							if($num_art != count($posts['artifact_type'])){
								$art_type .= ",";
							}
						}
					}
					// echo $art_type;
					// var_dump($posts['material_id']); 

					$num_clean = 0;
					$clean='';
					foreach ($posts['clean'] as $cleanOption){
						$num_clean++;
						$clean .= $cleanOption;
						if($num_clean != count($posts['clean'])){
							$clean .= ",";
						}
					}

					if(!isset($posts['quantity']) || !is_numeric($this->uri->segment(3))){
						$posts['quantity'] = 1;
					}
					// echo $clean;
					// exit;
	
					if($posts['artifact_name'] != ''){
						if($posts['filename']!=''){
							$data = array(
								'image' => $posts['filename'],
								'artifact_no' => $posts['artifact_no'],
								'artifact_code' => $posts['artifact_code'],
								'old_number' => $posts['old_number'],
								'artifact_name' => $posts['artifact_name'],
								'artifact_type' => $art_type,
								'material' => $material,
								'cat_id' => $posts['cat_id'],
								'quantity' => $posts['quantity'],
								'period' => $posts['period'],
								'dimension_a' => $posts['dimension_a'],
								'weight' => $posts['weight'],								
								// 'dimension_b' => $posts['dimension_b'],
								'description' => $posts['description'],
								'designer' => $posts['designer'],
								'history' => $posts['history'],
								'condition_' => $posts['condition'],
								'location_id' => $posts['location_id'],
								'sub_location_id' => $posts['sub_location'],
								'other_location' => $posts['other_location'],
								'atf_box' => $posts['atf_box'],

								'note' => $posts['note'],
								'tag_location' => $posts['tag_location'],
								'revised' => $posts['revised'],
								'conservation' => $posts['conservation'],
								'clean' => $clean,

								'implement' => $posts['implement'],
								'condition_report_by' => $posts['condition_report_by'],
								'entry_by' => $posts['entry_by'],
								'registra_approved' => $posts['registra_approved'],
								'date_created' => $datecreate,
								'status' => $status
							);
	
						}else{
							$data = array(
								'artifact_no' => $posts['artifact_no'],
								'artifact_code' => $posts['artifact_code'],
								'old_number' => $posts['old_number'],
								'artifact_name' => $posts['artifact_name'],
								'artifact_type' => $art_type,
								'material' => $material,
								'cat_id' => $posts['cat_id'],
								'quantity' => $posts['quantity'],
								'period' => $posts['period'],
								'dimension_a' => $posts['dimension_a'],
								'weight' => $posts['weight'],								
								// 'dimension_b' => $posts['dimension_b'],
								'description' => $posts['description'],
								'designer' => $posts['designer'],
								'history' => $posts['history'],
								'condition_' => $posts['condition'],
								'location_id' => $posts['location_id'],
								'sub_location_id' => $posts['sub_location'],
								'other_location' => $posts['other_location'],
								'atf_box' => $posts['atf_box'],
								
								'note' => $posts['note'],
								'tag_location' => $posts['tag_location'],
								'revised' => $posts['revised'],
								'conservation' => $posts['conservation'],
								'clean' => $clean,

								'implement' => $posts['implement'],
								'condition_report_by' => $posts['condition_report_by'],
								'entry_by' => $posts['entry_by'],
								'registra_approved' => $posts['registra_approved'],
								'date_created' => $datecreate,

								'status' => $status
							);
						}
						$this->db->insert('artifact', $data); 
						redirect('Artifact');
					}
					unset ($_POST);
					unset($posts['artifact_name']);
	
				}
			}
		$this->load->view('template/head');
		$this->load->view('template/header');
		
		$this->menu();

		$query = $this->db->get('category');
		$data['data_category'] = $query->result_array();
		
        $query = $this->db->get_where('material', array('status' => 'open'));
		$data['data_material'] = $query->result_array();
		
		$query = $this->db->get_where('location', array('parent_id' => 0, 'status' => 'open'));
        $data['data_location'] = $query->result_array();

		$query = $this->db->get_where('artifact_type', array('status' => 'open'));
        $data['data_artifact_type'] = $query->result_array();
		
		$data['name'] = $this->session->logged_in['name'];
		$this->load->view('artifactAdd', $data);

		$this->load->view('template/footer');
	}

	public function edit($id)
	{
		$this->check_getvalue($id, 'artifact');

		$this->form_validation->set_rules('artifact_no', 'เลขลำดับ', 'required');
		$this->form_validation->set_rules('artifact_code', 'เลขวัตถุ', 'required');
		$this->form_validation->set_rules('artifact_name', 'ชื่อวัตถุ', 'required');

		$format = 'DATE_RFC822';
		$time = time()+(3600*7);
		$datecreate = standard_date($format, $time);

			if ($this->input->server('REQUEST_METHOD') === 'POST')
			{
				if($this->form_validation->run()==true){
				
					$status = $this->input->post('status');
					
					if($status==NULL or $status==''){ $status="closed";}
	
					$posts = $this->input->post();
	
					$posts['filename'] = $this->do_upload();

					$num_mat = 0;
					$material='';
					if(!isset($posts['material'])){ 
						$material = ''; 
						$posts['material'] = '';
					}else{
						foreach ($posts['material'] as $materialOption){
							$num_mat++;
							$material .= $materialOption;
							if($num_mat != count($posts['material'])){
								$material .= ",";
							}
						}
					}
					// echo $material."<br>";

					$num_art = 0;
					$art_type='';
					if(!isset($posts['artifact_type'])){ 
						$material = ''; 
						$posts['artifact_type'] = '';
					}else{
						foreach ($posts['artifact_type'] as $artOption){
							$num_art++;
							$art_type .= $artOption;
							if($num_art != count($posts['artifact_type'])){
								$art_type .= ",";
							}
						}
					}
					// echo $art_type;
					// var_dump($posts['material_id']); 

					$num_clean = 0;
					$clean='';
					foreach ($posts['clean'] as $cleanOption){
						$num_clean++;
						$clean .= $cleanOption;
						if($num_clean != count($posts['clean'])){
							$clean .= ",";
						}
					}

					if(!isset($posts['quantity']) || !is_numeric($this->uri->segment(3))){
						$posts['quantity'] = 1;
					}
					// echo $clean;
					// exit;
					// if($status != 'open'){ $posts['registra_approved'] = $posts['registra_approved'].'_not approve'; }
					if($posts['artifact_name'] != ''){
						if($posts['filename']!=''){
							$data = array(
								'image' => $posts['filename'],
								'artifact_no' => $posts['artifact_no'],
								'artifact_code' => $posts['artifact_code'],
								'old_number' => $posts['old_number'],
								'artifact_name' => $posts['artifact_name'],
								'artifact_type' => $art_type,
								'material' => $material,
								'cat_id' => $posts['cat_id'],
								'quantity' => $posts['quantity'],
								'period' => $posts['period'],
								'dimension_a' => $posts['dimension_a'],
								'weight' => $posts['weight'],
								
								// 'dimension_b' => $posts['dimension_b'],
								'description' => $posts['description'],
								'designer' => $posts['designer'],
								'history' => $posts['history'],
								'condition_' => $posts['condition'],
								'location_id' => $posts['location_id'],
								'sub_location_id' => $posts['sub_location'],
								'other_location' => $posts['other_location'],
								'atf_box' => $posts['atf_box'],
								
								'note' => $posts['note'],
								'tag_location' => $posts['tag_location'],
								'revised' => $posts['revised'],
								'conservation' => $posts['conservation'],
								'clean' => $clean,

								'implement' => $posts['implement'],
								'condition_report_by' => $posts['condition_report_by'],
								// 'entry_by' => $posts['entry_by'],
								'registra_approved' => $posts['registra_approved'],
								'date_updated' => $datecreate,
								'status' => $status
							);
	
						}else{
							$data = array(
								'artifact_no' => $posts['artifact_no'],
								'artifact_code' => $posts['artifact_code'],
								'old_number' => $posts['old_number'],
								'artifact_name' => $posts['artifact_name'],
								'artifact_type' => $art_type,
								'material' => $material,
								'cat_id' => $posts['cat_id'],
								'quantity' => $posts['quantity'],
								'period' => $posts['period'],
								'dimension_a' => $posts['dimension_a'],
								'weight' => $posts['weight'],
								
								// 'dimension_b' => $posts['dimension_b'],
								'description' => $posts['description'],
								'designer' => $posts['designer'],
								'history' => $posts['history'],
								'condition_' => $posts['condition'],
								'location_id' => $posts['location_id'],
								'sub_location_id' => $posts['sub_location'],
								'other_location' => $posts['other_location'],
								'atf_box' => $posts['atf_box'],
								
								'note' => $posts['note'],
								'tag_location' => $posts['tag_location'],
								'revised' => $posts['revised'],
								'conservation' => $posts['conservation'],
								'clean' => $clean,

								'implement' => $posts['implement'],
								'condition_report_by' => $posts['condition_report_by'],
								// 'entry_by' => $posts['entry_by'],
								'registra_approved' => $posts['registra_approved'],
								'date_updated' => $datecreate,

								'status' => $status
							);
						}
						$this->db->where('artifact_id', $id);
						$this->db->update('artifact', $data);

						redirect('Artifact');
					}
					unset ($_POST);
					unset($posts['artifact_name']);
	
				}
			}

		$query = $this->db->get_where('artifact', array('artifact_id' => $id));
		$data['data'] = $query->result_array();

		$this->load->view('template/head');
		$this->load->view('template/header');
		
		$this->menu();

		$query = $this->db->get('category');
		$data['data_category'] = $query->result_array();
		
        $query = $this->db->get_where('material', array('status' => 'open'));
		$data['data_material'] = $query->result_array();
		
		$query = $this->db->get_where('location', array('parent_id' => 0, 'status' => 'open'));
        $data['data_location'] = $query->result_array();
		
		if($data['data'][0]['location_id']==0){
			// echo $data['data'][0]['location_id']; exit;
			$query = $this->db->get_where('location', array('parent_id' => '9999'));
		}else{
			$query = $this->db->get_where('location', array('parent_id' => $data['data'][0]['location_id'], 'status' => 'open'));
		}
		$data['sub_data_location'] = $query->result_array();
		
        $query = $this->db->get_where('artifact_type', array('status' => 'open'));
        $data['data_artifact_type'] = $query->result_array();
		
		$data['name'] = $this->session->logged_in['name'];
		$this->load->view('artifactEdit', $data);

		$this->load->view('template/footer');
	}
	
	public function delete($id)
	{
		$this->check_getvalue($id, 'artifact');
		
		$data = array(
			'status' => 'deleted',
		);
		
		$this->db->where('artifact_id', $id);
		$this->db->update('artifact', $data); 
		redirect('Artifact');

	}

	public function do_upload()
	{
		$config['upload_path']          = './uploads/artifact/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
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

}

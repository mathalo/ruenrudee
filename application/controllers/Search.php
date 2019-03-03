<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends My_controller {

	public function __construct()
	{
			parent::__construct();
			$this->check_login();
			$this->check_permission();
	}

	public function test() 
	{
	
	}

	public function index() 
	{
		$this->load->view('template/head.php');
		$this->load->view('template/header.php');
		
		$this->menu();

		$query = $this->db->get_where('category', array('status' => 'open'));
		$data['data_category'] = $query->result_array();
		
		$query = $this->db->get_where('material', array('status' => 'open'));
		$data['data_material'] = $query->result_array();

		$query = $this->db->get_where('event', array('status' => 'open'));
		$data['data_event'] = $query->result_array();
		
		$query = $this->db->get_where('location', array('parent_id' => 0, 'status' => 'open'));
        $data['data_location'] = $query->result_array();

		$query = $this->db->get_where('artifact_type', array('status' => 'open'));
        $data['data_artifact_type'] = $query->result_array();

		if ($this->input->server('REQUEST_METHOD') === 'POST')
		{
			$posts = $this->input->post();

			$where = ' where 1=1';
			if(isset($posts['keyword']) and $posts['keyword'] != ''){
				if(isset($posts['in_field'])){
					$where .= " and artifact.".$posts['in_field']." like '%".$posts['keyword']."%' ";
				}else{
					$where .= " and artifact.artifact_name like '%".$posts['keyword']."%' ";
				}
			}

			$num_art = 0;
			if(isset($posts['artifact_type'])){ 
				$where .= " and (";
				foreach ($posts['artifact_type'] as $artOption){
					$num_art++;
					// $art_type .= $artOption;
					if($num_art != count($posts['artifact_type'])){
						$where .= "artifact.artifact_type like  '%".$artOption."%' or ";
					}else{
						$where .= "artifact.artifact_type like  '%".$artOption."%' )";
					}
				}
			}
			
			$num_mat = 0;
			if(isset($posts['material'])){ 
				$where .= " and (";
				foreach ($posts['material'] as $materialOption){
					$num_mat++;
					// $material .= $materialOption;
					if($num_mat != count($posts['material'])){
						$where .= "artifact.material like  '%".$materialOption."%' or ";
					}else{
						$where .= "artifact.material like  '%".$materialOption."%' )";
					}
				}
			}

			$num_event = 0;
			if(isset($posts['event'])){ 
				$where .= " and (";
				foreach ($posts['event'] as $eventOption){
					$num_event++;
					// $event .= $eventOption;
					if($num_event != count($posts['event'])){
						$where .= "artifact.event like  '%".$eventOption."%' or ";
					}else{
						$where .= "artifact.event like  '%".$eventOption."%' )";
					}
				}
			}

			if(isset($posts['cat_id']) and $posts['cat_id'] != '0'){
				$where .= " and artifact.cat_id = '".$posts['cat_id']."' ";
			}
			if(isset($posts['location_id']) and $posts['location_id'] != '0'){
				$where .= " and artifact.location_id = '".$posts['location_id']."' ";
			}
			if(isset($posts['sub_location']) and $posts['sub_location'] != '0'){
				$where .= " and artifact.sub_location_id = '".$posts['sub_location']."' ";
			}

			if(isset($posts['opt']) and $posts['opt'] != '0'){
				if(isset($posts['weight']) and $posts['weight'] != '0'){
					$where .= " and artifact.weight ".$posts['opt']." '".$posts['weight']."' ";
				}
			}

			if(!isset($posts['status'])){
				$where .= " and artifact.status='open' ";
			}else{
				$where .= " and artifact.status='".$posts['status']."' ";
			}

			$select_query = "Select * from artifact inner join category on category.cat_id=artifact.cat_id  inner join location on location.location_id=artifact.location_id ".$where." order by artifact.artifact_no asc" ;
			$query = $this->db->query($select_query);
			$data['where'] = $select_query;
			
		}else{
			// $query = $this->db->get('artifact');
			$select_query = "Select * from artifact inner join category on category.cat_id=artifact.cat_id  inner join location on location.location_id=artifact.location_id where artifact.status='open' order by artifact.artifact_no asc";
			
			$query = $this->db->query($select_query);
			$data['where'] = $select_query;
		}
		
		$data['data'] = $query->result_array();


		$query = $this->db->get_where('location', array('parent_id !=' => 0, 'status' => 'open'));
		$data['data_sub_location'] = $query->result_array();
		

		$this->load->view('content', $data);

		$this->load->view('template/footer.php');
	}

	public function createXLS() {
		
		$this->load->library('excel');

		//activate worksheet number 1
		$this->excel->setActiveSheetIndex(0);
		
		//set heading
		$this->excel->getActiveSheet()->setCellValue('A1', '#No');
		// $this->excel->getActiveSheet()->setCellValue('B1', 'ID');
		$this->excel->getActiveSheet()->setCellValue('B1', 'เลขวัตถุ:');
		$this->excel->getActiveSheet()->setCellValue('C1', 'เลขเดิม:');
		$this->excel->getActiveSheet()->setCellValue('D1', 'ชื่อ:');
		$this->excel->getActiveSheet()->setCellValue('E1', 'คำอธิบาย:');
		$this->excel->getActiveSheet()->setCellValue('F1', 'หมวดหมู่วัตถุ:');
		$this->excel->getActiveSheet()->setCellValue('G1', 'วัสดุ:');
		$this->excel->getActiveSheet()->setCellValue('H1', 'แบบศิลปะ:');
		$this->excel->getActiveSheet()->setCellValue('I1', 'จำนวน:');
		$this->excel->getActiveSheet()->setCellValue('J1', 'อาคาร:');
		$this->excel->getActiveSheet()->setCellValue('K1', 'ห้อง:');
		$this->excel->getActiveSheet()->setCellValue('L1', 'ฝีมือช่าง/designer:');

		$row_start = 2;

		
		// $query = $this->db->get('artifact');
		$posts = $this->input->post();
		// echo $posts['exportsql']; 
		$select_query = $posts['exportsql']; 
		$query = $this->db->query($select_query);
		
		if($query->num_rows() > 0){
			
			foreach ($query->result_array() as $row) {

				$this->excel->getActiveSheet()->setCellValue('A'.$row_start, $row_start-1);
				$this->excel->getActiveSheet()->getStyle('A'.$row_start)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

				// $this->excel->getActiveSheet()->setCellValue('B'.$row_start, $row['tag_id']);
				// $this->excel->getActiveSheet()->getStyle('B'.$row_start)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		
				$this->excel->getActiveSheet()->setCellValue('B'.$row_start, $row['artifact_code']);
				$this->excel->getActiveSheet()->setCellValue('C'.$row_start, $row['old_number']);
				$this->excel->getActiveSheet()->setCellValue('D'.$row_start, $row['artifact_name']);
				$this->excel->getActiveSheet()->setCellValue('E'.$row_start, $row['description']);
				$this->excel->getActiveSheet()->setCellValue('F'.$row_start, $row['artifact_type']);
				$this->excel->getActiveSheet()->setCellValue('G'.$row_start, $row['material']);
				$this->excel->getActiveSheet()->setCellValue('H'.$row_start, $row['cat_name']);
				$this->excel->getActiveSheet()->setCellValue('I'.$row_start, $row['quantity']);
				
				$this->excel->getActiveSheet()->setCellValue('J'.$row_start, $row['location_name']);

				$query = $this->db->get_where('location', array('parent_id !=' => 0));
				$data_sub_location = $query->result_array();

				$room='';
				foreach ($data_sub_location as $row_sub_location){
					if($row_sub_location['location_id'] == $row['sub_location_id']){
						$room = $row_sub_location['location_name'];
					}
				}


				$this->excel->getActiveSheet()->setCellValue('K'.$row_start, $room);
				$this->excel->getActiveSheet()->setCellValue('L'.$row_start, $row['designer']);
				$row_start++;
			}
		}
		
		//name the worksheet
		$this->excel->getActiveSheet()->setTitle('S! Tag Report');
		//Export	

		$filename= 'ObjectReport-'.date('dmYHis').'.xlsx';
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0');
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');
		$objWriter->save('php://output');
		exit;    
    }


	public function detail($id)
	{

		$this->load->view('template/head.php');
		$this->load->view('template/header.php');
		
		$this->menu();

		$data['data_id'] = $id;

		$query = $this->db->get_where('artifact', array('artifact_id' => $id));
		$data['data'] = $query->result_array();

		$query = $this->db->get('category');
		$data['data_category'] = $query->result_array();
		
        $query = $this->db->get('material');
		$data['data_material'] = $query->result_array();
		
		$query = $this->db->get('location');
        $data['data_location'] = $query->result_array();
		
		// if($data['data'][0]['location_id']==0){
		// 	// echo $data['data'][0]['location_id']; exit;
		// 	$query = $this->db->get_where('location', array('parent_id' => '9999'));
		// }else{
		// 	$query = $this->db->get_where('location', array('parent_id' => $data['data'][0]['location_id']));
		// }
		// $data['sub_data_location'] = $query->result_array();
		
        $query = $this->db->get('artifact_type');
        $data['data_artifact_type'] = $query->result_array();
		
		$data['name'] = $this->session->logged_in['name'];
		$this->load->view('detail', $data);

		$this->load->view('template/footer');

	}

	public function card($id)
	{

		$data['data_id'] = $id;

		$query = $this->db->get_where('artifact', array('artifact_id' => $id));
		$data['data'] = $query->result_array();

		$this->load->view('template/head');
		$this->load->view('template/header');
		
		$this->menu();

		$query = $this->db->get('category');
		$data['data_category'] = $query->result_array();
		
        $query = $this->db->get('material');
		$data['data_material'] = $query->result_array();
		
		$query = $this->db->get('location');
        $data['data_location'] = $query->result_array();
		
		// if($data['data'][0]['location_id']==0){
		// 	// echo $data['data'][0]['location_id']; exit;
		// 	$query = $this->db->get_where('location', array('parent_id' => '9999'));
		// }else{
		// 	$query = $this->db->get_where('location', array('parent_id' => $data['data'][0]['location_id']));
		// }
		// $data['sub_data_location'] = $query->result_array();
		
        $query = $this->db->get('artifact_type');
        $data['data_artifact_type'] = $query->result_array();
		
		$data['name'] = $this->session->logged_in['name'];
		$this->load->view('card2', $data);

		$this->load->view('template/footer');
	}

	public function getsublocation($id){
		$tmp    = '';
		if($id==0){ $id='9999';}
		$query_sub_location = $this->db->get_where('location', array('parent_id' => $id));
		$data = $query_sub_location->result_array();
		 
		if(!empty($data)){
			$tmp .= "<option value='0'>เลือกห้อง</option>"; 
			foreach($data as $row) {   
				$tmp .= "<option value='".$row['location_id']."'>".$row['location_name']."</option>";
			}
		} else {
			$tmp .= "<option value='0'>- ไม่มีข้อมูล -</option>"; 
		}
		

		header('Content-Type: application/json; charset=utf-8');
        $formattedData = json_encode($tmp,  JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        echo $formattedData;
        exit;
	}

	
	
}

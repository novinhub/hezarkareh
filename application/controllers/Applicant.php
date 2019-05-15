<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Applicant extends CI_Controller{

function __construct(){
     parent::__construct();
		 $this->load->library('Convertdate');
		 $this->load->library('form_validation');
}

	function index(){
    if(!$this->session->has_userdata('a_login') or $this->session->userdata('a_login') != TRUE or $this->session->has_userdata('e_login')){
      show_404();
	}
	$header['title'] = ' داشبورد | هزارکاره ';
	$header['active'] = 'dashbord';
    $this->load->view('header' , $header);
    $this->load->view('applicant/header');
	$this->load->view('applicant/dashbord');
	$this->load->view('applicant/footer');
	$this->load->view('footer');
	}

		function add_resume(){
			if(!$this->session->has_userdata('a_login') or $this->session->userdata('a_login') != TRUE or $this->session->has_userdata('e_login')){
					show_404();
			}
			if($this->session->userdata('add_resume') != 1){
				$message['msg'][0] = ' هر کارجو می تواند یک رزومه داشته باشد . در این بخش می توانید رزومه خود را ویرایش کنید ';
				$message['msg'][1] = 'info2';
				$this->session->set_flashdata($message);
				redirect('applicant/edit_resume');
			}
			if(isset($_POST['sub'])){
				$this->form_validation->set_rules('fullname','fullname','required|max_length[100]');
				$this->form_validation->set_rules('place'   ,'place'   ,'required|numeric');
				$this->form_validation->set_rules('field'   ,'field'   ,'required|numeric');
				$this->form_validation->set_rules('sex'     ,'sex'     ,'required|numeric');
				$this->form_validation->set_rules('marital' ,'marital' ,'required|numeric');
				$this->form_validation->set_rules('status'  ,'status'  ,'required|numeric');
				$this->form_validation->set_rules('soldier' ,'soldier' ,'required|numeric');
				
				if($this->form_validation->run() == FALSE){
					$message['msg'][0] = "لطفا اطلاعات خواسته شده را وارد کنید";
					$message['msg'][1] = 'danger2';
					$this->session->set_flashdata($message);
					redirect('applicant/add_resume');
				}else{
					$date = $this->convertdate->convert(time());
					$resume['fullname'] = $this->input->post('fullname');
					$resume['place_id'] = $this->input->post('place');
					$resume['field_id'] = $this->input->post('field');
					$resume['sex_id'] = $this->input->post('sex');
					$resume['marital_id'] = $this->input->post('marital');
					$resume['status_id'] = $this->input->post('status');
					$resume['soldier_id'] = $this->input->post('soldier');
					$resume['email'] = $this->input->post('email');
					$resume['date_birth'] = $this->input->post('date_birth');
					$resume['about'] = $this->input->post('about');
					$resume['applicant_id'] = $this->session->userdata('a_id');
					$resume['date_create'] = $date['d'];
					$resume['time_create'] = $date['t'];
					$resume['date_modified'] = 'ثبت نشده است';
					$applicant['add_resume'] = 0;
					$applicant['edit_resume'] = 1;
					$state = TRUE;
					if($_FILES['pic_name']['name'] != ''){
					 $config = array(
						 'upload_path' => "./upload/applicant/avatar/",
						 'allowed_types' => "gif|jpg|png|jpeg",
						 'max_size' => "2000"
					 );
					 $this->load->library('upload', $config);
					 if ($this->upload->do_upload('pic_name')) {
						 $applicant['pic_name'] = $_FILES['pic_name']['name'];
						 $sess['pic_seeker'] = $applicant['pic_name'];
						 $state = TRUE;
					 } else {
						 $state = FALSE;
					 }
					}
					$this->db->trans_begin();
					$res = $this->base_model->insert('resume' , $resume);
					$size = count($_POST['study_still']);
					for($i = 0 ; $i < $size ; $i++){
						$study[] = array(
							'major'=> htmlspecialchars($_POST['major'][$i]),
							'proof_id'=> htmlspecialchars($_POST['proof'][$i]),
							'institute'=> htmlspecialchars($_POST['institute'][$i]),
							'start'=>htmlspecialchars($_POST['study_start'][$i]),
							'end'=>htmlspecialchars($_POST['study_end'][$i]),
							'still'=>htmlspecialchars($_POST['study_still'][$i]),
							'explain'=>htmlspecialchars($_POST['study_explain'][$i]),
							'resume_id'=>$res
						);
					}
					$size2 = count($_POST['job_still']);
					for($j = 0 ; $j < $size2 ; $j++){
						$job[] = array(
							'company'=> htmlspecialchars($_POST['company'][$j]),
							'position'=> htmlspecialchars($_POST['position'][$j]),
							'start'=>htmlspecialchars($_POST['job_start'][$j]),
							'end'=> htmlspecialchars($_POST['job_end'][$j]),
							'still'=>htmlspecialchars($_POST['job_still'][$j]),
							'explain'=>htmlspecialchars($_POST['job_explain'][$j]),
							'resume_id'=>$res
						);
					}
					$size3 = count($_POST['percent']);
					for($z = 0 ; $z < $size3 ; $z++){
						$skill[] = array(
							'name'=>htmlspecialchars($_POST['skill'][$z]),
							'percent'=>htmlspecialchars($_POST['percent'][$z]),
							'resume_id'=>$res
						);
					}
				 $res = $this->base_model->update('applicant' , $applicant , array('id'=>$this->session->userdata('a_id')));
				 if(isset($study) and !empty($study)){
					$res = $this->base_model->insert_batch('his_study' ,$study);
				 }
				 if(isset($job) and !empty($job)){
					$res = $this->base_model->insert_batch('his_job' , $job);
				 }
				 if(isset($skill) and !empty($skill)){
				  $res = $this->base_model->insert_batch('skill' , $skill);
				 }
				 if($this->db->trans_status() === FALSE or $res == FALSE){
				 $this->db->trans_rollback();
				 $message['msg'][0] = ' متاسفانه مشکلی در ثبت اطلاعات رخ داده است  ';
				 $message['msg'][1] = 'danger2';
				 $this->session->set_flashdata($message);
				 redirect('applicant/add_resume');
				}else{
					$sess['add_resume'] = 0;
					$sess['edit_resume'] = 1;
					$this->session->set_userdata($sess);
					$this->db->trans_commit();
				}
				if($state){
					$message['msg'][0] = 'روزمه شما با موفقیت ثبت شد';
					$message['msg'][1] = 'success2';
					$this->session->set_flashdata($message);
					redirect('applicant/resume');
				}else{
					$message['msg'][0] = 'رزومه شما با موفقیت ثبت شده است . لطفا در ارسال آواتار به نکات گفته شده دقت کنید';
					$message['msg'][1] = 'info2';
					$this->session->set_flashdata($message);
					redirect('applicant/edit_resume');
				}
				 
					echo "<pre>";
					var_dump($_POST);
					var_dump($resume);
					var_dump($study);
					var_dump($job);
					var_dump($skill);
					echo "</pre>";


				}
			}else{
				$data['place'] = $this->base_model->get_data('place' , '*');
				$data['field'] = $this->base_model->get_data('field' , '*');
				$data['sex'] = $this->base_model->get_data('sex' , '*' , 'result' , array('id > '=>1));
				$data['status'] = $this->base_model->get_data('status_job' , '*');
				$data['soldier'] = $this->base_model->get_data('soldier' , '*' , 'result' , array('id > '=> 1));
				$data['proof'] = $this->base_model->get_data('proof' , '*' , 'result' , array('id > '=> 1));
				$data['marital'] = $this->base_model->get_data('marital' , '*');

				$header['title'] = ' رزومه ساز | هزارکاره ';
				$header['active'] = 'add_resume';
				$this->load->view('header' , $header);
				$this->load->view('applicant/header' , $data);
				$this->load->view('applicant/add_resume');
				$this->load->view('applicant/footer');
				$this->load->view('footer');
			}
			}


	function edit_resume(){
	if(!$this->session->has_userdata('a_login') or $this->session->userdata('a_login') != TRUE){
			show_404();
	}
	if($this->session->userdata('edit_resume') != 1){
		$message['msg'][0] = ' ابتدا باید رزومه خود بسازید ';
		$message['msg'][1] = 'info2';
		$this->session->set_flashdata($message);
		redirect('applicant/add_resume');
	}
	if(isset($_POST['sub'])){
		$this->form_validation->set_rules('fullname','fullname','required|max_length[100]');
		$this->form_validation->set_rules('place'   ,'place'   ,'required|numeric');
		$this->form_validation->set_rules('field'   ,'field'   ,'required|numeric');
		$this->form_validation->set_rules('sex'     ,'sex'     ,'required|numeric');
		$this->form_validation->set_rules('marital' ,'marital' ,'required|numeric');
		$this->form_validation->set_rules('status'  ,'status'  ,'required|numeric');
		$this->form_validation->set_rules('soldier' ,'soldier' ,'required|numeric');
		
		if($this->form_validation->run() == FALSE){
			$message['msg'][0] = "لطفا اطلاعات خواسته شده را وارد کنید";
			$message['msg'][1] = 'danger2';
			$this->session->set_flashdata($message);
			redirect('applicant/edit_resume');
		}else{
			$user_id = $this->session->userdata('a_id');
			$get = $this->base_model->get_data('resume' , 'id' , 'row' , array('applicant_id'=>$user_id));
			if(empty($get)){
				show_404();
			}
			$id = $get->id;
			$date = $this->convertdate->convert(time());
			$resume['fullname'] = $this->input->post('fullname');
			$resume['place_id'] = $this->input->post('place');
			$resume['field_id'] = $this->input->post('field');
			$resume['sex_id'] = $this->input->post('sex');
			$resume['marital_id'] = $this->input->post('marital');
			$resume['status_id'] = $this->input->post('status');
			$resume['soldier_id'] = $this->input->post('soldier');
			$resume['email'] = $this->input->post('email');
			$resume['date_birth'] = $this->input->post('date_birth');
			$resume['about'] = $this->input->post('about');
			$resume['date_modified'] = $date['d']." ".$date['t'];
			$state = TRUE;
			if($_FILES['pic_name']['name'] != ''){
			 $config = array(
				 'upload_path' => "./upload/applicant/avatar/",
				 'allowed_types' => "gif|jpg|png|jpeg",
				 'max_size' => "2000"
			 );
			 $this->load->library('upload', $config);
			 if ($this->upload->do_upload('pic_name')) {
				 $applicant['pic_name'] = $_FILES['pic_name']['name'];
				 $sess['pic_seeker'] = $applicant['pic_name'];
				 $this->session->set_userdata($sess);
				 $res = $this->base_model->update('applicant' , $applicant , array('id'=>$user_id));
				 $state = TRUE;
			 } else {
				 $state = FALSE;
			 }
			}
			$this->db->trans_begin();
			$res = $this->base_model->update('resume' , $resume , array('id'=> $id));
			$size = count($_POST['study_still']);
			for($i = 0 ; $i < $size ; $i++){
				$study[] = array(
					'major'=> htmlspecialchars($_POST['major'][$i]),
					'proof_id'=> htmlspecialchars($_POST['proof'][$i]),
					'institute'=> htmlspecialchars($_POST['institute'][$i]),
					'start'=>htmlspecialchars($_POST['study_start'][$i]),
					'end'=>htmlspecialchars($_POST['study_end'][$i]),
					'still'=>htmlspecialchars($_POST['study_still'][$i]),
					'explain'=>htmlspecialchars($_POST['study_explain'][$i]),
					'resume_id'=>$id
				);
			}
			$size2 = count($_POST['job_still']);
			for($j = 0 ; $j < $size2 ; $j++){
				$job[] = array(
					'company'=> htmlspecialchars($_POST['company'][$j]),
					'position'=> htmlspecialchars($_POST['position'][$j]),
					'start'=>htmlspecialchars($_POST['job_start'][$j]),
					'end'=> htmlspecialchars($_POST['job_end'][$j]),
					'still'=>htmlspecialchars($_POST['job_still'][$j]),
					'explain'=>htmlspecialchars($_POST['job_explain'][$j]),
					'resume_id'=>$id
				);
			}
			$size3 = count($_POST['percent']);
			for($z = 0 ; $z < $size3 ; $z++){
				$skill[] = array(
					'name'=>htmlspecialchars($_POST['skill'][$z]),
					'percent'=>htmlspecialchars($_POST['percent'][$z]),
					'resume_id'=>$id
				);
			}
		 if(isset($study) and !empty($study)){
			$res = $this->base_model->delete('his_study' , array('resume_id'=>$id)); 
			$res = $this->base_model->insert_batch('his_study' ,$study);
		 }
		 if(isset($job) and !empty($job)){
			$res = $this->base_model->delete('his_job' , array('resume_id'=>$id));
			$res = $this->base_model->insert_batch('his_job' , $job);
		 }
		 if(isset($skill) and !empty($skill)){
		  $res = $this->base_model->delete('skill' , array('resume_id'=>$id));
		  $res = $this->base_model->insert_batch('skill' , $skill);
		 }
		 if($this->db->trans_status() === FALSE or $res == FALSE){
		 $this->db->trans_rollback();
		 $message['msg'][0] = ' متاسفانه مشکلی در ثبت اطلاعات رخ داده است  ';
		 $message['msg'][1] = 'danger2';
		 $this->session->set_flashdata($message);
		 redirect('applicant/edit_resume');
		}else{
			$this->db->trans_commit();
		}
		if($state){
			$message['msg'][0] = 'روزمه شما با موفقیت ثبت شد';
			$message['msg'][1] = 'success2';
			$this->session->set_flashdata($message);
			redirect('applicant/edit_resume');
		}else{
			$message['msg'][0] = 'رزومه شما با موفقیت ثبت شده است . لطفا در ارسال آواتار به نکات گفته شده دقت کنید';
			$message['msg'][1] = 'info2';
			$this->session->set_flashdata($message);
			redirect('applicant/edit_resume');
		}

		}
	}else{
		$data['place'] = $this->base_model->get_data('place' , '*');
		$data['field'] = $this->base_model->get_data('field' , '*');
		$data['sex'] = $this->base_model->get_data('sex' , '*' , 'result' , array('id > '=>1));
		$data['status'] = $this->base_model->get_data('status_job' , '*');
		$data['soldier'] = $this->base_model->get_data('soldier' , '*' , 'result' , array('id > '=> 1));
		$data['proof'] = $this->base_model->get_data('proof' , '*' , 'result' , array('id > '=> 1));
		$data['marital'] = $this->base_model->get_data('marital' , '*');
		$data['resume'] = $this->base_model->get_data('resume' , '*' , 'row' , array('id'=> $this->session->userdata('a_id')));
		$resume_id = $data['resume']->id;
		$data['study'] = $this->base_model->get_data('his_study' , '*' , 'result' , array('resume_id'=>$resume_id));
		$data['job'] = $this->base_model->get_data('his_job' , '*' , 'result' , array('resume_id'=>$resume_id));
		$data['skill'] = $this->base_model->get_data('skill' , '*' , 'result' , array('resume_id'=>$resume_id));
		$header['title'] = 'ویرایش رزومه | هزارکاره';
		$header['active'] = 'edit_resume';
		$this->load->view('header' , $header);
		$this->load->view('applicant/header' , $data);
		$this->load->view('applicant/edit_resume');
		$this->load->view('applicant/footer');
		$this->load->view('footer');
	}
	}
	function resume(){
		if(!$this->session->has_userdata('a_login') or $this->session->userdata('a_login') != TRUE){
	show_404();
	}
$date = $this->convertdate->convert(time());	
$user_id = $this->session->userdata('a_id');	
$data['resume'] = $this->base_model->run_query("SELECT r.id , r.fullname , r.sex_id , r.email , r.date_birth , r.about , p.state , p.city , f.name AS field_name , s.sex_name , m.marital_status , st.status_name , so.soldier_name FROM resume r LEFT JOIN place p ON r.place_id = p.id LEFT JOIN field f ON r.field_id = f.id LEFT JOIN sex s ON r.sex_id = s.id LEFT JOIN marital m ON r.marital_id = m.id LEFT JOIN status_job st ON r.status_id = st.id LEFT JOIN soldier so ON r.soldier_id = so.id WHERE applicant_id = '$user_id' " , 'row');
if(empty($data['resume'])){
	$message['msg'][0] = ' ابتدا رزومه خود را ایجاد کنید ';
	$message['msg'][1] = 'info2';
	$this->session->set_flashdata($message);
	redirect('applicant/add_resume');
}
$now = $date['year'];
if($data['resume']->date_birth != '0000-00-00'){
	$data['age'] = $now - substr($data['resume']->date_birth , 0 , 4);
}else{
	$data['age'] = ' ثبت نشده است ';
}

$id = $data['resume']->id;
$data['study'] = $this->base_model->run_query("SELECT his_study.* , proof.proof_name FROM his_study LEFT JOIN proof ON his_study.proof_id = proof.id WHERE his_study.resume_id = '$id'");
$data['job'] = $this->base_model->get_data('his_job' , '*' , 'result' , array('resume_id'=> $id));
$data['skill'] = 	$this->base_model->get_data('skill' , '*' , 'result' , array('resume_id'=> $id));
$header['title'] = ' رزومه | هزارکاره ';
$header['active'] = 'resume';
$this->load->view('header' , $header);
$this->load->view('applicant/header' , $data);
$this->load->view('applicant/resume');
$this->load->view('applicant/footer');
$this->load->view('footer');
}


	//log out
		public function log_out(){
			$this->session->sess_destroy();
			redirect('home');
		}
	//log out	

}
?>
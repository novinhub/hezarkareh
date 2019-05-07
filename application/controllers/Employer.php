<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employer extends CI_Controller{

function __construct(){
parent::__construct();
$this->load->library('Convertdate');
}
public function index(){
		if(!$this->session->has_userdata('e_login') or $this->session->userdata('e_login') != TRUE){
			show_404();
		}
		$id = $this->session->userdata('id');
		if(isset($id) and is_numeric($id)){
			$pro = $this->base_model->get_data('employer' , 'fullname , co_name , co_web , co_pic , explain , place_id , field_id' , 'row' , array('id'=> $id ));
			$percent = 0;
			if($pro->fullname != ''){ $percent += 15; }
			if($pro->co_name != ''){ $percent += 15; }
			if($pro->co_web != ''){ $percent += 10; }
			if($pro->co_pic != 'default.png'){ $percent += 15; }
			if($pro->explain != ''){ $percent += 15; }
			if($pro->place_id != 0){ $percent += 15; }
			if($pro->field_id != 0){ $percent += 15; }
			$data['percent'] = $percent;
			$header['title'] = ' داشبورد کارفرما ';
			$header['active'] = 'dashbord';
			$data['count_job'] = $this->base_model->get_count('job' , array('employer_id'=> $id));
			$this->load->view('header' , $header);
			 $this->load->view('employer/header' , $data);
			$this->load->view('employer/dashbord');
			$this->load->view('employer/footer');
			$this->load->view('footer');
		}else{
			show_404();
		}
	}
	//edit
	public function edit(){
		if(!$this->session->has_userdata('e_login') or $this->session->userdata('e_login') != TRUE){
			show_404();
		}
		$id = $this->session->userdata('id');
		if(isset($id) and is_numeric($id)){
         if(isset($_POST['sub'])){
			 $data['fullname'] = $this->input->post('fullname');
			 $data['co_name'] = $this->input->post('co_name');
			 $data['co_web'] = $this->input->post('co_web');
			 $data['place_id'] = $this->input->post('place_id');
			 $data['field_id'] = $this->input->post('field_id');
			 $data['explain'] = $this->input->post('explain');
			 $state = TRUE;
			 if($_FILES['co_pic']['name'] != ''){
				$config = array(
					'upload_path' => "./upload/employer/avatar/",
					'allowed_types' => "gif|jpg|png|jpeg",
					'max_size' => "2000"
				);
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('co_pic')) {
					$data['co_pic'] = $_FILES['co_pic']['name'];
					$sess['co_pic'] = $data['co_pic'];
					$state = TRUE;
				} else {
					$state = FALSE;
				}
			 }
			 $sess['fullname'] =  $data['fullname'];
			 $this->session->set_userdata($sess);
			 $res = $this->base_model->update('employer' , $data , array('id'=> $id));
			 if($state == FALSE){
				$message['msg'][0] = " اطلاعات شما با موفقیت ثبت شد. در ارسال عکس لطفا طبق نکات گفته شده عمل کنید ";
				$message['msg'][1] = 'danger2';
				$this->session->set_flashdata($message);
				redirect('employer/edit');
			 }
			 if($res){
					$message['msg'][0] = "اطلاعات شما با موفقیت ثبت شد";
					$message['msg'][1] = 'success2';
					$this->session->set_flashdata($message);
					redirect('employer/edit');
			 }else{
				$message['msg'][0] = "متاسفانه مشکلی در ثبت اطلاعات رخ داده است";
				$message['msg'][1] = 'danger2';
				$this->session->set_flashdata($message);
				redirect('employer/edit');
			 }
		 }else{
			 $pro = $this->base_model->get_data('employer' , 'fullname , co_name , co_web , co_pic , explain , place_id , field_id' , 'row' , array('id'=>$id));
			 $percent = 0;
			 if($pro->fullname != ''){ $percent += 15; }
			 if($pro->co_name != ''){ $percent += 15; }
			 if($pro->co_web != ''){ $percent += 10; }
			 if($pro->co_pic != 'default.png'){ $percent += 15; }
			 if($pro->explain != ''){ $percent += 15; }
			 if($pro->place_id != 0){ $percent += 15; }
			 if($pro->field_id != 0){ $percent += 15; }
			 $data['percent'] = $percent;
			 $data['edit'] = $this->base_model->run_query("SELECT employer.* , place.state , place.city , field.name FROM employer left join place on employer.place_id = place.id left join field on employer.field_id = field.id where employer.id = '$id'" , 'row');
			 $data['place'] = $this->base_model->get_data('place' , '*' , 'result' , NULL , NULL , NULL , array('state' , 'ASC'));
			 $data['field'] = $this->base_model->get_data('field' , '*' , 'result' , NULL , NULL , NULL , array('name' , 'ASC'));
			 $header['title'] = ' ویرایش پروفایل ';
			 $header['active'] = 'edit';
			 $this->load->view('header' , $header);
			 $this->load->view('employer/header' , $data);
			 $this->load->view('employer/edit_profile');
			 $this->load->view('employer/footer');
			 $this->load->view('footer');
		 }
		}else{
			show_404();
		}
	}
	//edit
	//post 
public function post(){
		if(!$this->session->has_userdata('e_login') or $this->session->userdata('e_login') != TRUE){
			show_404();
		}
		$id = $this->session->userdata('id');
		if(isset($id) and is_numeric($id)){
          if(isset($_POST['sub'])){
			$date = $this->convertdate->convert(time());
			$ex = $this->convertdate->convert(time() + 864000);
			$data['title'] = $this->input->post('title');
			$data['field_id'] = $this->input->post('field_id');
			$data['place_id'] = $this->input->post('place_id');
			$data['assist_id'] = $this->input->post('assist_id');
			$data['exp_id'] = $this->input->post('exp_id');
			$data['sex_id'] = $this->input->post('sex_id');
			$data['salary_id'] = $this->input->post('salary_id');
			$data['soldier_id'] = $this->input->post('soldier_id');
			$data['proof_id'] = $this->input->post('proof_id');
			$data['explain'] = $this->input->post('explain');
			$data['benefit'] = $this->input->post('benefit');
			$data['date_job'] = $date['d'];
			$data['time_job'] = $date['t'];
			$data['expire'] = $ex['d'];
			$data['expire_time'] = $ex['t'];
			$data['pub'] = 1;
			$data['employer_id'] = $id;
			$res = $this->base_model->insert('job' , $data);
			if($res == FALSE){
				$message['msg'][0] = ' مشکلی در ثبت اطلاعات رخ داده است لطفا دوباره سعی کنید ';
				$message['msg'][1] = 'danger2';
				$this->session->set_flashdata($message);
				redirect('employer/post');
			}else{
				$message['msg'][0] = ' آگهی شما با موفقیت ثبت شد . جهت انتشار آگهی لطفا منتظر تایید ما باشید ';
				$message['msg'][1] = 'success2';
				$this->session->set_flashdata($message);
				redirect('employer/post');
			}

		  }else{
			$pro = $this->base_model->get_data('employer' , 'fullname , co_name , co_web , co_pic , explain , place_id , field_id' , 'row' , array('id'=>$id));
			$percent = 0;
			if($pro->fullname != ''){ $percent += 15; }
			if($pro->co_name != ''){ $percent += 15; }
			if($pro->co_web != ''){ $percent += 10; }
			if($pro->co_pic != 'default.png'){ $percent += 15; }
			if($pro->explain != ''){ $percent += 15; }
			if($pro->place_id != 0){ $percent += 15; }
			if($pro->field_id != 0){ $percent += 15; }
			$data['percent'] = $percent;
			if($percent < 75){
				$message['msg'][0] = 'برای ایجاد آگهی ابتدا باید پروفایل خود را تکمیل کنید';
				$message['msg'][1] = 'info2';
				$this->session->set_flashdata($message);
				redirect('employer/edit');
			}
			$data['employer'] = $pro;
			$data['place'] = $this->base_model->get_data('place' , '*' , 'result' , NULL , NULL , NULL , array('state' , 'ASC'));
			$data['field'] = $this->base_model->get_data('field' , '*' , 'result' , NULL , NULL , NULL , array('name' , 'ASC'));
			$data['assist'] = $this->base_model->get_data('assist' , '*');
			$data['experience'] = $this->base_model->get_data('experience' , '*');
			$data['sex'] = $this->base_model->get_data('sex' , '*');
			$data['salary'] = $this->base_model->get_data('salary' , '*');
			$data['soldier'] = $this->base_model->get_data('soldier' , '*');
			$data['proof'] = $this->base_model->get_data('proof' , '*');
			$header['title'] = ' ایجاد آگهی جدید ';
			$header['active'] =  'post';
			$this->load->view('header' ,$header );
			$this->load->view('employer/header' , $data);
			$this->load->view('employer/post_job');
			$this->load->view('employer/footer');
			$this->load->view('footer');
		  }
		}else{
			show_404();
		}
		}
	//post
	//jobs
	public function jobs(){
		if(!$this->session->has_userdata('e_login') or $this->session->userdata('e_login') != TRUE){
			show_404();
		}
		$id = $this->session->userdata('id');
		if(isset($id) and is_numeric($id)){
			$pro = $this->base_model->get_data('employer' , 'fullname , co_name , co_web , co_pic , explain , place_id , field_id' , 'row' , array('id'=>$id));
			$percent = 0;
			if($pro->fullname != ''){ $percent += 15; }
			if($pro->co_name != ''){ $percent += 15; }
			if($pro->co_web != ''){ $percent += 10; }
			if($pro->co_pic != 'default.png'){ $percent += 15; }
			if($pro->explain != ''){ $percent += 15; }
			if($pro->place_id != 0){ $percent += 15; }
			if($pro->field_id != 0){ $percent += 15; }
			$data['percent'] = $percent;
			$header['title'] = 'آگهی های من | هزارکاره';
			$header['active'] = 'jobs';
			$data['jobs'] = $this->base_model->get_data_join('job' , 'employer' , 'job.id , job.title , place.state , job.expire , job.expire_time , place.city , assist.assist_name , employer.co_pic , employer.co_name' , 'job.employer_id = employer.id' ,'result', array('job.pub'=> 1) , 12 , 0 , array('job.date_job' , 'DESC') , array('place' , 'place.id = job.place_id') , array('assist' , 'assist.id = job.assist_id'));
			$this->load->view('header' , $header);
			$this->load->view('employer/header' , $data);
			$this->load->view('employer/manage_jobs');
			$this->load->view('employer/footer');
			$this->load->view('footer');
		}else{
			show_404();
		}
		}
		//jobs
public function manage_candidate(){
		if(!$this->session->has_userdata('e_login') or $this->session->userdata('e_login') != TRUE){
			show_404();
		}
		
		$this->load->view('header');
		$this->load->view('employer/header');
		$this->load->view('employer/manage_candidate');
		$this->load->view('employer/footer');
		$this->load->view('footer');
		}
public function log_out(){
	$this->session->sess_destroy();
	redirect('home');
}	
		
}
?>
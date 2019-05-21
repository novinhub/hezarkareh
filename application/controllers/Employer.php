<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employer extends CI_Controller{

function __construct(){
parent::__construct();
$this->load->library('Convertdate');
$this->load->library('form_validation');
$this->load->library('pagination');
}
public function index(){
		if(!$this->session->has_userdata('e_login') or $this->session->userdata('e_login') != TRUE or $this->session->has_userdata('a_login')){
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
			$header['title'] = 'داشبورد کارفرما | هزار کاره';
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
		if(!$this->session->has_userdata('e_login') or $this->session->userdata('e_login') != TRUE or $this->session->has_userdata('a_login')){
			show_404();
		}
		$id = $this->session->userdata('id');
		if(isset($id) and is_numeric($id)){
         if(isset($_POST['sub'])){
			$this->form_validation->set_rules('fullname','fullname','required|max_length[100]');
			$this->form_validation->set_rules('co_name' ,'co_name' ,'required');
			$this->form_validation->set_rules('place_id','place_id','required|numeric');
			$this->form_validation->set_rules('field_id','field_id','required|numeric');
			$this->form_validation->set_rules('explain' ,'explain' ,'required');
			if($this->form_validation->run() == FALSE){
				$message['msg'][0] = "لطفا اطلاعات خواسته شده را وارد کنید";
				$message['msg'][1] = 'danger2';
				$this->session->set_flashdata($message);
				redirect('employer/edit');
			}
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
				if($this->upload->do_upload('co_pic')){
					$data['co_pic'] = $_FILES['co_pic']['name'];
					$sess['co_pic'] = $data['co_pic'];
					$state = TRUE;
				}else {
					$state = FALSE;
				}
			 }
			 $sess['co_name'] =  $data['co_name'];
			 $this->session->set_userdata($sess);
			 $res = $this->base_model->update('employer' , $data , array('id'=> $id));
			 if($state == FALSE){
				$message['msg'][0] = " اطلاعات شما با موفقیت ثبت شد. در ارسال عکس لطفا طبق نکات گفته شده عمل کنید ";
				$message['msg'][1] = 'info2';
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
			 $header['title'] = ' ویرایش پروفایل | هزار کاره ';
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
		if(!$this->session->has_userdata('e_login') or $this->session->userdata('e_login') != TRUE or $this->session->has_userdata('a_login')){
			show_404();
		}
		$id = $this->session->userdata('id');
		if(isset($id) and is_numeric($id)){
          if(isset($_POST['sub'])){
			$this->form_validation->set_rules('title','title','required|max_length[100]');
			$this->form_validation->set_rules('place_id'   ,'place_id'   ,'required|numeric');
			$this->form_validation->set_rules('field_id'   ,'field_id'   ,'required|numeric');
			$this->form_validation->set_rules('assist_id'  ,'assist_id'  ,'required|numeric');
			$this->form_validation->set_rules('exp_id' ,'exp_id' ,'required|numeric');
			$this->form_validation->set_rules('salary_id' ,'salary_id' ,'required|numeric');
			$this->form_validation->set_rules('proof_id' ,'proof_id' ,'required|numeric');
			$this->form_validation->set_rules('sex_id'   ,'sex_id'     ,'required|numeric');
			$this->form_validation->set_rules('soldier_id','soldier_id' ,'required|numeric');
			$this->form_validation->set_rules('explain' ,'explain' ,'required');
			if($this->form_validation->run() == FALSE){
				$message['msg'][0] = "لطفا اطلاعات خواسته شده را وارد کنید";
				$message['msg'][1] = 'danger2';
				$this->session->set_flashdata($message);
				redirect('employer/post');
			}
			$date = $this->convertdate->convert(time());
			$ex = $this->convertdate->convert(time() + 864000);
			$data['title'] = $this->input->post('title');
			$data['place_id'] = $this->input->post('place_id');
			$data['field_id'] = $this->input->post('field_id');
			$data['assist_id'] = $this->input->post('assist_id');
			$data['exp_id'] = $this->input->post('exp_id');
			$data['salary_id'] = $this->input->post('salary_id');
			$data['proof_id'] = $this->input->post('proof_id');
			$data['sex_id'] = $this->input->post('sex_id');
			$data['soldier_id'] = $this->input->post('soldier_id');
			$data['explain'] = $this->input->post('explain');
			$data['benefit'] = $this->input->post('benefit');
			$data['date_job'] = $date['d'];
			$data['time_job'] = $date['t'];
			$data['expire'] = $ex['d'];
			$data['expire_time'] = $ex['t'];
			$data['pub'] = 1;
			$data['exp'] = 0;
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
			$header['title'] = ' ایجاد آگهی جدید | هزارکاره ';
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
		if(!$this->session->has_userdata('e_login') or $this->session->userdata('e_login') != TRUE or $this->session->has_userdata('a_login')){
			show_404();
		}
		$id = $this->session->userdata('id');
		if(isset($id) and is_numeric($id)){
			$date = $this->convertdate->convert(time());
			$pro = $this->base_model->get_data('employer' , 'fullname , co_name , co_web , co_pic , explain , place_id , field_id' , 'row' , array('id'=>$id));
			$percent = 0;
			if($pro->fullname != ''){ $percent += 15; }
			if($pro->co_name != ''){ $percent += 15; }
			if($pro->co_web != ''){ $percent += 10; }
			if($pro->co_pic != 'default.png'){ $percent += 15; }
			if($pro->explain != ''){ $percent += 15; }
			if($pro->place_id != 0){ $percent += 15; }
			if($pro->field_id != 0){ $percent += 15; }
		$data['jobs'] = $this->base_model->get_data_join('job' , 'employer' , 'job.id , job.title , job.exp ,  place.state , job.expire , job.expire_time , place.city , assist.assist_name , employer.co_pic , employer.co_name' , 'job.employer_id = employer.id' ,'result', array('job.employer_id'=>$id) , NULL , NULL , array('job.id' , 'DESC') , array('place' , 'place.id = job.place_id') , array('assist' , 'assist.id = job.assist_id'));
		$data['percent'] = $percent;
		$header['title'] = 'آگهی های من | هزارکاره';
		$header['active'] = 'jobs';	
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

public function edit_post(){
	$employer_id = $this->session->userdata('id');
	$id = $this->uri->segment(3);
	if(isset($employer_id) and is_numeric($employer_id) and isset($id) and is_numeric($id)){
	if(isset($_POST['sub'])){
       
		$this->form_validation->set_rules('title','title','required|max_length[100]');
		$this->form_validation->set_rules('place_id'   ,'place_id'   ,'required|numeric');
		$this->form_validation->set_rules('field_id'   ,'field_id'   ,'required|numeric');
		$this->form_validation->set_rules('assist_id'  ,'assist_id'  ,'required|numeric');
		$this->form_validation->set_rules('exp_id' ,'exp_id' ,'required|numeric');
		$this->form_validation->set_rules('salary_id' ,'salary_id' ,'required|numeric');
		$this->form_validation->set_rules('proof_id' ,'proof_id' ,'required|numeric');
		$this->form_validation->set_rules('sex_id'   ,'sex_id'     ,'required|numeric');
		$this->form_validation->set_rules('soldier_id','soldier_id' ,'required|numeric');
		$this->form_validation->set_rules('explain' ,'explain' ,'required');
		if($this->form_validation->run() == FALSE){
			$message['msg'][0] = "لطفا اطلاعات خواسته شده را وارد کنید";
			$message['msg'][1] = 'danger2';
			$this->session->set_flashdata($message);
			redirect('employer/edit_post/'.$id);
		}
		$date = $this->convertdate->convert(time());
		$data['title'] = $this->input->post('title');
		$data['place_id'] = $this->input->post('place_id');
		$data['field_id'] = $this->input->post('field_id');
		$data['assist_id'] = $this->input->post('assist_id');
		$data['exp_id'] = $this->input->post('exp_id');
		$data['salary_id'] = $this->input->post('salary_id');
		$data['proof_id'] = $this->input->post('proof_id');
		$data['sex_id'] = $this->input->post('sex_id');
		$data['soldier_id'] = $this->input->post('soldier_id');
		$data['explain'] = $this->input->post('explain');
		$data['benefit'] = $this->input->post('benefit');
		$data['date_modified'] = $date['d']." ".$date['t'];
		// $data['pub'] = 1;
		$res = $this->base_model->update('job' , $data , array('id'=> $id));
		if($res == FALSE){
			$message['msg'][0] = ' مشکلی در ثبت اطلاعات رخ داده است لطفا دوباره سعی کنید ';
			$message['msg'][1] = 'danger2';
			$this->session->set_flashdata($message);
			redirect('employer/edit_post/'.$id);
		}else{
			$message['msg'][0] = ' آگهی شما با موفقیت ویرایش شد . جهت انتشار آگهی لطفا منتظر تایید ما باشید ';
			$message['msg'][1] = 'success2';
			$this->session->set_flashdata($message);
			redirect('employer/edit_post/'.$id);
		}

	}else{
		$data['job'] = $this->base_model->get_data('job' , '*' , 'row' , array('id'=> $id , 'employer_id'=> $employer_id));
		if(empty($data['job'])){
			$message['msg'][0] = ' آگهی مورد نظر یافت نشد ';
			$message['msg'][1] = 'info2';
			$this->session->set_flashdata($message);
			redirect('employer/jobs');
		}
		if($data['job']->exp == 1){
			$message['msg'][0] = ' ابتدا آگهی خود را تمدید کنید ';
			$message['msg'][1] = 'info2';
			$this->session->set_flashdata($message);
			redirect('employer/jobs');
		}
		$pro = $this->base_model->get_data('employer' , 'fullname , co_name , co_web , co_pic , explain , place_id , field_id' , 'row' , array('id'=>$employer_id));
		$percent = 0;
		if($pro->fullname != ''){ $percent += 15; }
		if($pro->co_name != ''){ $percent += 15; }
		if($pro->co_web != ''){ $percent += 10; }
		if($pro->co_pic != 'default.png'){ $percent += 15; }
		if($pro->explain != ''){ $percent += 15; }
		if($pro->place_id != 0){ $percent += 15; }
		if($pro->field_id != 0){ $percent += 15; }
		$data['percent'] = $percent;
		$data['place'] = $this->base_model->get_data('place' , '*' , 'result' , NULL , NULL , NULL , array('state' , 'ASC'));
		$data['field'] = $this->base_model->get_data('field' , '*' , 'result' , NULL , NULL , NULL , array('name' , 'ASC'));
		$data['assist'] = $this->base_model->get_data('assist' , '*');
		$data['experience'] = $this->base_model->get_data('experience' , '*');
		$data['sex'] = $this->base_model->get_data('sex' , '*');
		$data['salary'] = $this->base_model->get_data('salary' , '*');
		$data['soldier'] = $this->base_model->get_data('soldier' , '*');
		$data['proof'] = $this->base_model->get_data('proof' , '*');
		$header['title'] = ' ویرایش آگهی  '.$data['job']->title." | هزارکاره ";
		$header['active'] =  'jobs';
		$this->load->view('header' ,$header );
		$this->load->view('employer/header' , $data);
		$this->load->view('employer/edit_post');
		$this->load->view('employer/footer');
		$this->load->view('footer');
	}
	}else{
		show_404();
	}
}		

public function resume(){
		if(!$this->session->has_userdata('e_login') or $this->session->userdata('e_login') != TRUE){
			show_404();
		}
		$employer_id = $this->session->userdata('id');
		$id = $this->uri->segment(3);
		if(isset($employer_id) and isset($id) and is_numeric($employer_id) and is_numeric($id)){
			$job = $this->base_model->get_data('job' , 'id' , 'row' , array('id'=> $id , 'employer_id'=> $employer_id));
			if(empty($job)){
				$message['msg'][0] = ' آگهی مورد نظر یافت نشد ';
				$message['msg'][1] = 'info2';
				$this->session->set_flashdata($message);
				redirect('employer/jobs');
			}
			$pro = $this->base_model->get_data('employer' , 'fullname , co_name , co_web , co_pic , explain , place_id , field_id' , 'row' , array('id'=>$employer_id));
			$percent = 0;
			if($pro->fullname != ''){ $percent += 15; }
			if($pro->co_name != ''){ $percent += 15; }
			if($pro->co_web != ''){ $percent += 10; }
			if($pro->co_pic != 'default.png'){ $percent += 15; }
			if($pro->explain != ''){ $percent += 15; }
			if($pro->place_id != 0){ $percent += 15; }
			if($pro->field_id != 0){ $percent += 15; }
			$data['percent'] = $percent;
			$header['title'] = ' مدیریت رزومه ها | هزارکاره ';
			$header['active'] = 'jobs';
			$this->load->view('header' , $header);
			$this->load->view('employer/header' , $data);
			$this->load->view('employer/manage_candidate');
			$this->load->view('employer/footer');
			$this->load->view('footer');
		}else{
			show_404();
		}
		}
public function log_out(){
	$this->session->sess_destroy();
	redirect('home');
}	
		
}
?>
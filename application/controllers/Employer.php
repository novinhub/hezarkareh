<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employer extends CI_Controller{

function __construct(){
parent::__construct();
}
public function index(){
		if(!$this->session->has_userdata('e_login') or $this->session->userdata('e_login') != TRUE){
			show_404();
		}
		$pro = $this->base_model->get_data('employer' , 'fullname , co_name , co_web , co_pic , explain , place_id , field_id' , 'row' , array('id'=>$this->session->userdata('id')));
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
	    $this->load->view('header' , $header);
 	    $this->load->view('employer/header' , $data);
		$this->load->view('employer/dashbord');
		$this->load->view('employer/footer');
		$this->load->view('footer');
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
public function manage_jobs(){
		if(!$this->session->has_userdata('e_login') or $this->session->userdata('e_login') != TRUE){
			show_404();
		}
		$this->load->view('header');
		$this->load->view('employer/header');
		$this->load->view('employer/manage_jobs');
		$this->load->view('employer/footer');
		$this->load->view('footer');
		}
public function log_out(){
	$this->session->sess_destroy();
	redirect('home');
}	
		
}
?>
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
		if($pro->fullname != ''){
		   $percent += 15;
		}else if($pro->co_name != ''){
			$percent += 15;
		}else if($pro->co_web != ''){
			$percent += 10;
		}else if($pro->co_pic != 'default.png'){
			$percent += 15;
		}else if($pro->explain != ''){
			$percent += 15;
		}else if($pro->place_id != 0){
		   $percent += 15;
		}else if($pro->field_id != 0){
		   $percent += 15;
		}
		$data['percent'] = $percent;
		$header['title'] = ' داشبورد کارفرما ';
		$header['active'] = 'dashbord';
	    $this->load->view('header' , $header);
 	    $this->load->view('employer/header' , $data);
		$this->load->view('employer/dashbord');
		$this->load->view('employer/footer');
		$this->load->view('footer');
	}
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
public function post_job(){
		if(!$this->session->has_userdata('e_login') or $this->session->userdata('e_login') != TRUE){
			show_404();
		}
		$this->load->view('header');
		$this->load->view('employer/header');
		$this->load->view('employer/post_job');
		$this->load->view('employer/footer');
		$this->load->view('footer');
		}
public function edit(){
		if(!$this->session->has_userdata('e_login') or $this->session->userdata('e_login') != TRUE){
			show_404();
		}
		$id = $this->uri->segment(3);
		if(isset($id) and is_numeric($id)){
         if(isset($_POST['sub'])){

		 }else{
			 $pro = $this->base_model->get_data('employer' , 'fullname , co_name , co_web , co_pic , explain , place_id , field_id' , 'row' , array('id'=>$id));
			 $percent = 0;
			 if($pro->fullname != ''){
				$percent += 15;
			 }else if($pro->co_name != ''){
				 $percent += 15;
			 }else if($pro->co_web != ''){
				 $percent += 10;
			 }else if($pro->co_pic != 'default.png'){
				 $percent += 15;
			 }else if($pro->explain != ''){
				 $percent += 15;
			 }else if($pro->place_id != 0){
				$percent += 15;
			 }else if($pro->field_id != 0){
				$percent += 15;
			 }
			 $data['percent'] = $percent;
			 $data['edit'] = $this->base_model->run_query("SELECT employer.* , place.state , place.city , field.name FROM employer left join place on employer.place_id = place.id left join field on employer.field_id = field.id where employer.id = '$id'" , 'row');
			 $data['place'] = $this->base_model->get_data('place' , '*' , 'result' , NULL , NULL , NULL ,array('state' , 'ASC'));
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
public function log_out(){
	$this->session->sess_destroy();
	redirect('home');
}	
		
}
?>
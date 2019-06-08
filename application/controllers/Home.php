<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{

function __construct(){
parent::__construct();
}
	function index(){
	$header['title'] = ' خانه | هزارکاره ';
	$data['jobs'] = $this->base_model->get_data_join('job' , 'employer' , 'job.id , job.title , place.state , place.city , assist.assist_name , employer.co_pic , employer.co_name' , 'job.employer_id = employer.id' ,'result', array('job.pub'=> 1) , 12 , 0 , array('job.date_job' , 'DESC') , array('place' , 'place.id = job.place_id') , array('assist' , 'assist.id = job.assist_id'));
	$data['sum'] = $this->base_model->get_data('count_data' , 'employer , job , applicant , resume' , 'row' , array('id'=>1));
	$data['place'] = $this->base_model->get_data('place' , '*' , 'result' , NULL , NULL , NULL , array('state' , 'ASC'));
	$data['field'] = $this->base_model->get_data('field' , '*' , 'result' , NULL , NULL , NULL , array('name' , 'ASC'));
	$this->load->view('header' , $header);
	$this->load->view('home/home' , $data);
	$this->load->view('footer');
	}
	function add_resume(){
		if($this->session->has_userdata('a_login') and $this->session->userdata('a_login') == TRUE){
			redirect('applicant/add_resume');
		}else{
			$message['msg'][0] = ' برای ایجاد رزومه ابتدا باید وارد حساب کاربری خود شوید ';
			$message['msg'][1] = 'info2';
			$this->session->set_flashdata($message);
			redirect('login/applicant');
		}
	}

}
?>
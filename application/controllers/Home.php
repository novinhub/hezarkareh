<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{

function __construct(){
parent::__construct();
}
	function index(){
	$header['title'] = ' خانه | هزارکاره ';
	$data['jobs'] = $this->base_model->get_data_join('job' , 'employer' , 'job.id , job.title , place.state , place.city , assist.assist_name , employer.co_pic , employer.co_name' , 'job.employer_id = employer.id' ,'result', array('job.pub'=> 1) , 12 , 0 , array('job.date_job' , 'DESC') , array('place' , 'place.id = job.place_id') , array('assist' , 'assist.id = job.assist_id'));
	$this->load->view('header' , $header);
	$this->load->view('home/home' , $data);
	$this->load->view('footer');
	}

}
?>
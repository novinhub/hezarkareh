<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Applicant extends CI_Controller{

function __construct(){
parent::__construct();
}

	function index(){
    if(!$this->session->has_userdata('a_login') or $this->session->userdata('a_login') != TRUE){
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

	function resume(){
        if(!$this->session->has_userdata('a_login') or $this->session->userdata('a_login') != TRUE){
			show_404();
		  }
		$header['title'] = ' رزومه | هزارکاره ';
		$header['active'] = 'resume';
		$this->load->view('header' , $header);
		$this->load->view('applicant/header');
		$this->load->view('applicant/resume');
		$this->load->view('applicant/footer');
		$this->load->view('footer');
		}

		function add_resume(){
			if(!$this->session->has_userdata('a_login') or $this->session->userdata('a_login') != TRUE){
					show_404();
			}
			$header['title'] = ' رزمه ساز | هزارکاره ';
			$header['active'] = 'add_resume';
			$this->load->view('header' , $header);
			$this->load->view('applicant/header');
			$this->load->view('applicant/edit_resume');
			$this->load->view('applicant/footer');
			$this->load->view('footer');
			}


	function edit_resume(){
	if(!$this->session->has_userdata('a_login') or $this->session->userdata('a_login') != TRUE){
			show_404();
	}
	$this->load->view('header');
	$this->load->view('applicant/header');
	$this->load->view('applicant/edit_resume');
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
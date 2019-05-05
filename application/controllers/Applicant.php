<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Applicant extends CI_Controller{

function __construct(){
parent::__construct();
}
	function index(){

    $this->load->view('header');
    $this->load->view('applicant/header');
	$this->load->view('applicant/dashbord');
	$this->load->view('applicant/footer');
	$this->load->view('footer');
	}
	function edit_resume(){

	$this->load->view('header');
	$this->load->view('applicant/header');
	$this->load->view('applicant/edit_resume');
	$this->load->view('applicant/footer');
	$this->load->view('footer');
	}
	function resume(){

		$this->load->view('header');
		$this->load->view('applicant/header');
		$this->load->view('applicant/resume');
		$this->load->view('applicant/footer');
		$this->load->view('footer');
		}

}
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employer extends CI_Controller{

function __construct(){
parent::__construct();
}
	function index(){
	    $this->load->view('header');
 	    $this->load->view('employer/header');
		$this->load->view('employer/dashbord');
		$this->load->view('employer/footer');
		$this->load->view('footer');
	}
	function manage_candidate(){
		$this->load->view('header');
		$this->load->view('employer/header');
		$this->load->view('employer/manage_candidate');
		$this->load->view('employer/footer');
		$this->load->view('footer');
		}
	function manage_jobs(){
		$this->load->view('header');
		$this->load->view('employer/header');
		$this->load->view('employer/manage_jobs');
		$this->load->view('employer/footer');
		$this->load->view('footer');
		}
	function post_job(){
		$this->load->view('header');
		$this->load->view('employer/header');
		$this->load->view('employer/post_job');
		$this->load->view('employer/footer');
		$this->load->view('footer');
		}
	function edit_profile(){
		$this->load->view('header');
		$this->load->view('employer/header');
		$this->load->view('employer/edit_profile');
		$this->load->view('employer/footer');
		$this->load->view('footer');
	}
		
}
?>
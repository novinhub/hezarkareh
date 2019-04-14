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
	$this->load->view('footer');
	}

}
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class candidates extends CI_Controller{

function __construct(){
parent::__construct();
}
	function index(){

    $this->load->view('header');
    $this->load->view('candidates/header');
	$this->load->view('candidates/dashbord');
	$this->load->view('candidates/footer');
	$this->load->view('footer');
	}

}
?>
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
			if($this->session->userdata('add_resume') != 1){
				$message['msg'][0] = ' هر کارجو می تواند یک رزومه داشته باشد . در این بخش می توانید رزومه خود را ویرایش کنید ';
				$message['msg'][1] = 'info2';
				$this->session->set_flashdata($message);
				redirect('applicant/edit_resume');
			}
			if(isset($_POST['sub'])){
        
			}else{
				$data['place'] = $this->base_model->get_data('place' , '*');
				$data['field'] = $this->base_model->get_data('field' , '*');
				$data['sex'] = $this->base_model->get_data('sex' , '*' , 'result' , array('id > '=>1));
				$data['status'] = $this->base_model->get_data('status_job' , '*');
				$data['soldier'] = $this->base_model->get_data('soldier' , '*' , 'result' , array('id > '=> 1));
				$data['assist'] = $this->base_model->get_data('assist' , '*' , 'result' , array('id > '=> 1 ));
				$data['proof'] = $this->base_model->get_data('proof' , '*' , 'result' , array('id > '=> 1));

				$header['title'] = ' رزومه ساز | هزارکاره ';
				$header['active'] = 'add_resume';
				$this->load->view('header' , $header);
				$this->load->view('applicant/header' , $data);
				$this->load->view('applicant/add_resume');
				$this->load->view('applicant/footer');
				$this->load->view('footer');
			}
			}


	function edit_resume(){
	if(!$this->session->has_userdata('a_login') or $this->session->userdata('a_login') != TRUE){
			show_404();
	}
	if($this->session->userdata('edit_resume') != 1){
		$message['msg'][0] = ' ابتدا باید رزومه خود بسازید ';
		$message['msg'][1] = 'info2';
		$this->session->set_flashdata($message);
		redirect('applicant/add_resume');
	}
	$header['title'] = 'ویرایش رزومه | هزارکاره';
	$header['active'] = 'edit_resume';
	$this->load->view('header' , $header);
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
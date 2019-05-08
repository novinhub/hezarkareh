<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Applicant extends CI_Controller{

function __construct(){
     parent::__construct();
		 $this->load->library('Convertdate');
		 $this->load->library('form_validation');
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
				$this->form_validation->set_rules('fullname','fullname','required|max_length[100]');
				$this->form_validation->set_rules('place'   ,'place'   ,'required|numeric');
				$this->form_validation->set_rules('field'   ,'field'   ,'required|numeric');
				$this->form_validation->set_rules('sex'     ,'sex'     ,'required|numeric');
				$this->form_validation->set_rules('marital' ,'marital' ,'required|numeric');
				$this->form_validation->set_rules('status'  ,'status'  ,'required|numeric');
				$this->form_validation->set_rules('soldier' ,'soldier' ,'required|numeric');
				
				if($this->form_validation->run() == FALSE){
					$message['msg'][0] = "لطفا اطلاعات خواسته شده را وارد کنید";
					$message['msg'][1] = 'danger2';
					$this->session->set_flashdata($message);
					redirect('applicant/add_resume');
				}else{
					$date = $this->convertdate->convert(time());
					$data['fullname'] = $this->input->post('fullname');
					$data['place_id'] = $this->input->post('place');
					$data['field_id'] = $this->input->post('field');
					$data['sex_id'] = $this->input->post('sex');
					$data['marital_id'] = $this->input->post('marital');
					$data['status_id'] = $this->input->post('status');
					$data['soldier_id'] = $this->input->post('soldier');
					$data['email'] = $this->input->post('email');
					$data['date_birth'] = $this->input->post('date_birth');
					
					echo "<pre>";
					var_dump($_POST);
					var_dump($_FILES);
					var_dump($data);
					echo "</pre>";


				}
			}else{
				$data['place'] = $this->base_model->get_data('place' , '*');
				$data['field'] = $this->base_model->get_data('field' , '*');
				$data['sex'] = $this->base_model->get_data('sex' , '*' , 'result' , array('id > '=>1));
				$data['status'] = $this->base_model->get_data('status_job' , '*');
				$data['soldier'] = $this->base_model->get_data('soldier' , '*' , 'result' , array('id > '=> 1));
				$data['proof'] = $this->base_model->get_data('proof' , '*' , 'result' , array('id > '=> 1));
				$data['marital'] = $this->base_model->get_data('marital' , '*');

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
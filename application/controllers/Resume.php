<?php 
class Resume extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->library('Convertdate');
    }
    public function show(){
         if(!$this->session->has_userdata('e_login') or $this->session->userdata('e_login') != TRUE){
             show_404();
         }
         $id = $this->uri->segment(3);
         $employer_id = $this->session->userdata('id');
         $job_id = $this->uri->segment(3);
         $check = $this->base_model->get_data('sent','applicant_id', 'row', array('employer_id'=>$employer_id , 'resume_id'=>$id , 'job_id'=>$job_id));
         if(empty($check)){
             $message['msg'][0] = ' رزومه مورد نظر یافت نشد ';
             $message['msg'][1] = 'info2';
             $this->session->set_flashdata($message);
             redirect('employer/resume/'.$job_id);
         }
         $date = $this->convertdate->convert(time());
         $data['resume'] = $this->base_model->run_query("SELECT r.id , r.fullname , r.sex_id , r.email , r.date_birth , r.about , p.state , p.city , f.name AS field_name , s.sex_name , m.marital_status , st.status_name , so.soldier_name FROM resume r LEFT JOIN place p ON r.place_id = p.id LEFT JOIN field f ON r.field_id = f.id LEFT JOIN sex s ON r.sex_id = s.id LEFT JOIN marital m ON r.marital_id = m.id LEFT JOIN status_job st ON r.status_id = st.id LEFT JOIN soldier so ON r.soldier_id = so.id WHERE applicant_id = '$check->applicant_id' " , 'row');
$now = $date['year'];
if($data['resume']->date_birth != '0000-00-00'){
	$data['age'] = $now - substr($data['resume']->date_birth , 0 , 4);
}else{
	$data['age'] = ' ثبت نشده است ';
}

$id = $data['resume']->id;
$data['study'] = $this->base_model->run_query("SELECT his_study.* , proof.proof_name FROM his_study LEFT JOIN proof ON his_study.proof_id = proof.id WHERE his_study.resume_id = '$id'");
$data['job'] = $this->base_model->get_data('his_job' , '*' , 'result' , array('resume_id'=> $id));
$data['skill'] = 	$this->base_model->get_data('skill' , '*' , 'result' , array('resume_id'=> $id));
$pro = $this->base_model->get_data('employer' , 'fullname , co_name , co_web , co_pic , explain , place_id , field_id' , 'row' , array('id'=>$employer_id));
$percent = 0;
if($pro->fullname != ''){ $percent += 15; }
if($pro->co_name != ''){ $percent += 15; }
if($pro->co_web != ''){ $percent += 10; }
if($pro->co_pic != 'default.png'){ $percent += 15; }
if($pro->explain != ''){ $percent += 15; }
if($pro->place_id != 0){ $percent += 15; }
if($pro->field_id != 0){ $percent += 15; }
$data['percent'] = $percent;
$header['title'] = ' رزومه | هزارکاره ';
$header['active'] = 'jobs';
$this->load->view('header' , $header);
$this->load->view('employer/header' , $data);
$this->load->view('applicant/resume');
$this->load->view('employer/footer');
$this->load->view('footer');
    }
}
?>
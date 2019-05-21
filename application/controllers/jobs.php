<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobs extends CI_Controller {

    public function index()
    {
        $header['title'] = 'کارها';
        $header['active'] = 'jobs';
        $this->load->view('header', $header);
        $this->load->view('jobs/jobs');
        $this->load->view('footer');
    }
    public function detail(){
        $id = $this->uri->segment(3);
        if(isset($id) and is_numeric($id)){
            if($this->session->has_userdata('e_login') and $this->session->userdata('e_login') == TRUE){
                 $where = "where job.id = '$id' ";
            }else{
               $where = "where job.id = '$id' AND job.pub = 1 ";
            }
            $data['job'] = $this->base_model->run_query("SELECT job.title , job.id , job.employer_id ,employer.explain as ex ,employer.co_web , employer.co_name , employer.co_pic ,  field.name , place.state , place.city , assist.assist_name , experience.exp_name , sex.sex_name , salary.salary_name , proof.proof_name , soldier.soldier_name ,job.explain ,job.benefit FROM job LEFT JOIN field ON job.field_id = field.id LEFT JOIN place ON job.place_id = place.id LEFT JOIN assist ON job.assist_id = assist.id LEFT JOIN experience ON job.exp_id = experience.id LEFT JOIN sex ON job.sex_id = sex.id LEFT JOIN salary ON job.salary_id = salary.id LEFT JOIN soldier ON job.soldier_id = soldier.id LEFT JOIN proof ON job.proof_id = proof.id LEFT JOIN employer ON job.employer_id = employer.id $where " , 'row');
            if(empty($data['job'])){
                show_404();
            }
            $data['bookmark'] = 0;
            $data['sent'] = 0;            
            if($this->session->has_userdata('a_id')){
             $check = $this->base_model->get_data('bookmark' , 'id' , 'row' , array('job_id'=>$id , 'applicant_id'=>$this->session->userdata('a_id')));
             $sent = $this->base_model->get_data('sent' , 'id' , 'row' , array('job_id'=>$id , 'applicant_id'=>$this->session->userdata('a_id')));
             if(!empty($sent)){
                 $data['sent'] = 1;
             }
             if(!empty($check)){
                 $data['bookmark'] = 1;
             }
            }
            $header['title'] = $data['job']->title." | هزار کاره";
            $header['active'] = 'jobs';
            $this->load->view('header', $header);
            $this->load->view('jobs/details' , $data);
            $this->load->view('footer');
        }else{
            show_404();
        }
    }
    function bookmark(){
        if(!$this->session->has_userdata('a_login') or $this->session->userdata('a_login') != TRUE){
            $message['msg'][0] = 'ابتدا باید وارد حساب کاربری خود شوید';
            $message['msg'][1] = 'info2';
            $this->session->set_flashdata($message);
            redirect('login/employer');
        }
        $job_id = $this->input->post('job_id');
        $user_id = $this->session->userdata('a_id');
        if(isset($job_id) and is_numeric($job_id)){
           $check = $this->base_model->get_data('bookmark' , 'id' , 'row' , array('job_id'=>$job_id , 'applicant_id'=>$user_id));
           if(empty($check)){
               $data['job_id'] = $job_id;
               $data['applicant_id'] = $user_id;
               $this->base_model->insert('bookmark' , $data);
               echo 1; 
           }else{
               $this->base_model->delete('bookmark' , array('id'=>$check->id));
               echo 2;
           }
        }else{
            show_404();
        }
    }
    function sent(){
        if(!$this->session->has_userdata('a_login') or $this->session->userdata('a_login') != TRUE){
            $message['msg'][0] = 'ابتدا باید وارد حساب کاربری خود شوید';
            $message['msg'][1] = 'info2';
            $this->session->set_flashdata($message);
            redirect('login/employer');
        }
        $job_id = $this->input->post('job_id');
        $user_id = $this->session->userdata('a_id');
        $emp = $this->input->post('emp');
        if(isset($job_id) and is_numeric($job_id)){
           $resume = $this->base_model->get_data('resume' , 'id' , 'row' , array('applicant_id'=>$user_id));
           if(empty($resume)){
               echo 0; 
           }else{
               $check = $this->base_model->get_data('sent' , 'id' , 'row' , array('job_id'=>$job_id , 'applicant_id'=>$user_id));
               if(empty($check)){
                   $data['job_id'] = $job_id;
                   $data['resume_id'] = $resume->id;
                   $data['applicant_id'] = $user_id;
                   $data['employer_id'] = $emp;
                   $this->base_model->insert('sent' , $data);
                   echo 1;
               }else{
                $this->base_model->delete('sent' , array('id'=>$check->id));
                echo 2;
               }
           }
        }else{
            show_404();
        }
    }

}

/* End of file Blog.php */
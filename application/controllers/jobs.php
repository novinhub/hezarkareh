<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class jobs extends CI_Controller {

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
            $data['job'] = $this->base_model->run_query("SELECT job.title , employer.co_name , employer.co_pic ,  field.name , place.state , place.city , assist.assist_name , experience.exp_name , sex.sex_name , salary.salary_name , proof.proof_name , soldier.soldier_name ,job.explain ,job.benefit FROM job LEFT JOIN field ON job.field_id = field.id LEFT JOIN place ON job.place_id = place.id LEFT JOIN assist ON job.assist_id = assist.id LEFT JOIN experience ON job.exp_id = experience.id LEFT JOIN sex ON job.sex_id = sex.id LEFT JOIN salary ON job.salary_id = salary.id LEFT JOIN soldier ON job.soldier_id = soldier.id LEFT JOIN proof ON job.proof_id = proof.id LEFT JOIN employer ON job.employer_id = employer.id $where " , 'row');
            if(empty($data['job'])){
                show_404();
            }
            $header['title'] = 'کارها';
            $header['active'] = 'jobs';
            $this->load->view('header', $header);
            $this->load->view('jobs/details' , $data);
            $this->load->view('footer');
        }else{
            show_404();
        }
    }

}

/* End of file Blog.php */
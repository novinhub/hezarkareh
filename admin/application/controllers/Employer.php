<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Employer extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
    }

    public function arshive(){
        $this->load->view('header');
        $this->load->view('employer/arshive');
        $this->load->view('footer');

    }
    public function edit(){
        $this->load->view('header');
        $this->load->view('employer/edit');
        $this->load->view('footer');

    }
    public function employer_jobs(){
        $this->load->view('header');
        $this->load->view('employer/employer_jobs');
        $this->load->view('footer');

    }
	    public function jobs(){
        $this->load->view('header');
        $this->load->view('employer/jobs');
        $this->load->view('footer');

    }
		    public function unspecified_jobs(){
        $this->load->view('header');
        $this->load->view('employer/unspecified_jobs');
        $this->load->view('footer');

    }

}

/* End of file Home.php */

?>
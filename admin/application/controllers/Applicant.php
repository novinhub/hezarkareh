<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Applicant extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
    }

    public function archive(){
        $this->load->view('header');
        $this->load->view('applicant/archive');
        $this->load->view('footer');

    }
    public function resume(){
        $this->load->view('header');
        $this->load->view('applicant/resume');
        $this->load->view('footer');

    }

}

/* End of file Home.php */

?>
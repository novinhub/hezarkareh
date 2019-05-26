<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Forget extends CI_Controller {

    public function __construct(){
        parent::__construct();
    }

    public function employer(){
        $header['title'] = 'فراموشی کلمه عبور | هزارکاره';
        $this->load->view('header' , $header);
        $this->load->view('forget/employer');
        $this->load->view('footer');
    }
    public function applicant(){
        $header['title'] = 'فراموشی کلمه عبور | هزار کاره';
        $this->load->view('header' , $header);
        $this->load->view('forget/applicant');
        $this->load->view('footer');
    }


}

/* End of file Forget.php */

?>
<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class test extends CI_Controller {

    public function index()
    {
        $header['title'] = 'تست خودشناسی';
        $header['active'] = 'test';
        $this->load->view('header', $header);
        $this->load->view('test/test');
        $this->load->view('footer');
        
        
        
    }

}

/* End of file Controllername.php */

?>
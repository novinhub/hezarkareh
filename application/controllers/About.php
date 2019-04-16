<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

    public function index()
    {
        $header['title'] = 'درباره ما';
        $header['active'] = 'about';
        $this->load->view('header', $header);
        $this->load->view('about/about');
        $this->load->view('footer');
        
        
        
    }

}

/* End of file Controllername.php */

?>
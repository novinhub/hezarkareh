<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

    public function index()
    {
        $header['title'] = 'وبلاگ';
        $header['active'] = 'about';
        $this->load->view('header', $header);
        $this->load->view('blog/blog');
        $this->load->view('footer');
    }

}

/* End of file Blog.php */
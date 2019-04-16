
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

}

/* End of file Blog.php */
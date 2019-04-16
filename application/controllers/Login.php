<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function employer()
    {
        $header['title'] = 'ورود و ثبت نام کارفرما';
        $header['active'] = 'about';
        $this->load->view('header', $header);
        $this->load->view('login/employer');
        $this->load->view('footer');
    }
    public function candidates()
    {
        $header['title'] = 'ورود و ثبت نام کارجو';
        $header['active'] = 'about';
        $this->load->view('header', $header);
        $this->load->view('login/candidates');
        $this->load->view('footer');
    }
}

/* End of file Employer_login.php */

?>
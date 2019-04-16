<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

    public function index()
    {
        $header['title'] = 'تماس با ما';
        $header['active'] = 'contact';
        $this->load->view('header', $header);
        $this->load->view('contact/contact');
        $this->load->view('footer');
    }

}

/* End of file Contact.php */

?>
<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    
    function __construct(){
        parent :: __construct();
        $this->load->library('form_validation');
        $this->load->library('Convertdate');
    }
    //login
    public function employer(){
        if($this->session->has_userdata('e_login') and $this->session->userdata('e_login') == TRUE){
            redirect('employer');
        }
        if($this->session->has_userdata('a_login') or $this->session->userdata('a_login') == TRUE){
            redirect('home');
        }
        if(isset($_POST['sub'])){
            $this->form_validation->set_rules('username' , 'username' , 'required|max_length[100]');
			$this->form_validation->set_rules('password','password' , 'required|max_length[100]');
			if($this->form_validation->run() == FALSE){
				$message['msg'][0] = "لطفا اطلاعات خواسته شده را وارد کنید";
				$message['msg'][1] = 'danger2';
				$this->session->set_flashdata($message);
				redirect('login/employer');
			}else{
                $username = $this->db->escape_str($this->input->post('username'));
                $password = $this->db->escape_str($this->input->post('password'));
                $username = trim($username , ' ');
                $check = $this->base_model->get_data('employer' , 'id , username , tel_number , password , co_name , co_pic , credit ' , 'row' , array('username'=>$username));
                if(empty($check)){
                    $message['msg'][0] = " نام کاربری به اسم  ".$username." وجود ندارد ";
                    $message['msg'][1] = 'danger2';
                    $this->session->set_flashdata($message);
                    redirect('login/employer');
                }else if(!password_verify($password , $check->password)){
					$message['msg'][0] = ' رمز عبور اشتباه می باشد';
					$message['msg'][1] = 'danger2';
					$this->session->set_flashdata($message);
					redirect('login/employer');
				}else{
                    $date = $this->convertdate->convert(time());
                    $data['date_log'] = $date['d'];
                    $data['time_log'] = $date['t'];
                    $this->base_model->update('employer' , $data , array('id'=> $check->id));
                    $sess['id'] = $check->id;
                    $sess['username'] = $check->username;
                    $sess['tel_number'] = $check->tel_number;
                    $sess['co_name'] = $check->co_name;
                    $sess['co_pic'] = $check->co_pic;
                    $sess['credit'] = $check->credit;
                    $sess['e_login'] = TRUE;
                    $this->session->set_userdata($sess);
                    redirect('employer');
                }
            }
        }else{
            $header['title'] = 'ورود کارفرما | هزارکاره';
            $this->load->view('header', $header);
            $this->load->view('login/employer');
            $this->load->view('footer');
        }
    }
    //employer
    //applicant
    public function applicant(){
        if($this->session->has_userdata('a_login') and $this->session->userdata('a_login')){
            redirect('applicant');
        }
        if($this->session->has_userdata('e_login') or $this->session->userdata('e_login')){
            redirect('home');
        }
        if(isset($_POST['sub'])){
            $this->form_validation->set_rules('username' , 'username' , 'required|max_length[100]');
			$this->form_validation->set_rules('password','password' , 'required|max_length[100]');
			if($this->form_validation->run() == FALSE){
				$message['msg'][0] = "لطفا اطلاعات خواسته شده را وارد کنید";
				$message['msg'][1] = 'danger2';
				$this->session->set_flashdata($message);
				redirect('login/applicant');
			}else{
                $username = $this->db->escape_str($this->input->post('username'));
                $username = trim($username , ' ');
                $password = $this->db->escape_str($this->input->post('password'));
                $check = $this->base_model->get_data('applicant' , 'id , tel_number ,  username , pic_name , password , add_resume , edit_resume' , 'row' , array('username'=>$username));
                if(empty($check)){
                    $message['msg'][0] = " نام کاربری به اسم  ".$username." وجود ندارد ";
                    $message['msg'][1] = 'danger2';
                    $this->session->set_flashdata($message);
                    redirect('login/applicant');
                }else if(!password_verify($password , $check->password)){
					$message['msg'][0] = ' رمز عبور اشتباه می باشد';
					$message['msg'][1] = 'danger2';
					$this->session->set_flashdata($message);
					redirect('login/applicant');
				}else{
                    $date = $this->convertdate->convert(time());
                    $data['date_log'] = $date['d'];
                    $data['time_log'] = $date['t'];
                    $this->base_model->update('applicant' , $data , array('id'=> $check->id));
                    $sess['a_id'] = $check->id;
                    $sess['a_tel'] = $check->tel_number;
                    $sess['a_username'] = $check->username;
                    $sess['add_resume'] = $check->add_resume;
                    $sess['edit_resume'] = $check->edit_resume;
                    $sess['a_login'] = TRUE;
                    $sess['pic_seeker'] = $check->pic_name;
                    $this->session->set_userdata($sess);
                    redirect('applicant');
                } 
            }
        }else{
            $header['title'] = 'ورود کارجو | هزارکاره';
            $this->load->view('header', $header);
            $this->load->view('login/applicant');
            $this->load->view('footer');
        }
    }
}

/* End of file Employer_login.php */

?>
<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {
    
    function __construct(){
        parent :: __construct();
        $this->load->library('form_validation');
        $this->load->library('Convertdate');
    }
    public function employer(){
        if($this->session->has_userdata('e_login') and $this->session->userdata('e_login') == TRUE){
            redirect('employer');
        }
        if($this->session->has_userdata('a_login') or $this->session->userdata('a_login') == TRUE){
            redirect('home');
        }
        if(isset($_POST['sub'])){
            $this->form_validation->set_rules('tel' , 'tel' , 'required|max_length[11]|numeric');
			$this->form_validation->set_rules('username' , 'username' , 'required|max_length[100]');
			$this->form_validation->set_rules('password','password' , 'required|max_length[100]');
			if($this->form_validation->run() == FALSE){
				$message['msg'][0] = "لطفا اطلاعات خواسته شده را وارد کنید";
				$message['msg'][1] = 'danger2';
				$this->session->set_flashdata($message);
				redirect('signup/employer');
			}else{
                $name = trim($this->input->post('username') ,  ' ');
                $tel = $this->input->post('tel');
                $check = $this->base_model->get_data('employer' , 'username , tel_number' , 'row' , "username = '$name' OR tel_number = '$tel'");
                if(!empty($check)){
                    $msg = '';
                    if($check->username == $name){
                       $msg = ' از نام کاربری  '.$name." قبلا استفاده شده است . لطفا نام دیگری را انتخاب کنید ";
                    }else if($check->tel_number == $tel){
                        $msg = ' شماره تلفن '.$tel." قبلا استفاده شده است . لطفا شماره دیگری وارد کنید ";
                    }
                    $message['msg'][0] = $msg;
                    $message['msg'][1] = 'danger2';
                    $this->session->set_flashdata($message);
                    redirect('signup/employer');
                }else{
                    $date = $this->convertdate->convert(time());
                    $pass = $this->input->post('password');
                    $data['username'] = $name;
                    $data['tel_number'] = $tel;
                    $data['password'] = password_hash($pass, PASSWORD_DEFAULT);
                    $data['fullname'] = '';
                    $data['co_name'] = '';
                    $data['co_web'] = '';
                    $data['co_pic'] = 'default.png';
                    $data['explain'] = '';
                    $data['date_sign'] = $date['d'];
                    $data['date_log'] = $date['d'];
                    $data['time_log'] = $date['t'];
                    $data['place_id'] = '';
                    $data['field_id'] = '';
                    $data['credit'] = 10;
                    $res = $this->base_model->insert('employer' , $data);
                    if($res == FALSE){
                        $message['msg'][0] = "مشکلی در ثبت اطلاعات رخ داده است . لطفا دوباره سعی کنید";
                        $message['msg'][1] = 'info2';
                        $this->session->set_flashdata($message);
                        redirect('signup/employer');
                    }else{   
                    $sess['id'] = $res;
                    $sess['username'] = $data['username'];
                    $sess['tel_number'] = $data['tel_number'];
                    $sess['co_name'] = $data['co_name'];
                    $sess['co_pic'] = $data['co_pic'];
                    $sess['credit'] = $data['credit'];
                    $sess['e_login'] = TRUE;
                    $this->session->set_userdata($sess);
                    $message['msg'][0] = " در این قسمت اطلاعات مربوط به پروفایل خود را تکمیل کنید ";
                    $message['msg'][1] = 'info2';
                    $this->session->set_flashdata($message);
                    redirect("employer/edit");
                    }
                }
            }
        }else{
            $header['title'] = 'ورود و ثبت نام کارفرما';
            $this->load->view('header', $header);
            $this->load->view('signup/employer');
            $this->load->view('footer');
        }
    }
    public function applicant(){
        if($this->session->has_userdata('a_login') and $this->session->userdata('a_login')){
            redirect('applicant');
        }
        if($this->session->has_userdata('e_login') or $this->session->userdata('e_login')){
            redirect('home');
        }
        if(isset($_POST['sub'])){
            $this->form_validation->set_rules('tel' , 'tel' , 'required|max_length[11]|numeric');
			$this->form_validation->set_rules('username' , 'username' , 'required|max_length[100]');
			$this->form_validation->set_rules('password','password' , 'required|max_length[100]');
			if($this->form_validation->run() == FALSE){
				$message['msg'][0] = "لطفا اطلاعات خواسته شده را وارد کنید";
				$message['msg'][1] = 'danger2';
				$this->session->set_flashdata($message);
				redirect('signup/applicant');
			}else{
                $name = $this->db->escape_str($this->input->post('username'));
                $name = trim($name ,  ' ');
                $tel = $this->input->post('tel');
                $check = $this->base_model->get_data('applicant' , 'username , tel_number' , 'row' , "username = '$name' OR tel_number = '$tel'");
                if(!empty($check)){
                    $msg = '';
                    if($check->username == $name){
                       $msg = ' از نام کاربری  '.$name." قبلا استفاده شده است . لطفا نام دیگری را انتخاب کنید ";
                    }else if($check->tel_number == $tel){
                        $msg = ' شماره تلفن '.$tel." قبلا استفاده شده است . لطفا شماره دیگری وارد کنید ";
                    }
                    $message['msg'][0] = $msg;
                    $message['msg'][1] = 'danger2';
                    $this->session->set_flashdata($message);
                    redirect('signup/applicant');
                }else{
                    $date = $this->convertdate->convert(time());
                    $pass = $this->input->post('password');
                    $data['username'] = $name;
                    $data['tel_number'] = $tel;
                    $data['password'] = password_hash($pass, PASSWORD_DEFAULT);
                    $data['pic_name'] = 'default.png';
                    $data['date_sign'] = $date['d'];
                    $data['date_log'] = $date['d'];
                    $data['time_log'] = $date['t'];
                    $data['add_resume'] = 1;
                    $data['edit_resume'] = 0;
                    $res = $this->base_model->insert('applicant' , $data);
                    if($res == FALSE){
                        $message['msg'][0] = "مشکلی در ثبت اطلاعات رخ داده است . لطفا دوباره سعی کنید";
                        $message['msg'][1] = 'info2';
                        $this->session->set_flashdata($message);
                        redirect('signup/applicant');
                    }else{   
                    $sess['a_id'] = $res;
                    $sess['a_tel'] = $data['tel_number'];
                    $sess['a_username'] = $data['username'];
                    $sess['pic_seeker'] = $data['pic_name'];
                    $sess['add_resume'] = $data['add_resume'];
                    $sess['edit_resume'] = $data['edit_resume'];
                    $sess['a_login'] = TRUE;
                    $this->session->set_userdata($sess);
                    redirect("applicant");
                    }
                }
            }

        }else{
            $header['title'] = 'ورود و ثبت نام کارجو';
            $this->load->view('header', $header);
            $this->load->view('signup/applicant');
            $this->load->view('footer');
        }
    }

}
?>
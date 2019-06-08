<?php 
class Check{
	public function my_hook(){
        $CI =& get_instance();
        if($CI->uri->segment(1) == '' or $CI->uri->segment(1) == 'home'){
        $CI->load->library('Convertdate');
        $date = $CI->convertdate->convert(time());
        $d = $date['d'];
        $t = $date['t'];
        $jobs = $CI->base_model->run_query("SELECT id , expire_time , expire FROM job WHERE expire <= '$d' AND pub = 1 AND exp = 0" , 'result');
        if(!empty($jobs)){
            $update = array();
            foreach($jobs as $row){
                if($row->expire_time < $t or $row->expire < $d){
                 $update[] = array(
                     'id'=>$row->id ,
                     'pub'=>0,
                     'exp'=>1
                 );
                }
            }
            if(!empty($update)){
                $CI->base_model->update_batch('job' , $update , 'id');
            }
        }
        $ip = $CI->input->ip_address();
        $check = $CI->base_model->get_data('visit' , 'id , visit' , 'row' , array('ip'=>$ip , 'date_visit'=>$d));
        if(empty($check)){
            $data['ip'] = $ip;
            $data['date_visit'] = $d;
            $data['visit'] = 1;
            $CI->base_model->insert('visit' , $data);
        }else{
           $CI->base_model->set('visit' , 'visit + 1' , array('id'=>$check->id) , 'visit');
        }
    }
}
}
?>
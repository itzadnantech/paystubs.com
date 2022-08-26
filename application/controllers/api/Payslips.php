<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Payslips extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

       $this->load->model('mypaystub_model');
    }

    public function index(){
      
    }
    
    public function list_post(){
        
        $response = [
                'code' => 1, 
                'message' => 'Something went wrong. Please try again.',
        ];
        
        $user_id =  $this->post('user_id');
        $app_name =  $this->post('app_name');

        if(empty($user_id) ){
            $response = [
                'code' => 1, 
                'message' => "User id must not be empty."
            ];
            return $this->set_response($response, REST_Controller::HTTP_OK);
        }
        
        if(empty($app_name) ){
            $response = [
                'code' => 1, 
                'message' => "App name must not be empty."
            ];
            return $this->set_response($response, REST_Controller::HTTP_OK);
        }
        
        if(empty($user_id) ){
            $response = [
                'code' => 1, 
                'message' => "User id must not be empty."
            ];
            return $this->set_response($response, REST_Controller::HTTP_OK);
        }
  
        $sql = "SELECT id,active FROM users WHERE id = ?";
        
        $query = $this->db->query($sql, array($user_id));
        
        $userdata = $query->result();
        
        if(empty($userdata) || (isset($userdata[0]) && $userdata[0]->id != $user_id )){
            $response = [
                'code' => 1, 
                'message' => 'Invalid user reference.',
            ];
            return $this->set_response($response, REST_Controller::HTTP_OK);
        }
        
        //$sql = "SELECT id,pdf_name,created FROM my_payslips WHERE user_id = ? AND app_name = ? order by id DESC";
        
        $sql = "SELECT id,pdf_name,created FROM my_payslips WHERE user_id = ? order by id DESC";
        
        $query = $this->db->query($sql, array($user_id));
        $lists = $query->result();
 
        if(!empty($lists) && count($lists) > 0 ){
           
            foreach($lists as $k =>  &$payslip){
                $payslip->url = "";
                if (file_exists(FCPATH . "assets/payslips/".$payslip->pdf_name)) {
                    $payslip->url = base_url() . "assets/payslips/" . $payslip->pdf_name;
                    
                }else{
                    unset($lists[$k]);
                }
            }
            
        }
        
        $response = [
            'code' => 0, 
            'message' => 'Successful.',
            'list' => $lists
        ];
    
        $this->set_response($response, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code

    }
    
    public function create_post(){
        
        $response = [
                'code' => 1, 
                'message' => 'Something went wrong. Please try again.',
        ];
        
        $user_id =  $this->post('user_id');
        $app_name =  $this->post('app_name');
        
        if(!isset($_FILES['payslip']) || empty($_FILES['payslip'])){
            $response = [
                'code' => 1, 
                'message' => "Please select payslip."
            ];
            return $this->set_response($response, REST_Controller::HTTP_OK);
        }
        
        if(empty($user_id) ){
            $response = [
                'code' => 1, 
                'message' => "User id must not be empty."
            ];
            return $this->set_response($response, REST_Controller::HTTP_OK);
        }
        
        if(empty($app_name) ){
            $response = [
                'code' => 1, 
                'message' => "App name must not be empty."
            ];
            return $this->set_response($response, REST_Controller::HTTP_OK);
        }
        
        $sql = "SELECT id,active FROM users WHERE id = ?";
        
        $query = $this->db->query($sql, array($user_id));
        
        $userdata = $query->result();
        
        if(empty($userdata) || (isset($userdata[0]) && $userdata[0]->id != $user_id )){
            $response = [
                'code' => 1, 
                'message' => 'Invalid user reference.',
            ];
            return $this->set_response($response, REST_Controller::HTTP_OK);
        }

        $file_name = strtotime('now').rand(11111,99999);
        
        $config['upload_path']          = FCPATH.'assets/payslips/';
        $config['allowed_types']        = 'application/pdf|pdf';
        $config['file_name']            = $file_name;
        
        $this->load->library('upload', $config);
                
                
        if ( ! $this->upload->do_upload('payslip'))
        {
            $error =  strip_tags($this->upload->display_errors());
            $response = ['code' => 1, 'message' => $error];
            
    
        }else{
            
            $data = $this->upload->data();
            $filename = $data['file_name'];
            
            $cols = array('user_id' => $user_id, 'pdf_name' => $filename, 'app_name' => $app_name);
            
            // Insert into table.
            $this->db->insert('my_payslips', $cols);
            
            $url  = base_url() . "assets/payslips/" . $filename;
            $response = ['code' => 0, 'message' => 'Successful','url'=>$url];
        }
                
        return $this->set_response($response, REST_Controller::HTTP_OK);    
     

    }
    
    public function delete_post(){
        
        $response = [
                'code' => 1, 
                'message' => 'Something went wrong. Please try again.',
        ];
        
        $user_id =  $this->post('user_id');
        $app_name =  $this->post('app_name');
        $payslip_id =  $this->post('payslip_id');

        if(empty($user_id) ){
            $response = [
                'code' => 1, 
                'message' => "User id must not be empty."
            ];
            return $this->set_response($response, REST_Controller::HTTP_OK);
        }
        
        /*if(empty($app_name) ){
            $response = [
                'code' => 1, 
                'message' => "App name must not be empty."
            ];
            return $this->set_response($response, REST_Controller::HTTP_OK);
        }*/
        
        if(empty($payslip_id) ){
            $response = [
                'code' => 1, 
                'message' => "Payslip id must not be empty."
            ];
            return $this->set_response($response, REST_Controller::HTTP_OK);
        }
  
        $sql = "SELECT id,active FROM users WHERE id = ?";
        
        $query = $this->db->query($sql, array($user_id));
        
        $userdata = $query->result();
        
        if(empty($userdata) || (isset($userdata[0]) && $userdata[0]->id != $user_id )){
            $response = [
                'code' => 1, 
                'message' => 'Invalid user reference.',
            ];
            return $this->set_response($response, REST_Controller::HTTP_OK);
        }
        
        // validate Payslip
        //$sql = "SELECT id,pdf_name FROM my_payslips WHERE id = ? AND user_id = ? AND app_name = ?";
        
        $sql = "SELECT id,pdf_name FROM my_payslips WHERE id = ? AND user_id = ?";
        
        $query = $this->db->query($sql, array($payslip_id,$user_id));
        $payslip = $query->result();
        
        if(empty($payslip) || (!isset($payslip[0]))){
            $response = [
                'code' => 1, 
                'message' => 'Invalid payslip reference.',
            ];
            return $this->set_response($response, REST_Controller::HTTP_OK);
        }
        
        // delete from database.
        if( $this->db->delete('my_payslips', array('id' => $payslip_id))){
            
            $file = FCPATH . "assets/payslips/".$payslip[0]->pdf_name;
            if (file_exists($file)) {
                unlink($file);
            }
        }
        
        $response = [
            'code' => 0, 
            'message' => 'Successful.',
        ];
    
        $this->set_response($response, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code

    }

   
}

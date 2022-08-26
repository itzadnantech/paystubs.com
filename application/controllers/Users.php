<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . 'libraries/REST_Controller.php';


class Users extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
       
    }
    
    public function login_post(){
        
        /* $auth = $this->validate_basic_auth(true);
        if($auth == false){
            
            
                 $response = [
                            'code' => REST_Controller::HTTP_UNAUTHORIZED, 
                            'message' => 'Authorization Required.'
                        ];
            
            return $this->set_response($response, REST_Controller::HTTP_UNAUTHORIZED);
        }*/
        
        if ($this->post('email') && $this->post('password')) {
            
            $email = $this->post('email');
            $sql = "SELECT * FROM `users` WHERE email = ?";
            $query = $this->db->query($sql, array($email));
            $user_email = $query->result();
            
            if(empty($user_email)){
                
                $response = [
                            'code' => 1, 
                            'message' => 'User with this email does not exists.'
                        ];

                return $this->set_response($response, REST_Controller::HTTP_CREATED);    
            }
            
            $remember = FALSE;
            $identity_column = $this->config->item('identity', 'ion_auth');
            $this->data['identity_column'] = $identity_column;
            $user = $this->ion_auth->login($this->post('email'), $this->post('password'), $remember);
            if($user){
                
                $app_name = $this->post('app_name');
                
                /*if(!empty($app_name)){
                    
                    $sql = "SELECT * FROM `users_info` WHERE user_id = ? AND LOWER(app_name) = ?";
                    $query = $this->db->query($sql, array($user->id,strtolower($app_name)));
                    $user_info = $query->result();
                    if(empty($user_info)){
                        
                        $response = [
                            'code' => 1, 
                            'message' => 'Invalid email or password.'
                        ];

                        return $this->set_response($response, REST_Controller::HTTP_CREATED);
                    }
                   
                }*/
                
                $response = [
                    
                    'code' => 0, 
                    'message' => 'Successful.',
                    'email' => $user->email,
                    'id' => $user->id,
                    'active' => $user->active,
                    'first_name' => $user->first_name,
                    'last_name' => $user->last_name,
                    'activation_code' => ($user->activation_code == NULL) ? "" : $user->activation_code
                    
                ];
    
               return $this->set_response($response, REST_Controller::HTTP_CREATED);
                
            }
        }
        
        
        $response = [
            'code' => 1, 
            'message' => 'Invalid email or password.'
        ];

        return  $this->set_response($response, REST_Controller::HTTP_CREATED);
        
    }
    
    public function signup_post(){
        
        $email = strtolower($this->post('email'));
        $password =  $this->post('password');
        $first_name =  trim($this->post('first_name'));
        $last_name =  trim($this->post('last_name'));
        $device_type =  trim($this->post('device_type'));
        $app_name =  trim($this->post('app_name'));
        $push_id =  trim($this->post('push_id'));
        $company =  '';
        $phone =  '';
        
        if (empty($email)) {
            
            $response = [
                'code' => 1, 
                'message' => "Email must not be empty."
            ];
            
            return $this->set_response($response, REST_Controller::HTTP_CREATED);
        }
        
        if (empty($device_type)) {
            
            $response = [
                'code' => 1, 
                'message' => "Device Type must not be empty."
            ];
            
            return $this->set_response($response, REST_Controller::HTTP_CREATED);
        }
        
        if (empty($app_name)) {
            
            $response = [
                'code' => 1, 
                'message' => "App Name must not be empty."
            ];
            
            return $this->set_response($response, REST_Controller::HTTP_CREATED);
        }
        
        if (empty($password)) {
            
            $response = [
                'code' => 1, 
                'message' => "Password must not be empty."
            ];
            
            return $this->set_response($response, REST_Controller::HTTP_CREATED);
        }
        
        if (empty($first_name)) {
            
            $response = [
                'code' => 1, 
                'message' => "First name must not be empty."
            ];
            
            return $this->set_response($response, REST_Controller::HTTP_CREATED);
        }
        
        if (empty($last_name)) {
            
            $response = [
                'code' => 1, 
                'message' => "Last name must not be empty."
            ];
            
            return $this->set_response($response, REST_Controller::HTTP_CREATED);
        }
        
        if (strlen($password) < 8 ) {
            
            $response = [
                'code' => 1, 
                'message' => "Password must at least 8 character long."
            ];
            
            return $this->set_response($response, REST_Controller::HTTP_CREATED);
        }
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            
            $response = [
                'code' => 1, 
                'message' => 'Email should be a valid email.'
            ];
            
            return $this->set_response($response, REST_Controller::HTTP_CREATED);
        }
        
        $tables = $this->config->item('tables', 'ion_auth');
        $identity_column = $this->config->item('identity', 'ion_auth');
        $this->data['identity_column'] = $identity_column;
        $identity = $email;
        
        $additional_data = array(
                'first_name' => $first_name,
                'last_name' => $last_name,
                'company' => $company,
                'phone' => $phone
        );
        
        if($this->ion_auth->username_check($identity)){
            
            $response = [
                'code' => 1, 
                'message' => 'Email address already exists.'
            ];
            
            return $this->set_response($response, REST_Controller::HTTP_CREATED);   
        }
        
        if ( $this->ion_auth->register($identity, $password, $email, $additional_data)) {
                
            $user = $this->ion_auth->login($email, $password, false);
            if($user){
                
                $push_id = ($push_id) ? $push_id : '';
                $device_type = ($device_type) ? $device_type : '';
                $app_name = ($app_name) ? $app_name : '';
                
                $datas = array('user_id' => $user->id, 'device_type' => $device_type, 'push_id' => $push_id,'app_name'=>$app_name);

                $str = $this->db->insert('users_info', $datas);
                
                $response = [
                    'code' => 0, 
                    'message' => 'Successful.',
                    'email' => $user->email,
                    'id' => $user->id,
                    'active' => $user->active,
                    'first_name' => $user->first_name,
                    'last_name' => $user->last_name,
                    'activation_code' => $user->activation_code,
                    'device_type' => $device_type,
                    'app_name' => $app_name
                ];

               return $this->set_response($response, REST_Controller::HTTP_CREATED);
            
            }
            
        }
    
        $response = [
            'code' => 1, 
            'message' => 'Something went wrong during the registration process.'
        ];

        return  $this->set_response($response, REST_Controller::HTTP_CREATED);
        
    }

   

}

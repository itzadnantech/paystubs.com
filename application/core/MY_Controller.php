<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->model('subscription_model');
        $this->load->model('admin_model');
        $sitename = $this->config->item('sitename');
        $this->data['sitename'] = $sitename;
        $this->sitename = $sitename;
        $this->user_id = $this->session->userdata('user_id');
        
        $this->captcha_key = $this->config->item('captcha_key');
        $this->data['captcha_key'] = $this->captcha_key;
        
        $this->upload_path = 'assets/uploads/';
        $this->thumbs_path = 'assets/uploads/thumbs/';
        $this->image_types = 'jpg|jpeg|png';
        
        $this->month_for_chart = 12;
        $this->data['month_for_chart'] = $this->month_for_chart;
        
        $this->offer_days = 1;
        $this->data['offer_days'] = $this->offer_days;
        
        $this->offer_count_for_reward = 2;
        $this->data['offer_count_for_reward'] = $this->offer_count_for_reward;
        
        $this->five_day_subscription_plan_id = 2;
        $this->data['five_day_subscription_plan_id'] = $this->five_day_subscription_plan_id;
        
        $this->userName = '';
        if($this->session->userdata('fname')) {
            $this->userName = $this->session->userdata('fname').' '.$this->session->userdata('lname');
        }
        $this->data['userName'] = $this->userName;
        
        $this->is_admin = $this->ion_auth->is_admin();
        $this->data['is_admin'] = $this->is_admin;
        
        $allGeoCodes = $this->admin_model->getAllGeoCodes();
        $this->allGeoCodes = $allGeoCodes;
        $this->data['allGeoCodes'] = $allGeoCodes;
        
        $allSubscriptionPlan = $this->subscription_model->getAllSubscription();
        $this->subscriptionPlans = $allSubscriptionPlan;
        $this->data['subscriptionPlans'] = $allSubscriptionPlan;
        
        $allPaystubCountries = $this->subscription_model->getAllPaystubCountries();
        $this->paystubCountries = $allPaystubCountries;
        $this->data['paystubCountries'] = $allPaystubCountries;
        
        $allCurrency = $this->subscription_model->getAllCurrency();
        $this->allCurrency = $allCurrency;
        $this->data['allCurrency'] = $allCurrency;
        
        $allColors = $this->subscription_model->getAllColors();
        $this->allColors = $allColors;
        $this->data['allColors'] = $allColors;
        
        $allTaxs = $this->subscription_model->getAllTax();
        $this->allTaxs = $allTaxs;
        $this->data['allTaxs'] = $allTaxs;
        $this->medicare = $allTaxs[0]->rate;
        $this->social_security = $allTaxs[1]->rate;
        $this->federal = $allTaxs[2]->rate;
        $this->SDI = $allTaxs[54]->rate;
        $this->FICAMED = $allTaxs[55]->rate;
        
        $settings = $this->admin_model->getSettings();
        $this->settings = $settings;
        $this->data['settings'] = $settings;
        
        $this->currency = $allCurrency[0]->symbol;
        
        $this->login = $this->ion_auth->logged_in();
        $this->data['login'] = $this->login;
        
        $this->class = strtolower($this->router->fetch_class());
        $this->method = strtolower($this->router->fetch_method());
        
        $this->data['class'] = $this->class;
        $this->data['method'] = $this->method;
        
        $watermark = 'Instant Paystub Generator';
        $subscribeWatermark = '';
        // $subscribeBtnClass = 'submit_form';
        $subscribeBtnClass = 'nosignup_submit_form';
        
        $nonSubscribeBtn = 'Preview It Now';
        if (!$this->ion_auth->logged_in()) {
            $nonSubscribeBtnClass = 'nosignup_submit_form';
        } else {
//            $nonSubscribeBtnClass = 'submit_form';
            $nonSubscribeBtnClass = 'nosignup_submit_form';
        }
        // $subscribeBtn = 'DOWNLOAD IT NOW';
        $subscribeBtn = 'Preview It Now';
        
        $this->watermark_info_msg = 'Water mark is removed after payment or offer completion';
        $this->data['watermark_info_msg'] = $this->watermark_info_msg;
        
        $userSubscription = $this->subscription_model->checkAssignedSubscription($this->user_id);
        if(!$userSubscription || empty($userSubscription) || $userSubscription == '') {
            $this->uk_watermark = $this->usa_watermark = $this->canada_watermark = $this->global_watermark = $watermark;
            $this->uk_btn_text = $this->usa_btn_text = $this->canada_btn_text = $this->global_btn_text = $nonSubscribeBtn;
            $this->uk_btn_class = $this->usa_btn_class = $this->canada_btn_class = $this->global_btn_class = $nonSubscribeBtnClass;
        } else {
            $global_subscribe = $usa_subscribe = $uk_subscribe = $canada_subscribe = false;
            foreach($userSubscription as $singleSubscription) {
                if($singleSubscription->paystub_country_id == 1) {
                    $global_subscribe = true;
                    $this->global_watermark = $subscribeWatermark;
                    $this->global_btn_text = $subscribeBtn;
                    $this->global_btn_class = $subscribeBtnClass;
                } else if($singleSubscription->paystub_country_id == 2) {
                    $usa_subscribe = true;
                    $this->usa_watermark = $subscribeWatermark;
                    $this->usa_btn_text = $subscribeBtn;
                    $this->usa_btn_class = $subscribeBtnClass;
                } else if($singleSubscription->paystub_country_id == 3) {
                    $uk_subscribe = true;
                    $this->uk_watermark = $subscribeWatermark;
                    $this->uk_btn_text = $subscribeBtn;
                    $this->uk_btn_class = $subscribeBtnClass;
                } else if($singleSubscription->paystub_country_id == 4) {
                    $canada_subscribe = true;
                    $this->canada_watermark = $subscribeWatermark;
                    $this->canada_btn_text = $subscribeBtn;
                    $this->canada_btn_class = $subscribeBtnClass;
                }
            }
            
            if(!$global_subscribe) {
                $this->global_watermark = $watermark;
                $this->global_btn_text = $nonSubscribeBtn;
                $this->global_btn_class = $nonSubscribeBtnClass;
            }
            if(!$usa_subscribe) {
                $this->usa_watermark = $watermark;
                $this->usa_btn_text = $nonSubscribeBtn;
                $this->usa_btn_class = $nonSubscribeBtnClass;
            }
            if(!$uk_subscribe) {
                $this->uk_watermark = $watermark;
                $this->uk_btn_text = $nonSubscribeBtn;
                $this->uk_btn_class = $nonSubscribeBtnClass;
            }
            if(!$canada_subscribe) {
                $this->canada_watermark = $watermark;
                $this->canada_btn_text = $nonSubscribeBtn;
                $this->canada_btn_class = $nonSubscribeBtnClass;
            }
        }
        
        
        $this->totalUSPayStub = 12;
    }

    /**
     * @param string     $view
     * @param array|null $data
     * @param bool       $returnhtml
     *
     * @return mixed
     */
    public function _render_page($view, $data = NULL, $returnhtml = FALSE) {
        //I think this makes more sense
        
        $this->viewdata['message'] = isset($data['message']) ? $data['message'] : $this->session->flashdata('message');
        
        $this->viewdata = (empty($data)) ? $this->data : $data;
        
        if($this->is_admin) {
            $this->load->view('admin_header', $this->viewdata);
            $view_html = $this->load->view($view, $this->viewdata, $returnhtml);
            $this->load->view('admin_footer', $this->viewdata);
        }else{
            $this->load->view('header', $this->viewdata);
            $view_html = $this->load->view($view, $this->viewdata, $returnhtml);
            $this->load->view('footer', $this->viewdata);
        }
        

        // This will return html on 3rd argument being true
        if ($returnhtml) {
            return $view_html;
        }
    }
    
    /**
     * SENDING PDF THROUGH EMAIL
     * @param type $id
     * @param type $to
     * @param type $cc
     * @param type $bcc
     * @param type $from_name
     * @param type $from
     * @param type $subject
     * @param type $note
     * @return boolean
     */
    function email($to, $cc = NULL, $bcc = NULL, $from_name, $from, $subject, $message = NULL, $attachment) {

        $this->load->library('email');
        
        if(ENVIRONMENT == 'production') {
            $config['useragent'] = "Paystub";
            $config['protocol'] = 'mail';
            $config['mailtype'] = "html";
            $config['crlf'] = "\r\n";
            $config['newline'] = "\r\n";
            $config['mailpath'] = "/usr/sbin/sendmail";
        } else {
            $config = $this->config->item('email_config', 'ion_auth');
        }
        $config['wordwrap'] = TRUE;

        $this->email->initialize($config);
        
        if($from && $from_name) {
            $this->email->from($from, $from_name);
        } else {
            $this->email->from($this->config->item('from_email', 'ion_auth'), $this->config->item('site_title', 'ion_auth'));
        }
        if($to) {
            $this->email->to($to);
        }
        if ($cc) {
            $this->email->cc($cc);
        }
        if ($bcc) {
            $this->email->bcc($bcc);
        }

        $this->email->subject($subject);
        $this->email->message($message);
        if($attachment) {
            $this->email->attach($attachment);
        }
        // echo "<pre>";
        
        // print_r($this->email);
        if ($this->email->send()) {
            // email sent		
            if($attachment) {
                unlink($attachment);
            }
            return true;
        } else {
            //email not sent
            if($attachment) {
                unlink($attachment);
            }
        //    echo $this->email->print_debugger();
        //    exit();
            return false;
        }
    }
    
    public function checkUserLogin() {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('/', 'refresh');
        }
    }

    public function checkUserLoginAjax() {
        $is_login = 0;
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            $is_login = 0;
        }else{
            $is_login = 1;
        }

        return $is_login;
    }
    
    function getUserIP() {
        $ip = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ip = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ip = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ip = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ip = $_SERVER['REMOTE_ADDR'];
        else
            $ip = '';

        return $ip;
    }
    
    function ip_info($ip = NULL, $purpose = NULL) {
        $output = NULL;
        
        $url = $this->config->item('geo_location_url');
        if($ip) {
            $url .= '&ip='.$ip;
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        curl_close($ch);
        $ipdat = json_decode($response);
        
        if(isset($ipdat->country_code2) && $ipdat->country_code2) {
            return $ipdat->country_code2;
        } else if(isset($ipdat->country_code3) && $ipdat->country_code3) {
            return $ipdat->country_code3;
        }
        return $output;
    }
    
    function my_simple_crypt( $string, $action = 'e' ) {
        // you may change these values to your own
        $secret_key = 'b2.7E36i"9JfJly';
        $secret_iv = '9`691251/JdFjVR';

        $output = false;
        $encrypt_method = "AES-256-CBC";
        $key = hash( 'sha256', $secret_key );
        $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );

        if( $action == 'e' ) {
            $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
        }
        else if( $action == 'd' ){
            $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
        }

        return $output;
    }
}

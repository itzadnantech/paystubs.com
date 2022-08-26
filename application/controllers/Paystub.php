 <?php

    defined('BASEPATH') or exit('No direct script access allowed');

    // error_reporting(E_ALL);
    // ini_set('display_errors',1);
    /**
     * Class Application
     */
    class Paystub extends MY_Controller
    {
        public $CI = NULL;
        public function __construct()
        {
            parent::__construct();
            //        if (!$this->ion_auth->logged_in()) {
            //            // redirect them to the login page
            //            redirect('auth/login', 'refresh');
            //        }
            if ($this->is_admin && $this->method != 'postback_call') {
                redirect('admin', 'refresh');
            }

            $this->load->model('subscription_model');
            $this->load->model('admin_model');
            $this->load->model('mypaystub_model');
            $this->CI = &get_instance();
        }

        public function index()
        {



            if (ENVIRONMENT == 'production') {
                // if(isset($_SERVER['REQUEST_SCHEME']) && $_SERVER['REQUEST_SCHEME'] == 'http') {
                // redirect('/', 'refresh');
                // }
            }



            $posted_data = array();
            parse_str($this->session->userdata('paystub_form_data'), $posted_data);
            if (!$posted_data) {
                parse_str($this->session->userdata('not_login_paystub_form_data'), $posted_data);
            }
            $this->session->unset_userdata('paystub_form_data');
            $this->session->unset_userdata('not_login_paystub_form_data');
            $this->data['paystub_form_data'] = $posted_data;

            $this->_render_page('paystub' . DIRECTORY_SEPARATOR . 'index', $this->data);
        }

        function global_paystub()
        {
            $this->data['pageName'] = "Paid surveys";
            $this->_render_page('paystub' . DIRECTORY_SEPARATOR . 'global_paystub', $this->data);
        }

        function australia_paystub()
        {
            $this->data['pageName'] = "Paid games";
            $this->_render_page('paystub' . DIRECTORY_SEPARATOR . 'australia_paystub', $this->data);
        }

        function canada_paystub()
        {
            $this->data['pageName'] = "Paid videos";
            $this->_render_page('paystub' . DIRECTORY_SEPARATOR . 'canada_paystub', $this->data);
        }

        function advancepaystub()
        {
            $this->data['pageName'] = "Advance Pasytub maker";
            $this->_render_page('paystub' . DIRECTORY_SEPARATOR . 'advancepaystub', $this->data);
        }

        function ukpaystub()
        {
            $this->data['pageName'] = "Watch video and earn";
            $this->_render_page('paystub' . DIRECTORY_SEPARATOR . 'ukpaystub', $this->data);
        }

        function us_paystub()
        {
            $this->data['pageName'] = "Take daily surveys";
            $this->_render_page('paystub' . DIRECTORY_SEPARATOR . 'us_paystub', $this->data);
        }

        public function subscriptions()
        {
            $this->checkUserLogin();

            $this->data['message'] = $this->session->flashdata('message');
            $allSubscription = $this->subscription_model->getAllUserSubscriptionByUserId($this->user_id);
            $this->data['subscriptions'] = $allSubscription;
            $this->_render_page('paystub' . DIRECTORY_SEPARATOR . 'subscriptions', $this->data);
        }

        public function payment_transactions()
        {
            $this->checkUserLogin();
            $this->data['message'] = $this->session->flashdata('message');
            $allTransactions = $this->subscription_model->getAllUserPaymentTransactionByUserId($this->user_id);

            $this->data['transactions'] = $allTransactions;
            $this->_render_page('paystub' . DIRECTORY_SEPARATOR . 'transaction', $this->data);
        }
        public function process_data_usa($post)
        {


            /* usa_template_2 // tan blue //a5.php
            usa_template_3 //dark blue // a4.php
            us // default 
        */

            $all_data = [];



            $company_name = $company_name1 = $address_line1 = $address_line2 = $employee_name = $ssn = $employee_id = '';
            $employee_check_no = $pay_period = $pay_date = $rate = $hours = $current = $ytdgrosspay = '';
            $ytddeduction = $ytdnetpay = $currenttotal = $currentdeduction = $netpay = $paystub_date = '';
            $payamount_intext = $usa_netpay = $e_address_line1 = $e_address_line2 = $company_address_line1 = $company_address_line2 = '';
            $start_date = $end_date = $pay_employee_name = $pay_e_address_line1 = $pay_e_address_line2 = '';
            $template_name = $post['paystub'];
            $company_name = isset($post['company_name']) ? $post['company_name'] : '';
            $company_name1 = isset($post['company_name1']) ? $post['company_name1'] : '';
            $address_line1 = isset($post['address_line1']) ? $post['address_line1'] : '';
            $address_line2 = isset($post['address_line2']) ? $post['address_line2'] : '';
            $employee_name = isset($post['employee_name']) ? $post['employee_name'] : '';
            $pay_employee_name = isset($post['pay_employee_name']) ? $post['pay_employee_name'] : '';
            $ssn = isset($post['ssn']) ? $post['ssn'] : '';
            $employee_id = isset($post['employee_id']) ? $post['employee_id'] : '';
            $employee_check_no = isset($post['employee_check_no']) ? $post['employee_check_no'] : '';
            $pay_period = isset($post['pay_period']) ? $post['pay_period'] : '';
            $pay_date = isset($post['pay_date']) ? $post['pay_date'] : '';
            $rate = isset($post['usa__regular__earnings_rate']) ? $post['usa__regular__earnings_rate'] : '';
            $hours = isset($post['usa__regular__earnings_hours']) ? $post['usa__regular__earnings_hours'] : '';
            $current = isset($post['usa__regular__earnings_total']) ? $post['usa__regular__earnings_total'] : '';
            $ytdgrosspay = isset($post['usa__ytdgrosspay']) ? $post['usa__ytdgrosspay'] : '';
            $ytddeduction = isset($post['usa__ytddeduction']) ? $post['usa__ytddeduction'] : '';
            $ytdnetpay = isset($post['usa__ytdnetpay']) ? $post['usa__ytdnetpay'] : '';
            $currenttotal = isset($post['usa__currenttotal']) ? $post['usa__currenttotal'] : '';
            $currentdeduction = isset($post['usa__currentdeduction']) ? $post['usa__currentdeduction'] : '';
            $netpay = isset($post['usa__netpay']) ? $post['usa__netpay'] : '';

            if ($template_name == 'usa_template_3') {
                $tax_label[] = isset($post['fica_med_tax_label']) ? $post['fica_med_tax_label'] : '';
                $tax_label[] = isset($post['fica_social_security_label']) ? $post['fica_social_security_label'] : '';
                $tax_label[] = isset($post['federal_tax_label']) ? $post['federal_tax_label'] : '';
                $tax_label[] = isset($post['state_tax_label']) ? $post['state_tax_label'] : '';
                $tax_label[] = isset($post['health_insurance_tax_label']) ? $post['health_insurance_tax_label'] : '';
                $tax_label[] = isset($post['ca_state_disability_ins_label']) ? $post['ca_state_disability_ins_label'] : '';

                $tax_monthly[] = isset($post['usa__ficamed__monthly']) ? $post['usa__ficamed__monthly'] : '';
                $tax_monthly[] = (isset($post['fica_social_security_label']) && isset($post['usa__socsec__monthly'])) ? $post['usa__socsec__monthly'] : '';
                $tax_monthly[] = isset($post['usa__federal__tax__monthly']) ? $post['usa__federal__tax__monthly'] : '';
                $tax_monthly[] = isset($post['usa__statetax__monthly']) ? $post['usa__statetax__monthly'] : '';
                $tax_monthly[] = isset($post['usa__hit__monthly']) ? $post['usa__hit__monthly'] : '';
                $tax_monthly[] = isset($post['usa__csd__monthly']) ? $post['usa__csd__monthly'] : '';

                $tax_ytd[] = isset($post['usa__ficamed__ytd']) ? $post['usa__ficamed__ytd'] : '';
                $tax_ytd[] = (isset($post['fica_social_security_label']) && isset($post['usa__socsec__ytd'])) ? $post['usa__socsec__ytd'] : '';
                $tax_ytd[] = isset($post['usa__federal__tax__ytd']) ? $post['usa__federal__tax__ytd'] : '';
                $tax_ytd[] = isset($post['usa__statetax__ytd']) ? $post['usa__statetax__ytd'] : '';
                $tax_ytd[] = isset($post['usa__hit__ytd']) ? $post['usa__hit__ytd'] : '';
                $tax_ytd[] = isset($post['usa__csd__ytd']) ? $post['usa__csd__ytd'] : '';
            } else if ($template_name == 'usa_template_2') {
                $tax_label[] = isset($post['federal_tax_label']) ? $post['federal_tax_label'] : '';
                $tax_label[] = isset($post['state_tax_label']) ? $post['state_tax_label'] : '';
                $tax_label[] = isset($post['sid_label']) ? $post['sid_label'] : '';
                $tax_label[] = isset($post['soc_sec_OASDI_label']) ? $post['soc_sec_OASDI_label'] : '';
                $tax_label[] = isset($post['health_insurance_tax_label']) ? $post['health_insurance_tax_label'] : '';
                $tax_label[] = isset($post['ca_state_disability_ins_label']) ? $post['ca_state_disability_ins_label'] : '';

                $tax_monthly[] = isset($post['usa__federal__tax__monthly']) ? $post['usa__federal__tax__monthly'] : '';
                $tax_monthly[] = isset($post['usa__statetax__monthly']) ? $post['usa__statetax__monthly'] : '';
                $tax_monthly[] = isset($post['usa__sdi__monthly']) ? $post['usa__sdi__monthly'] : '';
                $tax_monthly[] = (isset($post['soc_sec_OASDI_label']) && isset($post['usa__socsec__monthly'])) ? $post['usa__socsec__monthly'] : '';
                $tax_monthly[] = isset($post['usa__hit__monthly']) ? $post['usa__hit__monthly'] : '';
                $tax_monthly[] = isset($post['usa__csd__monthly']) ? $post['usa__csd__monthly'] : '';

                $tax_ytd[] = isset($post['usa__federal__tax__ytd']) ? $post['usa__federal__tax__ytd'] : '';
                $tax_ytd[] = isset($post['usa__statetax__ytd']) ? $post['usa__statetax__ytd'] : '';
                $tax_ytd[] = isset($post['usa__sdi__ytd']) ? $post['usa__sdi__ytd'] : '';
                $tax_ytd[] = (isset($post['soc_sec_OASDI_label']) && isset($post['usa__socsec__ytd'])) ? $post['usa__socsec__ytd'] : '';
                $tax_ytd[] = isset($post['usa__hit__ytd']) ? $post['usa__hit__ytd'] : '';
                $tax_ytd[] = isset($post['usa__csd__ytd']) ? $post['usa__csd__ytd'] : '';
            } elseif ($template_name == 'usa_template_4') {
                $all_data['bq_data'] = $post;
            } elseif ($template_name == 'usa_template_5') {
                $all_data['ct_data'] = $post;
            } elseif ($template_name == 'usa_template_6') {
                $all_data['es_data'] = $post;
            }
            $more_label = isset($post['counter_label']) ? $post['counter_label'] : '';
            foreach ($more_label as $label)
                $tax_label[] = $label;

            $more_monthly = isset($post['monthly_counter_label']) ? $post['monthly_counter_label'] : '';
            foreach ($more_monthly as $monthly)
                $tax_monthly[] = $monthly;


            $more_ytd = isset($post['ytd_counter_label']) ? $post['ytd_counter_label'] : '';
            foreach ($more_ytd as $ytd)
                $tax_ytd[] = $ytd;
            $tax_ytd[] = isset($post['usa__ficamed__ytd']) ? $post['usa__ficamed__ytd'] : '';
            $tax_ytd[] = (isset($post['fica_social_security_label']) && isset($post['usa__socsec__ytd'])) ? $post['usa__socsec__ytd'] : '';

            // dark blue
            $paystub_date = isset($post['paystub__date']) ? $post['paystub__date'] : '';
            $payamount_intext = isset($post['payamount__intext']) ? $post['payamount__intext'] : '';
            $usa_netpay = isset($post['usa__netpay']) ? $post['usa__netpay'] : '';
            $e_address_line1 = isset($post['e_address_line1']) ? $post['e_address_line1'] : '';
            $e_address_line2 = isset($post['e_address_line2']) ? $post['e_address_line2'] : '';
            $company_address_line1 = isset($post['company_address_line1']) ? $post['company_address_line1'] : '';
            $company_address_line2 = isset($post['company_address_line2']) ? $post['company_address_line2'] : '';

            /*$dark_blue_com_appartment=isset($post['dark_blue_com_appartment'])?$post['dark_blue_com_appartment']:'';
            $dark_blue_com_zip=isset($post['dark_blue_com_zip'])?$post['dark_blue_com_zip']:'';
            $dark_blue_comp_appartment=isset($post['dark_blue_comp_appartment'])?$post['dark_blue_comp_appartment']:'';
            $dark_blue_comp_zip=isset($post['dark_blue_comp_zip'])?$post['dark_blue_comp_zip']:'';
            $dark_blue_e_appartment=isset($post['dark_blue_e_appartment'])?$post['dark_blue_e_appartment']:'';
            $dark_blue_e_zip=isset($post['dark_blue_e_zip'])?$post['dark_blue_e_zip']:'';
            $dark_blue_emp_appartment=isset($post['dark_blue_emp_appartment'])?$post['dark_blue_emp_appartment']:'';
            $dark_blue_emp_zip=isset($post['dark_blue_emp_zip'])?$post['dark_blue_emp_zip']:'';
            
            $tan_blue_appartment=isset($post['tan_blue_appartment'])?$post['tan_blue_appartment']:'';
            $tan_blue_zip=isset($post['tan_blue_zip'])?$post['tan_blue_zip']:'';*/

            $company_address_line2 = isset($post['company_address_line2']) ? $post['company_address_line2'] : '';

            $start_date = isset($post['start_date']) ? $post['start_date'] : '';
            $end_date = isset($post['end_date']) ? $post['end_date'] : '';
            $pay_e_address_line1 = isset($post['pay_e_address_line1']) ? $post['pay_e_address_line1'] : '';
            $pay_e_address_line2 = isset($post['pay_e_address_line2']) ? $post['pay_e_address_line2'] : '';
            $all_data['paystub'] = $template_name;
            $all_data['company_name'] = $company_name;
            $all_data['company_name1'] = $company_name1;

            /* $all_data['dark_blue_com_appartment']=$dark_blue_com_appartment;
        $all_data['dark_blue_com_zip']=$dark_blue_com_zip;
        $all_data['dark_blue_comp_appartment']=$dark_blue_comp_appartment;
        $all_data['dark_blue_comp_zip']=$dark_blue_comp_zip;
        $all_data['dark_blue_e_appartment']=$dark_blue_e_appartment;
        $all_data['dark_blue_e_zip']=$dark_blue_e_zip;
        $all_data['dark_blue_emp_appartment']=$dark_blue_emp_appartment;
        $all_data['dark_blue_emp_zip']=$dark_blue_emp_zip;
        
        $all_data['tan_blue_appartment']=$tan_blue_appartment;
        $all_data['tan_blue_zip']=$tan_blue_zip;*/

            $all_data['address_line1'] = $address_line1;
            $all_data['address_line2'] = $address_line2;
            $all_data['employee_name'] = $employee_name;
            $all_data['ssn'] = $ssn;
            $all_data['employee_id'] = $employee_id;
            $all_data['employee_check_no'] = $employee_check_no;
            $all_data['pay_period'] = $pay_period;
            $all_data['pay_date'] = $pay_date;
            $all_data['rate'] = $rate;
            $all_data['hours'] = $hours;
            $all_data['current'] = $current;
            $all_data['ytdgrosspay'] = $ytdgrosspay;
            $all_data['ytddeduction'] = $ytddeduction;
            $all_data['ytdnetpay'] = $ytdnetpay;
            $all_data['currenttotal'] = $currenttotal;
            $all_data['currentdeduction'] = $currentdeduction;
            $all_data['netpay'] = $netpay;
            $all_data['tax_label'] = $tax_label;
            $all_data['tax_monthly'] = $tax_monthly;
            $all_data['tax_ytd'] = $tax_ytd;
            // dark blue
            $all_data['paystub_date'] = $paystub_date;
            $all_data['payamount_intext'] = $payamount_intext;
            $all_data['usa_netpay'] = $usa_netpay;
            $all_data['e_address_line1'] = $e_address_line1;
            $all_data['e_address_line2'] = $e_address_line2;
            $all_data['company_address_line1'] = $company_address_line1;
            $all_data['company_address_line2'] = $company_address_line2;
            $all_data['start_date'] = $start_date;
            $all_data['end_date'] = $end_date;
            $all_data['pay_employee_name'] = $pay_employee_name;
            $all_data['pay_e_address_line1'] = $pay_e_address_line1;
            $all_data['pay_e_address_line2'] = $pay_e_address_line2;

            return $all_data;
        }

        public function process_data_uk_prime($post)
        {
            $all_data = [];
            $template_name = $post['paystub'];
            if ($template_name == 'uk__prime__blue') {
                $color = 'blue';
            } elseif ($template_name == 'uk__prime__green') {
                $color = 'green';
            } elseif ($template_name == 'uk__prime__orange') {
                $color = 'orange';
            }
            $post['color'] = $color;
            return $post;
        }


        public function process_pdf_data($post)
        {

            $all_data_template = [];
            $template_name = $post['paystub'];
            if ($template_name == 'global') {
                $background_color = $post['background_color'];
                $all_data[$template_name][$background_color] = $post;
            }
            if ($template_name == 'us' || $template_name == 'usa_template_3' || $template_name == 'usa_template_2' || $template_name == 'usa_template_4' || $template_name == 'usa_template_5' || $template_name == 'usa_template_6') {

                $all_data_template = $this->process_data_usa($post);
            }
            if ($template_name == 'uk__prime__blue' || $template_name == 'uk__prime__green' || $template_name == 'uk__prime__orange') {
                $all_data_template = $this->process_data_uk_prime($post);
            }


            return $all_data_template;
        }
        public function pdf()
        {



            $this->checkUserLogin();
            $paystubCountryId = $this->session->userdata('paystubCountryID');
            $userSubscription = $this->subscription_model->checkAssignedSubscription($this->user_id, $paystubCountryId);
            if (!$userSubscription || empty($userSubscription) || $userSubscription == '') {
                //        if(0) {
                $this->data['message'] = 'Not have any subscription plan.';
                redirect('/', 'refresh');
                //            exit('Not have any subscription plan.');

            } else {

                $time = time();
                $pdfFilePath = FCPATH . "assets/files/";
                $data['page_title'] = 'Hello world'; // pass data to the view
                $data['postedData'] = $this->input->post(); // pass data to the view

                if ($this->input->post()) {
                    $template = $this->input->post('template');
                    if ($template != '' && $template != 'feb9' && $template != 'orange' && $template != 'usa_def' && $template != 'sage_plus_blue_payslip' && $template != 'std_a1' && $template != 'security_miler' && $template != 'std_a3' && $template != 'standard') {
                        $data['postedData'] = $this->process_pdf_data($this->input->post());
                    }
                    //print_r($data); exit;
                    //ini_set('memory_limit', '32M'); // boost the memory limit if it's low ;)
                    // $html = $this->load->view('paystub/pdf', $data, true); // render the view into HTML
                    if ($template != '') {
                        $html = $this->load->view('wnw_pdf/' . $template, $data, true); // render the view into HTML
                    } else {
                        $html = $this->load->view('paystub/pdf', $data, true); // render the view into HTML   
                    }



                    $this->load->library('pdf');

                    $filepath = base_url() . "assets/img/emaillogo.png";
                    $imagesrc = base64_encode(file_get_contents($filepath));

                    $pdf = $this->pdf->load('"en-GB-x","A5"');
                    if ($data['postedData']['paystub'] == 'usa_template_4') {
                        $pdf->AddPage('L', '', '', '', '', 5, 5, 15, 26, '', '');
                    } elseif ($data['postedData']['paystub'] == 'usa_template_5') {
                        // $pdf->AddPage('P', '', '', '', '', 12, 12, 0, 0, '', '');
                        $pdf->AddPage('P', '', '', '', '', 12, 12, 0, 29.4, '', '');
                    } elseif ($data['postedData']['paystub'] == 'usa_template_3' || $data['postedData']['paystub'] == 'usa_template_4' || $data['postedData']['paystub'] == 'usa_template_5' || $data['postedData']['paystub'] == 'usa_template_6') {
                        $pdf->AddPage('P', '', '', '', '', 12, 12, 15, 26, '', '');
                    } else if ($data['postedData']['paystub'] == 'uk__sage__blue__portrait') {
                        $pdf->AddPage('P', '', '', '', '', 8, 8, 4, 4, '', '');
                    } else {
                        if ($data['postedData']['paystub'] == 'uk__prime__green' || $data['postedData']['paystub'] == 'uk__prime__blue' || $data['postedData']['paystub'] == 'uk__prime__orange' || $data['postedData']['paystub'] == 'uk__sage__blue') {
                            $pdf->AddPage('L', '', '', '', '', 2, 2, 8, 5, '', '');
                        } else {
                            $pdf->AddPage('L');
                        }
                    }
                    $pdf->SetAutoFont();

                    $pdf->WriteHTML($html); // write the HTML into the PDF
                    // echo $html;
                    // exit();

                    if ($this->input->post('email') !== "") {
                        $pdf->Output($pdfFilePath . 'paystub_' . $time . '.pdf', 'F'); // save to file because we can
                        $email_message = '<!DOCTYPE html>
                    <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <meta http-equiv="X-UA-Compatible" content="ie=edge">
                        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
                        <title>Document</title>
                        <style>
                        * {
                            margin: 0;
                            padding: 0;
                            font-family:\'Roboto\', sans-serif;
                        }
                        .wrapper{
                            font-family:\'Roboto\', sans-serif;
                            max-width: 650px !important;
                            height: 100%;
                            margin: 0 auto;
                            border-spacing: 0px;
                        }
                        .container{
                            font-family:\'Roboto\', sans-serif;
                            display: block !important;
                            margin: 0 auto !important;
                            width: 100% !important;
                            background: white;
                            padding-bottom: 15px;
                            clear: both !important;
                            box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.12), 0 1px 5px 0 rgba(0, 0, 0, 0.2);
                        }
                        .logo{
                            max-height: 150px;
                        }
                        .logo>img{
                            
                            margin:0 auto;
                        }
                        .content{
                            padding: 10px 15px;
                        }
                        .content h1{
                            margin-bottom:5px;
                            font-size: 26px;
                        }
                        .content h3{
                            font-size: 18px;
                            margin-bottom:5px;
                            font-weight: 400;
                        }
                        .content p{
                            font-size: 14px;
                            padding: 3px 0;
                        }
                        p,h1,h2,h3,h4,ul,li,a{
                            font-family:\'Roboto\', sans-serif;
                        }
                        img {
                            max-width: 100%;
                            margin: 0 auto;
                            display: block;
                        }
                        .greeting_msg>p{
                            margin: 0;
                            padding: 0;
                        }
                        @media (max-width: 480px){
                            .content h1{
                                margin-bottom:10px;
                                font-size: 20px;
                            }
                            .content h3{
                                font-size: 15px;
                            }
                        }
                        </style>
                    </head>
                    <body>
                    <table style="font-family: \'Roboto\', sans-serif;max-width: 650px !important;height: 100%;margin: 0 auto;border-spacing: 0px;">
                            <tbody>
                                <tr>
                                    <td style="height:45px;">
                                        &nbsp;
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-family: \'Roboto\', sans-serif;display: block !important;margin: 0 auto !important;max-width: 650px !important;background: white;padding-bottom: 15px;clear: both !important;box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.12), 0 1px 5px 0 rgba(0, 0, 0, 0.2);">
                                        <table style="width:100%; border-collapse:collapse;border-spacing: 0px;">
                                            <tr>
                                                <td>
                                                    &nbsp;
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    &nbsp;
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="logo" align="center">
                                                    <img src="' . $filepath . '" alt="Paystub logo" height="150px" >
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="content" style="padding: 10px 15px;">
                                                    <h1>Hey ' . $this->userName . '</h1>
                                                    <p>
                                                        You recently generate your paystub from your Paystub<br>
                                                        account with following email address.
                                                    <p> <b style="color:#3D9FC1">' . $this->input->post('email') . '</b> </p>
                                                    <p>
                                                       Please find following attachment of your paystub.
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="content greeting_msg" style="padding: 10px 15px;">
                                                    <p style="margin: 0;padding: 0;font-size: 14px;">Thank you</p>
                                                    <p style="margin: 0;padding: 0;font-size: 14px;">Team Paystub</p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </tbale>
                    </body>
                    </html>';
                        // echo "<pre>";
                        // print_r($this->input->post('email'));
                        $this->email($this->input->post('email'), NULL, NULL, NULL, NULL, 'Paystub PDF', $email_message, $pdfFilePath . 'paystub_' . $time . '.pdf');
                    }
                    //echo $pdfFilePath; exit;
                    $pdfName = 'paystub_' . $time . '.pdf';
                    $pdf->Output('paystub_' . $time . '.pdf', 'D'); // save to file because we can
                    file_put_contents($pdfFilePath . $pdfName, $pdf->Output('paystub_' . $time . '.pdf', 'S'));


                    $this->mypaystub_model->addMypaystub($pdfName, $this->user_id);
                }
                exit($time . '.pdf');
            }
        }


        ///new code by ad pdf new function
        public function pdf_ajax()
        {

            if ($this->input->is_ajax_request()) {
                extract($_POST);

                // check email
                if (empty($email)) {
                    ///ajax response
                    $data = array('code' => 'email', 'message' => 'Please enter email!');
                    echo json_encode($data);
                    die;
                }

                // check login
                $is_login = $this->checkUserLoginAjax();
                if ($is_login == 0) {
                    ///credential not correct
                    $data = array('code' => 'login', 'message' => 'Please login first');
                    echo json_encode($data);
                    die;
                }
                $paystubCountryId = $this->session->userdata('paystubCountryID');
                $userSubscription = $this->subscription_model->checkAssignedSubscription($this->user_id, $paystubCountryId);
                $userSubscription = array('title' => 'test');

                if (!$userSubscription || empty($userSubscription) || $userSubscription == '') {
                    //        if(0) {
                    // $this->data['message'] = 'Not have any subscription plan.';
                    // redirect('/', 'refresh');
                    //            exit('Not have any subscription plan.');
                    ///credential not correct
                    $data = array('code' => 'warning', 'message' => 'Not have any subscription plan.');
                    echo json_encode($data);
                    die;
                } else {
                    $filepath = base_url() . "assets/img/emaillogo.png";
                    $imagesrc = base64_encode(file_get_contents($filepath));

                    $email_message = '<!DOCTYPE html>
                    <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <meta http-equiv="X-UA-Compatible" content="ie=edge">
                        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
                        <title>Document</title>
                        <style>
                        * {
                            margin: 0;
                            padding: 0;
                            font-family:\'Roboto\', sans-serif;
                        }
                        .wrapper{
                            font-family:\'Roboto\', sans-serif;
                            max-width: 650px !important;
                            height: 100%;
                            margin: 0 auto;
                            border-spacing: 0px;
                        }
                        .container{
                            font-family:\'Roboto\', sans-serif;
                            display: block !important;
                            margin: 0 auto !important;
                            width: 100% !important;
                            background: white;
                            padding-bottom: 15px;
                            clear: both !important;
                            box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.12), 0 1px 5px 0 rgba(0, 0, 0, 0.2);
                        }
                        .logo{
                            max-height: 150px;
                        }
                        .logo>img{
                            
                            margin:0 auto;
                        }
                        .content{
                            padding: 10px 15px;
                        }
                        .content h1{
                            margin-bottom:5px;
                            font-size: 26px;
                        }
                        .content h3{
                            font-size: 18px;
                            margin-bottom:5px;
                            font-weight: 400;
                        }
                        .content p{
                            font-size: 14px;
                            padding: 3px 0;
                        }
                        p,h1,h2,h3,h4,ul,li,a{
                            font-family:\'Roboto\', sans-serif;
                        }
                        img {
                            max-width: 100%;
                            margin: 0 auto;
                            display: block;
                        }
                        .greeting_msg>p{
                            margin: 0;
                            padding: 0;
                        }
                        @media (max-width: 480px){
                            .content h1{
                                margin-bottom:10px;
                                font-size: 20px;
                            }
                            .content h3{
                                font-size: 15px;
                            }
                        }
                        </style>
                    </head>
                    <body>
                    <table style="font-family: \'Roboto\', sans-serif;max-width: 650px !important;height: 100%;margin: 0 auto;border-spacing: 0px;">
                            <tbody>
                                <tr>
                                    <td style="height:45px;">
                                        &nbsp;
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-family: \'Roboto\', sans-serif;display: block !important;margin: 0 auto !important;max-width: 650px !important;background: white;padding-bottom: 15px;clear: both !important;box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.12), 0 1px 5px 0 rgba(0, 0, 0, 0.2);">
                                        <table style="width:100%; border-collapse:collapse;border-spacing: 0px;">
                                            <tr>
                                                <td>
                                                    &nbsp;
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    &nbsp;
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="logo" align="center">
                                                    <img src="' . $filepath . '" alt="Paystub logo" height="150px" >
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="content" style="padding: 10px 15px;">
                                                    <h1>Hey ' . $this->userName . '</h1>
                                                    <p>
                                                        You recently generate your paystub from your Paystub<br>
                                                        account with following email address.
                                                    <p> <b style="color:#3D9FC1">' . $this->input->post('email') . '</b> </p>
                                                    <p>
                                                       Please find following attachment of your paystub.
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="content greeting_msg" style="padding: 10px 15px;">
                                                    <p style="margin: 0;padding: 0;font-size: 14px;">Thank you</p>
                                                    <p style="margin: 0;padding: 0;font-size: 14px;">Team Paystub</p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </tbale>
                    </body>
                    </html>';



                    // $this->email($this->input->post('email'), NULL, NULL, NULL, NULL, 'Paystub PDF', $email_message, $pdfFilePath . 'paystub_' . $time . '.pdf');

                    $this->email($this->input->post('email'), NULL, NULL, NULL, NULL, 'Paystub PDF', $email_message, $pdfUrl);
                    $this->mypaystub_model->addMypaystub($pdfName, $this->user_id);

                    ///deleted preview file
                    // $this->delete_pdf_preview_new($pay_date);
                    $data = array('code' => 'success', 'message' => 'PDF sent to your email - check also in your spam folder if you can not find it
                    Because it goes to spam since the domain is not popular');
                    echo json_encode($data);
                    die;
                }
            }
        }

        public function check_user_login()
        {
            if ($this->input->is_ajax_request()) {
                extract($_POST);
                $is_login = $this->checkUserLoginAjax();
                if ($is_login == 0) {
                    ///credential not correct
                    $data = array('code' => 'warning', 'message' => 'Please login first');
                    echo json_encode($data);
                    die;
                } else {
                    // $this->pdf_download($file_name,$file_url);
                    ///ajax response
                    $data = array('code' => 'success', 'message' => 'User logged in!');
                    echo json_encode($data);
                    die;
                }
            }
        }

        public function pdf_download($file,$filepath)
        { 
            // if(file_exists($filepath)) {
            //     echo $filepath;
            //     die;
                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
                header('Expires: 0');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header('Content-Length: ' . filesize($filepath));
                flush(); // Flush system output buffer
                readfile($filepath);
                die();
            // } else {
            //     http_response_code(404);
            //     die();
            // }
        }

        public function pdfWithWaterMark($dataPost)
        {
            //  echo $data['postedData']['paystub'];exit;

            $time = time();
            $pdfFilePath = FCPATH . "assets/files_watermarked/";

            $data['page_title'] = 'Hello world'; // pass data to the view
            $data['postedData'] = $dataPost; // pass data to the view
            //            echo '<pre>';
            //            print_r($data);
            //          exit;
            $template = $data['postedData']['template'];

            

            if ($template != '' && $template != 'feb9' && $template != 'orange' && $template != 'usa_def' && $template != 'sage_plus_blue_payslip' && $template != 'std_a1' && $template != 'security_miler' && $template != 'std_a3' && $template != 'standard') {
                $data['postedData'] = $this->process_pdf_data($data['postedData']);
            }

            //print_r($data); exit;
            //ini_set('memory_limit', '32M'); // boost the memory limit if it's low ;)
            // $html = $this->load->view('paystub/pdf', $data, true); // render the view into HTML

            // ct_comp_name
            // ct_chk_comp_name

            
            if ($template != '') { 

                $html = $this->load->view('wnw_pdf/' . $template, $data, true); // render the view into HTML
            } else {
              
                $html = $this->load->view('paystub/pdf', $data, true); // render the view into HTML   
            }

           


            $this->load->library('pdf');

            $filepath = base_url() . "assets/img/emaillogo.png";
            $imagesrc = base64_encode(file_get_contents($filepath));

            $pdf = $this->pdf->load('"en-GB-x","A5"');
            if ($data['postedData']['paystub'] == 'usa_template_4') {
                $pdf->AddPage('L', '', '', '', '', 5, 5, 15, 26, '', '');
            } elseif ($data['postedData']['paystub'] == 'usa_template_5') {
                $pdf->AddPage('P', '', '', '', '', 12, 12, 0, 29.4, '', '');
            } elseif ($data['postedData']['paystub'] == 'usa_template_3' || $data['postedData']['paystub'] == 'usa_template_4' || $data['postedData']['paystub'] == 'usa_template_5') {

                $pdf->AddPage('P', '', '', '', '', 12, 12, 15, 26, '', '');
            } else if ($data['postedData']['paystub'] == 'usa_template_6') {


                $pdf->AddPage('P', '', '', '', '', 5, 5, 15, 26, '', '');
            } else if ($data['postedData']['paystub'] == 'uk__sage__blue__portrait') {

                $pdf->AddPage('P', '', '', '', '', 8, 8, 4, 4, '', '');
            } else {
                if ($data['postedData']['paystub'] == 'uk__prime__green' || $data['postedData']['paystub'] == 'uk__prime__blue' || $data['postedData']['paystub'] == 'uk__prime__orange' || $data['postedData']['paystub'] == 'uk__sage__blue') {

                    $pdf->AddPage('L', '', '', '', '', 2, 2, 8, 5, '', '');
                } else {
                    $pdf->AddPage('L');
                }
            }


            //$watermark =  base_url().'/assets/img/watermark_new.png';
            //$pdf->SetWatermarkImage($watermark);

            $paystubCountryId = $this->session->userdata('paystubCountryID');
            $userSubscription = $this->subscription_model->checkAssignedSubscription($this->user_id, $paystubCountryId);
            // $userSubscription = array('title' => 'test');

            if (!$userSubscription || empty($userSubscription) || $userSubscription == '') {
                $pdf->SetWatermarkImage('assets/img/watermark_new2.png', -1, 'P', array(10, 40));
                $pdf->showWatermarkImage = true;
            }





            $pdf->SetAutoFont();

            $pdf->WriteHTML($html); // write the HTML into the PDF
            // echo $html;
            // exit();

            //echo $pdfFilePath; exit;
            // $pdfName = 'paystub_' . $time . '_X123.pdf';
            $pdfName = 'paystub_X123.pdf';
            // $pdf->Output($pdf_name, 'D'); // save to file because we can
            file_put_contents($pdfFilePath . $pdfName, $pdf->Output('paystub_' . $time . '.pdf', 'S'));
            // echo $pdfName;exit;
            return $pdfName;
        }



        public function checkUserSubscription()
        {

            $returnArray = [];
            $paystubCountryId = $this->session->userdata('paystubCountryID');
            $userSubscription = $this->subscription_model->checkAssignedSubscription($this->user_id, $paystubCountryId);
            if (!$userSubscription || empty($userSubscription) || $userSubscription == '') {
                $returnArray['error'] = 'true';
            } else {
                $returnArray['error'] = 'false';
            }
            echo json_encode($returnArray);
        }

        public function paystubCountry()
        {

            $returnArray = [];
            $country = $this->input->post('country');
            $paystubCountry = $this->subscription_model->getCountryByName($country);
            if (!$paystubCountry || empty($paystubCountry) || $paystubCountry == '') {
                $returnArray['error'] = 'true';
            } else {
                $this->session->set_userdata('paystubCountryID', $paystubCountry->id);
                $this->session->set_userdata('paystubCountryName', $paystubCountry->name);
                $returnArray['error'] = 'false';
            }
            echo json_encode($returnArray);
        }

        public function subscribe_offers()
        {

            $posted_data = $returnArray = [];
            if ($this->input->post('paystub_form_data')) {
                $paystub_form_data = $this->input->post('paystub_form_data');
                $this->session->set_userdata('not_login_paystub_form_data', $paystub_form_data);
                $returnArray['error'] = 'false';
                echo json_encode($returnArray);

                exit(0);
            } else {

                parse_str($this->session->userdata('not_login_paystub_form_data'), $posted_data);
                $this->data['not_login_paystub_form_data'] = $posted_data;
            }


            $pdf_name = '';
            //        if(isset($this->data['not_login_paystub_form_data']['template'])){
            //            if($this->data['not_login_paystub_form_data']['template'] == 'orange'){

            $pdf_name = $this->pdfWithWaterMark($this->data['not_login_paystub_form_data']);
            //            }
            //        }
            $this->data['pdf_name'] = $pdf_name;

            $this->_render_page('paystub' . DIRECTORY_SEPARATOR . 'subscribe_offers', $this->data);
        }

        public function delete_pdf_preview()
        {
            $pdf_name = $_POST['pdf_name'];

            if (file_exists(FCPATH . "assets/files_watermarked/$pdf_name")) {
                unlink(FCPATH . "assets/files_watermarked/$pdf_name");
            }
        }
        public function delete_pdf_preview_new($pdf_name)
        {
            if (file_exists(FCPATH . "assets/files_watermarked/$pdf_name")) {
                unlink(FCPATH . "assets/files_watermarked/$pdf_name");
            }
        }

        public function paypal_pay()
        {
            $returnArray = [];
            $subscriptionID = $this->input->post('subscriptionID');

            if ($subscriptionID) {
                $this->session->set_userdata('subscriptionPlan', $subscriptionID);
                $returnArray['error'] = 'false';
            } else {
                $returnArray['error'] = 'true';
            }
            echo json_encode($returnArray);
        }

        public function faqs()
        {
            $this->_render_page('paystub' . DIRECTORY_SEPARATOR . 'faqs', $this->data);
        }

        public function terms_conditions()
        {
            $this->_render_page('paystub' . DIRECTORY_SEPARATOR . 'terms_conditions', $this->data);
        }
        public function privacy()
        {
            $this->_render_page('paystub' . DIRECTORY_SEPARATOR . 'privacy', $this->data);
        }

        public function free($id = NULL)
        {

            $ipHasProxy = 0;
            $ip = $this->getUserIP();
            if ($this->proxy->isProxy($ip) != 0) {
                $ipHasProxy = 1;
            }

            if (!$this->ion_auth->logged_in()) {
                redirect('auth/login', 'refresh');
            }
            $this->data['ipHasProxy'] = $ipHasProxy;
            $this->data['singleoffer'] = $this->admin_model->getOfferByID($id);
            if ($id) {
                $this->_render_page('paystub' . DIRECTORY_SEPARATOR . 'offerdetails/' . $id, $this->data);
            } else {
                $this->_render_page('paystub' . DIRECTORY_SEPARATOR . 'free', $this->data);
            }
        }

        public function offerdetails($id)
        {
            $ipHasProxy = 0;
            $ip = $this->getUserIP();
            if ($this->proxy->isProxy($ip) != 0) {
                $ipHasProxy = 1;
            }

            if (!$this->ion_auth->logged_in()) {
                redirect('auth/login', 'refresh');
            }
            $this->data['ipHasProxy'] = $ipHasProxy;
            $this->data['singleoffer'] = $this->admin_model->getOfferByID($id);
            $offerid = $this->data['singleoffer']->id;
            $extraparams = $this->data['singleoffer']->ExtraGetParams;
            $paystubCountryId = $this->session->userdata('paystubCountryID') ? $this->session->userdata('paystubCountryID') : 1;
            $query = parse_url($this->data['singleoffer']->url, PHP_URL_QUERY);
            $str = "offer_id=$offerid&user_id=$this->user_id&paystub_country_id=$paystubCountryId";
            // Returns a string if the URL has parameters or NULL if not
            if ($query) {
                if ($extraparams) {
                    $this->data['offerurl'] = $this->data['singleoffer']->url . '&' . $extraparams . '=' . $this->my_simple_crypt($str);
                } else {
                    $this->data['offerurl'] = $this->data['singleoffer']->url . '&' . $this->my_simple_crypt($str);
                }
            } else {
                if ($extraparams) {
                    $this->data['offerurl'] = $this->data['singleoffer']->url . '?' . $extraparams . '=' . $this->my_simple_crypt($str);
                } else {
                    $this->data['offerurl'] = $this->data['singleoffer']->url . '/' . $this->my_simple_crypt($str);
                }
            }

            $this->_render_page('paystub' . DIRECTORY_SEPARATOR . 'offerdetails', $this->data);
        }

        public function extraincome()
        {
            $this->_render_page('paystub' . DIRECTORY_SEPARATOR . 'extraincome', $this->data);
        }

        public function contact_us()
        {
            $this->form_validation->set_rules('contact_name', 'Name', 'trim|required');
            $this->form_validation->set_rules('contact_email', 'Email', 'trim|required');
            $this->form_validation->set_rules('contact_no', 'Contact Number', 'trim|required');
            $this->form_validation->set_rules('contact_question', 'Contact Question', 'trim|required');
            if ($this->form_validation->run() == true) {
                $name = $this->input->post('contact_name');
                $email = $this->input->post('contact_email');
                $contact_no = $this->input->post('contact_no');
                $contact_question = $this->input->post('contact_question');
                $data = array(
                    'name' => $name,
                    'email' => $email,
                    'contact_no' => $contact_no,
                    'question' => $contact_question
                );

                if ($this->subscription_model->addContact($data)) {
                    $filepath = base_url() . "assets/img/emaillogo.png";
                    $imagesrc = base64_encode(file_get_contents($filepath));
                    $contact_message = '<!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <meta http-equiv="X-UA-Compatible" content="ie=edge">
                    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
                    <title>Document</title>
                    <style>
                    * {
                        margin: 0;
                        padding: 0;
                        font-family: \'Roboto\', sans-serif;
                    }
                    .logo{
                        max-height: 150px;
                    }
                    .logo>img{
                        
                        margin:0 auto;
                    }
                    .content{
                        padding: 10px 35px;
                    }
                    .content h1{
                        margin-bottom:5px;
                        font-size: 22px;
                    }
                    .content h3{
                        font-size: 18px;
                        margin-bottom:5px;
                        font-weight: 400;
                    }
                    .content p{
                        font-size: 14px;padding: 3px 0;
                    }
                    img {
                        max-width: 100%;
                        margin: 0 auto;
                        display: block;
                    }
                    .greeting_msg>p{
                        margin: 0;padding: 0;
                    }
                    a{
                        cursor:pointer;
                    }
                    @media (max-width: 480px){
                        .content{
                            padding: 10px 15px;
                        }
                        .content h1{
                            margin-bottom:10px;
                            font-size: 20px;
                        }
                        .content h3{
                            font-size: 15px;
                        }
                    }
                    </style>
                </head>
                <body>
                <table style="font-family: \'Roboto\', sans-serif;max-width: 650px !important;height: 100%;margin: 0 auto;border-spacing: 0px;">
                        <tbody>
                            <tr>
                                <td style="height:45px;">
                                    &nbsp;
                                </td>
                            </tr>
                            <tr>
                                <td style="font-family: \'Roboto\', sans-serif;display: block !important;margin: 0 auto !important;max-width: 650px !important;background: white;padding-bottom: 15px;clear: both !important;box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.12), 0 1px 5px 0 rgba(0, 0, 0, 0.2);">
                                    <table style="width:100%; border-collapse:collapse;border-spacing: 0px;">
                                        <tr>
                                            <td>
                                                &nbsp;
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                &nbsp;
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="logo" align="center">
                                                <img src="' . $filepath . '" alt="Paystub logo" height="150px" style="max-width:100%;display:block;">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 10px 15px;">
                                                <h1>Hey ' . $name . '</h1>
                                                <p>
                                                    Thank you for contact us.<br>
                                                    We will contact you as soon as possible with your registered email address.	
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="content greeting_msg" style="padding: 10px 15px;">
                                                <p style="margin: 0;padding: 0;font-size: 14px;">Thank you</p>
                                                <p style="margin: 0;padding: 0;font-size: 14px;">Team Paystub</p>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </tbale>
                </body>
                </html>';
                    // $message = '<p><b><h2>Dear '.$name.',<h2></b></p><p>Thank you for participate with us. We can resolve your question ASAP and rech to you.</p>';
                    $this->email($email, NULL, NULL, NULL, NULL, 'Thank You', $contact_message);

                    $admin_message = '<p>New question arrive from ' . $name . '<p><p><b><u>User Details</u></b><p><ul>'
                        . '<li>Name: ' . $name . '</li>'
                        . '<li>Email: ' . $email . '</li>'
                        . '<li>Contact No: ' . $contact_no . '</li>'
                        . '<li>Question: ' . $contact_question . '</li>'
                        . '</ul>';
                    $this->email($this->config->item('admin_email', 'ion_auth'), NULL, NULL, $name, $email, 'New Question From ' . $name, $admin_message);
                    $this->session->set_flashdata('message', 'Your question submitted successfully. We will contact you ASAP.');
                    redirect("paystub/contact_us", 'refresh');
                } else {
                    $this->session->set_flashdata('error', 'Your question can\'t submitted.Please, try again.');
                    redirect("paystub/contact_us", 'refresh');
                }
            } else {
                $this->data['message'] = $this->session->flashdata('message');
                $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
                $this->_render_page('paystub' . DIRECTORY_SEPARATOR . 'contact_us', $this->data);
            }
        }

        public function getpostbackdata()
        {
            $headers = getallheaders();
            $data = fopen('php://input', 'rb');
            $postdata = $_POST;
            $getdata = $_GET;
            while (!feof($data)) {
                $webhookContent .= fread($data, 4096);
            }
            fclose($data);
            $webhookToLog = "\n\n\nCreation Date :" . date('Y-m-d H:i:s') . "\n";
            $webhookToLog .= $webhookContent . "\n";

            // print webhook in log file
            error_log("php://input---\n", 3, "callback.log");
            error_log($webhookToLog, 3, "callback.log");
            error_log("\n posted data ------------------------------------\n", 3, "callback.log");
            error_log(print_r($postdata, true), 3, "callback.log");
            error_log("\n get data ------------------------------------\n", 3, "callback.log");
            error_log(print_r($getdata, true), 3, "callback.log");
        }

        public function getGeoOffer()
        {
            $responseArray = array();
            $returnhtml = "";
            $siteurl = "";

            $ipHasProxy = 0;
            $ip = $this->getUserIP();
            if ($this->proxy->isProxy($ip) != 0) {
                $ipHasProxy = 1;
            }
            if ($ipHasProxy) {
                $responseArray['message'] = 'We have found proxy/VPN. Please, disconnect them and try again.';
                $responseArray['error'] = 'true';
                echo json_encode($responseArray);
                exit(0);
            }


            $geoCode = $this->session->userdata('country_code');
            $paystubCountryId = $this->session->userdata('paystubCountryID') ? $this->session->userdata('paystubCountryID') : 1;

            $geoOffer = $this->subscription_model->getGeoOffer($geoCode);
            $usersCompletedOffer = $this->admin_model->getUsersCompletedOffer($this->user_id);

            $offeIDs = [];
            if ($usersCompletedOffer) {
                foreach ($usersCompletedOffer as $singleUserOffer) {
                    $offeIDs[] = $singleUserOffer->offer_id;
                }
            }
            if ($geoOffer) {
                foreach ($geoOffer as $singleOffer) {
                    // $str = "offer_id=$singleOffer->id&user_id=$this->user_id&paystub_country_id=$paystubCountryId";
                    // $sid = $this->my_simple_crypt($str);
                    // $offer_url = $singleOffer->url.'?sid='.$sid;
                    $offer_url = base_url() . 'paystub/offerdetails/' . $singleOffer->id;
                    $returnhtml .= '<div class="offer_card">
                                    <ul class="list-inline">
                                    <li class="offer_image" data-heading="' . $singleOffer->name . '">';
                    if (file_exists('assets/uploads/' . $singleOffer->image) && $singleOffer->image) {
                        $returnhtml .= '<img src="' . base_url() . 'assets/uploads/' . $singleOffer->image . '" class="img-responsive">';
                    }

                    $returnhtml .= '</li>
                                    <li class="offer_details">
                                        <h3>' . $singleOffer->name . '</h3>';
                    if ($singleOffer->description) {
                        $returnhtml .= '<hr>
                                                            <p class="offer_description">' . $singleOffer->description . '</p>';
                    }
                    $returnhtml .= '</li>
                                    <li class="offer_btn">';
                    if (in_array($singleOffer->id, $offeIDs)) {
                        $returnhtml .= '<span class="checked_offer"><img src="' . base_url() . 'assets/img/checked.svg" alt=""></span>
                                                            <a class="nav_btn action_complete" id="offer_1" href="javascript:;" target="_blank" data-ripple data-ripple-color="#FFFFFF">Completed</a>
                                                            <div class="mdl-tooltip" data-mdl-for="offer_1">You completed this <br>offer</div>';
                    } else {
                        $returnhtml .= '<a class="nav_btn" data-id="' . $singleOffer->id . '" id="offer_' . $singleOffer->id . '" href="' . $offer_url . '" target="_blank" data-ripple data-ripple-color="#666666">Grab offer</a>
                                                    <div class="mdl-tooltip" data-mdl-for="offer_' . $singleOffer->id . '">Complete this offer<br> to get reward</div>';
                    }
                    $returnhtml .= '</li>
                                </ul>
                            </div>';
                }

                $responseArray['offers'] = $returnhtml;
                $responseArray['error'] = 'false';
            } else {
                $responseArray['message'] = "There are no offers to display.";
                $responseArray['error'] = 'true';
            }
            echo json_encode($responseArray);
        }

        public function add_offer_track()
        {
            $ip = $this->getUserIP();
            $geo_code = $this->ip_info($ip, 'Country Code');
            $offerID = $this->input->post('offerID');

            $responseArray = [];
            if ($offerID) {
                $data = [
                    'offer_id' => $offerID,
                    'geo_code' => ($geo_code ? $geo_code : 'OTH'),
                    'user_id' => $this->user_id
                ];
                if ($this->admin_model->addTrackOffer($data)) {
                    $responseArray['error'] = 'false';
                } else {
                    $responseArray['error'] = 'true';
                }
            } else {
                $responseArray['error'] = 'true';
            }
            echo json_encode($responseArray);
        }

        public function postback_call()
        {
            $getdata = $_GET;
            $data = [];
            if (isset($_GET['sid'])) {
                $callbackData = $this->my_simple_crypt($_GET['sid'], 'd');
                parse_str($callbackData, $get_array);

                $ip = $this->getUserIP();
                $geo_code = $this->ip_info($ip, 'Country Code');

                $user_id = $get_array['user_id'];
                $paystub_country_id = $get_array['paystub_country_id'];
                $data = [
                    'offer_id' => $get_array['offer_id'],
                    'user_id' => $user_id,
                    'paystub_country_id' => $paystub_country_id,
                    'geo_code' => $geo_code,
                    'created' => date('Y-m-d H:i:s')
                ];
            }
            $this->admin_model->addUserCompletedOffer($data);
            $usersCompletedOffer = $this->admin_model->getUsersCompletedOffer($user_id, $paystub_country_id, $this->offer_count_for_reward);
            if (count($usersCompletedOffer) == $this->offer_count_for_reward) {
                $updateCount = 0;
                foreach ($usersCompletedOffer as $singleUserOffer) {
                    $data = ['is_rewarded' => 1];
                    $updateRes = $this->admin_model->updateUsersCompletedOffer($singleUserOffer->id, $data);
                    if ($updateRes) {
                        $updateCount += 1;
                    }
                }
                if ($updateCount == $this->offer_count_for_reward) {
                    $subscription_id = $this->five_day_subscription_plan_id;
                    $subscriptionDetails = $this->subscription_model->getSubscriptionDetails($subscription_id);
                    $usersMembership = $this->subscription_model->checkAssignedSubscription($user_id, $paystub_country_id);
                    $expireDate = isset($usersMembership[0]->expire_date) ? $usersMembership[0]->expire_date : '';

                    if ($subscriptionDetails) {
                        $membershipDays = $subscriptionDetails[0]->duration;
                        $expiredDate = date('Y-m-d H:i:s', strtotime($expireDate . " + $membershipDays"));
                    }

                    if ($usersMembership) {

                        $dateFormat = date("Y-m-d H:i:s");


                        $data = array(
                            'user_id' => $user_id,
                            'subscription_id' => $subscription_id,
                            'paystub_country_id' => $paystub_country_id,
                            'is_active' => 1,
                            'is_expire' => 0,
                            'expire_date' => $expiredDate,
                            'modified' => $dateFormat,
                            'added_by' => $user_id,
                        );
                        $result = $this->subscription_model->updateSubscription($usersMembership[0]->id, $data, 'renual');
                    } else {
                        $data = array(
                            'user_id' => $user_id,
                            'subscription_id' => $subscription_id,
                            'paystub_country_id' => $paystub_country_id,
                            'is_active' => 1,
                            'is_expire' => 0,
                            'expire_date' => $expiredDate,
                            'added_by' => $user_id,
                        );
                        $result = $this->subscription_model->addUserSubscription($data);
                    }

                    $user = $this->ion_auth->user($user_id)->row();
                    $message = '<p><b><h2>Dear ' . $user->first_name . ' ' . $user->last_name . ',<h2></b></p><p>Thank you for subscribe. As per our promises we added ' . $offer_count_for_reward . ' days to your subscription.</p>';
                    $this->email($user->email, NULL, NULL, NULL, NULL, 'Subscription Details', $message);
                }
            }

            $callbackData = [
                'get_data' => serialize($getdata),
                'sid' => serialize($get_array)
            ];
            $this->subscription_model->addCallback($callbackData);

            error_log("get data ------------------------------------\n", 3, "callback.log");
            error_log(print_r($getdata, true), 3, "callback.log");
        }

        public function myPaystub()
        {


            $this->data['mypaystub'] = $this->mypaystub_model->getMypaystub($this->user_id);
            $this->_render_page('paystub' . DIRECTORY_SEPARATOR . 'mypaystub', $this->data);
        }

        public function deleteMyPaystub($pdfId = 0)
        {
            $success = false;
            if ($pdfId > 0) {
                $success =  $this->mypaystub_model->deleteMypaystub($this->user_id, $pdfId);
            }
            return $success;
        }

        public function deleteMyPaystubonView($pdfId = 0)
        {
            $success = false;
            if ($pdfId > 0) {
                $this->mypaystub_model->deleteMypaystubonView($this->user_id, $pdfId);
            }
        }

        public function downlaod()
        {
            #echo $_GET['download'];
            echo $this->uri->download;

            die("here");
        }

        public function getgeocode()
        {
            $returnArray = [];
            $search = $this->input->post('search');

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HEADER, false);
            $data = [
                "text" =>  $search,
                "size" => "2"
            ];

            curl_setopt($ch, CURLOPT_URL, "https://app.geocodeapi.io/api/v1/autocomplete?" . http_build_query($data));
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                "Content-Type: application/json",
                "apikey: d3fb44c0-6cfd-11eb-a6c3-e1a5e613793e",
            ));
            $response = curl_exec($ch);
            curl_close($ch);
            $json = json_decode($response);

            if (!isset($json->error) && !empty($json->features)) {

                $html = [];
                $string = "";
                foreach ($json->features as $k => $v) {
                    if ($v->properties->housenumber != "") {
                        $string .= $v->properties->housenumber . ' ';
                    }
                    if ($v->properties->street != "") {
                        $string .= $v->properties->street . ' ,';
                    }
                    if ($v->properties->locality != "") {
                        $string .= $v->properties->locality . ' ,';
                    }
                    if ($v->properties->region != "") {
                        $string .= $v->properties->region . ' ,';
                    }
                    if ($v->properties->country_a != "") {
                        $string .= $v->properties->country_a . ' ,';
                    }
                    if ($v->properties->postalcode != "") {
                        $string .= $v->properties->postalcode;
                    }
                    $string = rtrim($string, ',');
                    $html[] = $string;
                }
                $returnArray['html'] = $html;
                $returnArray['error'] = 'false';
            } else {

                $returnArray['error'] = 'true';
            }
            echo json_encode($returnArray);
        }
    }

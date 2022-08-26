 <?php
    ini_set('max_execution_time', 0);
    ini_set('memory_limit', '-1');
    defined('BASEPATH') or exit('No direct script access allowed');
    error_reporting(E_ALL);
    $path = dirname(dirname(__FILE__)) . '/libraries/sendgrid-php-master/vendor/autoload.php';
    require($path);

    use SendGrid\Mail\To;
    use SendGrid\Mail\Cc;
    use SendGrid\Mail\Bcc;
    use SendGrid\Mail\From;
    use SendGrid\Mail\Content;
    use SendGrid\Mail\Mail;
    use SendGrid\Mail\Personalization;
    use SendGrid\Mail\Subject;
    use SendGrid\Mail\Header;
    use SendGrid\Mail\CustomArg;
    use SendGrid\Mail\SendAt;
    use SendGrid\Mail\Attachment;
    use SendGrid\Mail\Asm;
    use SendGrid\Mail\MailSettings;
    use SendGrid\Mail\BccSettings;
    use SendGrid\Mail\SandBoxMode;
    use SendGrid\Mail\BypassListManagement;
    use SendGrid\Mail\Footer;
    use SendGrid\Mail\SpamCheck;
    use SendGrid\Mail\TrackingSettings;
    use SendGrid\Mail\ClickTracking;
    use SendGrid\Mail\OpenTracking;
    use SendGrid\Mail\SubscriptionTracking;
    use SendGrid\Mail\Ganalytics;
    use SendGrid\Mail\ReplyTo;

    /**
     * Class Admin
     */
    class Admin extends MY_Controller
    {

        public function __construct()
        {
            parent::__construct();
            if (!$this->ion_auth->logged_in()) {
                // redirect them to the login page
                redirect('auth/login', 'refresh');
            }
            if (!$this->is_admin) {
                redirect('/', 'refresh');
            }

            $this->load->model('admin_model');
            $this->load->model('subscription_model');
            $this->load->model('mypaystub_model');
            $this->load->model('mypaystub_model');
            $this->load->model('pages');
            $this->load->helper('sql_helper');
        }

        public function pages()
        {

            $this->data['pageName'] = "All Pages";
            $this->data['pages'] = $this->pages->getAllPages();
            $this->data['message'] = $this->session->flashdata('message');
            $this->data['error'] = $this->session->flashdata('error');
            $this->_render_page('admin' . DIRECTORY_SEPARATOR . 'pages', $this->data);
        }

        public function edit_page($id)
        {

            if (!$this->ion_auth->logged_in()) {
                // redirect them to the login page
                redirect('auth/login', 'refresh');
            }
            if (!$this->is_admin) {
                redirect('/', 'refresh');
            }

            $this->data['title'] = "Edit Page";

            $this->form_validation->set_rules('title', 'Title Required', 'required');
            $this->form_validation->set_rules('content', 'Content Required', 'required');

            $page = $this->pages->getPage($id);

            if ($this->form_validation->run() === TRUE) {


                $data = [
                    'title' => $this->input->post('title'),
                    'content' => $this->input->post('content')
                ];

                $updatePage = $this->pages->updatePage($this->input->post('id'), $data, true);

                if ($updatePage) {

                    $this->session->set_flashdata('message', 'Page Successfully Updated.');
                } else {
                    $this->session->set_flashdata('message', 'Error! While Updating Page.');
                }

                redirect('admin/edit_page/' . $this->input->post('id'), 'refresh');
            } else {

                $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
                // pass the page to the view
                $this->data['page'] = $page;
                $this->_render_page('admin' . DIRECTORY_SEPARATOR . 'edit_page', $this->data);
            }
        }

        public function create_page()
        {

            if (!$this->ion_auth->logged_in()) {
                // redirect them to the login page
                redirect('auth/login', 'refresh');
            }
            if (!$this->is_admin) {
                redirect('/', 'refresh');
            }

            $this->data['title'] = "Add New Page";

            $this->form_validation->set_rules('title', 'Title Required', 'required');
            $this->form_validation->set_rules('content', 'Content Required', 'required');

            // $page = $this->pages->getPage($id);

            if ($this->form_validation->run() === TRUE) {


                $data = [
                    'title' => $this->input->post('title'),
                    'content' => $this->input->post('content')
                ];

                $createPage = $this->pages->addNewPage($data);

                if ($createPage) {

                    $this->session->set_flashdata('message', 'Page Successfully added.');
                } else {
                    $this->session->set_flashdata('message', 'Error! While creating new Page.');
                }

                redirect('admin/pages/', 'refresh');
            } else {

                $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
                // pass the page to the view
                // $this->data['page'] = $page;
                $this->_render_page('admin' . DIRECTORY_SEPARATOR . 'create_page', $this->data);
            }
        }

        public function newindex()
        {
            $this->data['users'] = $this->ion_auth->users()->result();
            foreach ($this->data['users'] as $k => $user) {
                $this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
            }
            $this->_render_page('admin' . DIRECTORY_SEPARATOR . 'newindex', $this->data);
        }

        public function users()
        {

            $this->data['pageName'] = "All Users";
            $this->data['users'] =  array();
            if (isset($_POST) && !empty($_POST)) {
                // $this->data['users'] = $this->ion_auth->users()->result();

                // foreach ($this->data['users'] as $k => $user) {
                //     $this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
                // }
            }

            $this->data['message'] = $this->session->flashdata('message');
            $this->data['error'] = $this->session->flashdata('error');
            $this->_render_page('admin' . DIRECTORY_SEPARATOR . 'users', $this->data);
        }

        public function users_table()
        {
            extract($_POST); 
            $searchVal = $search['value'];
            $orderBy = array();
            $where = array();
            $whereLike = array();  
            if (isset($searchVal) && !empty($searchVal)) {
                foreach ($columns as $Ckey => $Crec) { 
                    $cname = $Crec['data'];  
                    if ($cname == 'index_action_th' || $cname == 'index_groups_th' || $cname == "active" || $cname == "send_message" || $cname == "is_login" || $cname == "last_login" || $cname == "created_on" || $cname == "created_on" ) {
                    } else {
                        $whereLike[$Crec['data']] = $searchVal;
                    }     
                }
                 
            }

            if (!empty($order)) {
                $column = $columns[$order[0]['column']]['data'];
                if($column == 'index_groups_th')
                { 
                    $column = 'group_id';
                     
                }else{

                }
                $orderBy = array($column, $order[0]['dir']);  
                
            }

             

            // $records = $this->subscription_model->checkAssignedSubscription(null, null, $limit, $offset);
            $tableSelect = 'tb1.*,tb2.group_id';
            $tableInfo = "$tableInfo tb1,users_groups tb2-tb2.user_id=tb1.id-Left";
            $data = getByWhere($tableInfo, $tableSelect, $where, $orderBy, $length, $start, $whereLike);
           
            
            $totalRecords = getByWhereCount($tableInfo, $where, $whereLike);
            
          
            // previous code
            // $totalRecords = CountRecords('users', null);

            // sample code
            // $data = getByWhere($tableInfo, $tableSelect, $where, $orderBy, $length, $start, $whereLike);
            // $totalRecords = getByWhereCount($tableInfo, $where, $whereLike);



            foreach ($data as $k => $user) {
                $data[$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
            }


            ///group sorting
            // if($group_sroting == true)
            // {
            //     array_multisort( array_column($data, "price"), SORT_ASC, $data );
            // }



            $returnCont = array();
            if ($data) {
                foreach ($data as $key => $rec) {
                    $rec = (array) $rec;
                   

                    foreach ($columns as $colKey => $colRec) {

                        if ($colRec['data'] == 'first_name') {
                            // $id = $rec['diary_id'];
                            // $Button = '';
                            // $Button .= '<a href="' . base_url() . 'edit_diary/' . $id . '" style="color: #160f75f5"><i class="fas fa-pen-square"></i></a>&nbsp';
                            // $Button .= '<a href="' . base_url() . 'diary_item/' . $id . '" style="color: #160f75f5" title="Diary Item Managament"><i class="fas fa-book-medical"></i></a>&nbsp';

                            // $Button .= '<a href="' . base_url() . 'delete/diary/diary_id/' . $id . '" style="color: red;" onclick="return confirm(' . $msgDelete . ')"><i class="fas fa-trash-alt" aria-hidden="true"></i></a>';
                            $returnCont[$key][$colRec['data']] =  $rec['first_name'] . ' ' . $rec['last_name'];
                        } elseif ($colRec['data'] == 'email') {
                            $returnCont[$key][$colRec['data']] =  '<a href="mailto:' . htmlspecialchars($rec['email'], ENT_QUOTES, 'UTF-8') . '" target="_blank">' . htmlspecialchars($rec['email'], ENT_QUOTES, 'UTF-8') . '</a>';
                        } elseif ($colRec['data'] == 'phone') {
                            $returnCont[$key][$colRec['data']] =  '<a href="tel:' . htmlspecialchars($rec['phone'], ENT_QUOTES, 'UTF-8') . '" target="_blank">' . htmlspecialchars($rec['phone'], ENT_QUOTES, 'UTF-8') . '</a>';
                        } elseif ($colRec['data'] == 'index_groups_th') {
                            $html = '';
                            foreach ($rec['groups'] as $group) {
                                $html .= anchor("auth/edit_group/" . $group->id, ucwords(htmlspecialchars($group->name, ENT_QUOTES, 'UTF-8'))) . '<br />';
                            }
                            $returnCont[$key][$colRec['data']] =  $html;
                        } elseif ($colRec['data'] == 'active') {
                            $html = '';
                            $html = ($rec['active']) ? anchor("auth/deactivate/" . $rec['id'], lang('index_active_link'), array('class' => 'active_deactive_user', 'data-id' => $rec['id'])) : anchor("auth/activate/" . $rec['id'], lang('index_inactive_link'), array('class' => 'active_deactive_user', 'data-id' => $rec['id']));
                            $returnCont[$key][$colRec['data']] =  $html;
                        } elseif ($colRec['data'] == 'send_message') {
                            $html = '';
                            $html = '<button class="btn send_msg_touser" title="send message" data-email="' . htmlspecialchars($rec['email'], ENT_QUOTES, 'UTF-8') . '"><i class="zmdi zmdi-email"></i> Send</button>';
                            $returnCont[$key][$colRec['data']] =  $html;
                        } elseif ($colRec['data'] == 'is_login') {
                            $html = '';
                            $html =  ($rec['is_login']) ? "YES"  : "NO";
                            $returnCont[$key][$colRec['data']] =  $html;
                        } elseif ($colRec['data'] == 'last_login') {
                            $html = '';
                            $html = $rec['last_login'] ? date('d M, Y H:i:s', $rec['last_login']) : 'N/A';
                            $returnCont[$key][$colRec['data']] =  $html;
                        } elseif ($colRec['data'] == 'created_on') {
                            $html = '';
                            $html = $rec['created_on'] ? date('d M, Y H:i:s', $rec['created_on']) : 'N/A';
                            $returnCont[$key][$colRec['data']] =  $html;
                        } elseif ($colRec['data'] == 'index_action_th') {
                            $html = '';
                            $html = '<div class="table-data-feature">';
                            $html .= anchor("auth/edit_user/" . $rec['id'], '<i class="zmdi zmdi-edit"></i>', array('title' => 'Edit', 'class' => 'item', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'data-id' => $rec['id']));
                            $html .= '<button class="item add_user_subscription" title="Add Subscription" data-toggle="tooltip" data-placement="top" data-id="' . $rec['id'] . '" ><i class="zmdi zmdi-plus-circle"></i></button> ';
                            $html .= '<button class="item view_user_subscription" title="View Subscription" data-toggle="tooltip" data-placement="top" data-id="' . $rec['id'] . '" ><i class="zmdi zmdi-view-toc"></i></button>';
                            $html .= anchor("admin/completedoffer/" . $rec['id'], '<i class="fas fa-eye"></i>', array('title' => 'View Completed Offer', 'class' => 'item', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'data-id' => $rec['id']));
                            $html .= anchor("admin/deleteUser/" . $rec['id'], '<i class="fas fa-trash"></i>', array('title' => 'Delete', 'class' => 'item deleteUser', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'data-id' => $rec['id']));

                            $html .= '</div> ';
                            $returnCont[$key][$colRec['data']] =  $html;
                        } else {

                            $returnCont[$key][$colRec['data']] = ($rec[$colRec['data']]) ? $rec[$colRec['data']] : '';
                        }
                    }
                }
            }
            $return['draw'] = $draw;
            $return['recordsTotal'] = $totalRecords;
            $return['recordsFiltered'] = $totalRecords;
            $return['data'] = $returnCont;
            echo json_encode($return);
        }

        public function index()
        {
            $this->data['pageName'] = "Dashboard";
            $completedOffers = $this->admin_model->getCompletedOfferByDate($this->month_for_chart);
            $months = $monthsRecord = [];
            if ($completedOffers) {
                foreach ($completedOffers as $singleCompleteOffer) {
                    $monthYear = date('M-Y', strtotime($singleCompleteOffer->created));
                    if (!in_array($monthYear, $months)) {
                        $months[] = $monthYear;
                        $monthsRecord[] = $singleCompleteOffer->totalRecord;
                    }
                }
            }
            $months = array_reverse($months);
            $monthsRecord = array_reverse($monthsRecord);

            $this->data['months'] = $months;
            $this->data['monthsRecord'] = $monthsRecord;

            $trackOffers = $this->admin_model->getTrackOfferByDate($this->month_for_chart);
            $tMonths = $tMonthsRecord = [];
            if ($trackOffers) {
                foreach ($trackOffers as $singleTrackOffer) {
                    $tMonthYear = date('M-Y', strtotime($singleTrackOffer->created));
                    if (!in_array($tMonthYear, $tMonths)) {
                        $tMonths[] = $tMonthYear;
                        $tMonthsRecord[] = $singleTrackOffer->totalRecord;
                    }
                }
            }
            $tMonths = array_reverse($tMonths);
            $tMonthsRecord = array_reverse($tMonthsRecord);

            $this->data['tMonths'] = $tMonths;
            $this->data['tMonthsRecord'] = $tMonthsRecord;

            $totalUsers = $totalOffers = $totalCompletedOffer = $totalTrackOffer = 0;
            if ($userCount = $this->admin_model->getTotalUserCount()) {
                $totalUsers = $userCount->totalUser;
            }
            if ($offerCount = $this->admin_model->getTotalOfferCount()) {
                $totalOffers = $offerCount->totalOffers;
            }
            if ($completedOfferCount = $this->admin_model->getTotalCompletedOfferCount()) {
                $totalCompletedOffer = $completedOfferCount->totalCompletedOffer;
            }
            if ($trackOfferCount = $this->admin_model->getTotalTrackOfferCount()) {
                $totalTrackOffer = $trackOfferCount->totalTrackOffer;
            }

            $this->data['totalUsers'] = $totalUsers;
            $this->data['totalOffers'] = $totalOffers;
            $this->data['totalCompletedOffer'] = $totalCompletedOffer;
            $this->data['totalTrackOffer'] = $totalTrackOffer;
            $this->_render_page('admin' . DIRECTORY_SEPARATOR . 'index', $this->data);
        }

        public function reload_offer_chart()
        {
            $geo_code = $this->input->post('geo_code');
            $trackOffers = $this->admin_model->getTrackOfferByDate($this->month_for_chart, $geo_code);
            $tMonths = $tMonthsRecord = $resultArray = [];
            if ($trackOffers) {
                foreach ($trackOffers as $singleTrackOffer) {
                    $tMonthYear = date('M-Y', strtotime($singleTrackOffer->created));
                    if (!in_array($tMonthYear, $tMonths)) {
                        $tMonths[] = $tMonthYear;
                        $tMonthsRecord[] = $singleTrackOffer->totalRecord;
                    }
                }
            }
            $tMonths = array_reverse($tMonths);
            $tMonthsRecord = array_reverse($tMonthsRecord);

            if ($tMonths && $tMonthsRecord) {
                $resultArray['error'] = 'false';
                $resultArray['tMonths'] = $tMonths;
                $resultArray['tMonthsRecord'] = $tMonthsRecord;
            } else {
                $resultArray['error'] = 'true';
            }
            echo json_encode($resultArray);
            exit(0);
        }

        public function settings()
        {
            $this->data['pageName'] = "Settings";
            $this->form_validation->set_rules('google_analytics_code', 'Google Analytics Code Required', 'required');
            $this->form_validation->set_rules('facebook_pixcel_code', 'Facebook Pixcel Code Required', 'required');
            if ($this->form_validation->run() === TRUE) {
                $data = [
                    'google_analytics_code' => $this->input->post('google_analytics_code'),
                    'facebook_pixcel_code' => $this->input->post('facebook_pixcel_code'),
                    'offer_banner_html' => $this->input->post('offer_banner_html'),
                    'offer_banner_title' => $this->input->post('offer_banner_title')
                ];

                if ($_FILES['offer_banner_image']['size'] > 0) {
                    $this->load->library('upload');
                    $config['upload_path'] = $this->upload_path;
                    $config['allowed_types'] = $this->image_types;
                    $config['max_size'] = $this->allowed_file_size;
                    $config['overwrite'] = FALSE;
                    $new_name = time() . $_FILES["offer_banner_image"]['name'];
                    $config['file_name'] = $new_name;

                    $this->upload->initialize($config);
                    if ($this->upload->do_upload('offer_banner_image')) {
                        $photo = $this->upload->file_name;
                        $data['offer_banner_image'] = $photo;
                    } else {
                        $file_error = $this->upload->display_errors();
                    }
                }
                $updateSetting = $this->admin_model->updateSettings($data);
                if ($updateSetting) {
                    $this->session->set_flashdata('message', 'Settings Successfully Updated.');
                } else {
                    $this->session->set_flashdata('message', 'Error! While Updating Settings');
                }
                redirect('admin/settings', 'refresh');
            } else {
                $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
                $this->data['settings'] = $this->settings;

                $this->_render_page('admin' . DIRECTORY_SEPARATOR . 'settings', $this->data);
            }
        }

        public function payments()
        {
            $this->data['pageName'] = "Payments";
            $this->data['payments'] = $this->admin_model->getAllUserPaymentTransactions();
            $this->data['TotalEarning'] = $this->admin_model->getTotalEarningAmount();
            $this->_render_page('admin' . DIRECTORY_SEPARATOR . 'payments', $this->data);
        }

        public function getUserByCountry()
        {
            $id = $this->input->post('countryId');
            $record = $this->ion_auth->getUserByCountry($id);
            echo json_encode($record);
            die();
        }

        public function emailmarketing()
        {

            $this->data['pageName'] = "Emailmarketing";
            $this->data['users'] = $this->ion_auth->emailusers();
            $this->data['counties'] = $this->ion_auth->countries();
            $this->data['message'] = $this->session->flashdata('message');
            $this->data['error'] = $this->session->flashdata('error');

            $this->_render_page('admin' . DIRECTORY_SEPARATOR . 'emailmarketing', $this->data);
        }

        public function emailmarketingEmails()
        {
            $this->load->library('Ion_auth');
            $emails = $this->input->post('emails');
            $subject = $this->input->post('subject');
            $description = $this->input->post('description');
            if ($emails != "") {
                $email = explode(',', $emails);
                $forgotten = $this->sendEmailMarketingEmail($email, $subject, $description);
                echo json_encode($forgotten);
                die();
            }
        }

        public function sendEmailMarketingEmail($emailArray, $subject, $description)
        {
            $message = $description;
            $fromEmail = $this->config->item('from_email', 'ion_auth');
            $name = $this->config->item('site_title', 'ion_auth');
            if (!empty($emailArray)) {
                $emailArrayMsg = array();
                $failedEmail = array();
                $successedEmail = array();
                foreach ($emailArray as $key => $toEmail) {
                    $toEmail = trim($toEmail);
                    $emailResponse = $this->sendSendgridEmail($fromEmail, $name, $toEmail, $subject, $message);
                    if ($emailResponse === true) {
                        $successedEmail[] = $toEmail;
                    } else {
                        $failedEmail[] = $toEmail;
                    }
                }
                $emailArrayMsg['successed'] = $successedEmail;
                $emailArrayMsg['failed'] = $failedEmail;
                return $emailArrayMsg;
            }
        }

        public function sendSendgridEmail($fromEmail, $name, $toEmail, $subject, $message)
        {
            $email = new \SendGrid\Mail\Mail();
            $email->setFrom($fromEmail, $name);
            $email->setSubject($subject);
            $email->addTo($toEmail, "");
            $email->addContent("text/html", $message);
            $sendgrid = new \SendGrid('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');
            try {
                $response = $sendgrid->send($email);
                return true;
                //return $response->statusCode();
                /*print_r($response->headers());
            print $response->body() . "\n";*/
            } catch (Exception $e) {
                return $e->getMessage();
                //echo 'Caught exception: '. $e->getMessage() ."\n";
            }
        }

        public function addDirectSubscription()
        {

            $user_id = $this->input->post('user_id') ? $this->input->post('user_id') : $this->user_id;
            $subscription_id = $this->input->post('subscriptionPlan');
            $subscriptionDetails = $this->subscription_model->getSubscriptionDetails($subscription_id);
            $paystubCountryID = $this->input->post('paystubCountry');
            $usersMembership = $this->subscription_model->checkAssignedSubscription($user_id, $paystubCountryID);
            $expireDate = isset($usersMembership[0]->expire_date) ? $usersMembership[0]->expire_date : '';
            $dateFormat = date("Y-m-d H:i:s");

            if ($subscriptionDetails) {
                $membershipDays = $subscriptionDetails[0]->duration;
                $expiredDate = date('Y-m-d H:i:s', strtotime($expireDate . " + $membershipDays"));
            }

            $result = '';
            $returnArray = [];
            if (isset($usersMembership[0]) && $usersMembership[0]->subscription_id == $subscription_id && $usersMembership[0]->paystub_country_id == $paystubCountryID) {
                $returnArray['error'] = 'true';
                $returnArray['message'] = 'Sorry! Membership is already added for this user.';
                echo json_encode($returnArray);
                exit(0);
            } else if ($usersMembership) {
                //IF MEMBERSHIP IS ALREADY EXISTS FOR THIS USER
                //UPDATE users_membership TABLE
                $data = array(
                    'user_id' => $user_id,
                    'subscription_id' => $subscription_id,
                    'paystub_country_id' => $paystubCountryID,
                    'is_active' => 1,
                    'is_expire' => 0,
                    'expire_date' => $expiredDate,
                    'modified' => $dateFormat,
                    'added_by' => $this->user_id,
                );
                $result = $this->subscription_model->updateSubscription($usersMembership[0]->id, $data, 'renual');
            } else {
                //NEW MEMBERSHIP
                //ADD INTO users_membership TABLE
                $data = array(
                    'user_id' => $user_id,
                    'subscription_id' => $subscription_id,
                    'paystub_country_id' => $paystubCountryID,
                    'is_active' => 1,
                    'is_expire' => 0,
                    'expire_date' => $expiredDate,
                    'added_by' => $this->user_id,
                );
                $result = $this->subscription_model->addUserSubscription($data);
            }
            if ($result) {
                $returnArray['error'] = 'false';
                $returnArray['message'] = 'Subscription Successfully Added.';
            } else {
                $returnArray['error'] = 'true';
                $returnArray['message'] = 'Error! While Adding Subscription.';
            }
            echo json_encode($returnArray);
            exit(0);
        }

        public function listUserSubscription()
        {
            $user_id = $this->input->post('user_id');
            $returnArray = [];
            if (!$user_id) {
                $returnArray['error'] = 'true';
                $returnArray['message'] = 'Sorry, User Details Not Found. Please, Try Again.';
                echo json_encode($returnArray);
                exit(0);
            }
            $subscriptions = $this->subscription_model->getAllUserSubscriptionByUserId($user_id);
            if ($subscriptions) {
                $html = '<div class="">
        <table id="subscriptions_table" class="table table-striped table-bordered dataTableJS" style="width:100%">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Duration</th>
                    <th>Rate</th>
                    <th>Paystub</th>
                    <th>Start date</th>
                    <th>Expired On</th>
                    <th>Is Active</th>
                </tr>
            </thead>
            <tbody>';
                if ($subscriptions) {
                    foreach ($subscriptions as $singleSubscription) {
                        $html .= '<tr>
                                <td>' . ucwords($singleSubscription->title) . '</td>
                                <td>' . ucwords($singleSubscription->duration) . '</td>
                                <td>' . (($singleSubscription->unicode ? $singleSubscription->unicode : '') . ' ' . $singleSubscription->rate) . '</td>
                                <td>' . ucwords($singleSubscription->paystubCountry) . '</td>
                                <td>' . date('d M, Y H:i:s', strtotime($singleSubscription->created)) . '</td>
                                <td>' . date('d M, Y H:i:s', strtotime($singleSubscription->expire_date)) . '</td>
                                <td>' . (($singleSubscription->expire_date > date('Y-m-d H:i:s')) ? 'Yes' : 'No') . '</td>
                            </tr>';
                    }
                } else {
                    $html .= '<tr>
                            <td colspan="6">No data found.</td>
                        </tr>';
                }
                $html .= '</tbody>
                </table>
            </div>';
                $returnArray['error'] = 'false';
                $returnArray['html'] = $html;
            } else {
                $returnArray['error'] = 'true';
                $returnArray['message'] = 'No Subscriptions Found.';
                echo json_encode($returnArray);
                exit(0);
            }
            echo json_encode($returnArray);
            exit(0);
        }

        public function offers()
        {
            $this->data['pageName'] = "Offers";
            $this->data['offers'] = $this->admin_model->getAllOffers();
            $this->data['error'] = $this->session->flashdata('error');
            $this->data['message'] = $this->session->flashdata('message');
            $this->_render_page('admin' . DIRECTORY_SEPARATOR . 'offers', $this->data);
        }

        public function completedoffer($id = NULL)
        {
            if ($id) {
                
                $this->data['pageName'] = "Completed Offers";
                $this->data['totaloffers'] = $this->admin_model->getAllCompletedOffers($id);
                $this->data['error'] = $this->session->flashdata('error');
                $this->data['message'] = $this->session->flashdata('message'); 

                $this->_render_page('admin' . DIRECTORY_SEPARATOR . 'completedoffer', $this->data);
            } else {
                $this->data['pageName'] = "Completed Offers";
                $this->data['totaloffers'] = $this->admin_model->getAllCompletedOffers();
                $this->data['error'] = $this->session->flashdata('error');
                $this->data['message'] = $this->session->flashdata('message');

                $this->_render_page('admin' . DIRECTORY_SEPARATOR . 'completedoffer', $this->data);
            }
        }

        public function send_message()
        {
            $this->data['pageName'] = "Send Email";
            $this->data['error'] = $this->session->flashdata('error');
            $this->data['message'] = $this->session->flashdata('message');
            $this->_render_page('admin' . DIRECTORY_SEPARATOR . 'send_message', $this->data);
        }

        function sendMessagetoactiveuser()
        {
            $this->form_validation->set_rules('user_message', 'Please enter message', 'required');
            $this->form_validation->set_rules('message_subject', 'Please enter message subject', 'required');
            if ($this->form_validation->run() === TRUE) {
                $messagetosent = $this->input->post('user_message');
                $subject = $this->input->post('message_subject');
                $listofemail = $this->admin_model->getactiveusers();
                $newemail = array();
                foreach ($listofemail as $singleemail) {
                    if ($singleemail->email !== 'twibibless@gmail.com') {
                        array_push($newemail, $singleemail->email);
                    }
                }

                $email = $this->email(NULL, NULL, implode(',', $newemail), NULL, NULL, $subject, '<p style="white-space:pre-wrap;">' . $messagetosent . '</p>');
                if ($email) {
                    $this->session->set_flashdata('message', 'Your message is sent to all active users.');
                } else {
                    $this->session->set_flashdata('error', 'There is error in sending your message.');
                }
                redirect('admin/send_message', 'refresh');
            }
        }
        function sendMessagetonormaluser()
        {
            $this->form_validation->set_rules('user_message', 'Please enter message', 'required');
            $this->form_validation->set_rules('message_subject', 'Please enter message subject', 'required');
            if ($this->form_validation->run() === TRUE) {
                $recipient = $this->input->post('message_recipient');
                $messagetosent = $this->input->post('user_message');
                $subject = $this->input->post('message_subject');

                $email = $this->email($recipient, NULL, NULL, NULL, NULL, $subject, '<p style="white-space:pre-wrap;">' . $messagetosent . '</p>');
                if ($email) {
                    $this->session->set_flashdata('message', 'Your message is sent successfully.');
                } else {
                    $this->session->set_flashdata('error', 'There is error in sending your message.');
                }
                redirect('admin/users', 'refresh');
            }
        }


        public function add_offer()
        {
            $this->data['pageName'] = "Add Offer";
            $this->form_validation->set_rules('offer_name', 'Offer Name Required', 'required');
            $this->form_validation->set_rules('offer_url', 'Offer URL Required', 'required');
            $this->form_validation->set_rules('offer_geo_code[]', 'Select Any One Geo Code', 'required');
            if ($this->form_validation->run() === TRUE) {

                $data = [
                    'name' => $this->input->post('offer_name'),
                    'url' => $this->input->post('offer_url'),
                    'geo_code' => serialize($this->input->post('offer_geo_code[]')),
                    'description' => $this->input->post('description'),
                    'is_active' => $this->input->post('offer_isactive') ? $this->input->post('offer_isactive') : '',
                    'StaticUrl' => $this->input->post('offer_hasextraparam') ? $this->input->post('offer_hasextraparam') : '',
                    'ExtraGetParams' => $this->input->post('offer_hasextraparam') ? '' : $this->input->post('offer_postbackparams'),
                    'created' => date('Y-m-d H:i:s'),
                    'added_by' => $this->user_id
                ];

                // echo serialize($data['geo_code']);
                // echo base64_encode(serialize($data['geo_code']));

                if ($_FILES['offer_image']['size'] > 0) {
                    $this->load->library('upload');
                    $config['upload_path'] = $this->upload_path;
                    $config['allowed_types'] = $this->image_types;
                    $config['max_size'] = $this->allowed_file_size;
                    $config['overwrite'] = FALSE;
                    $new_name = time() . $_FILES["offer_image"]['name'];
                    $config['file_name'] = $new_name;

                    $this->upload->initialize($config);
                    if ($this->upload->do_upload('offer_image')) {
                        $photo = $this->upload->file_name;
                        $data['image'] = $photo;
                    } else {
                        $file_error = $this->upload->display_errors();
                    }
                }
                $addOffer = $this->admin_model->addOffer($data);

                if (isset($file_error) && $file_error) {
                    $this->session->set_flashdata('error', $file_error);
                } else if ($addOffer) {
                    $this->session->set_flashdata('message', 'Offer Successfully Created.');
                } else {
                    $this->session->set_flashdata('message', 'Error! While Creating Offer. Please, try again');
                }
                redirect('admin/offers', 'refresh');
            } else {
                $this->data[''] = '';
                $this->_render_page('admin' . DIRECTORY_SEPARATOR . 'add_offer', $this->data);
            }
        }

        public function edit_offer($id = NULL)
        {

            $this->form_validation->set_rules('offer_name', 'Offer Name Required', 'required');
            $this->form_validation->set_rules('offer_url', 'Offer URL Required', 'required');
            $this->form_validation->set_rules('offer_geo_code[]', 'Select Any One Geo Code', 'required');
            if ($this->form_validation->run() === TRUE) {
                $offer_id = $id;
                $data = [
                    'name' => $this->input->post('offer_name'),
                    'url' => $this->input->post('offer_url'),
                    'geo_code' => serialize($this->input->post('offer_geo_code[]')),
                    'description' => $this->input->post('description'),
                    'is_active' => $this->input->post('offer_isactive') ? $this->input->post('offer_isactive') : '',
                    'StaticUrl' => $this->input->post('offer_hasextraparam') ? $this->input->post('offer_hasextraparam') : '',
                    'ExtraGetParams' => $this->input->post('offer_hasextraparam') ? '' : $this->input->post('offer_postbackparams'),
                    'added_by' => $this->user_id
                ];
                if ($_FILES['offer_image']['size'] > 0) {
                    $this->load->library('upload');
                    $config['upload_path'] = $this->upload_path;
                    $config['allowed_types'] = $this->image_types;
                    $config['max_size'] = $this->allowed_file_size;
                    $config['overwrite'] = FALSE;
                    $new_name = time() . $_FILES["offer_image"]['name'];
                    $config['file_name'] = $new_name;

                    $this->upload->initialize($config);
                    if ($this->upload->do_upload('offer_image')) {
                        $photo = $this->upload->file_name;
                        $data['image'] = $photo;
                    } else {
                        $file_error = $this->upload->display_errors();
                    }
                }
                $updateOffer = $this->admin_model->updateOffer($offer_id, $data);

                if (isset($file_error) && $file_error) {
                    $this->session->set_flashdata('error', $file_error);
                } else if ($updateOffer) {
                    $this->session->set_flashdata('message', 'Offer Successfully Updated.');
                } else {
                    $this->session->set_flashdata('message', 'Error! While Updating Offer. Please, try again');
                }
                redirect('admin/offers', 'refresh');
            } else {
                $this->data['offer'] = $this->admin_model->getOfferByID($id);
                $this->_render_page('admin' . DIRECTORY_SEPARATOR . 'edit_offer', $this->data);
            }
        }

        public function delete_offer($id = NULL)
        {
            $deleteOffer = $this->admin_model->deleteOffer($id);
            if ($deleteOffer) {
                $this->session->set_flashdata('message', 'Offer Successfully Deleted.');
            } else {
                $this->session->set_flashdata('error', 'Error! While Deleting Offer. Please, try again.');
            }
            redirect('admin/offers', 'refresh');
        }

        public function active_deactive_offer()
        {
            $returnArray = [];
            $id = $this->input->post('offer_id');
            $offer_status = $this->input->post('offer_status');
            if ($this->ion_auth->logged_in() && $this->ion_auth->is_admin()) {
                if ($offer_status == 'active') {
                    $data = ['is_active' => 0];
                } else if ($offer_status == 'inactive') {
                    $data = ['is_active' => 1];
                } else {
                    $data = ['is_active' => 0];
                }

                if ($this->admin_model->updateOffer($id, $data)) {
                    $returnArray['error'] = 'false';
                    $returnArray['message'] = 'Offer Activate Successfully.';
                } else {
                    $returnArray['error'] = 'true';
                    $returnArray['message'] = '';
                }
            } else {
                $returnArray['error'] = 'true';
                $returnArray['message'] = '';
            }
            echo json_encode($returnArray);
            exit(0);
        }

        public function deleteUser($userId = 0)
        {
            //  echo $userId; exit;
            $currentUser = $this->user_id;
            $query = $this->db->query("select count(*) as is_admin from users_groups where user_id=$currentUser and group_id=1");
            $data = $query->result();



            if ($data[0]->is_admin) {
                $query = $this->db->query("select count(*) as is_admin from users_groups where user_id=$userId and group_id=1");
                $data = $query->result();

                if (!$data[0]->is_admin) {

                    $this->db->delete('users', array('id' => $userId));
                    $this->db->delete('users_groups', array('user_id' => $userId));

                    $query = $this->db->query("select id  from my_paystubs where user_id=$userId");
                    $data_my_paystubs = $query->result_array();

                    foreach ($data_my_paystubs as $my_paystubs) {

                        $this->mypaystub_model->deleteMypaystubonView($userId, $my_paystubs['id']);
                    }



                    $this->session->set_flashdata('message', 'User Deleted successfully.');
                } else {
                    $this->session->set_flashdata('error', 'You can not delete user with admin role.');
                }
            }


            redirect('admin/users', 'refresh');
        }
    }

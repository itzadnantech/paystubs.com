<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Paypal extends MY_Controller {

    function __construct() {
        parent::__construct();
        //CHECK FOR USER IS LOGGEDIN OR NOT
        if (!$this->ion_auth->logged_in()) {
            $subscription_id = $this->input->post('subscriptionPlan');
            $paystub_form_data = $this->input->post('paystub_form_data');
            if($subscription_id) {
                $this->session->set_userdata('subscriptionPlan', $subscription_id);
            }
            if($paystub_form_data) {
                $this->session->set_userdata('paystub_form_data', $paystub_form_data);
            }
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        } else {
            $paystub_form_data = $this->input->post('paystub_form_data');
            if($paystub_form_data) {
                $this->session->set_userdata('paystub_form_data', $paystub_form_data);
            }
        }
        if($this->is_admin) {
            redirect('admin', 'refresh');
        }
        // Load PayPal library config
        $this->config->load('paypal_sample');

        //LOAD PAYMENTS MODEL
        $this->load->model('payments');
        $config = array(
            'Sandbox' => $this->config->item('Sandbox'), // Sandbox / testing mode option.
            'APIUsername' => $this->config->item('APIUsername'), // PayPal API username of the API caller
            'APIPassword' => $this->config->item('APIPassword'), // PayPal API password of the API caller
            'APISignature' => $this->config->item('APISignature'), // PayPal API signature of the API caller
            'APISubject' => '', // PayPal API subject (email address of 3rd party user that has granted API permission for your app)
            'APIVersion' => $this->config->item('APIVersion'), // API version you'd like to use for your call.  You can set a default version in the class and leave this blank if you want.
            'DeviceID' => $this->config->item('DeviceID'),
            'ApplicationID' => $this->config->item('ApplicationID'),
            'DeveloperEmailAccount' => $this->config->item('DeveloperEmailAccount')
        );

        // Show Errors
        if ($config['Sandbox']) {
            error_reporting(E_ALL);
            ini_set('display_errors', '1');
        }
        
        $this->load->model('subscription_model');
        // Load PayPal library
        $this->load->library('paypal/paypal_pro', $config);
    }

    /**
     * Cart Review page
     */
    function index($renewalId = '') {
        //KEEP MEMBERSHIP DETAIL IN SESSION
        $membershipData = $this->session->flashdata('membershipData');
        $renewal = $this->session->flashdata('renewal');
        $renewalData = $this->session->flashdata('renewalData');        
        $renewal_key = (isset($renewal) && $renewal != '') ? $renewal : $renewalId ;
        (isset($renewal) && $renewal != '') ? $this->session->set_userdata('membership', $renewalData) : $this->session->set_userdata('membership', $membershipData);
        $membershipId = isset($membershipData['subscription_id']) ? $membershipData['subscription_id'] : $renewal_key;
        $subscriptionDetails = $this->subscription_model->getSubscriptionDetails($membershipId);
        if ($subscriptionDetails) {
            // Clear PayPalResult from session userdata
            $this->session->unset_userdata('PayPalResult');

            // Clear cart from session userdata
            $this->session->unset_userdata('shopping_cart');
            
            $this->session->set_userdata('subscriptionPlan', $membershipId);
            // For demo purpose, we create example shopping cart data for display on sample cart review pages
            $amount = $subscriptionDetails[0]->rate;
            $count = 0;
            foreach ($subscriptionDetails as $key => $value) {
                $cart['items'][$count] = array(
                    'id' => $value->id,
                    'qty' => $value->duration,
                    'price' => $value->rate,
                    'name' => $value->title
                );
                $count++;
            }
            // Example Data - cart variable with items included
            $cart['shopping_cart'] = array(
                'items' => $cart['items'],
                'subtotal' => $amount,
                'shipping' => 0,
                'handling' => 0,
                'tax' => 0,
            );
            // Example Data - grand total
            $cart['shopping_cart']['grand_total'] = $cart['shopping_cart']['subtotal'] + $cart['shopping_cart']['shipping'] + $cart['shopping_cart']['handling'] + $cart['shopping_cart']['tax'];

            // Load example cart data to variable
            $this->load->vars('cart', $cart);

            // Set example cart data into session
            $this->session->set_userdata('shopping_cart', $cart);

            // Example - Load Review Page
            $this->data['cart'] = $cart;
            $posted_data = array();
            parse_str($this->session->userdata('paystub_form_data'), $posted_data);
            if(!$posted_data) {
                parse_str($this->session->userdata('not_login_paystub_form_data'), $posted_data);
            }
            $this->data['paystub_form_data'] = $posted_data;
            $this->_render_page('paypal' . DIRECTORY_SEPARATOR . 'index', $this->data);
        } else {
            $subscription_id = $this->input->post('subscriptionPlan') ? $this->input->post('subscriptionPlan') : $this->session->userdata('subscriptionPlan');
            if($subscription_id) {
                $this->session->set_flashdata('membershipData',array('user_id' => $this->user_id, 'subscription_id' => $subscription_id));
                redirect('paypal','refresh');
            } else {
                redirect('/paystub','refresh');
            }
        }
    }

    /**
     * SetExpressCheckout
     */
    function SetExpressCheckout($renewalId = '') {
        //KEEP MEMBERSHIP DETAIL IN SESSION
        $membershipData = $this->session->flashdata('membershipData');
        
        $subscription_id = $this->session->userdata('subscriptionPlan') ? $this->session->userdata('subscriptionPlan') : $this->input->post('subscriptionPlan') ;
        $membershipData = array('user_id' => $this->user_id, 'subscription_id' => $subscription_id);
        $renewal = $this->session->flashdata('renewal');
        $renewalData = $this->session->flashdata('renewalData');        
        $renewal_key = (isset($renewal) && $renewal != '') ? $renewal : $renewalId ;
        (isset($renewal) && $renewal != '') ? $this->session->set_userdata('membership', $renewalData) : $this->session->set_userdata('membership', $membershipData);
        $membershipId = isset($membershipData['subscription_id']) ? $membershipData['subscription_id'] : $renewal_key;
        $subscriptionDetails = $this->subscription_model->getSubscriptionDetails($membershipId);
        
        if(!$subscriptionDetails) {
            redirect('/', 'refresh');
        }
        // Clear PayPalResult from session userdata
        $this->session->unset_userdata('PayPalResult');
        
        
        
        // Clear cart from session userdata
        $this->session->unset_userdata('shopping_cart');
        $this->session->unset_userdata('subscriptionPlan');
//        $this->session->unset_userdata('paystub_form_data');
        
        // For demo purpose, we create example shopping cart data for display on sample cart review pages
        $amount = $subscriptionDetails[0]->rate;
        $count = 0;
        foreach ($subscriptionDetails as $key => $value) {
            $cart['items'][$count] = array(
                'id' => $value->id,
                'qty' => $value->duration,
                'price' => $value->rate,
                'name' => $value->title
            );
            $count++;
        }
        // Example Data - cart variable with items included
        $cart['shopping_cart'] = array(
            'items' => $cart['items'],
            'subtotal' => $amount,
            'shipping' => 0,
            'handling' => 0,
            'tax' => 0,
        );
        // Example Data - grand total
        $cart['shopping_cart']['grand_total'] = $cart['shopping_cart']['subtotal'] + $cart['shopping_cart']['shipping'] + $cart['shopping_cart']['handling'] + $cart['shopping_cart']['tax'];

        // Load example cart data to variable
        $this->load->vars('cart', $cart);

        // Set example cart data into session
        $this->session->set_userdata('shopping_cart', $cart);

        // Example - Load Review Page
        $this->data['cart'] = $cart;
        // Get cart data from session userdata
        
//        $cart = $this->session->userdata('shopping_cart');
        
        /**
         * Here we are setting up the parameters for a basic Express Checkout flow.
         *
         * The template provided at /vendor/angelleye/paypal-php-library/templates/SetExpressCheckout.php
         * contains a lot more parameters that we aren't using here, so I've removed them to keep this clean.
         *
         * $domain used here is set in the config file.
         */
        $SECFields = array(
            'maxamt' => round($cart['shopping_cart']['grand_total'] * 2, 2), // The expected maximum total amount the order will be, including S&H and sales tax.
            'returnurl' => site_url('paypal/GetExpressCheckoutDetails'), // Required.  URL to which the customer will be returned after returning from PayPal.  2048 char max.
            'cancelurl' => site_url('paypal/OrderCancelled'), // Required.  URL to which the customer will be returned if they cancel payment on PayPal's site.
            'hdrimg' => 'https://www.angelleye.com/images/angelleye-paypal-header-750x90.jpg', // URL for the image displayed as the header during checkout.  Max size of 750x90.  Should be stored on an https:// server or you'll get a warning message in the browser.
            'logoimg' => 'https://www.proteinbrokers.com/media/grafik/icon-paypal.gif', // A URL to your logo image.  Formats:  .gif, .jpg, .png.  190x60.  PayPal places your logo image at the top of the cart review area.  This logo needs to be stored on a https:// server.
            'brandname' => 'Paypal Demo', // A label that overrides the business name in the PayPal account on the PayPal hosted checkout pages.  127 char max.
            'customerservicenumber' => '816-555-5555', // Merchant Customer Service number displayed on the PayPal Review page. 16 char max.
            'L_PAYMENTREQUEST_0_NAME0' => $subscriptionDetails[0]->title,
            'L_PAYMENTREQUEST_0_DESC0' => $subscriptionDetails[0]->title,
            'L_PAYMENTREQUEST_0_NUMBER0' => 1,
            'L_PAYMENTREQUEST_0_AMT0' => $cart['shopping_cart']['grand_total'],
            'L_PAYMENTREQUEST_0_QTY0' => 1,
            'NOSHIPPING' => 0,
            'PAYMENTREQUEST_0_ITEMAMT' => $cart['shopping_cart']['grand_total'],
            'PAYMENTREQUEST_0_AMT' => $cart['shopping_cart']['grand_total'],
//            'PAYMENTREQUEST_0_PAYMENTACTION' => 'Sale',
            'PAYMENTREQUEST_0_CURRENCYCODE' => 'USD'
            
        );
        
        /**
         * Now we begin setting up our payment(s).
         *
         * Express Checkout includes the ability to setup parallel payments,
         * so we have to populate our $Payments array here accordingly.
         *
         * For this sample (and in most use cases) we only need a single payment,
         * but we still have to populate $Payments with a single $Payment array.
         *
         * Once again, the template file includes a lot more available parameters,
         * but for this basic sample we've removed everything that we're not using,
         * so all we have is an amount.
         */
        $Payments = array();
        $Payment = array(
            'amt' => $cart['shopping_cart']['grand_total'], // Required.  The total cost of the transaction to the customer.  If shipping cost and tax charges are known, include them in this value.  If not, this value should be the current sub-total of the order.
        );

        /**
         * Here we push our single $Payment into our $Payments array.
         */
        array_push($Payments, $Payment);

        /**
         * Now we gather all of the arrays above into a single array.
         */
        $PayPalRequestData = array(
            'SECFields' => $SECFields,
            'Payments' => $Payments,
        );

        /**
         * Here we are making the call to the SetExpressCheckout function in the library,
         * and we're passing in our $PayPalRequestData that we just set above.
         */
        $PayPalResult = $this->paypal_pro->SetExpressCheckout($PayPalRequestData);

        /**
         * Now we'll check for any errors returned by PayPal, and if we get an error,
         * we'll save the error details to a session and redirect the user to an
         * error page to display it accordingly.
         *
         * If all goes well, we save our token in a session variable so that it's
         * readily available for us later, and then redirect the user to PayPal
         * using the REDIRECTURL returned by the SetExpressCheckout() function.
         */
        if (!$this->paypal_pro->APICallSuccessful($PayPalResult['ACK'])) {
            $errors = array('Errors' => $PayPalResult['ERRORS']);

            // Load errors to variable
            $this->load->vars('errors', $errors);

            $this->load->view('paypal/paypal_error');
        } else {
            // Successful call.
            // Set PayPalResult into session userdata (so we can grab data from it later on a 'payment complete' page)
            $this->session->set_userdata('PayPalResult', $PayPalResult);

            // In most cases you would automatically redirect to the returned 'RedirectURL' by using: redirect($PayPalResult['REDIRECTURL'],'Location');
            // Move to PayPal checkout
            redirect($PayPalResult['REDIRECTURL'], 'Location');
        }
    }

    /**
     * GetExpressCheckoutDetails
     */
    function GetExpressCheckoutDetails() {
        // Get cart data from session userdata
        $cart = $this->session->userdata('shopping_cart');

        // Get PayPal data from session userdata
        $SetExpressCheckoutPayPalResult = $this->session->userdata('PayPalResult');
        $PayPal_Token = $SetExpressCheckoutPayPalResult['TOKEN'];

        /**
         * Now we pass the PayPal token that we saved to a session variable
         * in the SetExpressCheckout.php file into the GetExpressCheckoutDetails
         * request.
         */
        $PayPalResult = $this->paypal_pro->GetExpressCheckoutDetails($PayPal_Token);

        /**
         * Now we'll check for any errors returned by PayPal, and if we get an error,
         * we'll save the error details to a session and redirect the user to an
         * error page to display it accordingly.
         *
         * If the call is successful, we'll save some data we might want to use
         * later into session variables.
         */
        if (!$this->paypal_pro->APICallSuccessful($PayPalResult['ACK'])) {
            $errors = array('Errors' => $PayPalResult['ERRORS']);

            // Load errors to variable
            $this->load->vars('errors', $errors);

            $this->load->view('paypal/paypal_error');
        } else {
            // Successful call.

            /**
             * Here we'll pull out data from the PayPal response.
             * Refer to the PayPal API Reference for all of the variables available
             * in $PayPalResult['variablename']
             *
             * https://developer.paypal.com/docs/classic/api/merchant/GetExpressCheckoutDetails_API_Operation_NVP/
             *
             * Again, Express Checkout allows for parallel payments, so what we're doing here
             * is usually the library to parse out the individual payments using the GetPayments()
             * method so that we can easily access the data.
             *
             * We only have a single payment here, which will be the case with most checkouts,
             * but we will still loop through the $Payments array returned by the library
             * to grab our data accordingly.
             */
            $cart['paypal_payer_id'] = isset($PayPalResult['PAYERID']) ? $PayPalResult['PAYERID'] : '';
            $cart['phone_number'] = isset($PayPalResult['PHONENUM']) ? $PayPalResult['PHONENUM'] : '';
            $cart['email'] = isset($PayPalResult['EMAIL']) ? $PayPalResult['EMAIL'] : '';
            $cart['first_name'] = isset($PayPalResult['FIRSTNAME']) ? $PayPalResult['FIRSTNAME'] : '';
            $cart['last_name'] = isset($PayPalResult['LASTNAME']) ? $PayPalResult['LASTNAME'] : '';

            foreach ($PayPalResult['PAYMENTS'] as $payment) {
                $cart['shipping_name'] = isset($payment['SHIPTONAME']) ? $payment['SHIPTONAME'] : '';
                $cart['shipping_street'] = isset($payment['SHIPTOSTREET']) ? $payment['SHIPTOSTREET'] : '';
                $cart['shipping_city'] = isset($payment['SHIPTOCITY']) ? $payment['SHIPTOCITY'] : '';
                $cart['shipping_state'] = isset($payment['SHIPTOSTATE']) ? $payment['SHIPTOSTATE'] : '';
                $cart['shipping_zip'] = isset($payment['SHIPTOZIP']) ? $payment['SHIPTOZIP'] : '';
                $cart['shipping_country_code'] = isset($payment['SHIPTOCOUNTRYCODE']) ? $payment['SHIPTOCOUNTRYCODE'] : '';
                $cart['shipping_country_name'] = isset($payment['SHIPTOCOUNTRYNAME']) ? $payment['SHIPTOCOUNTRYNAME'] : '';
            }

            /**
             * At this point, we now have the buyer's shipping address available in our app.
             * We could now run the data through a shipping calculator to retrieve rate
             * information for this particular order.
             *
             * This would also be the time to calculate any sales tax you may need to
             * add to the order, as well as handling fees.
             *
             * We're going to set static values for these things in our static
             * shopping cart, and then re-calculate our grand total.
             */
            $cart['shopping_cart']['shipping'] = 00.00;
            $cart['shopping_cart']['handling'] = 00.00;
            $cart['shopping_cart']['tax'] = 0.00;

            $cart['shopping_cart']['grand_total'] = $cart['shopping_cart']['subtotal'] + $cart['shopping_cart']['shipping'] + $cart['shopping_cart']['handling'] + $cart['shopping_cart']['tax'];

            /**
             * Now we will redirect the user to a final review
             * page so they can see the shipping/handling/tax
             * that has been added to the order.
             */
            // Set example cart data into session
            $this->session->set_userdata('shopping_cart', $cart);

            // Load example cart data to variable
            $this->load->vars('cart', $cart);
            $this->data['cart'] = $cart;
            // Example - Load Review Page
            $this->_render_page('paypal' . DIRECTORY_SEPARATOR . 'review', $this->data);
        }
    }

    /**
     * DoExpressCheckoutPayment
     */
    function DoExpressCheckoutPayment() {
        //GET MEMBERSHIP DATA FROM FLASHDATA
        $membershipData = $this->session->userdata('membership');
        $user_id = isset($membershipData['user_id']) ? $membershipData['user_id'] : $this->user_id;
        $subscription_id = isset($membershipData['subscription_id']) ? $membershipData['subscription_id'] : '';
        $subscriptionDetails = $this->subscription_model->getSubscriptionDetails($subscription_id);
        $paystubCountryID = $this->session->userdata('paystubCountryID');
        $usersMembership = $this->subscription_model->checkAssignedSubscription($user_id, $paystubCountryID);
        $expireDate = (isset($membershipData['renewal'])) ? $usersMembership[0]->expire_date : '';
        $dateFormat = date("Y-m-d H:i:s");
        if ($subscriptionDetails) {
            $membershipDays = $subscriptionDetails[0]->duration;
            $expiredDate = date('Y-m-d H:i:s', strtotime($expireDate . " + $membershipDays"));
        }
        /**
         * Now we'll setup the request params for the final call in the Express Checkout flow.
         * This is very similar to SetExpressCheckout except that now we can include values
         * for the shipping, handling, and tax amounts, as well as the buyer's name and
         * shipping address that we obtained in the GetExpressCheckoutDetails step.
         *
         * If this information is not included in this final call, it will not be
         * available in PayPal's transaction details data.
         *
         * Once again, the template for DoExpressCheckoutPayment provides
         * many more params that are available, but we've stripped everything
         * we are not using in this basic demo out.
         */
        // Get cart data from session userdata
        $cart = $this->session->userdata('shopping_cart');
        // Get paypal data from session userdata
        $paypalData = $this->session->userdata('PayPalResult');

        // Get cart data from session userdata
        $SetExpressCheckoutPayPalResult = $this->session->userdata('PayPalResult');
        $PayPal_Token = $SetExpressCheckoutPayPalResult['TOKEN'];

        $DECPFields = array(
            'token' => $PayPal_Token, // Required.  A timestamped token, the value of which was returned by a previous SetExpressCheckout call.
            'payerid' => $cart['paypal_payer_id'], // Required.  Unique PayPal customer id of the payer.  Returned by GetExpressCheckoutDetails, or if you used SKIPDETAILS it's returned in the URL back to your RETURNURL.
        );

        /**
         * Just like with SetExpressCheckout, we need to gather our $Payment
         * data to pass into our $Payments array.  This time we can include
         * the shipping, handling, tax, and shipping address details that we
         * now have.
         */
        $Payments = array();
        $Payment = array(
            'amt' => number_format($cart['shopping_cart']['grand_total'], 2), // Required.  The total cost of the transaction to the customer.  If shipping cost and tax charges are known, include them in this value.  If not, this value should be the current sub-total of the order.
            'itemamt' => number_format($cart['shopping_cart']['subtotal'], 2), // Subtotal of items only.
            'currencycode' => 'USD', // A three-character currency code.  Default is USD.
            'shippingamt' => number_format($cart['shopping_cart']['shipping'], 2), // Total shipping costs for this order.  If you specify SHIPPINGAMT you mut also specify a value for ITEMAMT.
            'handlingamt' => number_format($cart['shopping_cart']['handling'], 2), // Total handling costs for this order.  If you specify HANDLINGAMT you mut also specify a value for ITEMAMT.
            'taxamt' => number_format($cart['shopping_cart']['tax'], 2), // Required if you specify itemized L_TAXAMT fields.  Sum of all tax items in this order.
            'shiptoname' => $cart['shipping_name'], // Required if shipping is included.  Person's name associated with this address.  32 char max.
            'shiptostreet' => $cart['shipping_street'], // Required if shipping is included.  First street address.  100 char max.
            'shiptocity' => $cart['shipping_city'], // Required if shipping is included.  Name of city.  40 char max.
            'shiptostate' => $cart['shipping_state'], // Required if shipping is included.  Name of state or province.  40 char max.
            'shiptozip' => $cart['shipping_zip'], // Required if shipping is included.  Postal code of shipping address.  20 char max.
            'shiptocountrycode' => $cart['shipping_country_code'], // Required if shipping is included.  Country code of shipping address.  2 char max.
            'shiptophonenum' => $cart['phone_number'], // Phone number for shipping address.  20 char max.
            'paymentaction' => 'Sale', // How you want to obtain the payment.  When implementing parallel payments, this field is required and must be set to Order.
            'L_PAYMENTREQUEST_0_NAME0' => $subscriptionDetails[0]->title,
            'L_PAYMENTREQUEST_0_DESC0' => $subscriptionDetails[0]->title,
            'L_PAYMENTREQUEST_0_NUMBER0' => 1,
            'L_PAYMENTREQUEST_0_AMT0' => $cart['shopping_cart']['grand_total'],
            'L_PAYMENTREQUEST_0_QTY0' => 1,
            'NOSHIPPING' => 0,
            'PAYMENTREQUEST_0_ITEMAMT' => $cart['shopping_cart']['grand_total'],
            'PAYMENTREQUEST_0_AMT' => $cart['shopping_cart']['grand_total'],
//            'PAYMENTREQUEST_0_PAYMENTACTION' => 'Sale',
            'PAYMENTREQUEST_0_CURRENCYCODE' => 'USD'
        );

        /**
         * Here we push our single $Payment into our $Payments array.
         */
        array_push($Payments, $Payment);

        /**
         * Now we gather all of the arrays above into a single array.
         */
        $PayPalRequestData = array(
            'DECPFields' => $DECPFields,
            'Payments' => $Payments,
        );

        /**
         * Here we are making the call to the DoExpressCheckoutPayment function in the library,
         * and we're passing in our $PayPalRequestData that we just set above.
         */
        $PayPalResult = $this->paypal_pro->DoExpressCheckoutPayment($PayPalRequestData);
        /**
         * Now we'll check for any errors returned by PayPal, and if we get an error,
         * we'll save the error details to a session and redirect the user to an
         * error page to display it accordingly.
         *
         * If the call is successful, we'll save some data we might want to use
         * later into session variables, and then redirect to our final
         * thank you / receipt page.
         */
        if (!$this->paypal_pro->APICallSuccessful($PayPalResult['ACK'])) {
            //STORE TRANSACTION DATA IN TABLE
            $productIds = array();
            if (!empty($cart['shopping_cart'])) {
                if (!empty($cart['shopping_cart']['items'])) {
                    foreach ($cart['shopping_cart']['items'] as $product) {
                        $productIds[] = $product['id'];
                    }
                }
                $productId = implode(',', $productIds);
                $data = array(
                    'user_id' => $user_id,
                    'subscription_id' => $subscription_id,
                    'paypal_payer_id' => $cart['paypal_payer_id'],
                    'product_id' => $productId,
                    'subtotal' => $cart['shopping_cart']['subtotal'],
                    'shipping' => $cart['shopping_cart']['shipping'],
                    'handling' => $cart['shopping_cart']['handling'],
                    'tax' => $cart['shopping_cart']['tax'],
                    'grand_total' => $cart['shopping_cart']['grand_total'],
                    'country_code' => $cart['shipping_country_code'],
                    'payer_email' => $cart['email'],
                    'first_name' => $cart['first_name'],
                    'last_name' => $cart['last_name'],
                    'shipping_address' => $cart['shipping_street'] . ' ' . $cart['shipping_city'] . ' ' . $cart['shipping_state'] . ' ' . $cart['shipping_zip'] . ' ' . $cart['shipping_country_name'],
                    'payment_status' => isset($PayPalResult['ACK']) ? $PayPalResult['ACK'] : 'failure'
                );
                $this->payments->insertTransaction($data);
                $this->session->unset_userdata('membership');
            }

            $errors = array('Errors' => $PayPalResult['ERRORS']);

            // Load errors to variable
            $this->load->vars('errors', $errors);

            $this->load->view('paypal/paypal_error');
        } else {
            // Successful call.
            /**
             * Once again, since Express Checkout allows for multiple payments in a single transaction,
             * the DoExpressCheckoutPayment response is setup to provide data for each potential payment.
             * As such, we need to loop through all the payment info in the response.
             *
             * The library helps us do this using the GetExpressCheckoutPaymentInfo() method.  We'll
             * load our $payments_info using that method, and then loop through the results to pull
             * out our details for the transaction.
             *
             * Again, in this case we are you only working with a single payment, but we'll still
             * loop through the results accordingly.
             *
             * Here, we're only pulling out the PayPal transaction ID and fee amount, but you may
             * refer to the API reference for all the additional parameters you have available at
             * this point.
             *
             * https://developer.paypal.com/docs/classic/api/merchant/DoExpressCheckoutPayment_API_Operation_NVP/
             */
            foreach ($PayPalResult['PAYMENTS'] as $payment) {
                $cart['paypal_transaction_id'] = isset($payment['TRANSACTIONID']) ? $payment['TRANSACTIONID'] : '';
                $cart['paypal_fee'] = isset($payment['FEEAMT']) ? $payment['FEEAMT'] : '';
            }

            //STORE TRANSACTION DATA IN TABLE
            $productIds = array();
            if (!empty($cart['shopping_cart'])) {
                if (!empty($cart['shopping_cart']['items'])) {
                    foreach ($cart['shopping_cart']['items'] as $product) {
                        $productIds[] = $product['id'];
                    }
                }
                $productId = implode(',', $productIds);
                $data = array(
                    'user_id' => $user_id,
                    'subscription_id' => $subscription_id,
                    'paypal_payer_id' => $cart['paypal_payer_id'],
                    'product_id' => $productId,
                    'txn_id' => $cart['paypal_transaction_id'],
                    'subtotal' => $cart['shopping_cart']['subtotal'],
                    'shipping' => $cart['shopping_cart']['shipping'],
                    'handling' => $cart['shopping_cart']['handling'],
                    'tax' => $cart['shopping_cart']['tax'],
                    'grand_total' => $cart['shopping_cart']['grand_total'],
                    'country_code' => $cart['shipping_country_code'],
                    'payer_email' => $cart['email'],
                    'first_name' => $cart['first_name'],
                    'last_name' => $cart['last_name'],
                    'shipping_address' => $cart['shipping_street'] . ' ' . $cart['shipping_city'] . ' ' . $cart['shipping_state'] . ' ' . $cart['shipping_zip'] . ' ' . $cart['shipping_country_name'],
                    'payment_status' => isset($PayPalResult['ACK']) ? $PayPalResult['ACK'] : 'Success'
                );
                $this->payments->insertTransaction($data);
                if ($usersMembership) {
                    //IF MEMBERSHIP IS ALREADY EXISTS FOR THIS USER
                    //UPDATE users_membership TABLE
                    $data = array(
                        'user_id' => $user_id,
                        'subscription_id' => $subscription_id,
                        'is_active' => 1,
                        'is_expire' => 0,
                        'expire_date' => $expiredDate,
                        'modified' => $dateFormat,
                        'added_by' => $user_id,
                    );
                    $update = $this->subscription_model->updateSubscription($user_id, $data, 'renual');
                } else {
                    //NEW MEMBERSHIP
                    //ADD INTO users_membership TABLE
                    $data = array(
                        'user_id' => $user_id,
                        'subscription_id' => $subscription_id,
                        'paystub_country_id' => $this->session->userdata('paystubCountryID'),
                        'is_active' => 1,
                        'is_expire' => 0,
                        'expire_date' => $expiredDate,
                        'added_by' => $user_id,
                    );
                    $this->subscription_model->addUserSubscription($data);
                }
                $this->session->unset_userdata('membership');
            }
            // Set example cart data into session
            $this->session->set_userdata('shopping_cart', $cart);

            // Successful Order
            redirect('paypal/OrderComplete');
        }
    }
    
    /**
     * Order Complete - Pay Return Url
     */
    function OrderComplete() {
        // Get cart from session userdata
        $cart = $this->session->userdata('shopping_cart');
        $this->session->unset_userdata('subscriptionPlan');
//        $this->session->unset_userdata('paystub_form_data');
        
        if (empty($cart))
            redirect('paypal');
        if (empty($cart['first_name']))
            redirect('paypal');
        // Set cart data into session userdata
        $this->load->vars('cart', $cart);

        // Successful call.  Load view or whatever you need to do here.
        $this->_render_page('paypal' . DIRECTORY_SEPARATOR . 'payment_complete', $this->data);
        $this->session->set_flashdata('message', 'You have subscribed with membership. Now you can gain all the access.');
        redirect('/','refresh');
    }

    /**
     * Order Cancelled - Pay Cancel Url
     */
    function OrderCancelled() {
        // Clear PayPalResult from session userdata
        $this->session->unset_userdata('PayPalResult');

        // Clear cart from session userdata
        $this->session->unset_userdata('shopping_cart');
        $this->session->unset_userdata('subscriptionPlan');
        $this->session->unset_userdata('paystub_form_data');

        // Successful call.  Load view or whatever you need to do here.
        $this->_render_page('paypal' . DIRECTORY_SEPARATOR . 'order_cancelled');
    }

}

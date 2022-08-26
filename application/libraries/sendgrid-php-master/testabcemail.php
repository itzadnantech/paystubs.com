<?php
// using SendGrid's PHP Library
// https://github.com/sendgrid/sendgrid-php
require 'vendor/autoload.php'; // If you're using Composer (recommended)
// Comment out the above line if not using Composer
//require("./sendgrid-php.php");
// If not using Composer, uncomment the above line
$email = new \SendGrid\Mail\Mail();
$email->setFrom("parveshchauhan27@gmail.com", "Example User");
$email->setSubject("Sending with SendGrid is Fun");
$email->addTo("nitink4107@gmail.com", "Test Abc User");
$email->addContent(
    "text/plain", "and easy to do anywhere, even with PHP"
);
$email->addContent(
    "text/html", "<strong>and easy to do anywhere, even with PHP</strong>"
);
$sendgrid = new \SendGrid('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');
// echo "<pre>";
// print_r($sendgrid);
try {
    $response = $sendgrid->send($email);
    print $response->statusCode() . "\n";
    print_r($response->headers());
    print $response->body() . "\n";
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}
?>
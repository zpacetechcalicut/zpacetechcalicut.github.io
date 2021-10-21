<?php

include('phpmailer.class.php');


if (isset($_POST['submit'])) {

    $mail = new PHPMailer();
    $mail2 = new PHPMailer();
    $mail->IsHTML(true);

    $mail->From = 'no-reply@iset.in'; 

    $reply_to = array($_POST['email']);
    $mail->FromName = $_POST['name'];

    $ip = $_SERVER['REMOTE_ADDR'];
    $mail->Subject = "IIM Kozhikode-QUICK ENQUIRY FROM IP ".$ip;

   $toaddress = array('info@example.com');
   $mail->addCustomHeader("BCC: info@example.com");  
   

    

    ob_start();

    $fields = array('name' => 'Name',

    'email' => 'Email',

    'subject' => 'Subject',

    'message' => 'Message',


);

    require_once('emailer/Enquiry.php');
    $mail->Body = ob_get_contents();
    ob_end_clean();

    foreach ($toaddress as $toAddress) {
        $mail->AddAddress($toAddress);
    }
    foreach ($reply_to as $reply) {
        $mail->AddReplyTo($reply);
    }

    $mail->Send();


    $mail2->IsHTML(true);

    $mail2->From = 'no-reply@iset.in';
    $mail2->FromName = 'ISET';


    $mail2->Subject = "Your Enquiry Submitted Successfully";



    ob_start();
    require_once('emailer/Successful-message.php');
    $mail2->Body = ob_get_contents();
    ob_end_clean();

    $mail2->AddAddress($_POST['email']);

    // $mail2->Send();
    // header('location:../thankyou.html');
} 
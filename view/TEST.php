<?php

use service\EmailServiceClient;

include 'Invoice/createInvoice.php';


$toEmail = "rene87@gmx.ch";
$subject = "TEST Mail Attachment";
$htmlData = "This is a test";
//$path = 'Invoice/createInvoice.pdf';
$path = 'Invoice/test.pdf';

echo " vor send Attach";

EmailServiceClient::sendEmailAttachement($toEmail, $subject, $htmlData, $path);

echo " nach send Attach";
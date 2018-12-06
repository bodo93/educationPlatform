<?php

use service\EmailServiceClient;


$toEmail = "rene87@gmx.ch";
$subject = "TEST Mail Attachment";
$htmlData = "This is a test";

EmailServiceClient::sendEmailAttachement($toEmail, $subject, $htmlData);
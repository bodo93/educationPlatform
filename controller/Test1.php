<?php

ob_start();

use service\EmailServiceClient;

$toEmail = "rene87@gmx.ch";
$subject = "TEST Scheduler";
$htmlData = "Scheduler worked!";

EmailServiceClient::sendEmail($toEmail, $subject, $htmlData);

ob_end_flush();

?>
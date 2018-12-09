<?php

namespace service;
use database\config;

/**
 * @author Andreas Martin adapted by René Schwab
 */
class EmailServiceClient {

    // send Email with subject and text content 
    public static function sendEmail($toEmail, $subject, $htmlData) {
        $jsonObj = self::createEmailJSONObj();
        $jsonObj->personalizations[0]->to[0]->email = $toEmail;
        $jsonObj->subject = $subject;
        $jsonObj->content[0]->value = $htmlData;

        $options = ["http" => [
                "method" => "POST",
                "header" => ["Content-Type: application/json",
                "Authorization: Bearer " . getenv("SENDGRID_API_KEY") . ""],
                "content" => json_encode($jsonObj)
        ]];
        $context = stream_context_create($options);
        $response = file_get_contents("https://api.sendgrid.com/v3/mail/send", false, $context);
        if (strpos($http_response_header[0], "202"))
            return true;
        return false;
    }
    
    // send Email with subject, text content and attachment
    public static function sendInvoiceEmail($toEmail, $subject, $htmlData) {
        $jsonObj = self::createEmailJSONObj();
        $jsonObj->personalizations[0]->to[0]->email = $toEmail;
        $jsonObj->subject = $subject;
        $jsonObj->content[0]->value = $htmlData;
        
        $options = ["http" => [
                "method" => "POST",
                "header" => ["Content-Type: application/json",
                "Authorization: Bearer " . getenv("SENDGRID_API_KEY") . ""], 
                "content" => json_encode($jsonObj)
        ]];
        $context = stream_context_create($options);
        $response = file_get_contents("https://api.sendgrid.com/v3/mail/send", false, $context);
        if (strpos($http_response_header[0], "202"))
            return true;
        return false;
    }
        
    
    protected static function createEmailJSONObj() {
        return json_decode('{
          "personalizations": [
            {
              "to": [
                {
                  "email": "email"
                }
              ]
            }
          ],
          "from": {
            "email": "noreply@fhnw.ch",
            "name": "SWISSEDU"
          },
          "subject": "subject",
          "content": [
            {
              "type": "text/html",
              "value": "value"
            }
          ]
        }');
    }
}

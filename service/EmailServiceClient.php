<?php

namespace service;
use database\config;


/**
 * @author Andreas Martin
 */
class EmailServiceClient {

    // send Emial with subject and text content 
    public static function sendEmail($toEmail, $subject, $htmlData) {
        //echo "Methode aufgerufen";
        $jsonObj = self::createEmailJSONObj();
        $jsonObj->personalizations[0]->to[0]->email = $toEmail;
        $jsonObj->subject = $subject;
        $jsonObj->content[0]->value = $htmlData;

        $options = ["http" => [
                "method" => "POST",
                "header" => ["Content-Type: application/json",
                    //"Authorization: Bearer " . Config::get("sendGrid.value") . ""],
                    "Authorization: Bearer " . getenv("SENDGRID_API_KEY") . ""], // test
                "content" => json_encode($jsonObj)
        ]];
        $context = stream_context_create($options);
        $response = file_get_contents("https://api.sendgrid.com/v3/mail/send", false, $context);
        if (strpos($http_response_header[0], "202"))
            return true;
        return false;
    }
    
    // send Emial with subject, text content and attachment
    public static function sendInvoiceEmail($toEmail, $subject, $htmlData) {
        /*include 'Testing/createPDFtest.php';
        
        //$file = fopen("Testing/test.pdf", "r");
        $file = "Testing/test.pdf";*/
        
        $jsonObj = self::createEmailJSONObj();
        $jsonObj->personalizations[0]->to[0]->email = $toEmail;
        $jsonObj->subject = $subject;
        $jsonObj->content[0]->value = $htmlData;
        /*$jsonObj->attachments[0]->filename = "file.pdf";
        $jsonObj->attachments[0]->content = base64_encode("hello"); //auf Pfad vom PDF zugreifen, nicht PHP
         * 
         */

        $options = ["http" => [
                "method" => "POST",
                "header" => ["Content-Type: application/json",
                    //"Authorization: Bearer " . Config::get("sendGrid.value") . ""],
                    "Authorization: Bearer " . getenv("SENDGRID_API_KEY") . ""], // test
                "content" => json_encode($jsonObj)
        ]];
        $context = stream_context_create($options);
        $response = file_get_contents("https://api.sendgrid.com/v3/mail/send", false, $context);
        if (strpos($http_response_header[0], "202"))
            return true;
        return false;
    }

    
    
    
    
    
    
    
    
    public static function sendEmailAttachement($ToEmail, $subject, $htmlData) {
        
        echo "sendEmailAtt aufgerufen";

        $apiKey = getenv("SENDGRID_API_KEY");
        //$apiKey = config::get("sendGrid.value");
        $sg = new \SendGrid($apiKey);

        $email = new SendGrid\Email("Me", "$ToEmail");

        $mail = new SendGrid\Mail();
        $mail->setFrom($email);
        $mail->setSubject("$subject");
        $p = new \SendGrid\Personalization();
        $p->addTo($email);
        $c = new \SendGrid\Content("text/plain", "$htmlData");
        $mail->addPersonalization($p);
        $mail->addContent($c);

        $att1 = new \SendGrid\Attachment();
        //$att1->setContent(base64_encode(file_get_contents("$pfad")));
        $att1->setContent(base64_encode(file_get_contents("Invoice/createInvoice.php")));
        $att1->setType("application/pdf");
        $att1->setFilename("Rechnung");
        $att1->setDisposition("attachment");
        $mail->addAttachment($att1);

        $response = $sg->client->mail()->send()->post($mail);

        echo $response->statusCode() . "\n";
        echo json_encode(json_decode($response->body()), JSON_PRETTY_PRINT) . "\n";
        var_dump($response->headers());
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

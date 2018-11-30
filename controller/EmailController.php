<?php

include 'includes/translator.inc.php';

use database\DBConnection;
use service\EmailServiceClient;




class EmailController {
    
        // public static function pwResetMail($mail, $userId, $pwHacheCode) {
        public static function pwResetMail($mail, $userId) {
            $to = '$mail';
            $subject = 'SWISSEDU password reset link';
            $message = 'hello'; // Text: Clic this link to reset your PW + Link 
            $headers = 'From: webmaster@example.com' . "\r\n" .
                'Reply-To: webmaster@example.com' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();

            mail($to, $subject, $message, $headers); // standard PHP function
    }
    
    
     public static function resetPw() {
        
        $db = DBConnection::getConnection();
        $mysqli = $db->getConnection();
        echo "db connection ok";

        $id = $_SESSION['userID'];
        echo "session id ok";
        
        $toEmail = $mysqli("Select Email from institute where ID = $id");
        $pw = $mysqli("Select Password from institute where ID = $id");
        echo "select statements ok";

        $subject = "SWISSEDU";

        $htmlData = "Ihr Passwort lautet: " . $pw;
        
        EmailServiceClient::sendEmail($toEmail, $subject, $htmlData);
     
    }


}


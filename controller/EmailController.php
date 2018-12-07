<?php

namespace controller;

include 'includes/translator.inc.php';

use database\DBConnection;
use service\EmailServiceClient;

/*
 * Author: René Schwab
 */
class EmailController {
    
    /* checks if entered email in "institutForgotPassword" is in database
     * creates new password and sends it per email and update in database
     */
     public static function resetPw() {
        
        try {
            $db = DBConnection::getConnection();
            $mysqli = $db->getConnection();

            $stmt = $mysqli->prepare("SELECT * FROM institute WHERE Email = ?");
            $stmt->bind_param('s', $email);
            $email = $_POST['email'];
            $stmt->execute();
            $institute = $stmt->get_result()->fetch_object("model\Institute");
            $stmt->close();

            // creates random pw with 8 caracters containing a-z, 0-9 
            $newPassword = bin2hex(openssl_random_pseudo_bytes(4));

            // check if email exists in DB 
            if ($institute) {

                $subject = "SWISSEDU Support";
                $htmlData = "New Password: " . $newPassword."\r\nPlease log in promptly and change the password.";

                // send new pw to user
                EmailServiceClient::sendEmail($email, $subject, $htmlData);

                // update database
                $stmt = $mysqli->prepare("UPDATE institute SET `Password` = ? WHERE `Email` = ?");
                $stmt->bind_param('ss', $encryption, $email);
                $encryption = password_hash($newPassword, PASSWORD_DEFAULT);
                $email = $_POST['email'];
                $stmt->execute();

                //header("Location: " . $GLOBALS["ROOT_URL"] . "/login");

                echo "  
                <script type=\"text/javascript\">
                alert('Check your E-Mail');
                window.location.replace('login');
                </script>
                ";
            } else {
                echo "
            <script type=\"text/javascript\">
            alert('Username does not exist');
            </script>
            ";
            }
            
        } catch (Exception $ex) {
            echo $ex->getMessage;
        }
    }
}


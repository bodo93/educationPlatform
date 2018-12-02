<?php

namespace controller;

include 'includes/translator.inc.php';

use database\DBConnection;
use service\EmailServiceClient;


class EmailController {
    

     public static function resetPw() {
        $db = DBConnection::getConnection();
        $mysqli = $db->getConnection();
        
    
        echo "halo Phil";
        //exit();
        
        $stmt = $mysqli->prepare("SELECT * FROM institute WHERE Email = ?");
        $stmt->bind_param('s', $email);
        $email = $_POST['email'];
        $stmt->execute();
        $institute = $stmt->get_result()->fetch_object("model\Institute");
        $stmt->close();
        
        // creates random pw with 8 caracters containing a-z, 0-9
        $newPassword = bin2hex(openssl_random_pseudo_bytes(4)); 
        echo $newPassword;
        
        echo "halo";
        
        
        
        // enters just if email exists in DB 
        if ($institute) {
          
            $subject = "SWISSEDU";
            //$text = $lang['newPwText'];
            //echo $text.$pw;
            //$htmlData = $text . $pw;
            
            $htmlData = "New Password: ". $newPassword;

            // send new pw to user
            EmailServiceClient::sendEmail($email, $subject, $htmlData);

            echo "email send ";
            
            //update new pw (encrypted) to database 
            
            $stmt = $mysqli->prepare("UPDATE institute SET `Password` = ? WHERE `Email` = ?");

            $stmt->bind_param('ss', $encryption, $email);
   
            $encryption = password_hash($newPassword, PASSWORD_DEFAULT);
            $email = $_POST['email'];
            
            if ($stmt){
                echo "succes";
                exit();
            } else {
                echo "no succes";
                exit();
            }
            echo "test pw".$encryption.$email;
            exit();
            
            
            header("Location: " . $GLOBALS["ROOT_URL"] . "/login");
   
            echo "  <script type=\"text/javascript\">
                alert('Check your E-Mail');
                </script>
                ";
        } else {
            echo "
            <script type=\"text/javascript\">
            alert('Username does not exist');
            </script>
            ";
        }

        
        
        
        
        
        
        
    }
}

// window.location.replace('login');
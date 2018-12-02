<?php

namespace controller;

include 'includes/translator.inc.php';

use database\DBConnection;
use service\EmailServiceClient;


class EmailController {
    

     public static function resetPw() {
        $db = DBConnection::getConnection();
        $mysqli = $db->getConnection();
        
        $submittedEmail = $_POST['email'];
        echo $email;
        
        $stmt = $mysqli->prepare("SELECT * FROM institute WHERE Email = ?");
        $stmt->bind_param('si', $email, $id);
        $email = $submittedEmail;
        $stmt->execute();
        $institute = $stmt->get_result()->fetch_object("model\Institute");
        $stmt->close();
        
        // creates random pw with 8 caracters containing a-z, 0-9
        $pw = bin2hex(openssl_random_pseudo_bytes(4)); 
        echo $pw;
        
        
        if ($institute) {
          
            $subject = "SWISSEDU";
            //$text = $lang['newPwText'];
            //echo $text.$pw;
            //$htmlData = $text . $pw;
            
            $htmlData = "New Password: ". $pw;

            // send new pw to user
            EmailServiceClient::sendEmail($email, $subject, $htmlData);

            /*
            // update new pw (encrypted) to database 
            $stmt = $mysqli->prepare("UPDATE institute SET `Password` = ? WHERE `ID` = ?");

            $stmt->bind_param('si', $encryption, $id);
   
            $encryption = $encryption = password_hash($myPassword, PASSWORD_DEFAULT);
            $id = ???
            */
            
            
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
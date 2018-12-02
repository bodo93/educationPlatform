<?php

namespace controller;

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
        echo "resetPw aufgerufen ";
        
        $db = DBConnection::getConnection();
        $mysqli = $db->getConnection();
        echo "db connection ok ";

        $toEmail = $_POST['email'];
        
        echo $toEmail." ";
        //$id = $_SESSION['userID'];
        //echo "session id ok";
        
        /*
        $idStmt = $mysqli("Select ID from institute where Email = '$toEmail'");
        if ($result = mysqli_query($mysqli,$idStmt)){
            $row = mysqli_fetch_assoc($result);
            $id = $row["ID"];
            echo "select statement ID ok";
        }
        */
        
        /*
        $stmt = $mysqli->prepare("Select ID, Password from institute where Email = ?");
        $stmt->bind_param('s', $email);
        $email = $_POST['email'];
        $institute = $stmt->get_result()->fetch_object("model\Institute");
        $stmt->execute();
        
        $id = $institute->getId();
        $password = $institute->getPassword(); */
        
        $stmt = $mysqli->prepare("SELECT * FROM institute WHERE Email = ?");
        
        $stmt->bind_param('s', $email);
        $email = $_POST['email'];
        $stmt->execute();
        $institute = $stmt->get_result()->fetch_object("model\Institute");
        $stmt->close();

        $pw = $institute->getPassword();

        $subject = "SWISSEDU";

        $htmlData = "Ihr Passwort lautet: " . $pw;
        
        EmailServiceClient::sendEmail($toEmail, $subject, $htmlData);
        
        echo "  <script type=\"text/javascript\">
                alert('Check your E-Mail');
                window.location.replace('login');
                </script>
                ";
    }


}


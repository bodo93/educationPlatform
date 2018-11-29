<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace controller;

//use view\TemplateView;
//use view\LayoutRendering;
use model\Institute;
use model\InvoiceAddress;
use database\courseDAO;
use database\DBConnection;
use controller\EmailController;
use view\TemplateView;
use view\LayoutRendering;

use mail\EmailServiceClient;

/**
 * Description of EducationalInstitute
 *
 * @author bodog
 */
class InstituteController {
    /**
    * REGISTER function 
    * 
    * @author Philipp Lehmann
    */
    public static function register($view = null){        
        $myschool = $_POST['name'];
        $myaddress = $_POST['street'];
        $myHouseNumber = $_POST['houseNumber'];
        $myPostCode = $_POST['postCode'];
        $myCity = $_POST['place'];
        $myEmail = $_POST['email'];
        $myPassword = $_POST['password'];
        $myPassword2 = $_POST['password2'];
        $encrypt = password_hash($myPassword, PASSWORD_DEFAULT);

        $db = DBConnection::getConnection();
        $mysqli = $db->getConnection();

        $stmt = $mysqli->prepare("SELECT * FROM institute WHERE Email = ?");
        
        $stmt->bind_param('s', $email);
        $email = $myEmail;
        $stmt->execute();
        $institute = $stmt->get_result()->fetch_object("model\Institute");
        $stmt->close();
        
        if($institute) {
            echo "
                <script type=\"text/javascript\">
                alert('Username already exists!');
                window.location.replace('register');
                </script>
            ";
        }else if($myPassword == $myPassword2){
            $insert = "INSERT INTO institute (Name, Street, HouseNumber, PostCode, Place, Email, Password)
                    VALUES ('$myschool', '$myaddress', '$myHouseNumber', '$myPostCode', '$myCity', '$myEmail', '$encrypt')";

            if ($mysqli->query($insert) === FALSE) {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }else{
                echo "
                <script type=\"text/javascript\">
                alert('User successfully created');
                window.location.replace('login');
                </script>
                "; 
            }      
        }else{
            echo "
            <script type=\"text/javascript\">
            alert('Your Passwords do not match!');
            window.location.replace('register');
            </script>
            ";
        }
    }
    
    /**
    * LOGIN function 
    * 
    * @author Philipp Lehmann
    */
    public static function login(){
        //use database/DBConnection.php;
        session_regenerate_id(true);    

        // get user data from login area

        $submittedEmail = $_POST['email'];
        $submittedPassword = $_POST['password'];
        
        $db = DBConnection::getConnection();
        $mysqli = $db->getConnection();        
        
        
        // test mail function
        echo "Methode aufgerufen";
        EmailServiceClient::sendEmail("philipp.lehmann32@gmail.com", "SendGrid Test", "Das ist ein Test der Mail Funktion");


        $stmt = $mysqli->prepare("SELECT * FROM institute WHERE Email = ?");
        
        $stmt->bind_param('s', $email);
        $email = $submittedEmail;
        $stmt->execute();
        $institute = $stmt->get_result()->fetch_object("model\Institute");
        $stmt->close();

        
        if($institute){
            if (password_verify($submittedPassword, $institute->getPassword())) {
            $_SESSION['userID'] = $institute->getId();
            $_SESSION['instituteLogin'] = true;
          
            header("location: course/overview");
            }else {
                echo "
                <script type=\"text/javascript\">
                alert('Password invalid');
                window.location.replace('login');
                </script>
                ";
            }
        }else{
            echo "
            <script type=\"text/javascript\">
            alert('Username invalid');
            window.location.replace('login');
            </script>
            ";
        } 
    }
    
    /**
    * LOGOUT function
    * 
    * @author Philipp Lehmann
    */
    public static function logout(){
        session_destroy();
    }
    
    public static function edit($instituteId) {
        $contentView = new TemplateView(instituteEdit.php);
        $instituteDAO = new InstituteDAO();
        $contentView->institute = $instituteDAO->readInstitute($instituteId);
        $LayoutRendering::basicLayout($contentView);
    }
    
    public static function updateAccount(){
        $db = DBConnection::getConnection();
        $mysqli = $db->getConnection();     
        
        if ($_POST) {
            // update institute
            $stmt = $mysqli->prepare("UPDATE institute SET `Name` = ?, `Street` = ?, `HouseNumber` = ?,
                    `PostCode` = ?, `Place` = ?, `Email` = ?
                    WHERE `ID` = ?");
            
            $stmt->bind_param('sssissi', $name, $street, $houseNumber, $postCode, $place, $email, $id);
            $name = $_POST['name'];
            $street = $_POST['street'];
            $houseNumber = $_POST['houseNumber'];
            $postCode = $_POST['postCode'];
            $place = $_POST['place'];
            $email = $_POST['email'];
            $id = $_SESSION['userID'];
            
            $stmt->execute();
            
            if ($stmt) {
                header("Location: ".$GLOBALS["ROOT_URL"]."/institute");
            } else {
                echo "Error: ";
            }
        }
    }
}

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

use service\EmailServiceClient;

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
        $myPassword = $_POST['password'];
        $myPassword2 = $_POST['password2'];

        $db = DBConnection::getConnection();
        $mysqli = $db->getConnection();

        $stmt = $mysqli->prepare("SELECT * FROM institute WHERE Email = ?");
        
        $stmt->bind_param('s', $email);
        $email = $_POST['email'];
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
            $stmt = $mysqli->prepare("INSERT INTO institute (Name, Street, HouseNumber, PostCode, Place, Email, Password)
                    VALUES (?, ?, ?, ?, ?, ?, ?)");

            $stmt->bind_param('sssisss', $name, $street, $houseNumber, $postCode, $place, $email, $encryption);
            $name = $_POST['name'];
            $street = $_POST['street'];
            $houseNumber = $_POST['houseNumber'];
            $postCode = $_POST['postCode'];
            $place = $_POST['place'];
            $email = $_POST['email'];
            $encryption = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $stmt->execute();
            
            if ($stmt === FALSE) {
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
            $myPassword = $_POST['password'];
            $myPassword2 = $_POST['password2'];
            
            if (!$myPassword){
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
                
                $string = "Update successfull";
            }else{
                if($myPassword == $myPassword2){
                    // update institute
                    $stmt = $mysqli->prepare("UPDATE institute SET `Name` = ?, `Street` = ?, `HouseNumber` = ?,
                            `PostCode` = ?, `Place` = ?, `Email` = ?, `Password` = ?
                            WHERE `ID` = ?");

                    $stmt->bind_param('sssisssi', $name, $street, $houseNumber, $postCode, $place, $email, $encryption, $id);
                    $name = $_POST['name'];
                    $street = $_POST['street'];
                    $houseNumber = $_POST['houseNumber'];
                    $postCode = $_POST['postCode'];
                    $place = $_POST['place'];
                    $email = $_POST['email'];
                    $encryption = $encryption = password_hash($myPassword, PASSWORD_DEFAULT);
                    $id = $_SESSION['userID'];
                    
                    $string = "Password changed successfully";
                }else{
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
                    
                    $string = "Passwords do not match";
                } 
            }
            
            $stmt->execute();
            
            if ($stmt) {
                echo "
                    <script type=\"text/javascript\">
                    alert('". $string ."');
                    window.location.replace('". $GLOBALS['ROOT_URL']."/institute');    
                    </script>
                    ";
            } else {
                echo "Error: ";
            }
        }
    }
}

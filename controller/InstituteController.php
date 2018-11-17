<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace controller;

use view\TemplateView;
use view\LayoutRendering;
use model\Institute;
use model\InvoiceAddress;
use database\courseDAO;
use database\DBConnection;

/**
 * Description of EducationalInstitute
 *
 * @author bodog
 */
class InstituteController {
    
    public static function register($view = null){     
        $myschool = $_POST['name'];
        $myaddress = $_POST['street'];
        $myHouseNumber = $_POST['houseNumber'];
        $myPostCode = $_POST['postCode'];
        $myCity = $_POST['place'];
        $myEmail = $_POST['email'];
        $myPassword = $_POST['password'];
        $myPassword2 = $_POST['password2'];
        $encrypt = password_hash($myPassword, PASSWORD_DEFAULT, ['cost' => 12]);

        $db = DBConnection::getConnection();
        $mysqli = $db->getConnection();

        $select = "SELECT Email FROM institute WHERE Email = '$myEmail'";
        $result = $mysqli->query($select);

        $count = mysqli_num_rows($result);
        if($count == 1) {
            echo "
                <script type=\"text/javascript\">
                alert('Username already exists!');
                window.location.replace('register');
                </script>
            ";
        }else{
            if($myPassword == $myPassword2){
                $insert = "INSERT INTO institute (Name, Street, HouseNumber, PostCode, Place, Email, Password)
                        VALUES ('$myschool', '$myaddress', '$myHouseNumber', '$myPostCode', '$myCity', '$myEmail', '$encrypt')";

                if ($mysqli->query($insert) === TRUE) {
                    echo "
                        <script type=\"text/javascript\">
                        alert('User successfully created');
                        window.location.replace('login');
                        </script>
                    ";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

                $conn->close();
            }
            else{
                echo "
                <script type=\"text/javascript\">
                alert('Your Passwords do not match!');
                window.location.replace('register.php');
                </script>
                ";
            }
        }
    }
    
    public static function login(){
        include("database/DBConnection.php");
        session_regenerate_id(true);    

        // get user data from login area

        $submittedEmail = $_REQUEST['email'];
        $submittedPassword = $_REQUEST['password'];

        $db = \dbConnection::getConnection();
        $mysqli = $db->getConnection();

        $sql_query = "SELECT Email, Password FROM institute WHERE Email = '$submittedEmail'";
        $result = $mysqli->query($sql_query);

        foreach($result as $item) {
            if (password_verify($submittedPassword, $item['Password'])) {
                $_SESSION['login_user'] = $submittedEmail;

                header("location: search");
            }
            else {
                echo "
                <script type=\"text/javascript\">
                alert('Username or Password invalid');
                window.location.replace('login');
                </script>
                ";
            }
        }
    }
    
    public static function logout(){
        session_destroy();
    }
    
    public static function edit($instituteId) {
        $contentView = new TemplateView(instituteEdit.php);
        $instituteDAO = new InstituteDAO();
        $contentView->institute = $instituteDAO->readInstitute($instituteId);
        $LayoutRendering::basicLayout($contentView);
    }
    
    public static function update(){
        $institute = new Institute();
        $institute->setId($_POST["instituteId"]);
        $institute->setName($_POST["name"]);
        $institute->setStreet($_POST["street"]);
        $institute->setHouseNumber($_POST["houseNumber"]);
        $institute->setPostCode($_POST["postCode"]);
        $institute->setPlace($_POST["place"]);
        $institute->setEmail($_POST["email"]);
        $institute->setPassword($_POST["password"]);
        $institute->setInvoiceAddressId($_POST["invoiceAddress"]);
        $invoiceAddress = new InvoiceAddress();
        $invoiceAddress->setId($_POST["invoiceAddressId"]);
        $invoiceAddress->setStreet($_POST["invoiceAddressStreet"]);
        $invoiceAddress->setHouseNumber($_POST["invoiceAddressHouseNumber"]);
        $invoiceAddress->setPostCode($_POST["invoiceAddressPostCode"]);
        $invoiceAddress->setPlace($_POST["invoiceAddressPlace"]);
        
        $instituteDAO = new InstituteDAO();
        $instituteDAO->update($institute, $invoiceAddress);
    }
}

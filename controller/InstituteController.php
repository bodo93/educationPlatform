<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace controller;

/**
 * Description of EducationalInstitute
 *
 * @author bodog
 */
class InstituteController {
    
    public static function register($view = null){
        //register institute
        $institute = new \model\Institute();
        //$institute->setId($_POST("id"));
        $institute->setName($_POST["name"]);
        $institute->setStreet($_POST["street"]);
        $institute->setHouseNumber($_POST["houseNumber"]);
        $institute->setPostCode($_POST["postCode"]);
        $institute->setPlace($_POST["place"]);
        $institute->setEmail($_POST["email"]);
        $institute->setPassword($_POST["password"]);
        //register invoiceAddress for this institute
        $invoiceAddress = new \model\InvoiceAddress();
        $invoiceAddress->setStreet($_POST["invStreet"]);
        $invoiceAddress->setHouseNumber($_POST["invHouseNumber"]);
        $invoiceAddress->setPostCode($_POST["invPostCode"]);
        $invoiceAddress->setPlace($_POST["invPlace"]);
        //set foreignKey
        $institute->setInvoiceAddressId($invoiceAddress->getId());
    }
    
    public static function login(){
        include("database/DBConnection.php");
        // session_start();    

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
}

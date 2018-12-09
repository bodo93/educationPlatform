<?php

/*
 * Author: Bodo Grütter and Pilipp Lehmann
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

class InstituteController {

    /**
     * $Author: Philipp Lehmann
     * 
     * register() creates a new account (institute) with new password and username
     * parameter: -
     * return: -
     */
    public static function register() {
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

        if ($institute) {
            echo "
                <script type=\"text/javascript\">
                alert('Username already exists!');
                window.location.replace('register');
                </script>
            ";
        } else if ($myPassword == $myPassword2) {
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
            } else {
                echo "
                <script type=\"text/javascript\">
                alert('User successfully created');
                window.location.replace('login');
                </script>
                ";
            }
        } else {
            echo "
            <script type=\"text/javascript\">
            alert('Your Passwords do not match!');
            window.location.replace('register');
            </script>
            ";
        }
    }

    /**
     * $Author: Philipp Lehmann
     * 
     * login() verifiy username and password and logs the user in
     * parameter: -
     * return: -
     */
    public static function login() {
        //use database/DBConnection.php;
        session_regenerate_id(true);

        // get user data from login area

        $submittedEmail = $_POST['email'];
        $submittedPassword = $_POST['password'];

        $db = DBConnection::getConnection();
        $mysqli = $db->getConnection();


        // test mail function
        /*
          echo "Methode aufgerufen";
          EmailServiceClient::sendEmail("philipp.lehmann32@gmail.com", "SendGrid Test", "Das ist ein Test der Mail Funktion");
         */

        $stmt = $mysqli->prepare("SELECT * FROM institute WHERE Email = ?");

        $stmt->bind_param('s', $email);
        $email = $submittedEmail;
        $stmt->execute();
        $institute = $stmt->get_result()->fetch_object("model\Institute");
        $stmt->close();


        if ($institute) {
            if (password_verify($submittedPassword, $institute->getPassword())) {
                $_SESSION['userID'] = $institute->getId();
                $_SESSION['instituteLogin'] = true;

                header("location: course/overview");
            } else {
                echo "
                <script type=\"text/javascript\">
                alert('Password invalid');
                window.location.replace('login');
                </script>
                ";
            }
        } else {
            echo "
            <script type=\"text/javascript\">
            alert('Username invalid');
            window.location.replace('login');
            </script>
            ";
        }
    }

    /**
     * $Author: Philipp Lehmann
     * 
     * logout() logs the user out
     * parameter: -
     * return: -
     */
    public static function logout() {
        session_destroy();
    }

    /**
     * $Author: Bodo Grütter
     * 
     * edit($course) edits an institute.
     * parameter: an institute-object
     * return: -
     */
    public static function edit($instituteId) {
        $contentView = new TemplateView(instituteEdit . php);
        $instituteDAO = new InstituteDAO();
        $contentView->institute = $instituteDAO->update($institute);
        $LayoutRendering::basicLayout($contentView);
    }

    /**
     * $Author: Bodo Grütter
     * 
     * updateAccount() updates the actual account (institute) in database.
     * parameter: -
     * return: -
     */
    public static function updateAccount() {
        $db = DBConnection::getConnection();
        $mysqli = $db->getConnection();

        if ($_POST) {
            $myPassword = $_POST['password'];
            $myPassword2 = $_POST['password2'];

            if (!$myPassword) {
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

                $message = "Update successfull";
            } else {
                if ($myPassword == $myPassword2) {
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

                    $message = "Update successfull";
                } else {
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

                    $message = "Passwords do not match";
                }
            }

            $stmt->execute();

            if ($stmt) {
                echo "
                    <script type=\"text/javascript\">
                    alert('" . $message . "');
                    window.location.replace('" . $GLOBALS['ROOT_URL'] . "/institute');    
                    </script>
                    ";
            } else {
                echo "Error: ";
            }
        }
    }

    /**
     * $Author: Bodo Grütter
     * 
     * deleteAccount() deletes the actual account (institute) in database.
     * parameter: -
     * return: -
     */
    public static function deleteAccount() {
        $db = DBConnection::getConnection();
        $mysqli = $db->getConnection();

        $id = $_SESSION['userID'];

        // delete all course
        $stmt = $mysqli->prepare("DELETE FROM course WHERE InstituteID = ?");
        $stmt->bind_param('i', $userID);
        $userID = $id;

        $stmt->execute();

        if ($stmt) {
            // delete account
            $stmt = $mysqli->prepare("DELETE FROM institute WHERE ID = ?");
            $stmt->bind_param('i', $userID);
            $userID = $id;

            $stmt->execute();

            if ($stmt) {
                echo "
                <script type=\"text/javascript\">
                alert('Profile and all courses deleted');
                window.location.replace('" . $GLOBALS['ROOT_URL'] . "/login');    
                </script>
                ";

                InstituteController::logout();
            } else {
                echo "Error: " . $update . "<br>" . mysqli_error($conn);
            }
        } else {
            echo "Error: " . $update . "<br>" . mysqli_error($conn);
        }
    }

}

<!-- 
Author: Philipp Lehmann
-->
<?php
    include("database/DBConnection.php");
    //session_start();

    controller\InstituteController::register();

    /*
    $institute = new \model\Institute();
    //$institute->setId($_POST("id"));
    $institute->getName();
    $institute->getStreet();
    $institute->getHouseNumber();
    $institute->getPostCode();
    $institute->getPlace();
    $institute->getEmail();
    $institute->getPassword();
    
    echo $institute->getName();*/
    
    
    // get user data from login area
    
    $myschool = $_POST['name'];
    $myaddress = $_POST['street'];
    $myHouseNumber = $_POST['houseNumber'];
    $myPostCode = $_POST['postCode'];
    $myCity = $_POST['place'];
    $myEmail = $_POST['email'];
    $myPassword = $_POST['password'];
    $myPassword2 = $_POST['password2'];
    $encrypt = password_hash($myPassword, PASSWORD_DEFAULT, ['cost' => 12]);

    $db = \dbConnection::getConnection();
    $mysqli = $db->getConnection();
    
    //if(isset($myusername)){
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
    //}
?>
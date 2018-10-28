<!-- 
Author: Philipp Lehmann
-->
<?php
    include("view/includes/DBconnection.inc.php");
    session_start();

    // get user data from login area
    $name = $_POST['name'];
    $street = $_POST['street'];
    $houseNumber = $_POST['houseNumber'];
    $postCode = $_POST['postCode'];
    $place = $_POST['place'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $encrypt = md5($password);

    if(isset($myusername)){
        $select = "SELECT email FROM institute WHERE email = '$email'";
        $result = $conn->query($select);
        $count = mysqli_num_rows($result);
        if($count == 1) {
            echo "
                <script type=\"text/javascript\">
                alert('Username already exists!');
                window.location.replace('instituteRegistration.php');
                </script>
            ";
        }else{
            if($mypassword == $mypassword2){
                $insert = "INSERT INTO institute (email, passwort)
                        VALUES ('$myusername', '$encrypt')";
                
                $insert2 = "INSERT INTO institute (Name, Strasse, Ort, Postleitzahl)
                        VALUES ('$myschool', '$myaddress', '$mycity', '$myplz')";

                if ($conn->query($insert) === TRUE AND $conn->query($insert2) === TRUE) {
                    echo "
                        <script type=\"text/javascript\">
                        alert('User successfully created');
                        window.location.replace('instituteLogin.php');
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
                window.location.replace('instituteRegistration.php');
                </script>
                ";
            }
        } 
    }
?>
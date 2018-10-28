<!-- 
Author: Philipp Lehmann
-->
<?php
    include("includes/DBconnection.inc.php");
    session_start();

    // get user data from login area
    $myusername = $_POST['username'];
    $mypassword = $_POST['password'];
    $mypassword2 = $_POST['password2'];
    $myschool = $_POST['institut'];
    $myaddress = $_POST['strasse'];
    $mycity = $_POST['ort'];
    $myplz = $_POST['plz'];
    $encrypt = md5($mypassword);

    if(isset($myusername)){
        $sql = "SELECT email FROM benutzerkonto WHERE email = '$myusername'";
        $result = $conn->query($sql);
        $count = mysqli_num_rows($result);
        if($count == 1) {
            echo "
                <script type=\"text/javascript\">
                alert('Username already exists!');
                window.location.replace('registration.php');
                </script>
            ";
        }else{
            if($mypassword == $mypassword2){
                $sql = "INSERT INTO benutzerkonto (email, passwort)
                        VALUES ('$myusername', '$encrypt')";
                
                $sql2 = "INSERT INTO bildungsinstitut (Name, Strasse, Ort, Postleitzahl)
                        VALUES ('$myschool', '$myaddress', '$mycity', '$myplz')";

                if ($conn->query($sql) === TRUE AND $conn->query($sql2) === TRUE) {
                    echo "
                        <script type=\"text/javascript\">
                        alert('User successfully created');
                        window.location.replace('login.php');
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
                window.location.replace('registration.php');
                </script>
                ";
            }
        } 
    }
?>
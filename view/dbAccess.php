<!-- 
Author: Philipp Lehmann
-->
<?php
    include("view/includes/dbConnection.inc.php");
    session_start();

    // get user data from login area
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $encrypt = md5($password);

    // get database user
    $select = "SELECT email, password FROM institute WHERE email = '$email' AND passwort = '$encrypt'";
    $result = $conn->query($select);

    $count = mysqli_num_rows($result);

    if($count == 1) {
        $_SESSION['login_user'] = $email;

        header("location: instituteEdit.php");
    }else {
        echo "
            <script type=\"text/javascript\">
            alert('Username or Password invalid');
            window.location.replace('instituteLogin.php');
            </script>
        ";
    }
	
	$conn->close();
?>
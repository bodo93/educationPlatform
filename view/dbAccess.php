<!-- 
Author: Philipp Lehmann
-->
<?php
    include("includes/dbConnection.inc.php");
    session_start();

    // get user data from login area
    $myusername = $_REQUEST['email'];
    $mypassword = $_REQUEST['password'];
    $encrypt = md5($mypassword);

    // get database user
    $sql = "SELECT email, password FROM institute WHERE email = '$myusername' AND passwort = '$encrypt'";
    $result = $conn->query($sql);

    $count = mysqli_num_rows($result);

    if($count == 1) {
        $_SESSION['login_user'] = $myusername;

        header("location: instituteEdit.php");
    }else {
        echo "
            <script type=\"text/javascript\">
            alert('Username or Password invalid');
            window.location.replace('login.php');
            </script>
        ";
    }
	
	$conn->close();
?>
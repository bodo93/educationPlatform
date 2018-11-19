<!DOCTYPE html>
<!--
author: Bodo Grütter
-->
<?php
include 'includes/translator.inc.php';
include("database/DBConnection.php");
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="userprofile.css">
        <link rel="stylesheet" type="text/css" href="all.css">
        <title><?php echo $lang['userprofile']?></title>
    </head>
    <body style="background-color: rgb(34,36,37);">
        <h3><?php echo $lang['userprofile']?></h3>
        <form action="userprofile.php" method="post">
            <table>
                <?php
                $db = dbConnection::getConnection();
                $mysqli = $db->getConnection();

                $updatequery = "Update institute set `Name` = '" . $_POST['name'] . "', `Street` = '" . $_POST['strasse'] . "', `Place` = '" . $_POST['ort'] . "', `PostCode` = '" . $_POST['plz'] . "', `Email` = '" . $_POST['email'] . ""; //Just 4 Tests
                $result = $mysqli->query($updatequery);
    
                /*if ($_GET) {
                    // keep track post values
                    $id = $_GET['id'];
                } else */if ($_POST) {
                    $id = $_POST['id'];
                    
                    if ($result) {
                        header("Location:index.php");
                    } else {
                        echo "Error: " . $update . "<br>" . mysqli_error($conn);
                    }
                }
                //Query
                $select = "Select ID, Name, Strasse, Ort, Postleitzahl, FK_email from bildungsinstitut where ID = 1"; //Im Test
                //Ausführen
                $result = $mysqli->query($select);
                $row = mysqli_fetch_array($result);
                $id = $row['ID'];
                $name = $row['Name'];
                $strasse = $row['Strasse'];
                $ort = $row['Ort'];
                $plz = $row['Postleitzahl'];
                $email = $row['FK_email'];

                //Formular anzeigen und mit Daten füllen
             echo "<tr><td>ID</td><td><input type='text' name='id' value='".$id."' /></td></tr>"
            ."<tr><td>"; echo $lang['name'] . "</td><td><input type='text' name='name' value='".$name."' /></td></tr>"
            ."<tr><td>"; echo $lang['street'] . "</td><td><input type='text' name='strasse' value='".$strasse."' /></td></tr>"
            ."<tr><td>"; echo $lang['place'] . "</td><td><input type='text' name='ort' value='".$ort."' /></td></tr>"
            ."<tr><td>"; echo $lang['postCode'] . "</td><td><input type='text' name='plz' value='".$plz."' /></td></tr>"
            ."<tr><td>"; echo $lang['email'] . "</td><td><input type='text' name='email' value='".$email."' /></td></tr>"
            ."<tr><td><input type='submit' name'save' value='"; echo $lang['save'] . "'></td><td><input type='button' name='cancel' value='"; echo $lang['cancel'] . "' onclick='location.href='index.php''></td></tr>";
                ?>
            </table>
        </form>
    </body>
</html>
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        ?>
    </body>
</html>

<?php

namespace controller;

use database\DBConnection;

$db = DBConnection::getConnection();
$mysqli = $db->getConnection();

$select = "SELECT ID, Name, Start, ControlNumber FROM course";
$result = $mysqli->query($select);

while ($row = mysqli_fetch_assoc($result)) {
    $id = $row["ID"];
    $name = $row["Name"];
    $start = $row["Start"];
    $startTimestamp = strtotime($start);
    $control = $row["ControlNumber"];

     $query = "SELECT institute.Email from institute JOIN course on institute.ID = course.InstituteID WHERE course.ID = ?";
     
     if($result = $mysqli->query($query)){
         echo "OK";
     } else {echo "FAIL"};

    /*$selectMail = prepare("SELECT institute.Email from institute JOIN course on institute.ID = course.InstituteID"
            . "WHERE course.ID = ?");
    $selectMail->bind_param('i', $id);
    $selectMail->execute();
    $selectResult = $selectMail->get_result();

    echo "OK";
 
    #Check if are rows in query
    if ($selectResult->num_rows > 0) {
        $row = $selectResult->fetch_assoc();
        $mail = $row["Email"];
        echo $mail;
    } else {
        # No data actions
        echo 'No data here :(';
    }
    
    echo "OK";*/

    if ($control == 0) {
        if ($startTimestamp <= time()) {
            echo $name . " abgelaufen";
            //Email versenden
            $update = $mysqli->prepare("Update course SET `ControlNumber` = ? WHERE `ID` = ?");
            $number = 1;
            $update->bind_param('ii', $number, $id);
            $update->execute();
        } else {
            echo $name . " OK";
            echo "</br>";
        }
    } else {
        echo $name . ": Mail wurde bereits versendet";
    }
}
?>

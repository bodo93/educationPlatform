<?php

namespace controller;

use database\DBConnection;

$db = DBConnection::getConnection();
$mysqli = $db->getConnection();

/*$select = "SELECT ID, Name, Start, ControlNumber FROM course";
$result = $mysqli->query($select);

while ($row = mysqli_fetch_assoc($result)) {
    $id = $row["ID"];
    $name = $row["Name"];
    $start = $row["Start"];
    $startTimestamp = strtotime($start);
    $control = $row["ControlNumber"];

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
}*/

$select = "SELECT ID, Name, CreationDate FROM course";
$result = $mysqli->query($select);

while ($row = mysqli_fetch_assoc($result)) {
    $id = $row["ID"];
    $name = $row["Name"];
    $creationDate = $row["CreationDate"];
    $creationTimestamp = strtotime($creationDate);
    
    if($creationTimestamp <= time()){
        echo $name . " abgelaufen";
    } else{echo $name . " OK" .$creationTimestamp;}
}
?>

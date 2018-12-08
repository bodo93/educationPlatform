<?php

namespace controller;

use database\DBConnection;

$db = DBConnection::getConnection();
$mysqli = $db->getConnection();

$stmt = "SELECT Name, Start, ControlNumber FROM course";
$result = $mysqli->query($stmt);

while ($row = mysqli_fetch_assoc($result)) {
    $name = $row["Name"];
    $start = $row["Start"];
    $startTimestamp = strtotime($start);
    $control = $row["ControlNumber"];
    
    if ($control == 0){
        if($startTimestamp <= time()){
            echo "Datum vom Kurs ".$name." abgelaufen";
            //Email versenden
        }
    }
}
?>

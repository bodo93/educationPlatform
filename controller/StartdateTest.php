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
    
    if ($control == 0){
        if($startTimestamp <= time()){
            echo "Datum vom Kurs ".$name." abgelaufen";
            //Email versenden
            /*$update = $mysqli->prepare("UPDATE course SET `ControlNumber` = ? WHERE `ID` = ?");
            $update->bind_param('ii', 1, $id);
            $update->execute();*/
            
            $update = "Update course SET `ControlNumber` = 1 WHERE `ID` = " . $id;
            if(mysqli_query(mysqli, $update)){
                echo "alles OK";
            } else {
                echo "Fehler";
            }
        }
    } else {
        echo "Mail wurde bereits versendet";
    }
}
?>

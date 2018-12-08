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

    if ($control == 0) {
        if ($startTimestamp <= time()) {
            echo $name . " abgelaufen";
            //Email versenden
            $update = $mysqli->prepare("UPDATE course SET `ControlNumber` = ? WHERE `ID` = ?");
            if ($update === false) {
                echo "Fehler1";
                trigger_error($this->mysqli->error, E_USER_ERROR);
            } else {echo "OK1";}
            $update->bind_param('ii', 1, $id);
            $status = $update->execute();
            if ($status === false) {
                echo "Fehler2";
                trigger_error($stmt->error, E_USER_ERROR);
            } else {echo "OK2";}
        } else {
            echo $name . " OK";
            echo "</br>";
        }
    } else {
        echo "Mail wurde bereits versendet";
    }
}
?>

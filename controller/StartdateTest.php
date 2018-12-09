<?php

use database\DBConnection;

$db = DBConnection::getConnection();
$mysqli = $db->getConnection();

//DATE
$selectCreationDate = "SELECT ID, Name, CreationDate FROM course where ID =" . $courseID;
$result = $mysqli->query($selectCreationDate);

echo "OK1";

while ($row = mysqli_fetch_assoc($result)) {
    $id = $row["ID"];
    $name = $row["Name"];
    $creationDate = $row["CreationDate"];
    $dateOfInvoiceTimestamp = strtotime($creationDate);
    $dateOfInvoiceFormat = date('d.m.Y', $dateOfInvoiceTimestamp);
    $dueDateTimestamp = $dateOfInvoiceTimestamp + ((60 * 60 * 24) * 30);
    $dueDateFormat = date('d.m.Y', $dueDateTimestamp);
    
    echo $dueDateFormat;
}
?>
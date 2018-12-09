<?php
use database\DBConnection;

        $db = DBConnection::getConnection();
        $mysqli = $db->getConnection();

        $select = "SELECT ID, Name, CreationDate FROM course where ID =" . $id;
        $result = $mysqli->query($select);

        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row["ID"];
            $name = $row["Name"];
            $creationDate = $row["CreationDate"];
            $dateOfInvoiceTimestamp = strtotime($creationDate);
            $dateOfInvoiceFormat = date('d.m.Y', $dateOfInvoiceTimestamp);
            
            echo $dateOfInvoiceFormat;
        }

?>
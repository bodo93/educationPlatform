<?php
/*
 * Author: Philipp Lehmann
 */

ob_start();

use database\DBConnection;

require('PDF_Invoice.php');

$db = DBConnection::getConnection();
$mysqli = $db->getConnection();

$stmt = $mysqli->prepare("SELECT * FROM institute WHERE ID = ?");

$stmt->bind_param('s', $userID);
$userID = $_SESSION['userID'];
$stmt->execute();
$institute = $stmt->get_result()->fetch_object("model\Institute");
$stmt->close();

if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];

    $stmt = $mysqli->prepare("SELECT * FROM course WHERE ID = ?");

    $stmt->bind_param('s', $courseID);
    $courseID = $id;
    $stmt->execute();
    $course = $stmt->get_result()->fetch_object("model\Course");
    $stmt->close();
}

//get all infos
$priceToPay = 60;

//DATE
$selectCreationDate = "SELECT ID, Name, CreationDate FROM course where ID =" . $courseID;
$result = $mysqli->query($selectCreationDate);

while ($row = mysqli_fetch_assoc($result)) {
    $id = $row["ID"];
    $name = $row["Name"];
    $creationDate = $row["CreationDate"];
    $dateOfInvoiceTimestamp = strtotime($creationDate);
    $dateOfInvoiceFormat = date('d.m.Y', $dateOfInvoiceTimestamp);
    $dueDateTimestamp = $dateOfInvoiceTimestamp + ((60 * 60 * 24) * 30);
    $dueDateFormat = date('d.m.Y', $dueDateTimestamp);
}

$dateToday = $dateOfInvoiceFormat;
$dateToPay = $dueDateFormat;

$companyAddress = ( "Swissedu AG\n" .
        "8704 Herrliberg\n" .
        "Tel.: 044 439 40 20\n" .
        "https://swissedu.herokuapp.com"
        );

$recipientAddress = ( $institute->getName() . "\n" .
        $institute->getStreet() . " " .
        $institute->getHouseNumber() . "\n" .
        $institute->getPostCode() . " " . $institute->getPlace()
        );

// le mettre au debut car plante si on declare $mysqli avant !
$pdf = new PDF_Invoice('P', 'mm', 'A4');
$pdf->AddPage();

// add Logo to Invoice
$pdf->addLogo('view/assets/img/Logo.png');

// add addresses to Invoice
$pdf->addCompany($companyAddress);
$pdf->addRecipient($recipientAddress);

$pdf->addDate('Herrliberg, ', $dateToday);
$pdf->addPP("P.P 8704 Herrliberg");
$pdf->addTotal($priceToPay, $dateToday, $dateToPay);
$pdf->addTitle();
$pdf->addNote("Besten Dank fuer die Buchung und das Vertrauen in SWISSEDU.\n" .
        "Wir bitten Sie die Rechnung fristgerecht zu begleichen. Besten Dank.");

$courseName = utf8_encode($course->getName());

$pdf->addDetails($dateToday, $courseName, $priceToPay);

// add Bill to Invoice 
$pdf->Image('Invoice/bill.png', 0, 195, 210, 0, 'PNG');

// add Details to Invoice
$pdf->addPriceToBill($priceToPay);
$pdf->addCompanyToBill($companyAddress);
$pdf->addRecipientToBill($recipientAddress);
$pdf->addAccountToBill();
$pdf->addReferenceToBill();

// $file = $pdf->Output("I");
$file = $pdf->Output('D', "Invoice_" . $dateToday . ".pdf", true);

ob_end_flush();
?>
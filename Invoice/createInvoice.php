<?php
    ob_start();
//
// exemple de facture avec mysqli
// gere le multi-page
// Ver 1.0 THONGSOUME Jean-Paul
//

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
    $dateToday = date("d.m.Y");
    $dateToPay = date('d.m.Y', strtotime($dateToday. ' + 30 days'));
    
    //$dateToday = controller\CourseController::getCreationDate($courseID);
    //$dateToPay = date('d.m.Y', strtotime($dateToday. ' + 30 days'));
    
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
    $pdf = new PDF_Invoice( 'P', 'mm', 'A4' );
    $pdf->AddPage();
    
    // add Logo to Invoice
    $pdf->addLogo('view/assets/img/Logo.png');
        
    // add addresses to Invoice
    $pdf->addCompany( $companyAddress );
    $pdf->addRecipient( $recipientAddress );
        
    $pdf->addDate( 'Herrliberg, ', $dateToday );
    $pdf->addPP("P.P 8704 Herrliberg");
    $pdf->addTotal($priceToPay, $dateToday, $dateToPay);
    $pdf->addTitle();
    $pdf->addNote( "Besten Dank fuer die Benuetzung unserer Dienstleistung.\n" .
                    "Bitte pruefen Sie diese Rechnung bevor Sie die Zahlung vornehmen.");
    $pdf->addDetails($dateToday, $course->getName(), $priceToPay);
    
    // add Bill to Invoice 
    $pdf->Image('Invoice/bill.png',0,195,210,0,'PNG');
    
    // add Details to Invoice
    $pdf->addPriceToBill($priceToPay);
    $pdf->addCompanyToBill( $companyAddress );
    $pdf->addRecipientToBill( $recipientAddress );
    $pdf->addAccountToBill();
    $pdf->addReferenceToBill();
    
    // $file = $pdf->Output("I");
    $file = $pdf->Output('D', "Invoice_".$dateToday.".pdf");

    ob_end_flush(); 
?>
<?php
    ob_start();
//
// exemple de facture avec mysqli
// gere le multi-page
// Ver 1.0 THONGSOUME Jean-Paul
//

    require('PDF_Invoice.php');
    
    //get all infos
    $priceToPay = 2000;
    $dateToday = date("d.m.Y");
    $dateToPay = date('d.m.Y', strtotime($dateToday. ' + 14 days'));
    
    $companyAddress = ( "SWISSEDU\n" .
                      "Cards Services / CS\n" .
                      "Postfach\n".
                      "8048 Zurich\n" .
                      "Tel.: 044 439 40 20\n" .
                      "www.google.ch"
            );
    
    $recipientAddress = ( "Philipp Lehmann\n" .
                      "Aecherligasse 19-H\n" .
                      "4665 Oftringen"
            );
    
    // le mettre au debut car plante si on declare $mysqli avant !
    $pdf = new PDF_Invoice( 'P', 'mm', 'A4' );
    $pdf->AddPage();
    
    // add Logo to Invoice
    $pdf->addLogo('view/assets/img/Logo.png');
        
    // add addresses to Invoice
    $pdf->addCompany( $companyAddress );
    $pdf->addRecipient( $recipientAddress );
        
    $pdf->addDate( 'Zurich, ', $dateToday );
    $pdf->addPP("P.P 8040 Zurich");
    $pdf->addTotal($priceToPay, $dateToday, $dateToPay);
    $pdf->addTitle();
    $pdf->addNote( "Besten Dank fuer die Benuetzung unserer Dienstleistung.\n" .
                    "Bitte pruefen Sie diese Rechnung bevor Sie die Zahlung vornehmen.");
    $pdf->addDetails($dateToday, "Wirtschaftsinformatik", $priceToPay);
    
    // add Bill to Invoice 
    $pdf->Image('Testing/bill.png',0,195,210,0,'PNG');
    
    // add Details to Invoice
    $pdf->addPriceToBill($priceToPay);
    $pdf->addCompanyToBill( $companyAddress );
    $pdf->addRecipientToBill( $recipientAddress );
    $pdf->addAccountToBill();
    $pdf->addReferenceToBill();
    
    
    $file = $pdf->Output("I");
    ob_end_flush(); 
?>
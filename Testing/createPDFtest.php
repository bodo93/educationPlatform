<?php
    ob_start();
//
// exemple de facture avec mysqli
// gere le multi-page
// Ver 1.0 THONGSOUME Jean-Paul
//

    require('PDF_Invoice.php');
    
    // le mettre au debut car plante si on declare $mysqli avant !
    $pdf = new PDF_Invoice( 'P', 'mm', 'A4' );
    $pdf->AddPage();
    $pdf->addCompany( "SWISSEDU",
                      "Cards Services / CS" .
                      "Postfach\n".
                      "8048 Zurich\n" .
                      "Tel.: 044 439 40 20\n" .
                      "www.google.ch"
            );
    
    $pdf->addRecipient( "Philipp Lehmann",
                      "Aecherligasse 19-H\n" .
                      "4665 Oftringen"
            );
        
        // logo : 80 de largeur et 55 de hauteur
    
    $pdf->addLogo('C:\Users\Phil\Dropbox\Web Engineering\BootstrapExport\old\09.11.2018\assets\img\Logo2.png');

    $dateToday = date("d.m.Y");
    
    $pdf->addDate( 'Zurich, ', $dateToday );
    
    $pdf->addPP("P.P 8040 Zurich");
    
    $pdf->addTotal(2000, $dateToday, "14.12.2018");
    
    $pdf->addTitle();
    
    $pdf->addNote( "Besten Dank fuer die Benuetzung unserer Dienstleistung.\n" .
                    "Bitte pruefen Sie diese Rechnung.");
    
    $pdf->addDetails($dateToday, "Wirtschaftsinformatik", 2000);
    
    
    
    
    $num_page = 5;

    // **************************
    // FOOTER
    // **************************
    $y1 = 270;
    //Positionnement en bas et tout centrer
    $pdf->SetXY( 20, $y1 ); $pdf->SetFont('Arial','B',10);
    $pdf->Cell( 160, 5, "Seite 1/1", 0, 0, 'R');

    $pdf->SetFont('Arial','',10);

    // par page de 18 lignes
    $num_page++;
    /*}*/
    
    $pdf->Output("I");
    ob_end_flush(); 
?>
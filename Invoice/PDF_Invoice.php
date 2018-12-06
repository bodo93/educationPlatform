<?php
require('fpdf/fpdf.php');
define('EURO', chr(128) );
define('EURO_VAL', 6.55957 );

class PDF_Invoice extends FPDF
{
// private variables
var $colonnes;
var $format;
var $angle=0;

function _endpage()
{
    if($this->angle!=0)
    {
        $this->angle=0;
        $this->_out('Q');
    }
    parent::_endpage();
}

// public functions
function sizeOfText( $texte, $largeur )
{
    $index    = 0;
    $nb_lines = 0;
    $loop     = TRUE;
    while ( $loop )
    {
        $pos = strpos($texte, "\n");
        if (!$pos)
        {
            $loop  = FALSE;
            $ligne = $texte;
        }
        else
        {
            $ligne  = substr( $texte, $index, $pos);
            $texte = substr( $texte, $pos+1 );
        }
        $length = floor( $this->GetStringWidth( $ligne ) );
        $res = 1 + floor( $length / $largeur) ;
        $nb_lines += $res;
    }
    return $nb_lines;
}

// Company
function addLogo( $source )
{
    $x1 = 10;
    $y1 = 8;
    $this->SetXY( $x1, $y1 );
    $this->Image($source,20,20,50,0,'PNG');
}

// Company
function addCompany( $address )
{
    $x1 = 20;
    $y1 = 50;

    $this->SetXY( $x1, $y1 + 4 );
    $this->SetFont('Arial','',8);
    $length = $this->GetStringWidth( $address );
    //Coordonnées de la société
    $lignes = $this->sizeOfText( $address, $length) ;
    $this->MultiCell($length, 4, $address);
}

// Recipient
function addRecipient( $address )
{
    $x1 = 120;
    $y1 = 70;

    $this->SetXY( $x1, $y1 + 4 );
    $length = $this->GetStringWidth( $address );
    //Coordonnées de la société
    $lignes = $this->sizeOfText( $address, $length) ;
    $this->MultiCell($length, 4, $address);
}

function addDate( $place, $date )
{
    $x1 = 120;
    $y1 = 100;
    $this->SetXY( $x1, $y1 );
    $this->SetFont( "Arial", "", 10);
    $this->SetFont( "Arial", "", 10);
    $this->Cell(40,6, "$place $date");
}

function addPP( $PP )
{
    $x1 = 120;
    $y1 = 50;
    $this->SetXY( $x1, $y1 );
    $this->SetFont( "Arial", "B", 10);
    $this->Cell(40,10,"$PP",1);
}

function addTotal( $total, $dateToday, $dateDue )
{
    $x1 = 20;
    $y1 = 100;

    $this->SetXY( $x1, $y1 );
    $this->SetFont('Arial','B',10);
    
    $this->Cell( 40, 6, "Rechnungsbetrag:", 'TBL' );
    $this->SetXY( $x1 + 40, $y1 );
    $this->Cell( 10,6,'CHF','TB',1,'R',0);
    $this->SetXY( $x1 + 50, $y1 );
    $this->Cell( 30, 6, $total,'TBR',1,'R',0 );
    
    $this->SetFont('Arial','',10);
    $this->SetXY( $x1, $y1 + 10 );
    $this->Cell( 40, 6, "Rechnungsdatum:", 'TL' );
    $this->SetXY( $x1, $y1 + 16 );
    $this->Cell( 40, 6, "Faelligkeitsdatum:", 'BL' );
    $this->SetXY( $x1 + 40, $y1 + 10 );
    $this->Cell( 10,12,'','TB',1,'R',0);
    $this->SetXY( $x1 + 50, $y1 + 10 );
    $this->Cell( 30,6,$dateToday,'TR',1,'R',0);
    $this->SetXY( $x1 + 50, $y1 + 16 );
    $this->Cell( 30,6,$dateDue,'BR',1,'R',0);
}

function addTitle( )
{
    $x1 = 20;
    $y1 = 140;

    $this->SetXY( $x1, $y1 );
    $this->SetFont('Arial','B',14);
    
    $this->Cell( 40, 6, "Rechnung SWISSEDU" );
}

function addNote( $text )
{
    $x1 = 20;
    $y1 = 150;

    $this->SetXY( $x1, $y1 );
    $this->SetFont('Arial','',8);
    $length = $this->GetStringWidth( $text );
    //Coordonnées de la société
    $lignes = $this->sizeOfText( $text, $length) ;
    $this->MultiCell($length, 4, $text);
}

function addDetails( $date, $courseName, $price )
{
    $x1 = 20;
    $y1 = 170;

    $this->SetXY( $x1, $y1 );
    $this->SetFont('Arial','B',10);
    
    $this->Cell( 40, 6, "Datum", 'TBLR' );
    $this->SetXY( $x1 + 40, $y1 );
    $this->Cell( 80,6, 'Kursname','TBR');
    $this->SetXY( $x1 + 120, $y1 );
    $this->Cell( 40, 6, 'Kosten CHF','TBR' );
    
    $this->SetFont('Arial','',10);
    $this->SetXY( $x1, $y1 + 6 );
    $this->Cell( 40, 6, "$date", 'BLR' );
    $this->SetXY( $x1 + 40, $y1 + 6 );
    $this->Cell( 80,6,$courseName,'TBR');
    $this->SetXY( $x1 + 120, $y1 + 6 );
    $this->Cell( 40,6,$price,'BR',1,'R',0);
}

function addPriceToBill( $price )
{
    $x1 = 36;
    $y1 = 249.3;

    $this->SetFont('Arial','',10);
    $this->Text($x1, $y1, $price);
    
    $x1 = 49;
    $y1 = 249.3;

    $this->SetFont('Arial','',10);
    $this->Text($x1, $y1, '00');
}

function addCompanyToBill( $address ){
    $x1 = 5;
    $y1 = 202;
    
    $this->SetXY( $x1, $y1 + 4 );
    $this->SetFont('Arial','',8);
    $length = $this->GetStringWidth( $address );
    //Coordonnées de la société
    $lignes = $this->sizeOfText( $address, $length) ;
    $this->MultiCell($length, 4, $address);
}

function addAccountToBill( ){
    $x1 = 30;
    $y1 = 240.5;
    
    $this->SetXY( $x1, $y1 + 4 );
    $this->SetFont('Arial','',8);
    $this->Text($x1, $y1, '0-12345');
}

function addRecipientToBill( $address ){
    $x1 = 125;
    $y1 = 240;
    
    $this->SetXY( $x1, $y1 + 4 );
    $this->SetFont('Arial','',8);
    $length = $this->GetStringWidth( $address );
    //Coordonnées de la société
    $lignes = $this->sizeOfText( $address, $length) ;
    $this->MultiCell($length, 4, $address);
}

function addReferenceToBill( ){
    $x1 = 125;
    $y1 = 232;
    
    $this->SetXY( $x1, $y1 + 4 );
    $this->SetFont('Arial','',8);
    $this->Text($x1, $y1, '0 0 0 0   1 1 1 1   2 2 2 2   3 3 3 3');
}

}
?>
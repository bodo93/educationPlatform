<?php
use controller\CourseController;


function getDate(){
echo CourseController::getDateOfInvoice(98);
echo CourseController::getDateOfCreation(98);
}

getDate();
?>
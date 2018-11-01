<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace controller;

/**
 * Description of EducationalInstitute
 *
 * @author bodog
 */
class InstituteController {
    
    public static function register($view = null){
        //register institute
        $institute = new Institute();
        $institute->setId($POST("id"));
        $institute->setName($POST["name"]);
        $institute->setStreet($POST["street"]);
        $institute->setHouseNumber($POST["houseNumber"]);
        $institute->setPostCode($POST["postCode"]);
        $institute->setPlace($POST["place"]);
        $institute->setEmail($POST["email"]);
        $institute->setPassword($POST["password"]);
        //register invoiceAddress for this institute
        $invoiceAddress = new InvoiceAddress();
        $invoiceAddress->setStreet($POST["invStreet"]);
        $invoiceAddress->setHouseNumber($POST["invHouseNumber"]);
        $invoiceAddress->setPostCode($POST["invPostCode"]);
        $invoiceAddress->setPlace($POST["invPlace"]);
        //set foreignKey
        $institute->setInvoiceAddressId($invoiceAddress->getId());
    }
    
    public static function login(){
        
    }
}

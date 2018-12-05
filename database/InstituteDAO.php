<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace database;

use model\Institute;
use model\InvoiceAddress;

/**
 * Author: Bodo Grütter
 */
class InstituteDAO extends BasicDAO {

    public function create(Instute $institute, InvoiceAddress $invoiceAddress) {

        $stmtInvoiceAddress = $this->mysqli->prepare("Insert into invoiceAddress (ID, Street, HouseNumber, PostCode, Place)"
                . "VALUES (?, ?, ?, ?, ?");
        $stmtInvoiceAddress->bind_param("issis", Null, $invoiceAddress->getStreet(), $invoiceAddress->getHouseNumber(), $invoiceAddress->getPostCode(), $invoiceAddress->getPlace());
        $stmtInvoiceAddress->execute();

        $stmtInstitute = $this->mysqli->prepare("Insert into institute (ID, Name, Street, HouseNumber, PostCode, Place, Email, Password, InvoiceAddressID)"
                . "VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmtInstitute->bind_param("isssisssi", Null, $institute->getName(), $institute->getStreet(), $institute->getHouseNumber(), $institute->getPostCode(), $institute->getPlace(), $institute->getEmail(), $institute->getPassword(), $invoiceAddress->getId());
        $stmtInstitute.execute();
        
        return $this->readInstitute($this->mysqli->lastInsertId());
    }

    public function readInstitute($instituteId) {
        $stmt = $this->mysql->prepare("Select * from institute where ID = ?");
        $stmt->bind_param("i", $instituteId);

        if ($stmt->execute()) {
            return $stmt->fetch_all($mysqli::fetch_object)[0];
        }

        return null;
    }

    public function readInvoiceAddress($invoiceId) {
        $stmt = $this->mysql->prepare("Select * from invoiceAddress where ID = ?");
        $stmt->bind_param("i", $invoiceId);

        if ($stmt->execute()) {
            return $stmt->fetch_all($mysqli::fetch_object)[0];
        }

        return null;
    }

    public function update(Institute $institute, InvoiceAddress $invoiceAddress) {
        $stmtInvoiceAddress = $this->mysqli->prepare("Update invoiceAddress set Street = ?, HouseNumber = ?, PostCode = ?, Place = ? where ID = ?");
        $stmtInvoiceAddress->bind_param("ssisi", $invoiceAddress->getStreet(), $invoiceAddress->getHouseNumber(), $invoiceAddress->getPostCode(), $invoiceAddress->getPlace(), $invoiceAddress->getId());
        $stmtInvoiceAddress->execute();
        
        $stmtInstitute = $this->mysqli->prepare("Update invoiceAddress set Name = ?, Street = ?, HouseNumber = ?, PostCode = ?, Place = ?, Email = ?, Password = ? where ID = ?");
        $stmtInstitute->bind_param("sssisssi", $institute->getName(), $institute->getStreet(), $institute->getHouseNumber(), $institute->getPostCode(), $institute->getPlace(), $institute->getEmail(), $institute->getPassword(), $institute->getId());
        $stmtInstitute->execute();
    }
    
    public function updatePassword(Institute $institute){
        $stmt = $this->mysqli->prepare("Update invoiceAddress set Password = ? where ID = ?");
        $stmt->bind_param("si", $institute->getPassword(), $institute->getId());
        $stmt->execute();
        
        return $this->readInstitute($this->mysqli->lastInsertId());
    }

    public function findByEmail($email) {
        $stmt = $this->mysqli->prepare("Select * from institute where email = ?");
        $stmt->bindParam("s", $email);
        if($stmt->execute()){
             return $stmt->fetch_all($mysqli::fetch_object)[0];
        }
        
        return null;
    }

}

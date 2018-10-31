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
 * Description of InstituteDAO
 *
 * @author bodog
 */
class InstituteDAO extends BasicDAO {

    public function create(Instute $institute, InvoiceAddress $invoiceAddress) {

        $stmtInvoiceAddress = $this->mysqli->prepare("Insert into invoiceAddress (ID, Street, HouseNumber, PostCode, Place)"
                . "VALUES (?, ?, ?, ?, ?");

        $stmtInvoiceAddress->bind_param("issis", Null, $invoiceAddress->getStreet(), $invoiceAddress->getHouseNumber(), $invoiceAddress->getPostCode(), $invoiceAddress->getPlace());
        $stmtInvoiceAddress->execute;

        $stmtInstitute = $this->mysqli->prepare("Insert into institute (ID, Name, Street, HouseNumber, PostCode, Place, Email, Password, InvoiceAddressID)"
                . "VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmtInstitute->bind_param("isssisssi", Null, $institute->getName(), $institute->getStreet(), $institute->getHouseNumber(), $institute->getPostCode(), $institute->getPlace(), $institute->getEmail(), $institute->getPassword(), $invoiceAddress->getId());

        return $this->read($this->mysqli->lastInsertId());
    }

    public function read($instituteId) {
        $stmt = $this->mysql->prepare("Select * from institute where ID = ?");
        $stmt->bind_param("i", $instituteId);

        if ($stmt->execute()) {
            return $stmt->fetch_all($mysqli::fetch_object)[0];
        }
        
        return null;
    }

    public function update(Institute $institute) {
        
    }

}

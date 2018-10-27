<?php

namespace model;

/**
 * Description of EducationalInstitute
 *
 * @author bodog
 */
class EducationalInstitute {
    private $id;
    private $name;
    private $street;
    private $houseNumber;
    private $postCode;
    private $place;
    private $email;
    private $password;
    private $invoiceAddressId;
 

    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getStreet() {
        return $this->street;
    }

    function getHouseNumber() {
        return $this->houseNumber;
    }

    function getPostCode() {
        return $this->postCode;
    }

    function getPlace() {
        return $this->place;
    }

    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        return $this->password;
    }

    function getInvoiceAddressId() {
        return $this->invoiceAddressId;
    }

   function setId($id) {
        $this->id = $id;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setStreet($street) {
        $this->street = $street;
    }

    function setHouseNumber($houseNumber) {
        $this->houseNumber = $houseNumber;
    }

    function setPostCode($postCode) {
        $this->postCode = $postCode;
    }

    function setPlace($place) {
        $this->place = $place;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setInvoiceAddressId($invoiceAddressId) {
        $this->invoiceAddressId = $invoiceAddressId;
    }
}

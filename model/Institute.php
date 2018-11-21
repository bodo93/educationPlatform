<?php

namespace model;

/**
 * Description of EducationalInstitute
 *
 * @author bodog
 */
class Institute {
    private $ID;
    private $name;
    private $street;
    private $houseNumber;
    private $postCode;
    private $place;
    private $Email;
    private $Password;
    private $invoiceAddressId;
 

    function getId() {
        return $this->ID;
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
        return $this->Email;
    }

    function getPassword() {
        return $this->Password;
    }

    function getInvoiceAddressId() {
        return $this->invoiceAddressId;
    }

   function setId($id) {
        $this->ID = $id;
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
        $this->Email = $email;
    }

    function setPassword($password) {
        $this->Password = $password;
    }

    function setInvoiceAddressId($invoiceAddressId) {
        $this->invoiceAddressId = $invoiceAddressId;
    }
}

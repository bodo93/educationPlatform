<?php

namespace model;

/**
 * Author: Bodo Grütter
 */
class Institute {
    private $ID;
    private $Name;
    private $Street;
    private $HouseNumber;
    private $PostCode;
    private $Place;
    private $Email;
    private $Password;
    private $InvoiceAddressId;
 

    function getId() {
        return $this->ID;
    }

    function getName() {
        return $this->Name;
    }

    function getStreet() {
        return $this->Street;
    }

    function getHouseNumber() {
        return $this->HouseNumber;
    }

    function getPostCode() {
        return $this->PostCode;
    }

    function getPlace() {
        return $this->Place;
    }

    function getEmail() {
        return $this->Email;
    }

    function getPassword() {
        return $this->Password;
    }

    function getInvoiceAddressId() {
        return $this->InvoiceAddressId;
    }

   function setId($id) {
        $this->ID = $id;
    }

    function setName($name) {
        $this->Name = $name;
    }

    function setStreet($street) {
        $this->Street = $street;
    }

    function setHouseNumber($houseNumber) {
        $this->HouseNumber = $houseNumber;
    }

    function setPostCode($postCode) {
        $this->PostCode = $postCode;
    }

    function setPlace($place) {
        $this->Place = $place;
    }

    function setEmail($email) {
        $this->Email = $email;
    }

    function setPassword($password) {
        $this->Password = $password;
    }

    function setInvoiceAddressId($invoiceAddressId) {
        $this->InvoiceAddressId = $invoiceAddressId;
    }
}

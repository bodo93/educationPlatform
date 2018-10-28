<?php

namespace model;

/**
 * Description of InvoiceAddress
 *
 * @author bodog
 */
class InvoiceAddress {
    
    private $id;
    private $street;
    private $houseNumber;
    private $postCode;
    private $place;
    
    function getId() {
        return $this->id;
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

    function setId($id) {
        $this->id = $id;
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


}

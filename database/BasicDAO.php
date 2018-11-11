<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BasicDAO
 *
 * @author bodog
 */

namespace database;

use database\DBConnection;

class BasicDAO {

    private static $mysqli;

    public function __construct($mysqli = null) {
        if(is_null($mysqli)){
            $this->mysqli = DBConnection::getConnection();
        } else {
            $this->mysqli = $mysqli;
        }
    }

}

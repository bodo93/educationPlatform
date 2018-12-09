<?php

/*
 * Author: Bodo Grütter
 */

namespace database;

use database\DBConnection;

class BasicDAO {

    private static $mysqli;

    /**
     * $Author: Bodo Grütter
     * 
     * _construct() creates a mysqli object.
     * parameter: a mysqli object
     * return: -
     */
    public function __construct($mysqli = null) {
        if (is_null($mysqli)) {
            $this->mysqli = DBConnection::getConnection();
        } else {
            $this->mysqli = $mysqli;
        }
    }

}

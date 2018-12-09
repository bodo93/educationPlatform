<?php

/**
 * Author: Bodo Grütter
 */

namespace database;
use database\config;
use \mysqli;


class DBConnection {
    
    private static $connection = null;
    
     /**
     * $Author: Bodo Grütter
     * 
     * _construct() connects to database
     * parameter: -
     * return: -
     */
    protected function __construct(){
        $dbHost = config::get("database.host");
        $dbUser = config::get("database.user");
        $dbPassword = config::get("database.password");
        $dbDatabase = config::get("database.name");

        self::$connection = new mysqli($dbHost, $dbUser, $dbPassword, $dbDatabase);
        
        // Philipp: added exclamanation point
        if(!self::$connection){
            die("Connection failed: ".self::$connection->connect_error);
        }
    }
    
     /**
     * $Author: Bodo Grütter
     * 
     * getConnection() creates a connection object
     * parameter: -
     * return: a singleton of a connection-object
     */
    public static function getConnection(){
        if(self::$connection){
            return self::$connection;
        } else {
            return new self();
        }
    }
}
<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace database;
use Mysqli;
/**
 * Description of dbConnection
 *
 * @author bodog
 */

class DBConnection {
    
    private static $connection = null;
    
    protected function __construct(){
        $dbHost = "127.0.0.1";
        $dbUser = "root";
        $dbPassword = "";
        $dbDatabase = "db_educationPlatform";
        

        self::$connection = new mysqli($dbHost, $dbUser, $dbPassword, $dbDatabase);
        
        // Philipp: added exclamanation point
        if(!self::$connection){
            die("Connection failed: ".self::$connection->connect_error);
        }
    }
    
    //singleton
    public static function getConnection(){
        if(self::$connection){
            return self::$connection;
        } else {
            return new self();
        }
    }
    
    
}

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
        
        /*
        $dbHost = get("database.host");
        $dbUser = get("database.user");
        $dbPassword = get("database.password");
        $dbDatabase = get("database.name");
         */
        
        
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
    
    // connection to heroku db connector 
    /*private static function loadENV() {
        if (isset($_ENV["JAWSDB_URL"])) {
            $dbopts = parse_url($_ENV["JAWSDB_URL"]);
            $dbUser = $dbopts["user"];
            $dbPassword = $dbopts["pass"];
            $dbHost = $dbopts["host"];
            $dbDatabase =   ltrim($dbopts["path"], '/');
        } 
     */
    
}

/*
 * <!--mysql://hyum0j4ogwic0guk:omft2t43cv52t9z8@r6ze0q02l4me77k3.chr7pe7iynqr.eu-west-1.rds.amazonaws.com:3306/m4145e68qi6t0w1j-->
 */
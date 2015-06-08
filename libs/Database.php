<?php

class Database extends MySQLi {
     private static $instance = null ;

     private function __construct($host, $user, $password, $database){ 
         parent::__construct($host, $user, $password, $database);
     }

     public static function getInstance(){
         if (self::$instance == null){
             self::$instance = new self(DB_HOST, DB_USER, DB_PASS, DB_NAME);
             self::$instance->query("SET NAMES UTF8");
         }
         return self::$instance ;
     }
}
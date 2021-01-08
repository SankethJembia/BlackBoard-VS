<?php
ob_start();
session_start(); 
           try{
               $connect = new PDO("mysql:dbname=blackboarddb;host=localhost","root",""); /** Connection  */
               
               echo "Connected to Database Sucessfully";    /** Connection status */

           }       
           catch(PDOExcetion $e){
               exit("Connection failed:".$e->getMessage());

           }

?>

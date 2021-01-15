<?php
ob_start();
session_start(); 
           
 $connect =new mysqli("localhost","root","","blackboarddb");
 echo "Status:Connected\n";
 echo "<br>";
 echo "Selected database:BlackBoarddb";

 
           
?>

<?php
ob_start();
session_start(); 
           
 $connect =new mysqli("localhost","root","","blackboarddb"); //creating new connection and selecting db 
 echo "Status:Connected\n";
 echo "<br>";
 echo "Selected database:BlackBoarddb";

 

 
           
?>

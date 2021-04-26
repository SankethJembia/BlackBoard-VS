<?php
require_once("Connectionp.php");
require_once("Lheader.php");            //landing page navigation header


//if(!isset($_SESSION["userLoggedin"])){   //user session check after sigining in 
   
  //  header("Location : LogIn.html");

//}
$cat=new Category($connect);
echo $cat->showCat();

require_once("Lfooter.php");           //landing page footer
?>


       




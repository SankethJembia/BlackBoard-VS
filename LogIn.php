<?php
require_once("Connectionp.php"); 
require_once("Account.php");

$account=new Account($connect);  //created an accout obj for managing the user action:login and sign up

   if(isset($_POST["signin"])){           
    $user = $_POST['email']; 
    $pass = $_POST['password']; 

    $account->login($user,$pass);
     $_SESSION["userLoggedin"]=$user;
     header("Location: landing.php ");
 
    
}

?>


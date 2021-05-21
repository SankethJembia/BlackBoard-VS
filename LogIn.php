<?php
require_once("Connectionp.php"); 
require_once("Account.php");

$account=new Account($connect);  //created an accout obj for managing the user action:login and sign up

   if(isset($_POST["signin"])){           
    $user = $_POST['email']; 
    $pass = $_POST['password']; 

    $res = $account->login($user,$pass);
     
    
    if($res == TRUE){
         $_SESSION["userLoggedin"]=$user;  //pass the user into session
         header("Location: landing.php ");
    }else{
      header("Location:LogIn.html");
      echo "User not Found";
    }
    
    
}

?>


<?php
require_once("Connectionp.php");
require_once("Account.php");


$account=new Account($connect);

if(isset($_POST["signup"])){           
     
    $user = $_POST['email']; 
    $pass = $_POST['password']; 
    $firstname = $_POST['firstname'];  
    $lastname = $_POST['lastname'];

    $account->insert($firstname,$lastname,$user,$pass);  //sending inputdata to Accounts class
    $_SESSION["userLoggedin"]=$user;     
    header("Location: homebb.html ");

   
}

?>

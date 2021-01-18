<?php
require_once("insertinfo.php");
require_once("Account.php");

$account=new Account($connect);

   if(isset($_POST["signin"])){           
    $user = $_POST['email']; 
    $pass = $_POST['password']; 

    $account->login($user,$pass);
}

?>


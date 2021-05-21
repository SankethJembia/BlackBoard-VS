<?php
require_once("Connectionp.php");
require_once("Account.php");


$account=new Account($connect);

if(isset($_POST["signup"])){           
     
    $user = $_POST['email']; 
    $pass = $_POST['password']; 
    $firstname = $_POST['firstname'];  
    $lastname = $_POST['lastname'];

    $result =$account->insert($firstname,$lastname,$user,$pass);  //sending inputdata to Accounts class
         
        if($result == TRUE){
         $_SESSION["userLoggedin"]=$user;     //pass the user into the session
         header("Location: landing.php ");         
    
        }else {
            header("Location:signUp.html");
            echo "Error Occured Try Again";
        }
   
}

?>

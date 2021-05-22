<?php
require_once("Connectionp.php");
require_once("Account.php");

$account=new Account($connect);


if(isset($_POST["signup"])){           
    
    $user = $_POST['email']; 
    $user2 = $_POST['cemail'];
    $pass = $_POST['password']; 
    $pass2 = $_POST['cpassword'];
    $firstname = $_POST['firstname'];  
    $lastname = $_POST['lastname'];
    
    

    $result =$account->insert($firstname,$lastname,$user,$user2,$pass, $pass2);  //sending inputdata to Accounts class
    
    if($result == TRUE){
        $_SESSION["userLoggedin"]=$user;     //pass the user into the session
        header("Location: landing.php ");         
        
    }
    // else {
    //     header("Location:SignUp.php");
    //     echo "Error Occured Try Again";
    // }
}

?>
<html >
<head>
    
    <Style>
        h3{                                          /*  Header Tag's  */
            font-family: monospace;
            color: aliceblue;
            margin: 10px 50px;
        }
       
       body{                                               
           background-color:  rgb(56, 60, 65);
           background: url("Resourses/ORFEYB0.jpg");
           background-position: center;
           background-size: cover;
         
         
       }
       
       .Center{
           
           margin-top: 100px;                /*  Class for Aligning the content at Center  */
           text-align: center;
           display: flex;
           align-items: center;
           justify-content: center;
           
       
       }
       .CenterBox{
           background: url("Resourses/chalkboardbackground.png");
           background-position:center ;
           background-size: cover;
           background-color:     snow;    /* Class For Creating a Box  */
           height: 560px;
           width: 800px;
           box-shadow:black;
           
       }
       .CenterBox form{
           display: flex;    
           margin:auto 100px;                      /*  Sorting Elements in Column Style  */                 
           flex-direction: column;
       }
       
       .CenterBox form input[type="text"], 
       .CenterBox form input[type="email"],                 /*  Adjusting Space Between the Elements  */
       .CenterBox form input[type="password"]{               /*  Element's of type {text,email,password}  */
       
           
           font-size: 20px;
           margin:8px 100px ;               
           border: none;
           border-bottom: 1px solid peru ;
       }
       .CenterBox form input[type="submit"] {
           color: rgb(0, 0, 0) ;
           background-color:coral;
           height: 40px;
           width: 80px;                                    /*  Adjusting the Button  */
           border: none;
           border-radius: 3px;
           font-weight:bolder ;
           margin:  auto ;
           
       }
       .errMsg{
           color:white;
       }
       
          </Style>
    <meta charset="UTF-8">
    <title>Sign Up PAGE</title>
</head>
<body>
 
    <div class="Center">
      
        <div  class="CenterBox" >
                    
       
            <form  action="SignUp.php" method="POST" >
               
                <img src="Resourses\MyProjectLogom (2).png" title="Logo" style="width: 120px; height: 80px; margin: auto; padding-top: 10px; ">
                <h3> Sign Up </h3>
                <h3>Enter Your Detail's</h3>   
                <?php echo $account->getError("Your first name must be between 2 and 25 characters"); ?>
                <input type="text" name="firstname" placeholder="First Name" maxlength="20" required>
                <?php echo $account->getError("Your last name must be between 2 and 25 characters"); ?>
                <input type="text" name="lastname" placeholder="Last Name" maxlength="20" required>
                <?php echo $account->getError("Your emails don't match"); ?>
                <input type="email" name="email" placeholder="Email" maxlength="50" required>
                <input type="email" name="cemail" placeholder="Confirm Email" maxlength="50" required>
                <?php echo $account->getError("Passwords don't match"); ?>
                <?php echo $account->getError("Your password must be between 5 and 25 characters"); ?>
                <input type="password" name="password" placeholder="Password" maxlength="20" required >
                <input type="password" name="cpassword" placeholder="Confirm Password" maxlength="20" required >
                <input type="submit" name="signup" value="SIGN UP" > 
                 <p><strong><a href="LogIn.php"> Already a User  </a></strong></p>
           </form>
        </div>
      
    </div>
  
</body>
</html>

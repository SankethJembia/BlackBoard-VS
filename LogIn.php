<?php
require_once("Connectionp.php"); 
require_once("Account.php");

$account=new Account($connect);  //created an accout obj for managing the user action:login and sign up

   if(isset($_POST["signin"])){           
    $user = $_POST['email']; 
    $pass = $_POST['password']; 

    $res = $account->login($user,$pass); //goes to account class for validation after that it start executing
     
    
    if($res == TRUE){
         $_SESSION["userLoggedin"]=$user;  //pass the user into session
         header("Location: landing.php ");
    }
    
    
}

?>

<!DOCTYPE html>
<html >
<head>
    
    <Style>
        h2{                                          /*  Header Tag's  */
            font-family: monospace;
            color: aliceblue;
        }
       
       body{                                               
           background-color:  rgb(49, 53, 56);
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
           height: 500px;
           width: 700px;
           box-shadow:black;
           
          
       }
       .CenterBox form{
           display: flex;   
           margin-top:auto 70px;                       /*  Sorting Elements in Column Style  */                 
           flex-direction: column;
       } 
       .CenterBox form input[type="email"],                 /*  Adjusting Space Between the Elements  */
       .CenterBox form input[type="password"]{               /*  Element's of type {text,email,password}  */
       
           
           font-size: 20px;
           margin:8px 100px ;               
           border: none;
           padding: 5px;
           border-bottom: 1px solid peru ;
       }
       .CenterBox form input[type="submit"] {
           color: rgb(0, 0, 0);
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
    <title>Log in PAGE</title>
</head>
<body>
 
    <div class="Center">
      
        <div  class="CenterBox" >
                    
       
            <form action="LogIn.php" method="POST" >      
               
                <img src="Resourses\MyProjectLogom (2).png" title="Logo" style="width: 120px; height: 80px; margin: auto; padding-top: 10px; ">
                <h2> Log in </h2>  
                <?php echo $account->getError("Invalid email or password"); ?>
                <input type="email" name="email" placeholder="Email" maxlength="50" required>
                <input type="password" name="password" placeholder="Password" maxlength="20" required>
                <input type="submit" name="signin" value="Log in"> 
                 <p ><strong><a  href="SignUp.php"> Create Account  </a></strong></p>
           </form>
        </div>
      
    </div>
  
</body>
</html>
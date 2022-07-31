<?php

require_once("Account.php");
require_once("Lheader.php");


$account = new Account($connect);     // using account class 
if(isset($_POST["SaveChangesbutton"])){       //on click


$fn=$_POST["firstname"];                   //getting the newly entered first name
$ln=$_POST["lastname"];                    //getting the newly entered last name

$account-> updateDetails($fn,$ln,$user);      //call to update function

}


if(isset($_POST["Changepassb"])){       //on click


    $oldPass=$_POST["oldPassword"];    //getting the old pass
    $newPass=$_POST["newPassword"];                //getting the newly entered first name
    $cNewPass=$_POST["confirmNewPassword"];                    //getting the newly entered last name
    
    
    $account-> updatePass($oldPass,$newPass,$cNewPass,$user); //call tho update password function

        
    
    
}




?>



<html>

<head>

  <title> Profile  </title>
   <style> 
html,body{
     
     background-image: linear-gradient(lightsalmon, burlywood);
       
     }
     h2{                                          /*  Header Tag's  */
            font-family: monospace;
            color: dimgray;
            margin: 10px 20px;
           
        }
        h1{                                          /*  Header Tag's  */
            font-family: monospace;
            color:  black;
            margin: 20px 10px;
            font-weight: 900;
        }

    .mbox{
        display:flex;
    }    
.details{

margin: 10px 20px;

}
.boxone{
     
    padding: 10px 30px;
    

}
.boxtwo{

    padding: 10px 30px;

}
.mbox form input[type="text"], 
        form input[type="email"],                
                form input[type="password"]{               
           
           font-size: 20px;
           margin:8px 10px ;               
           border: none;
           
       }

.mbox form input[type="submit"] {
      color: rgb(0, 0, 0) ;
      background-color:coral;
      height: 40px;
      width: 150px;                                  
      border: none;
      border-radius: 3px;
      font-weight:bolder ;
      margin:  auto ;
      margin:8px 10px ; 
           
       }      
   
   
    </style>
</head>

<body>


    
    
    <div class="details">
     <h1> BlackBoard Profile  </h1>
        <div class="mbox">
         <div class="boxone">    

            <form method="POST">
              <h2> User Details </h2>
            
               <?php echo $account->getError("Your first name must be between 2 and 25 characters") ?> <br>
               <input type="text" name="firstname" placeholder="First Name"> <br>
               <?php echo $account->getError("Your last name must be between 2 and 25 characters") ?> <br>
               <input type="text" name="lastname" placeholder="Last Name"> <br>

               <input type="submit" name="SaveChangesbutton" value="Save Changes"><br>
        
        
            </form> 
         </div>
       
           <div class="boxtwo">

              <form method="POST">

              <h2> Change Password </h2>
                 <?php echo $account->getError("Your Old Password is Incorrect") ?> <br>
                 <input type="password" name="oldPassword" placeholder="Old Password"><br>
                 <?php echo $account->getError("Passwords don't match") ?> <br>
                 <input type="password" name="newPassword" placeholder="New Password"><br>
                 <?php echo $account->getError("Your password must be between 5 and 25 characters") ?> <br>
                 <input type="password" name="confirmNewPassword" placeholder="Confirm New Password"><br>

                 <input type="submit" name="Changepassb" value="Change Password"><br>



             </form> 
        </div>   
    </div>

</div>
</body>
</html>

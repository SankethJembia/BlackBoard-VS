<?php

require_once("Connectionp.php"); //connection class including
class Account {                                                    //account class for managing account function(signin,signup..etc) 
 
   private $connect;
  
    public function __construct($connect){   //connection init
         $this->connect=$connect;
    }
             
    public function insert($fn,$ln,$em,$pass){ //reference function
    
    

    $this->registeruser($fn,$ln,$em,$pass);     //calling register private funtion 
        
       
     

    }

    public function login($em,$pass){ //reference function


        $this->logchck($em,$pass);//calling logchck private funtion
    }

    private function logchck($em,$pass){  //checks if both email and pass matches or not

        
        $st= "SELECT * FROM  users WHERE email='$em' AND passward='$pass'"; //query for checking in database
                                                  
                                                         
        if($this->connect->query($st)==TRUE){ //if matches 
             

        }else{           //not matches

            echo "User not Found";
        }

                   
            
       
        
       
         
    }
      
    private function registeruser($fn,$ln,$em,$pass){  //function for inserting record in db
             
        // $pass=hash("sha512",$pass);    //hashing password fo security
        
        
         $stmt= "INSERT INTO users(firstname,lastname,email,passward) VALUES('$fn','$ln','$em','$pass')"; //query for inserting
                                                  
                                                         
        if($this->connect->query($stmt)==TRUE
        ){ //if record inserted 
            
            echo "<br>Signed up Succesfully";

            echo "<br> Thanks for Being a Member ";
           
        }else{     //if fails
            echo "Error Occured";
        }

        
         
        
         

       


    }


}



?>
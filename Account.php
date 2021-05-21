<?php

require_once("Connectionp.php"); //connection class including
class Account {                                                    //account class for managing account function(signin,signup..etc) 
 
   private $connect;
  
    public function __construct($connect){   //connection init
         $this->connect=$connect;
    }
             
    public function insert($fn,$ln,$em,$pass){ //reference function
    
    

    if($this->registeruser($fn,$ln,$em,$pass)){     //calling register private funtion 
        
      return TRUE;  
    }
    else {
        return FALSE;
    }
     

    }

    public function login($em,$pass){ //reference function


        if($this->logchck($em,$pass)){//calling logchck private funtion
                   
            return TRUE;                   
        }
        else {
            return FALSE;
        }
    
        }

    private function logchck($em,$pass){  //checks if both email and pass matches or not

        
        $st= "SELECT * FROM  users WHERE email= ? AND passward= ? "; //query for checking in database
                                                  
                                                         
        $r=$this->connect->prepare($st); //if matches 
             $r->bind_param("ss",$em,$pass); //binding....
             $r->execute();        
             $r->store_result();  //storing the results

             if($r->num_rows()==1){             //if it found exactly one record 
                   return TRUE;
               }
               else {                         
                   return FALSE;
               }

             //not matches

                   
            
       
        
       
         
    }
      
    private function registeruser($fn,$ln,$em,$pass){  //function for inserting record in db
             
        // $pass=hash("sha512",$pass);    //hashing password fo security
        
        
         $stmt= "INSERT INTO users(firstname,lastname,email,passward) VALUES('$fn','$ln','$em','$pass')"; //query for inserting
                                                  
                                                         
        if($this->connect->query($stmt)==TRUE){ //if record inserted 
            
            echo "<br>Signed up Succesfully";

            echo "<br> Thanks for Being a Member ";
            return TRUE;
           
        }else{     //if fails
           

            return FALSE;
        }

        
         
        
         

       


    }


}



?>
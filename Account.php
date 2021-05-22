<?php

require_once("Connectionp.php"); //connection class including
class Account {                                                    //account class for managing account function(signin,signup..etc) 
 
   private $connect;
   private $errorArray = array();
  
    public function __construct($connect){   //connection init
         $this->connect=$connect;
    }
             
    public function insert($fn,$ln,$em,$em2,$pass, $pass2){ //reference function
    
    

    if($this->registeruser($fn,$ln,$em,$em2,$pass, $pass2)){     //calling register private funtion 
        
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
                array_push($this->errorArray, "Invalid email or password"); //else 
               }
               

            
       
        
       
         
    }
      
    private function registeruser($fn,$ln,$em,$em2,$pass,$pass2){  //function for inserting record in db
             
        // $pass=hash("sha512",$pass);    //hashing password fo security
        $this->validateFirstName($fn);
        $this->validateLastName($ln);
        $this->validateEmails($em, $em2);
        $this->validatePasswords($pass,$pass2);
        
        if(empty($this->errorArray)) {
           $stmt= "INSERT INTO users(firstname,lastname,email,passward) VALUES('$fn','$ln','$em','$pass')"; //query for inserting
                                                  
                                                         
               if($this->connect->query($stmt)==TRUE){ //if record inserted 
            
                     echo "<br>Signed up Succesfully";
 
                     echo "<br> Thanks for Being a Member ";
                    
                     return TRUE;
           
                    }
        }    
         

        
    }


    private function validateFirstName($fn) {        //check first name
        if(strlen($fn) < 2 || strlen($fn) > 25) {
            array_push($this->errorArray, "Your first name must be between 2 and 25 characters");
        }
    }

    private function validateLastName($ln) {        //check last name
        if(strlen($ln) < 2 || strlen($ln) > 25) {
            array_push($this->errorArray, "Your last name must be between 2 and 25 characters");
        }
    }

    private function validateEmails($em, $em2) {  // compare emails
        if($em != $em2) {
            array_push($this->errorArray,"Your emails don't match");
            return;
        }


}

private function validatePasswords($pass, $pass2) {   // compare passwords 
    if( $pass != $pass2) {
        array_push($this->errorArray,"Passwords don't match" );
        return;
    }

    if(strlen($pass) < 5 || strlen($pass) > 25) {    //if matched check the length of passwords
        array_push($this->errorArray, "Your password must be between 5 and 25 characters");
    }
}

public function getError($error) {            //a error string will be passed through this 
    if(in_array($error, $this->errorArray)) {             //if that string presnt then return that string 
        return "<span class='errMsg'>$error</span>";
    }
}
}



?>
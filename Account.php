<?php
class Account {
 
   private $connect;
   private $errArray=array();
  
    public function __construct($connect){   //connection init
         $this->connect=$connect;
    }
             
    public function insert($fn,$ln,$em,$pass){
    
    

    $this->registeruser($fn,$ln,$em,$pass);     //calling private funtion 
        
       
     

    }

    public function login($em,$pass){


        $this->logchck($em,$pass);
    }

    private function logchck($em,$pass){

        
        $st= "SELECT * FROM users WHERE email='$em' AND passward='$pass'";
                                                  
                                                         
        if($this->connect->query($st)==TRUE){

            echo "<br>Welcome";
            echo "<br>Redirecting.......";
 

        }else{

            echo "User not Found";
        }

                   
            
       
        
       
         
    }
      
    private function registeruser($fn,$ln,$em,$pass){  //function for inserting record in db
             
        // $pass=hash("sha512",$pass);    //hashing password fo security
        
        
         $stmt= "INSERT INTO users(firstname,lastname,email,passward) VALUES('$fn','$ln','$em','$pass')";
                                                  
                                                         
        if($this->connect->query($stmt)==TRUE){
            
            echo "<br>Signed up Succesfully";

            echo "<br> Thanks for Being a Member ";
           
        }else{
            echo "Error Occured";
        }

        
         
        
         

       


    }


}



?>
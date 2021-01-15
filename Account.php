<?php
class Account {
 
   private $connect;
   private $errArray=array();
    public function __construct($connect){   //connection init
         $this->connect=$connect;
    }
             
    public function insert($fn,$ln,$em,$pass){
    
       

    $this->registeruser($fn,$ln,$em,$pass);
        
       
     

    }
      
    private function registeruser($fn,$ln,$em,$pass){  //function for inserting record in db
             
        $pass=hash("sha512",$pass);    //hashing password fo security
        
        
         $stmt= "INSERT INTO users(firstname,lastname,email,passward) VALUES('$fn','$ln','$em','$pass')";
                                                  
                                                         
        $this->connect->query($stmt);

        
         
        
         

       


    }


}



?>
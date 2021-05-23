<?php


class NavigationMenu{

 private $connect,$user;

 public function __construct($connect,$user){
      
    $this->connect=$connect;
    $this->user=$user;
   }

   public function createLinks(){

   return "<div class='navlinks'> 
               <a href='landing.php'>
                 <span> HOME </span>
               </a>        
               <a href='Logout.php'>
                 <span> LOG OUT </span>
               </a>              
   
            </div>";


   }




}



?>
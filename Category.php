<?php

class Category{

private $connect,$firstname;

 public function __construct($connect){

     $this->connect=$connect;
   // $this->firstname=$firstname;

 }

 public function showCat(){

  $qry="SELECT * FROM categories ";
  $res=$this->connect->query($qry);  //exe a query here
   
  $html ="<div class='categoriesc'>";

   
       while($row = $res->fetch_assoc()){         //fetching the data 
           $html.=$this->getCat($row);   //$row["name"];           //calls get catrgory function with the records 
       }


  return $html ."</div>";  //returned block of names are concat with the html
 }

  private function getCat($sqldata){   //record sqldata is passed into this function 
     
    $catID = $sqldata["id"];                 //from the sql data it will get the id of a patricular category
    $title = $sqldata["name"];   //it will return the title names of the record 
      
     $entities=Entityhub::getEntity($this->connect,$catID,5); //objects stored in the varible

      $entityblock=""; //printing those entities in  the page

      foreach($entities as $entity){   

        $entityblock .=$entity->getName()."<br>";    //our entities names are returned here and will store it in the block
        
     }
     
  return $entityblock."<br>";      //return the block of names to  showcat
 }

}

?>
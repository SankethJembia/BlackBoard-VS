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

   
       while($row = $res->fetch_assoc()){ //fetching the data 
           $html.=$this->getCat($row);  //calls get catrgory function with the records 
       }

  return $html ."</div>";
 }

  private function getCat($sqldata){   //record sqldata is passed into this function 
     
    $catID = $sqldata["id"];                 //from the sql data it will get the id of a patricular category
    $title =$sqldata["name"];   //it will return the title names of the record or category id
    
            //it will return the title names along with categories
      
     $entities=Entityhub::getEntity($this->connect,$catID,5);

     $entityhtml="";

    foreach($entities as $entity){

        $entityhtml .=$entity->getName();
    }
     
  return $entityhtml."<br>";     
 }

}

?>
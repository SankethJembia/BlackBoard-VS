<?php

class Category{

private $connect,$user;

 public function __construct($connect,$user){

     $this->connect=$connect;
     $this->user=$user;

 }

public function showCategory($id){
 
  $rs=Entityhub::getCatEntities($this->connect,$id);   // passing the Category ID to get the cat Entities

   $cats=""; //printing those entities in  the page
      
   $pre = new Preview($this->connect,$this->user); //preview object
   foreach($rs as $r){   

     $cats .=$pre->createCatEntityPreview($r);    //call to the preview creation function
     
  }

  return " <div >
               $cats
              </div>";


}



 public function showCat(){

  $qry="SELECT * FROM categories ";
  $res=$this->connect->query($qry);  //exe a query here
   
  $html ="  <div class='wrapper'>
            <div class='categoriesc'>";

   
       while($row = $res->fetch_assoc()){         //fetching the data 
           $html.="<br>".$this->getCat($row)."<br>";   //$row["name"];           //calls get catrgory function with the records 
       }


  return $html ." </div> </div> ";  //returned block of names are concat with the html
 }

  private function getCat($sqldata){   //record sqldata is passed into this function 
     
    $catID = $sqldata["id"];                 //from the sql data it will get the id of a patricular category
    $title = $sqldata["name"];   //it will return the title names of the record 
      
     $entities=Entityhub::getEntity($this->connect,$catID,5); //objects stored in the varible

      $entityblock=""; //printing those entities in  the page
      
      $previews = new Preview($this->connect,$this->user); //preview object
      foreach($entities as $entity){   

        $entityblock .=$previews->createEntityPreview($entity);    //call to the preview creation function
        
     }
     
  return "<div class='supercat'>
           <a href='CategoryPage.php?id=$catID'>
             <h2>$title</h2>
           </a>
            
              <div class='entities'>
               $entityblock
              </div>
          
          </div>";      //return the block of names to  showcat
 }

}

?>
<?php


class Entityhub{

        


  public static function getCatEntities($connect,$id){

    $query=$connect->prepare("SELECT * FROM entities WHERE categoryId=?");  //this query will print the entities relating to its Category Id
    $query->bind_param("i",$id);
    $query->execute();
  
  
    $r =  $query->get_result();    
  
    $re=array();
  
     while($ro=$r->fetch_assoc()){
       $re[]=new Entity($connect,$ro);
     }
    
     return $re;
  }

    public static function getEntity($connect,$categoryId,$limit){ 
        
        $sql = " SELECT * FROM entities WHERE categoryId=?  ORDER BY RAND() LIMIT ? "; //sql query
         
        $stm = $connect -> prepare($sql);  //query prepared for binding

        $stm->bind_param("ii", $categoryId,$limit); //binding..........
        

        $stm->execute(); // executing the query now after binding the values
        
        $r =  $stm->get_result();

            $result=array();

             while($row=$r->fetch_assoc()){
               $result[]=new Entity($connect,$row);
             }
        
        
       
     
         return $result; //returning the array of entities to category
   }


}








?>
<?php


class Entityhub{




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
        
        
        // if($categoryId != null){  
        //    $qry->bind_param('ii',$categoryId,$limit);  
    
        // }

         
        // if($qry->execute()){

        //  $result= array();
        //  while($row = $qry->fetch()){
        //      $result[] = new Entity($connect,$row);
    

        //  }
        // }
     
         return $result; //returning the array of entities to category
   }


}








?>
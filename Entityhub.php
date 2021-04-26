<?php


class Entityhub{




    public static function getEntity($connect,$categoryId,$limit){ 
        
        $sql = "SELECT * FROM entities WHERE categoryId = ?  ORDER BY RAND() LIMIT ? ";

        $qry = $connect->prepare($sql);

        if($categoryId != null){  
           $qry->bind_param('ii',$categoryId,$limit);  
    
        }

         
        if($qry->execute()){

         $result= array();
         while($row = $qry->fetch()){
             $result[] = new Entity($connect,$row);

         }
        }
     
        return $result;
   }


}








?>
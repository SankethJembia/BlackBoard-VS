
<?php


class VideoDetails{    //Clicked Video Details 

    
private $connect,$sqlData;

public function __construct($connect,$input){
    $this->connect=$connect;


    if(is_array($input)){
        $this->sqlData=$input;
         
    }
    else{
                

           $stm=" SELECT * FROM videos Where id = ? ";
           $query=$this->connect->prepare($stm);
           $query->bind_param('i',$input);  
           $query->execute();
           $res = $query->get_result();
           $this->sqlData = $res->fetch_assoc();
           

    
    }
}







public function getId(){
    return $this->sqlData["id"];
}
public function getTitle(){

    return $this->sqlData["title"];
}
public function getDescription(){
    return $this->sqlData["description"];
}
public function getFilepath(){
    return $this->sqlData["filePath"];
}
public function getViews(){
    return $this->sqlData["views"];
}
public function getDuration(){
    return $this->sqlData["duration"];
}
public function getEntityId(){
    return $this->sqlData["entityId"];
}
public function getThumbnail(){

    $stmt=" SELECT thumbnail FROM entities Where id= ? ";    //getting thumbnail query from entities
    if($qry= $this->connect->prepare($stmt)){    // query executed
    $qry->bind_param("i",$id);                      //binding the id
    $id=$this->getId(); 
    $qry->execute();
    $result=$qry->get_result();                      // result
    }
    else {
        echo "flfks;f";
    }

    return implode($result -> fetch_row());           // transfering the result from array to string format by using implode()

}

 
}



?>

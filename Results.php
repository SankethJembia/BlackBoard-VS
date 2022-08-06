

<?php
class Results{

 private $connect;


 public function __construct($connect){

   $this->connect=$connect;

 }

public function getResultVideos($searchTerm){

    $query = $this->connect->prepare("SELECT * FROM videos Where title LIKE CONCAT('%', ?,'%')");
    $query->bind_param("s",$searchTerm);
    $query->execute();

    
    $r =  $query->get_result();    
    
    
    $videos = array();
  
     while($rw=$r->fetch_assoc()){
       $videos[] =new VideoDetails($this->connect,$rw);
       
    }
    
     return $videos;

}



}





?>
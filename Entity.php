<?php


class Entity{


    private $connect,$sqlData;

    public function __construct($connect,$input){
        $this->connect=$connect;


        if(is_array($input)){
            $this->sqlData=$input;
        }
        else{
               $stm=" SELECT * FROM entities Where id = :id ";
               if($query=$this->connect->prepare($stm)){
               $query->bind_param(':id',$input);  
               $query->execute();
               $this->sqlData = $query->fetch();
               }

        }


    }


    public function getId(){
        return $this->sqlData["id"];
    }
    public function getName(){
        
        return $this->sqlData["name"];
    }
    public function getThumbnail(){
        return $this->sqlData["thumbnail"];
    }


}



?>

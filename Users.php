<?php

class Users{

private $connect,$sqldata;                  //one is for connection and other is userdata in the database


public function __construct($connect,$user){     //here we pass the user email to go through the database and get his details

    $this->connect=$connect;

    $qry = $this->connect->prepare("SELECT * FROM users Where email=?");  //search query for the specific email

    $qry->bind_param("s",$user);
    $qry->execute();
    $res = $qry->get_result();
    $this->sqldata = $res->fetch_assoc();

}

public function getFirstname(){
    return "<br>".$this->sqldata["firstname"];
}

public function getlasttname(){
    return "<br>".$this->sqldata["lastname"];
}

}





?>
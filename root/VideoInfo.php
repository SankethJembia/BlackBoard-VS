<?php

class VideoInfo{


 private $connect,$video;                        //information class of the playing video

public function __construct($connect,$video){

         $this->connect=$connect;
         $this->video=$video;

}

public function showInfo(){

    return $this->mainInfo();

}

private function mainInfo(){
       $title= $this->video->getTitle();
 
       return "<div class='videoinfo'> 
                    <h1>$title</h1>
                </div>       
                      ";

}






}


















?>
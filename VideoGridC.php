<?php

class VideoGridC{          //gridclass

private $video;


public function __construct($video){
     
    $this->video=$video;

}

public function createGrid(){

 $thumbnail = $this->createThumbnail();
 $info = $this->createInfo();
 $url = "Watchpage.php?id=". $this->video->getId(); //click url when thumbnails are clicked they are passed to watch page with id
             
                          //making a grid for the Itema(videos) and its information
 return "<a href='$url'>
                        
              <div class='itemGrid thumbnailb'>

              $thumbnail
              $info

              </div>
        </a>";


}

private function createThumbnail(){
   
  $thumbnail =$this->video->getThumbnail();        //call goes to videodetails class
    $duration= $this->video->getDuration();        //call goes to videodetails class

                                   //displaying the thumbnails and the duration
   return  "<div class='thumbnail'>
            <img src='$thumbnail'>
              <div class='duration'>
                   <span>$duration</span>
              </div>
              </div>";


}

private function createInfo(){ //displaying the thumbnail information
        
  $title = $this->video->getTitle();  //getting the title

  return "<div class='info'>
              <h3>$title</h3>

          </div>
  
                 ";

}

}






?>